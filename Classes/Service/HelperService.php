<?php
namespace TYPO3\Lvdb\Service;

use In2code\Powermail\Domain\Model\Mail;
use In2code\Powermail\Utility\StringUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class HelperService {

	protected $dataRepository;
	protected $categoryRepository;

	public function injectDataRepository(\TYPO3\Lvdb\Domain\Repository\DataRepository $dataRepository) {
		$this->dataRepository = $dataRepository;
	}

	public function injectCategoryRepository(\TYPO3\Lvdb\Domain\Repository\CategoryRepository $categoryRepository) {
		$this->categoryRepository = $categoryRepository;
	}

	public function test(){
		return 'service called';
	}


	/**
	 * getLocationsArray
	 *
	 * @param Obj
	 * @return Array
	 */
	public function getLocationsArray($obj){
		$subjects = array();
		$i = 0;
		if ($obj) {
			$obj->rewind();
			while ($obj->valid()) {
				$subjects[$i]['uid'] = $obj->current()->getUid();
				$subjects[$i]['pid'] = $obj->current()->getPid();
				$subjects[$i]['title'] = $obj->current()->getTitle();
				$subjects[$i]['adresse'] = $obj->current()->getAdresse();
				$subjects[$i]['plz'] = $obj->current()->getPlz();
				$subjects[$i]['telefon'] = $obj->current()->getTelefon();
				$subjects[$i]['fax'] = $obj->current()->getFax();
				$subjects[$i]['email'] = $obj->current()->getEmail();
				$subjects[$i]['lat'] = $obj->current()->getLat();
				$subjects[$i]['lon'] = $obj->current()->getLon();
				$subjects[$i]['geocode'] = $obj->current()->getGeocode();
				$subjects[$i]['land'] = $obj->current()->getLand();
				#$subjects['cuid'] = $obj->current()->getCuid();
				#$subjects['cname'] = $obj->current()->getCname();
				#$subjects['distance'] = $obj->current()->getDistance();
				$i++;
				$obj->next();
			}
			//var_dump($subjects);
			ksort($subjects);
			return $subjects;
		}
	}

	/**
	 * action geocode
	 *
	 * @param $theAddress
	 * @return void
	 */
	public function geocode($theAddress)
	{
		//for urlencoding
		$vars = array(
			'zipcode',
			'city',
			'address',
			'country'
		);
		while (list(, $v) = each($vars)) {
			$theAddress[$v] = urlencode($theAddress[$v]);
		}
		$address = $theAddress['address'];
		$city = $theAddress['city'];
		$country = $theAddress['country'];
		$zipcode = $theAddress['zipcode'];

		######################################Main Geocoders#####################################
		//if (!$lat_lon->lat && !$lat_lon->lon) {
			$apiURL = "http://maps.googleapis.com/maps/api/geocode/json?address={$address},+{$zipcode}+{$city},+{$country}&sensor=false";
			$addressData = $this->getWebpage($apiURL);

			//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($apiURL, 'apiURL');
			//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($addressData, 'addressData');

			$coordinates[1] = json_decode($addressData)->results[0]->geometry->location->lat;
			$coordinates[0] = json_decode($addressData)->results[0]->geometry->location->lng;
			$latLon = new \stdClass();
			$latLon->lat = $coordinates[1];
			$latLon->lon = $coordinates[0];
			$latLon->status = json_decode($addressData)->status;
			if ($this->settings['debug']) {
				//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($coordinates, 'coordinates');
			}
		//}
		//debug($latLon);
		return $latLon;
	}

	/**
	 * action getWebpage
	 *
	 * @return void
	 */
	public function getWebpage($url)
	{
		if (ini_get('allow_url_fopen')) {
			$this->conf['useCurl'] = 0;
		} else {
			$this->conf['useCurl'] = 1;
		}

		if ($this->conf['useCurl']) {
			$sessions = curl_init();
			curl_setopt($sessions, CURLOPT_URL, $url);
			curl_setopt($sessions, CURLOPT_HEADER, 0);
			curl_setopt($sessions, CURLOPT_RETURNTRANSFER, 1);
			$data = curl_exec($sessions);
			curl_close($sessions);
		} else {
			$data = \TYPO3\CMS\Core\Utility\GeneralUtility::getURL($url);
		}

		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($data, 'URL data');

		return $data;
	}

	/**
	 * action updateLatLon
	 *
	 * @return void
	 */
	public function updateLatLon($uid)
	{
		//die("updateLatLon");
		//$locations = $this->dataRepository->updateLatLon();
		$location = $this->dataRepository->findByUid($uid);
		//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($locations, 'locations');
		//foreach ($locations as $location) {
			//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($location->getAdresse(), 'location');
			$theAddress = array(
				'address' => $location->getAdresse(),
				'zipcode' => $location->getPlz(),
				'city' => $location->getOrt(),
				'country' => $location->getLand()
			);
			$latLon = $this->geocode($theAddress);
			//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($latLon->status, 'latLon status');
			if ($latLon->status == 'OK') {
				$location->setLat($latLon->lat);
				$location->setLon($latLon->lon);
				$this->dataRepository->update($location);
			}
		//}
	}



}
?>

