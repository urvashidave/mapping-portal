<!-- MapX.cfm -->
<!-- For MarketFocusDirect.ca -->
    <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyCBeIvJweS4ZzyJRvBA7kZnryBH-SZzbFw"
      type="text/javascript"></script>
    <script type="text/javascript">

//<![CDATA[

   var geocoder;
   var map;

   var restaurant = "Flyer Delivery";
   var address = "<cfoutput>#Form.Pcode#</Cfoutput>";

   // On page load, call this function

   function load()
   {
	  // update Store number...
	  DoStore();
      // Create new map object
      map = new GMap2(document.getElementById("map"));
	  map.enableGoogleBar();
      // Create new geocoding object
      geocoder = new GClientGeocoder();
      // Retrieve location information, pass it to addToMap()
      geocoder.getLocations(address, addToMap);
   }

// Create a base icon for all of our markers that specifies the
// shadow, icon dimensions, etc.
var baseIcon = new GIcon(G_DEFAULT_ICON);
baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
baseIcon.iconSize = new GSize(20, 34);
baseIcon.shadowSize = new GSize(37, 34);
baseIcon.iconAnchor = new GPoint(9, 34);
baseIcon.infoWindowAnchor = new GPoint(9, 2);

// Creates a marker whose info window displays the letter corresponding
// to the given index.
function createMarker(point, index) {
  // Create a lettered icon for this point using our icon class
  var letter = String.fromCharCode("A".charCodeAt(0) + index);
  var letteredIcon = new GIcon(baseIcon);
  letteredIcon.image = "http://www.google.com/mapfiles/marker" + letter + ".png";

  // Set up our GMarkerOptions object
  markerOptions = { icon:letteredIcon };
  var marker = new GMarker(point, markerOptions);

  GEvent.addListener(marker, "click", function() {
    marker.openInfoWindowHtml("Marker <b>" + letter + "</b>");
  });
  return marker;
}


// This function adds the point to the map

   function addToMap(response)
   {
      // Retrieve the object
      place = response.Placemark[0];

      // Retrieve the latitude and longitude
      point = new GLatLng(place.Point.coordinates[1],
                          place.Point.coordinates[0]);

      // Center the map on this point
      map.setCenter(point, 13);
	  map.addControl(new GSmallMapControl());
      // Create a marker
      marker = new GMarker(point);

      // Add the marker to map
      map.addOverlay(marker);
	  var i=1
<cfoutput>
  <Cfif isdefined("Matches.recordcount")>
	<Cfloop query="Matches">
		  point= new GLatLng(#matches.y#,#matches.x#);
	  	  map.addOverlay(createMarker(point,i));
		  i = i+1;
	</cfloop>
  </cfif>
</cfoutput>
      // Add address information to marker
      //marker.openInfoWindowHtml('<Cfoutput><span class="text">#form.Pcode#</span></Cfoutput>');
   }

  //]]>
    </script>
  </head>
  <body onLoad="load()" onUnload="GUnload()">
    <Table class="databox" align="center">
	<tr><td><div id="map" style="width: 800px; height: 400px"></div></td></tr></Table>
  </body>
</html>