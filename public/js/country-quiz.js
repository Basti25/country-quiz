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
    document.getElementById('answerX').value = location.lat();
    document.getElementById('answerY').value = location.lng();
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
    document.getElementById('answer').style.display = 'block';
}