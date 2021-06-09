function initialize() {
	let pos = document.getElementById("map-area").getAttribute('pos'); 
	let lat = parseFloat(pos.split(",")[0]); 
	let lon = parseFloat(pos.split(",")[1]); 
	console.log(lat); 
	console.log(lon);

	var myOptions = {
		zoom: 15,
		center: new google.maps.LatLng(lat , lon), //40.801485408197856, -73.96745953467104change the coordinates
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
		mapTypeControl: false,
		zoomControl: false,
		streetViewControl: false
	};
	var map = new google.maps.Map(document.getElementById("map-area"), myOptions);
	var marker = new google.maps.Marker({
		map: map,
		position: new google.maps.LatLng(lat, lon) //change the coordinates
	});
	google.maps.event.addListener(marker, "click", function() {
		infowindow.open(map, marker);
	});
}
google.maps.event.addDomListener(window, 'load', initialize);