    <script>
     
	  var address = "";
	  var marker = "";
	  var i=0;
      function codeAddress() {
		$(".address") .each( function() {
			//console.log($(this).val());
			
		
			address = $(this).val();
			geocoder.geocode( { 'address': address}, function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				//console.log(results[0].geometry.location.lng());
				marker[i] = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			  } else {
				 //console.log("no");
				//alert('Geocode was not successful for the following reason: ' + status);
			  }
			});
			
			i=i+1;
		});
      }
    </script>

    <div>
		<?php foreach($results as $data) { ?>
			<input class="address" type="textbox" value="<?php echo $data["domicilio"] . ", " . $data["colonia"] . ", Colima, México";?>">
		<?php } ?>
      <input type="button" value="Geocode" onclick="codeAddress()">
    </div>
    
    <div id="map_canvas"></div>
