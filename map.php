<!DOCTYPE html>
<html>

<head>
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
</head>

<body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
	
        function initMap() {
		
            var map = new google.maps.Map(document.getElementById('map'), {
				
				
            });
			let points = [];
			var bounds;
			<?php

			$conn=mysqli_connect("localhost", "root", "") or die(mysqli_error());
			mysqli_select_db($conn, "tema_db");

			$sql_read = "SELECT * FROM locatii";

			$result = mysqli_query($conn, $sql_read);
			 if(! $result )
			 {
			   die('Could not read data: ' . mysqli_error());
			 }


			 while($row = mysqli_fetch_array($result)) {
				$lat = $row['Latitudine'];
				$long = $row['Longitudine'];
				$zoom = $row['Zoom'];
				
			 echo 'points.push({
				 "lat": '.$lat.',
				 "long": '.$long.',
				 "zoom": '.$zoom.'
			 });';
			  }
			?>
			
			Array.prototype.forEach.call(points, function(point) {
      
              var marker = new google.maps.Marker({
            
                position: {lat: point.lat, lng: point.long},
				map
              });
              google.maps.event.addListener(marker, 'click', function() {
				map.setCenter({lat: point.lat, lng: point.long});
				map.setZoom(point.zoom);
			  });
			});
			
			var bounds = new google.maps.LatLngBounds();
			for (var i = 0; i < points.length; i++) {
				bounds.extend({lat: points[i].lat, lng: points[i].long});
			}
			map.fitBounds(bounds);
			}
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByKEo-eVV5YXXbbpGUsL7_Leuxb8c543U&callback=initMap">
    </script>
</body>

</html>