<script type="text/javascript">
  // Global variables
  var map;
  var marker1;
  var marker2;
  var rectangle;

  /**
   * Called on the initial page load.
   */
  function init() {
	map = new google.maps.Map(document.getElementById('map'), {
	  'zoom': 3,
	  'center': new google.maps.LatLng(70, 0),
	  'mapTypeId': google.maps.MapTypeId.ROADMAP
	});

	// Plot two markers to represent the Rectangle's bounds.
	marker1 = new google.maps.Marker({
	  map: map,
	  position: new google.maps.LatLng(65, -10),
	  draggable: true,
	  title: 'Drag me!'
	});
	marker2 = new google.maps.Marker({
	  map: map,
	  position: new google.maps.LatLng(71, 10),
	  draggable: true,
	  title: 'Drag me!'
	});
	
	// Allow user to drag each marker to resize the size of the Rectangle.
	google.maps.event.addListener(marker1, 'drag', redraw);
	google.maps.event.addListener(marker2, 'drag', redraw);
	
	// Create a new Rectangle overlay and place it on the map.  Size
	// will be determined by the LatLngBounds based on the two Marker
	// positions.
	rectangle = new google.maps.Rectangle({
	  map: map
	});
	redraw();
  }
  
  /**
   * Updates the Rectangle's bounds to resize its dimensions.
   */
  function redraw() {
	var latLngBounds = new google.maps.LatLngBounds(
	  marker1.getPosition(),
	  marker2.getPosition()
	);
	rectangle.setBounds(latLngBounds);
  }

  // Register an event listener to fire when the page finishes loading.
  google.maps.event.addDomListener(window, 'load', init);
</script>

    <div id="map"  style="width:560px;height:400px;top:30px"></div>
