<?php
namespace TYPO3\Lvdb\ViewHelpers;

class MapjsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{
	/**
	 * Returns the map javascript
	 *
	 * @param mixed $locations
	 * @param string $city
	 * @return string
	 */
	public function render($locations, $city)
	{

		//debug($locations[1]['lat']);

		$out = $this->getMapJavascript($locations);
		$out .= '<script type="text/javascript">function getMarkers() {';
		for ($i = 0; $i < count($locations); $i++) {
			$lat = $locations[$i]['lat'];
			$lon = $locations[$i]['lon'];

			$out .= 'var myLatLng = new google.maps.LatLng(' . $lat . ',' . $lon . ');';
			$out .= 'var shadow = new google.maps.MarkerImage("typo3conf/ext/lvdb/Resources/Public/Icons/shadow.png",
					                // The shadow image is larger in the horizontal dimension
					                // while the position and offset are the same as for the main image.
					                new google.maps.Size(37, 37),
					                new google.maps.Point(0,0),
					                new google.maps.Point(10, 37));';

			if ($locations[$i]['icon']) {
				$out .= 'marker[' . $i . '] = new google.maps.Marker({
					                position: myLatLng,
					                map: map,
					                title: "' . htmlentities($locations[$i]['name']) . '",
					                icon: "uploads/tx_lvdb/icons/' . $locations[$i]['icon'] . '",
					                shadow: shadow
					                });
									mapBounds.extend(myLatLng);

									';
			} else {

				$out .= 'marker[' . $i . '] = new google.maps.Marker({
					                position: myLatLng,
					                map: map,
					                title: "' . htmlentities($locations[$i]['name']) . '",
					                icon: "typo3conf/ext/lvdb/Resources/Public/Icons/pointerOrange.png",
					                shadow: shadow
					                });
									mapBounds.extend(myLatLng);

									';
			}
			/*
						$out .= "
							var contentString ='" . addslashes($locations[$i]['name']) . '<br />' . addslashes($locations[$i]['address']) . '<br />' .
								addslashes($locations[$i]['zipcode']) . ' ' . addslashes($locations[$i]['city']) ."';
							infoWindow[$i] = new google.maps.InfoWindow({
							  content: contentString
						  });


							google.maps.event.addListener(marker[$i], 'click', function() {
							infoWindow[$i].open(map,marker[$i]);
						});";
			*/
		}
		$out .= '}</script>';
		return $out;
	}

	function getMapJavascript($locations)
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

			var zoom1 = 17 - 8;

		    var latlng = new google.maps.LatLng(48, 8);
		     myOptions = {
		      zoom: zoom1,
//		      center: latlng,
		      mapTypeId: google.maps.MapTypeId.ROADMAP,
		      scaleControl: 1,
			  zoomControl: 1,

		//	  panControl: false,
		//      disableDoubleClickZoom: 1,
			  scrollwheel: true,
		 	  streetViewControl: 1
		    };
		    map = new google.maps.Map(document.getElementById("map"), myOptions);
			map.fitBounds(mapBounds);



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