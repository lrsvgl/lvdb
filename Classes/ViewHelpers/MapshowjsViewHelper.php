<?php
namespace TYPO3\Lvdb\ViewHelpers;

class MapshowjsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{
	/**
	 * Returns the map javascript
	 *
	 * @param mixed $location
	 * @param string $city
	 * @return string
	 */
	public function render($location, $city)
	{

		$out = $this->getMapJavascript($location);
		$out .= '<script type="text/javascript">function getMarkers() {';
		$lat = $location->getLat();
		$lon = $location->getLon();

		$out .= 'var myLatLng = new google.maps.LatLng(' . $lat . ',' . $lon . ');';
		$out .= 'var shadow = new google.maps.MarkerImage("typo3conf/ext/lvdb/Resources/Public/Icons/shadow.png",
					                // The shadow image is larger in the horizontal dimension
					                // while the position and offset are the same as for the main image.
					                new google.maps.Size(37, 37),
					                new google.maps.Point(0,0),
					                new google.maps.Point(10, 37));';

//		if ($location->getIcon()) {
//			$out .= 'marker[0] = new google.maps.Marker({
//					                position: myLatLng,
//					                map: map,
//					                title: "' . $location->getName() . '",
//					                icon: "uploads/tx_stores/icons/' . $location->getIcon() . '",
//					                shadow: shadow
//					                });
//									//mapBounds.extend(myLatLng);
//
//									';
//		} else {

			$out .= 'marker[0] = new google.maps.Marker({
					                position: myLatLng,
					                map: map,
					                title: "' . $location->getTitle() . '",
					                icon: "typo3conf/ext/lvdb/Resources/Public/Icons/pointerOrange.png",
					                shadow: shadow
					                });
									//mapBounds.extend(myLatLng);

									//map.setCenter(myLatLng);
									//map.setZoom(5);


									';
//		}

		$out .= '}</script>';
		return $out;
	}

	function getMapJavascript($location)
	{
		$out = '<script type="text/javascript">
		var myOptions;
		var marker = [];
		var infoWindow = [];
		var map;
        var mapBounds = new google.maps.LatLngBounds();

		function load(){
			var circle = null;
		    var circleRadius = 1.5; // Miles

			var lon;
			var lat;

			var zoom1 = 16;

		    var latlng = new google.maps.LatLng(' . $location->getLat() . ',' . $location->getLon() . ');
		     myOptions = {
		      zoom: zoom1,
		      center: latlng,
		      mapTypeId: google.maps.MapTypeId.ROADMAP,
		      scaleControl: 1,
			  zoomControl: 1,

		//	  panControl: false,
		//      disableDoubleClickZoom: 1,
			  scrollwheel: true,
		 	  streetViewControl: 1
		    };
		    map = new google.maps.Map(document.getElementById("map"), myOptions);
//			map.fitBounds(mapBounds);


		function addMarker(location) {
		  marker = new google.maps.Marker({
		    position: location,
		    map: map
		  });
		  markersArray.push(marker);
		}

		function removeMarker(marker) {
			if(marker.setMap != null) marker.setMap(null);
		}

		function showMarker(marker) {
		     marker.setMap(map);
		}

			getMarkers();

		} // load
		</script>';
		return $out;
	}
}

?>