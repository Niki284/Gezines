<!DOCTYPE html>
<html>
<head>
    <title>Family Tree Map</title>
    <script src="pk.eyJ1IjoibmlraXRyNDUiLCJhIjoiY2x3bnllbjk5MHh5NjJrbWw0c3JvenFqdSJ9.8u4sppHVbuFVfRi01QM_0w"></script>
    <script>
        function initialize() {
            var mapOptions = {
                zoom: 4,
                center: new google.maps.LatLng(50, 10)
            };
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var locations = json($locations);

            locations.forEach(function(location) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    title: location.name
                });
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
    <div id="map-canvas" style="width: 100%; height: 500px;"></div>
</body>
</html>
<?php /**PATH C:\Users\nikit\OneDrive\Bureaublad\TesteGezene\stamboom\resources\views/map.blade.php ENDPATH**/ ?>