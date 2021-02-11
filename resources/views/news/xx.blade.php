<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-NoP20OejFNd_gxMizvmRCDHwRPg0gJI" ></script>
<style type="text/css">
    #map {
      height: 100%;
    }

    
</style>
<script>

    function initMap() {
      
      //var position = ;

      // var locations = ;

      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 13.3 , lng: 100.5778827}, 
        zoom: 5.8
        });



    }

    google.maps.event.addDomListener(window, 'load', initMap);

</script>
<div id="map"></div>
</body>
</html>
