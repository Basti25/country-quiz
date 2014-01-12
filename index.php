<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/application/boot.php')?>
        <?php include('application/views/layout/header.php') ?>

<!--                <pre>-->
<!--                    --><?php //echo print_r($config,1)?>
<!--                </pre>-->
<!---->
<!--                <pre>-->
<!--                    --><?php //echo print_r($dbH ,1)?>
<!--                </pre>-->
<!--                <pre>-->
<!--                    --><?php //echo print_r($dbH->getEntry('test') ,1)?>
<!--                </pre>-->

        <?php include('application/views/layout/footer.php') ?>
		
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?sensor=false">
    </script>
    <script type="text/javascript">
	var markersArray = [];
	function clearOverlays() {
		for (var i = 0; i < markersArray.length; i++ ) {
			markersArray[i].setMap(null);
		}
		markersArray.length = 0;
	}
	var map;
	function initialize() {
	  var myLatlng = new google.maps.LatLng(30,10);
	  var mapOptions = {
		zoom: 2,
		center: myLatlng,
		disableDefaultUI: true,
		scrollwheel: false,
		navigationControl: false,
		mapTypeControl: false,
		scaleControl: false,
		draggable: false,
		disableDoubleClickZoom: true,
		mapTypeId: google.maps.MapTypeId.SATELLITE
	  }
	  map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
	  
	  google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
	  });
	}

	function placeMarker(location) {
		clearOverlays();
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
		markersArray.push(marker);
		//map.setCenter(location);
	}
    </script>
  </head>
  <body onload="initialize()">
    <div id="map_canvas" style="width:55%; height:60%"></div>
  </body>
</html>

