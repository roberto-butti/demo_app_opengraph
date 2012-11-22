<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Google Maps JavaScript API v3 Example: Street View Layer</title>
    <link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>

      function initialize() {
        var fenway = new google.maps.LatLng(45.564034,12.427422);
        var mapOptions = {
          center: fenway,
          zoom: 14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(
            document.getElementById('map_canvas'), mapOptions);
        var panoramaOptions = {
          position: fenway,
          pov: {
            heading: 34,
            pitch: 10,
            zoom: 1
          }
        };
        var panorama = new  google.maps.StreetViewPanorama(document.getElementById('pano'),panoramaOptions);
        map.setStreetView(panorama);
      }
    </script>
  </head>
  <body onload="initialize()">
    <div id="map_canvas" style="width: 400px; height: 300px"></div>
    <div id="pano" style="position:absolute; left:410px; top: 8px; width: 400px; height: 300px;"></div>
  </body>
</html>
