<?php 
session_start();
if (!isset($_SESSION['pwd']) &&  $_SESSION['store'] ) {
    header("Location: index.php");
    exit;
}


?>
 <?php
  function isMobile() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
 if(isMobile()){
      ?>
	<style>
		
#map{
	margin-left:0px !important;
	font-size:20px;
}
.table td, .table th{
    font-size:20px;
   
  }

	</style>

	<?php
	}
	?>
<head>
<link rel='STYLESHEET' type='text/css' href='google/master_style.css'>
<script type="text/javascript" 
	src="https://maps.googleapis.com/maps/api/js?&client=gme-marketfocus&key=AIzaSyCBeIvJweS4ZzyJRvBA7kZnryBH-SZzbFw&libraries=places,drawing,visualization" async defer></script>
 <script src="https://www.doogal.co.uk/js/PrintMapControl.js"></script>
 <link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>

 <style type="text/css">
 .table{
	margin-bottom:0px !important;
}
 @media print {
#map {
    background-color: #1a4567 !important;
    -webkit-print-color-adjust: exact; 
}}
body{
	overflow:hidden;
}


td input {
    width: 54px;
}
#map {
    border: solid;
    margin-left: 60px;
}
img {
    cursor: pointer;
	cursor: hand;
	width:200px;
}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 3px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
#update {
    background-color: #31B0D5;
}
.row {

}
.container-fluid {

    margin-right: 2% !important;
    margin-left: 6% !important;
@media print {
  img {
    max-width: none !important;
  }
}
.borderless{
	border: 0;
	text-align: center;
}
table.table-bordered{
    border:1px solid black;
  }
table.table-bordered > thead > tr > th{
    border:1px solid black;
}
table.table-bordered > tbody > tr > td{
    border:1px solid black;
}
.col-xs-12 {
    width: 98%;
}
.controls{
width:20%;
height:100px;
  background-color:white;
}
c,b{
	font-size:20px;
}

.style1 {color: #990000}
.style7 {font-family: Arial Narrow,Arial,sans-serif;}
.style8 {color: #990000; font-weight: bold; font-family: "Century Gothic"; }
.style9 {font-size: 20px; padding-left: 26% !important; padding-right: 5% !important; border-sizing: border-box;}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style12 {font-size: 18px}

.style13 {color: #000000}
a,button {
 cursor: pointer !important;
}

</style>


<?php include("Connections/User_Information.php");
?>



<br/>
<center>
<a href="index.php"><Img src="JYSK.jpg" align="middle" width="200"/></a>
<br/><br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<table align="center" class="table">
				<tr>
			<td style="">
					<div class="" style=""> 
                    
						<div align="center" class=""> <a href="javascript:history.back()"><button class="btn btn-danger" style="float:left">BACK</button></a> <strong>DISTRIBUTION MAP</strong></div>
					</div>
				</td>
</tr>
</table>
			<table width="90%" class="table" style="border-radius:5px;background-color:#F0F0F0" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<strong>Client code:</strong> <?php echo "JYSK" ?>
				</td>
				<td>
					<strong>Store: </strong><?php echo $_SESSION['store']; ?>
				</td>
				<td>
           		<strong>Project :</strong> <?php 
           
		   $Store = $_SESSION['store'];
		  
			   $project = "JY801";
		  
		   echo $project;
           
          
           ?>
                    
				</td>
        
				
				<td><b>
        Logged in as:</b> <?php  echo $_SESSION['client']; ?>
                </td>
  
			</tr>
			<tr>
			<td>
			
			</td></tr>
			</table>
		</div>
	</div>
</div>

<style>

#map {
    border: solid;
}

</style>

</head>


<body>
<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
<?php 
	$Client_Code = 'JYSK';
	
	$Store = $_SESSION['store'];

?>
<?php 
//	$Store_Logo = "logos/MK2.png";  
?>
<?php 
	$Red_sqr = "google/Store_Icons"; 
	$Red_sqr .= "/"; 
	$Red_sqr .= "Dist_pink.png"; 
	
	$Green_sqr = "google/Store_Icons"; 
	$Green_sqr .= "/"; 
	$Green_sqr .= "Dist_green.png"; 
	$Store_Logo = "JYSK_map_logo.jpg";
?>
<body  onLoad='initialize();'>
<?php include "google/Store_Info.php"; ?>
<?php include "google/sma.php"; ?>
<?php include "google/Distribution.php"; ?>


<SCRIPT language="JavaScript">



var date="<?php echo date('d-m-Y');?>";

function initialize() 
{  
	var map = new google.maps.Map(document.getElementById('map'), 
  {
  center: {lat: <?php echo $UStore_Lat; ?>,
   lng: <?php echo $UStore_Long; ?>},
     styles: [
    {
      "featureType": "poi",
      "stylers": [
        { "visibility": "off" }
      ]
    }
  ],
   zoom: 10});
    
 

//--Boundary -------------------------------------
	var arr = new Array(); // making an array
    var polygons = [];  // making polygons empty
    var bounds = new google.maps.LatLngBounds();
	arr = [];
	var triangleCoords = <?php ECHO $STR; ?>;
		// extend bounds to contain each coordinate
		for (var i = 0, i_end = triangleCoords.length; i < i_end; i++) {
			bounds.extend(triangleCoords[i]);
		}
		var areaCovered = new google.maps.Polygon({
			paths: triangleCoords,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 4,
			fillColor: '#FF0000',
			fillOpacity: 0.01
		});
		areaCovered.setMap(map);
	
//--Store Information -------------------------------------	
	var latlng = new google.maps.LatLng(<?php echo $UStore_Lat; ?>, <?php echo $UStore_Long; ?>);  
	var image   = ("<?php echo $Store_Logo;?>")
	var markerSMA = new google.maps.Marker(
		{position: latlng
		,map: map
		,animation: google.maps.Animation.DROP
    ,icon: image
		,title: 'STORE  <?php  echo $Store ;  ?>  \n Store Name: <?php echo $UStore_Name; ?> \n Address: <?php echo $UStore_Address; ?> \n City: <?php echo $UStore_City; ?>  \n Postal Code: <?php echo $UStore_FSALDU; ?> ' 
		});	
    
     /*var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
	  */
			
//--Distribution  -------------------------------------		
		
	var Green_Distribution 	= ("<?php echo $Green_sqr;?>");
	var Red_Distribution 	= ("<?php echo $Red_sqr;?>");
    
 	var locations 			= (<?php ECHO $DISTRIBUTION; ?>);
	for (i = 0; i < locations.length; i++) 
	{	

		marker = new google.maps.Marker({	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
											map: map,
											icon: Red_Distribution,
											title: 'Postal Code : ' +locations[i][0] + ' - Route : ' + locations[i][3] + ' (Distribution Qty:' + locations[i][4] + ')'
		 								});
                                                   

		//if (locations[i][5] == '1') { marker.setIcon("<?php echo $Green_sqr;?>");} else{  marker.setIcon("<?php echo $Red_sqr;?>"); }	
		//AttachSecretMessage(marker, locations[i][5]);
		//Route_Color(marker, locations[i][5]);
   var loc = '<b>PostalCode : </b>'+locations[i][0]+'  <b>  Route : </b>'+locations[i][3];
		Mark_Color_Message(marker, loc);
	}
		
    var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }



//--Function AttachSecretMessage  -------------------------------------	
	function AttachSecretMessage(marker, secretMessage) 
	{	var infowindow = new google.maps.InfoWindow({content: secretMessage});
		marker.addListener('click', function() {infowindow.open(marker.get('map'), marker);});
	}


//--Function Mark_Color_Message  -------------------------------------	
	function Mark_Color_Message(marker, Var1) 
	{	var infowindow = new google.maps.InfoWindow({content: Var1});
		marker.addListener('click', function() {infowindow.open(marker.get('map'), marker); 
   map.setZoom(16);
   //map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
   map.setCenter(marker.getPosition());


												marker.setIcon("<?php echo $Green_sqr;?>");
												});
	}

google.maps.event.addDomListener(window, 'load', initialize)

$(document).ready(function() {
map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
	
 });
}



</SCRIPT>

  <div class="row">
   <div class="col-xs-12">
  <div id="map" style="width: 90%; height: 75%">
    <center><b>
    <?php if(($UStore_Lat && $UStore_Lon)==''){


echo "NO Boundry Data found for this Store";

}
?>
</b></center>
</div>
		
				
             
