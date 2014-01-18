<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <script language="javascript" type="text/javascript" src="http://www.country-quiz.wizmo.de/public/js/jquery-1.10.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="http://www.country-quiz.wizmo.de/public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
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
                    draggable: true,
                    disableDoubleClickZoom: true,
                    draggableCursor:'crosshair',
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
                document.getElementById('answerY').value = location.lat();
                document.getElementById('answerX').value = location.lng();
                markersArray.push(marker);
            }

            function placeAnswerMarker(x,y) {
                var pinColor = "008000";
                var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
                    new google.maps.Size(21, 34),
                    new google.maps.Point(0,0),
                    new google.maps.Point(10, 34));

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(x,y),
                    map: map,
                    icon: pinImage,
                    zIndex: 1000,
                    animation: google.maps.Animation.DROP
                });
                markersArray.push(marker);
                google.maps.event.clearListeners(map, 'click');
                document.getElementById('solutionForm').style.display = 'block';
            }
        </script>

        <link rel="stylesheet" type="text/css" href="http://www.country-quiz.wizmo.de/public/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="http://www.country-quiz.wizmo.de/public/css/style.css">
        <title>Country-Quiz</title>
    </head>
    <body onload="initialize();">
        <div class="header">
            <div class="container">
                <h1>Hallo</h1>
            </div>
        </div>