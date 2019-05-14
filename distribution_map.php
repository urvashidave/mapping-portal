<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel='shortcut icon' type='image/x-icon' href='images/JYSK.ico' />
<?php
  session_start();
  ini_set('max_execution_time', 300);
  // echo $_SESSION['jy_client'];
  
  if (!isset($_SESSION['jy_pwd']) && ($_SESSION['jy_store']) && ($_SESSION['jy_client']))
  	{
  	header("Location: index.php");
  	exit;
  	}
    else
  	{
  ?>
<?php
  function isMobile()
  	{
  	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  	}
  
  if (isMobile())
  	{
  ?>
<style>
  .mapnenu {
  width: 98% !important;
  line-height: 68px !important;
  font-size:40px !important;
  margin-right:1% !important;
  }
  i,.btn,#mapbasics,#analysis,#distribution,#kquest,#store,#fsa,#dist,#heat,#gradient,#radius,#opacity {
  font-size:40px !important;
  line-height: 68px !important;
  }
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
  <script type="text/javascript" 
    src="https://maps.googleapis.com/maps/api/js?&client=gme-marketfocus&key=AIzaSyCBeIvJweS4ZzyJRvBA7kZnryBH-SZzbFw&libraries=places,drawing,visualization" async defer></script>
  <script src="js/PrintMapControl.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/markerclusterer.js"></script>
  <script src="js/oms.min.js"></script>
  <style type="text/css">
    .gr__marketfocusdirect_ca{
    border:solid 1px !important;
    margin-left:2% !important;
    margin-right:2% !important;
    margin-top:2% !important;
    margin-bottom:2% !important;
    }
    .gm-style {
    font-family: "Arial Narrow", Arial, sans-serif;
    text-decoration: none;
    }
    .iw-subTitle{
    font-family: "Arial Narrow", Arial, sans-serif;
    font-weight: 405;
    }
    a {
    text-decoration: none !important;
    }
    .btn{
    margin-left:10px;
    margin-bottom: 11px;
    margin-top: 10px;
    }
    i{
    font-size:15px;
    }
    body{
    font-family: "Arial Narrow", Arial, sans-serif;line-height: 0.8;
    }
    #mapbasics,#analysis,#distribution,#kquest {
    cursor: pointer;
    }
    #mapbasics:hover,#analysis:hover, #distribution:hover,#kquest:hover{
    background-color: #F0F0F0;
    }
    /*#dist,#fsa_hide,#dist,#store,#heat,#hide_clust,#gradient,#radius,#fsa,#opacity,#heat-hide,#dist2,#heat2,#hide_clust2,#gradient2,#radius2,#opacity2,#heat-hide2  {
    width: 131%;
    margin-top:5px;
    margin-bottom:5px;
    }*/
    #store,#fsa{
    }
    #mapbasics,#analysis,#store,#salescontent2,#distancecontent2,#distancecontent,#analysis_result,#salescontent,#fsa_hide,#fsa,#hidestore,#dist,#show_clust,#hide_clust,#heat-hide,#hide_dist,#distribution,#kquest,#store,#fsa,#dist,#heat,#gradient,#radius,#opacity {
    background-color: white;
    font-size:20px;
    margin-left:2px;
    }
    #img {
    width: 15%;
    }
    .mapnenu{
    width: 16%;
    line-height:35px !important;
    border:solid 1px;
    float: left;
    background-color: white;
    border-radius: 3px;
    margin-left: 15px;
    }
    .table{
    margin-bottom:0px !important;
    border: solid 1px;
    }
    @media print {
    #map {
    background-color: #1a4567 !important;
    -webkit-print-color-adjust: exact; 
    }}
    td input {
    width: 54px;
    }
    #map {
    border: solid 1px;
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
    .enable {
    pointer-events: visible;
    cursor: pointer;
    }
    .disabled {
    opacity: 0.5;
    pointer-events: none;
    cursor: default;
    }
    /*
    .row {
    margin-right: -17px;
    margin-left: -64px;
    }
    .container-fluid {
    margin-right: 2% !important;
    margin-left: 6% !important;
    }
    */
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
    a,button {
    cursor: pointer !important;
    }
    a {
    text-decoration: none ;
    }
    a:hover
    {
    text-decoration:none;
    cursor:pointer;
    }
  </style>
  <?php
    include ("Connections/User_Information.php");
    ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div width="100%" style="margin-top:10px;">
          <div width="30%" style="width:30%;float:left"><a href="index.php"><Img src="JYSK.jpg" style="width:140px"/></a>	</div>
          <div width="70%" style="width:70%;float:right">
            <table width="70%" >
              <tr>
                <td style="border-bottom:solid 0.1px;border-color:blue;font-size:25px;">			
                  FLYER DISTRIBUTION PROGRAM
                </td>
              </tr>
              <tr>
                <td style=" border-bottom:solid 0.1px;border-color:blue;font-size:20px;">
                  Store:<?php
                    echo $_SESSION['jy_store'] . " - " . $_SESSION['jy_store_name']; ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Logged In: <?php
                    echo $_SESSION['jy_client']; ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    .decile_chk{
    margin: -14px 79px 0 !important;
    }
    #iw-container {
    margin-bottom: 30px;
    text-align: center;
    }
    #iw-container .iw-title {
    font-family: "Arial Narrow", Arial, sans-serif;
    font-size: 18px;
    font-weight: 400;
    padding: 10px;
    background-color: #48b5e9;
    color: white;
    margin: 0;
    text-align: center;
    }
    #iw-container .iw-content {
    font-size: 13px;
    line-height: 18px;
    font-weight: 400;
    margin-right: 1px;
    max-height: 340px;
    text-align: center;
    overflow-x: auto;
    }
    .iw-content img {
    float: right;
    margin: 0 5px 5px 10px;	
    }
    .iw-subTitle {
    font-size: 16px;
    font-weight: 700;
    padding: 5px 0;
    }
    .iw-bottom-gradient {
    position: absolute;
    width: 326px;
    height: 25px;
    bottom: 10px;
    right: 18px;
    background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
    }
    .jysklogo {
    width: 20%;
    }
    #map b, #map strong {
    font-weight: 501;
    }
    .col-xs-12{
    width:50%;
    }
    .gm-style .gm-style-iw {
    font-weight:bold;
    font-size:20px;
    }    
  </style>
</head>
<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
<?php
  $Client_Code = 'JYSK';
  $Red_sqr = "google/Store_Icons";
  $Red_sqr.= "/";
  $Red_sqr.= "Dist_pink.png";
  $Green_sqr = "google/Store_Icons";
  $Green_sqr.= "/";
  $Green_sqr.= "Dist_green.png";
  $Store_Logo = "JYSK_map_logo.jpg";
  include "google/Store_Info.php";
  include "google/Distribution.php";
  include "google/dynamicicon.php";
  include "google/sma.php";
  ?>
<SCRIPT language="JavaScript">
  var date="<?php
    echo date('d-m-Y'); ?>";
  var map;
  var heatmap;
  var areaCovered;
  var polys = new Array();
  function initialize() 
  {  
  var totalfsa = "<?php
    echo $j; ?>";
  $('#hidestore').css("display", "none");
  $('#fsa_hide').css("display", "none");
  $('#gradient').css("display", "none");
  $('#opacity').css("display", "none");
  $('#radius').css("display", "none");
  $('#heat-hide').css("display", "none");
  $('#hide_clust').css("display", "none");
  $('#show_clust').css("display", "none");
  $('#salescontent').css("display", "none");
  $('#salescontent2').css("display", "none");
  $('#distancecontent').css("display", "none");
  $('#distancecontent2').css("display", "none");
   /*$('#decile1').css("display", "none");
  $('#decile2').css("display", "none");
  $('#decile3').css("display", "none");
  $('#decile4').css("display", "none");
  $('#decile5').css("display", "none");
  $('#decile6').css("display", "none");
  $('#decile7').css("display", "none");
  $('#decile8').css("display", "none");
  $('#decile9').css("display", "none");
  $('#decile10').css("display", "none");*/
  
  // $('#analysis_resulthide').css("display", "none");
   $('#reset').click(function(){
  initialize();
  
  
  $('#dist').css("display", "block");
  $('#hide_dist').css("display", "none");
  
  $('#store').removeClass('disabled');
  $('#store').addClass('enable');
  
  
  $('#heat').css("display", "block");
  $('#heat-hide').css("display", "none");
  
  });
  
  	$('#sel_dist').show();
  
  	// $('#hide_dist').attr("disabled", true);
  
  	$('#heat-hide').attr("disabled", true);
  	$('#gradient').attr("disabled", true);
  	$('#radius').attr("disabled", true);
  	$('#opacity').attr("disabled", true);
  	$('#hide_clust').attr("disabled", true);
  
  	$('#sel_dist2').show();
  	$('#hide_dist2').attr("disabled", true);
  	$('#heat-hide2').attr("disabled", true);
  	$('#gradient2').attr("disabled", true);
  	$('#radius2').attr("disabled", true);
  	$('#opacity2').attr("disabled", true);
  	$('#hide_clust2').attr("disabled", true);
  	
  	var mapProp  =
    {
    center: {lat: <?php
    echo $UStore_Lat; ?>,
  	
     lng: <?php
    echo $UStore_Long; ?>},
     zoom: 14,
       styles: [
      {
  	  "featureType": "poi",
  	  "elementType": "labels",
        "stylers": [
          { "visibility": "on" }
        ]
      }
    ],
     zoom: 10};
  
    var map = new google.maps.Map(document.getElementById('map'), mapProp);
    /*$("#dist2").click(function(){
  	$('#dist2').addClass('disabled');
  	$('#hide_dist2').show();
  	$('#hide_clust2').show();
  	$('#heat2').show();
  	dist_analysis(map);
   });*/
    $("#dist").click(function(){
     // $('.mapbasic.deciles').css("display", "none");
  
  	$('#hide_clust').css("display", "block");
  	$('#dist').css("display", "none");
  	$('#hide_dist').css("display", "block");
    dist(map);
    $("input[type=checkbox]"). prop("checked", false);
   });
  
    /*$("#hide_dist").click(function(){
  	$('#hide_dist').css("display", "none");
  	$('#dist').css("display", "block");
  	hidedist(map);
   });*/
   $("#spcode").click(function(){
  	pcode(map);
   });
  
  $("#analysis_result").click(function(){
  
  $('#hide_clust').css("display", "none");
  /* $('#decile1').css("display", "block");
  $('#decile2').css("display", "block");
  $('#decile3').css("display", "block");
  $('#decile4').css("display", "block");
  $('#decile5').css("display", "block");
  $('#decile6').css("display", "block");
  $('#decile7').css("display", "block");
  $('#decile8').css("display", "block");
  $('#decile9').css("display", "block");
  $('#decile10').css("display", "block");*/
  
  // $('#analysis_result').css("display", "none");
  //  $('#analysis_resulthide').css("display", "block");
  $('#dist').css("display", "block");
  $('#dist').css("display", "block");
    $('#hide_dist').css("display", "none");
  
  if($('#analysis_result').is(':checked')) { 
  
  analysis_result(map);
  } else {
  analysis_result_hide(map);
  }
            
           
  });
  
  $("input[type=checkbox]").click(function (){
  if ($("input[type=checkbox]").is(":checked")) {
     // $('#dist').css("display", "none");
     // $('#hide_dist').css("display", "none");
  }
    else{
    //  $('#dist').css("display", "block");
    }
  });
  $("#decile1").click(function(){
  
  if($('#decile1').is(':checked')) { 
  
  decile1(map);
  } else {
  decile1_hide(map);
  }
            
           
  });
  
  $("#decile2").click(function(){
  if($('#decile2').is(':checked')) { 
  decile2(map);
  } else {
  decile2_hide(map);
  }
  });
  $("#decile3").click(function(){
  if($('#decile3').is(':checked')) { 
  decile3(map);
  } else {
  decile3_hide(map);
  }
  });
  $("#decile4").click(function(){
  if($('#decile4').is(':checked')) { 
  decile4(map);
  } else {
  decile4_hide(map);
  }
  });
  $("#decile5").click(function(){
  if($('#decile5').is(':checked')) { 
  decile5(map);
  } else {
  decile5_hide(map);
  }
  });
  $("#decile6").click(function(){
  if($('#decile6').is(':checked')) { 
  decile6(map);
  } else {
  decile6_hide(map);
  }
  });
  $("#decile7").click(function(){
  if($('#decile7').is(':checked')) { 
  decile7(map);
  } else {
  decile7_hide(map);
  }
  });
  $("#decile8").click(function(){
  if($('#decile8').is(':checked')) { 
  decile8(map);
  } else {
  decile8_hide(map);
  }
  });
  $("#decile9").click(function(){
  if($('#decile9').is(':checked')) { 
  decile9(map);
  } else {
  decile9_hide(map);
  }
  });
  $("#decile10").click(function(){
  if($('#decile10').is(':checked')) { 
  decile10(map);
  } else {
  decile10_hide(map);
  }
  });
  
  $("#analysis_resulthide").click(function(){
  /* $('#decile1').css("display", "none");
  $('#decile2').css("display", "none");
  $('#decile3').css("display", "none");
  $('#decile4').css("display", "none");
  $('#decile5').css("display", "none");
  $('#decile6').css("display", "none");
  $('#decile7').css("display", "none");
  $('#decile8').css("display", "none");
  $('#decile9').css("display", "none");
  $('#decile10').css("display", "none");*/
  //$('#analysis_result').css("display", "block");
  //	$('#analysis_resulthide').css("display", "none");
  }); 
   
  /* $("#heat").click(function(){
  
  	$('#gradient').css("display", "block");
  $('#opacity').css("display", "block");
  $('#radius').css("display", "block");
  $('#heat-hide').css("display", "block");
  
  
  	$('#heat').css("display", "none");
  	$('#heat-hide').css("display", "block");
  	
  
  	$('#gradient').removeClass('disabled');
  	$('#gradient').addClass('enable');
  
  	$('#radius').removeClass('disabled');
  	$('#radius').addClass('enable');
  
  	$('#opacity').removeClass('disabled');
  	$('#opacity').addClass('enable');
  
  
  	// $('#dist').hide();
  	// $('#hide_dist').show();
  
  	heat(map);
  	
   });*/
  
   /*$("#heat2").click(function(){
  	$('#heat2').attr("disabled", true);
  	$('#heat-hide2').show();
  	$('#gradient2').show();
  	$('#radius2').show();
  	$('#opacity2').show();
   
  	// $('#dist').hide();
  	// $('#hide_dist').show();
  
  	heat2(map);
  	
   });*/
  
  $('#fsa').click(function() {
  	$('#fsa').css("display", "none");
  	$('#fsa_hide').css("display", "block");
  	
  	fsa(map);
   });
   
   $('#show_clust').click(function(){
  	$('#show_clust').css("display", "none");
  	$('#hide_clust').css("display", "block");
    dist(map);		
    $("input[type=checkbox]"). prop("checked", false);
  
  
  });
  
  $('#store').click(function() {
  	$('#store').css("display", "none");
  	$('#hidestore').css("display", "block");
  	areaCovered.setMap(map);
   });
  
  $('#hidestore').click(function() {
  	$('#hidestore').css("display", "none");
  	$('#store').css("display", "block");
  	areaCovered.setMap(null);
   });
  
   /*$('#heat-hide').click(function() {
  
  	$('#gradient').css("display", "none");
  $('#opacity').css("display", "none");
  $('#radius').css("display", "none");
  	$('#heat-hide').css("display", "none");
  	$('#heat').css("display", "block");
  	$('#gradient').addClass('enable');
  	hideheat(map);
  	$("#heat").show();
  	
  	$('#heat-hide').attr("disabled", true);
  	$('#gradient').attr("disabled", true);
  	$('#radius').attr("disabled", true);
  	$('#opacity').attr("disabled", true);
   });
  
   $('#heat-hide2').click(function() {
  	hideheat_analysis(map);
  	$("#heat2").show();
  	$('#heat-hide2').attr("disabled", true);
  	$('#gradient2').attr("disabled", true);
  	$('#radius2').attr("disabled", true);
  	$('#opacity2').attr("disabled", true);
   });
   /*$('#hide_dist').click(function(){
  	initialize();
  	$('#hide_dist').attr("disabled", true);
  	$('#dist').show();
   });*/
   $('#hide_dist2').click(function(){
  	initialize();
  	$('#hide_dist2').attr("disabled", true);
  	$('#dist2').show();
    
   });
  
  	var arr = new Array(); // making an array
      var polygons = [];  // making polygons empty
      var bounds = new google.maps.LatLngBounds();
  	arr = [];
  	var triangleCoords = <?php
    ECHO $STR; ?>;
  
  		// extend bounds to contain each coordinate
  
  		for (var i = 0, i_end = triangleCoords.length; i < i_end; i++) {
  			bounds.extend(triangleCoords[i]);
  		}
  		var areaCovered = new google.maps.Polygon({
  			paths: triangleCoords,
  			strokeWeight:4,
  			color: 'red',
  			strokeColor:'red',
  			fillColor: 'pink',
        zIndex: -20
  
  
  		});
  
  
  // --Store Information -------------------------------------	
  
  	var latlng = new google.maps.LatLng(<?php
    echo $UStore_Lat; ?>, <?php
    echo $UStore_Long; ?>);  
  	var image   = ("<?php
    echo $Store_Logo; ?>")
  	var markerSMA = new google.maps.Marker(
  		{position: latlng
  		,map: map
  		,animation: google.maps.Animation.DROP
          ,icon: image
  
  		// ,title: 'STORE  <?php //echo $Store ;
    ?>  \n Store Name: <?php //echo $UStore_Name;
    ?> \n Address: <?php //echo $UStore_Address;
    ?> \n City: <?php //echo $UStore_City;
    ?>  \n Postal Code: <?php //echo $UStore_FSALDU;
    ?> ' 
  		});	
  
  		 var contentString = '<div id="iw-container">' +
                      '<div class="iw-title"><img class=jysklogo src=<?php
    echo $Store_Logo; ?>> <?php
    echo $Store; ?> - <?php
    echo $UStore_Name; ?> </div>' +
                      '<div class="iw-content">' +
                        '<div class="iw-subTitle">Store Info</div>' +
  
                        // '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
  
                        '<p><k class="iw-subTitle">Address:</k> <?php
    echo $UStore_Address; ?> <br /> <k class="iw-subTitle">City:</k> <?php
    echo $UStore_City; ?>  <br /><k class="iw-subTitle"> Postal Code:</k> <?php
    echo $UStore_FSALDU; ?></p>' +
                        
                      '<div class="iw-bottom-gradient"></div>' +
                    '</div>';
  
          var infowindow = new google.maps.InfoWindow({
  		  content: contentString,
  		  
  		});
  		markerSMA.addListener('click', function() {
            infowindow.open(map, markerSMA);
  		});
  
  		// markerSMA.addListener('mouseout', function() {
            // infowindow.close(map, markerSMA);
  		// });
  		
  		function CenterControl(controlDiv, map) {
  
  // Set CSS for the control border.
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#fff';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '3px';
  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginBottom = '22px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to recenter the map';
  controlDiv.appendChild(controlUI);
  
  // Set CSS for the control interior.
  var controlText = document.createElement('div');
  controlText.style.color = 'rgb(25,25,25)';
  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
  controlText.style.fontSize = '16px';
  controlText.style.lineHeight = '38px';
  controlText.style.paddingLeft = '5px';
  controlText.style.paddingRight = '5px';
  controlText.innerHTML = 'Center Map';
  controlUI.appendChild(controlText);
  
  $(controlUI).on("mouseenter", function () {
  	controlUI.style.backgroundColor = "rgb(235, 235, 235)";
  	controlUI.style.color = "#000";
      });
      $(controlUI).on("mouseleave", function () {
          controlUI.style.backgroundColor = "rgb(255, 255, 255)";
          controlUI.style.color = "#565656";
  	});
  	
  // Setup the click event listeners: simply set the map to Chicago.
  controlUI.addEventListener('click', function() {
    map.setCenter({lat: <?php	echo $UStore_Lat; ?>,lng: <?php	echo $UStore_Long; ?>});
  });
  	}
   var centerControlDiv = document.createElement('div');
          var centerControl = new CenterControl(centerControlDiv, map);
  
          centerControlDiv.index = 1;
          map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
       
  
  		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
  		}
  	var markers = [];
  	var markers2 = [];
  	var markers3 = [];
  
  	/*
  function pcode(map){
  	var typingTimer;      
  	var image   = ("<?php
    //echo $Store_Logo; ?>");
  
  	          // timer identifier
  
  var doneTypingInterval = 1500;
  
  $('#spcodeshow').click(function(){
  clearTimeout(typingTimer);
  $('#reset').show();
  
      if ($('#spcode').val) {
          typingTimer = setTimeout(function(){
  
              // do stuff here e.g ajax call etc....
  			// alert("bc");
  
               var v = $("#spcode").val();
               $("#out").html(v);
  
  
  
  			  var geocoder;
    var map;
      geocoder = new google.maps.Geocoder();
      var mapOptions = {
  		center: {lat: <?php
    //echo $UStore_Lat; ?>,
  	
  	lng: <?php
    //echo $UStore_Long; ?>},
  	zoom: 14,
  
  	  styles: [
  	 {
  	   "featureType": "poi",
  	   "stylers": [
  		 { "visibility": "on" }
  	   ]
  	 }
     ],
  	zoom: 14};
      
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
  
      var address = document.getElementById('spcode').value;
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
  			icon:image,
              map: map,
              position: results[0].geometry.location
          });
  
  		Mark_Color_Message(marker,address);
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
      });
          }, doneTypingInterval);
      }
  });
  	function Mark_Color_Message(marker, address) 
  	{
  
  		// alert(address);
  
  		marker.addListener('click', function() {
  			
     map.setZoom(16);
  
     // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
  
     map.setCenter(marker.getPosition());
  	
  	
      $.ajax({
          type: 'POST',
          url:'google/allinfo.php',
          data: {'pcode':address},
          success: function(data){
  
  			var splitted = data.split("|"); // RESULT
  
  			// alert(splitted[0]);
  			// alert(splitted[1]);
  			// var LDUsales = parseFloat(splitted[0])
  
  			$('#store').append(splitted[0]);
  			$('#sales').append(splitted[1]);
          }
  
      });
  	contentString='';
  	var infowindow = new google.maps.InfoWindow({
                  content: ''
              });
  	var contentString = '<div id="iw-container">' +
                      '<div class="iw-title"><img class=jysklogo src=<?php
    //	echo $Store_Logo; ?>>  '+address+'</div>' +
                      '<div class="iw-content">' +
  					'<div id="store"></div>'+
  					 '<div id="sales"></div>'+
  
                        // '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
  
  					  /*'<div class="iw-subTitle">PostalCode Analysis</div>' +
  					  '<p><b>' +Var2+ '</b></p>'+
                        '<p><b>LDU sales:</b> <r id="ldusales"></r> <br /><b>LDU Sales HHLD Week: </b><r id="hhldweek"></r>'+
  					  '<br /><b>LDU HHLD:</b> <r id="lduhhld"></r><br /></p>'+
                      '</div>' +
  					'<div class="iw-subTitle">Route Analysis</div>' +
  					'<p><b>' +route+ '</b></p>'+
                        '<p><b>Sales: </b><r id="sales"></r>'+
  					  '<br /><b>HHLD WEEK:</b> <r id="slduhhld"></r><br />'+
  					  '<b>Route: </b><r id="route"></r></p>'+
                      '</div>' +
                     '<div class="iw-bottom-gradient"></div>' +
                    '</div>';
  				infowindow.close();
           		infowindow.setContent(contentString);	
  				infowindow.open(map, marker);
  
  		  		// marker.setIcon("<?php //echo $Green_sqr;
    ?>"); 	  
  		
  	});	
  	}
  
  }
  */
  var addListenersOnPolygon = function(areaCovered2,map) {
  
    var infowindow = new google.maps.InfoWindow({
  size: new google.maps.Size(250, 100),
  zindex:100
  });
  
    google.maps.event.addListener(areaCovered2, 'mouseover', function (event) {
      this.setOptions({fillColor: "#00FF00"});
     //alert(areaCovered.get("text"));
     var contentString = areaCovered2.get("text");
    
    infowindow.setContent(contentString);
    infowindow.setPosition(event.latLng);
    infowindow.open(map);
  
    });  
    google.maps.event.addListener(areaCovered2,"mouseout",function(){
  this.setOptions({fillColor: "pink"});
  infowindow.close(map);
  });
  
    
  }   
  
  
  function fsa(map){
    <?php include "google/fsa.php";?>
  	var arr = new Array(); // making an array
      var polygons = [];  // making polygons empty
      var bounds = new google.maps.LatLngBounds();
    arr = [];
    var k=0;
  
  	var polys = new Array();
    var totalfsa = "<?php echo  $FSA3[$k] ?>";
    var res = totalfsa.split(",");
   //alert(res[1]);
  	// var fsaArray = <?php //echo $FSA;
    ?>;
  
  	// var fsaArray = [<?php //echo '"'.implode('","', $FSA).'"'
    ?>];
    <?php
    for ($ij = 0; $ij < $j; $ij++)
    	{ ?>
  		var triangleCoords_fsa = <?php
    echo $FSA[$ij]; ?>;
   		//var fsaname = <?php //echo $fsaname[$ij]?>;
  		
  		//alert(triangleCoords_fsa);
  k++;
  
  		for (var i = 0, i_end = triangleCoords_fsa.length; i < i_end; i++) {
  
  			// alert(triangleCoords_fsa[i]);
  
  			bounds.extend(triangleCoords_fsa[i]);
  		}
  
  		var areaCovered2 = new google.maps.Polygon({
  			paths: triangleCoords_fsa,
  			strokeWeight: 1,
  			color: 'red',
  			fillColor: 'pink',
  			strokeColor:'black'
  			
  
      });
      
      	//for (var k = 0, k_end = res.length; k < k_end; k++) {
          
          
         // alert(res[k]);
          areaCovered2.set("text", res[k]);  
          areaCovered2.set("ZIndex",4);
  
       // }
  		polys.push(areaCovered2);
  		areaCovered2.setMap(map);
  		addListenersOnPolygon(areaCovered2,map);
  
  	<?php
    } ?>
  
  $('#fsa_hide').click(function() {
  
  $('#fsa_hide').css("display", "none");
  $('#fsa').css("display", "block");
  
  for (var i=0; i<polys.length; i++) {
  polys[i].setMap(null);
  }
  
  // fsa_hide(map);
  
  
  });
  
  }
  
  
   
  /*
  function heat2(map) {
  	var Green_Distribution 	= ("<?php //echo $Green_sqr;
    ?>");
  	var Red_Distribution 	= ("<?php //echo $Red_sqr;
    ?>");
  	 var locations 			= (<?php //ECHO $DISTRIBUTION;
    ?>);
  	
  	 for (i = 0; i < locations.length; i++) 
  	{	
  		Var2 = locations[i][0];
  	var marker_heat;
  	$.ajax({
          type: 'POST',
          url:'google/heatsales.php',
          data: {'pcode':Var2}, 
          success: function(data){
  
  			// alert(data);
  
  			marker_heat = {
  			location:new google.maps.LatLng(locations[i][1], locations[i][2]), weight: data}
  		markers3.push(marker_heat);
         
  	}
  
  
      });
  	}		//alert(data);
  		
  
  	  var infowindow = new google.maps.InfoWindow({
                  content: ''
              });
  
  	heatmap = new google.maps.visualization.HeatmapLayer({
            data: markers3,
            map: map
        	});
  
  			
  	// getPoints(markers2,map);
  
  	$("#heat-hide").show();
  	$("#heat").hide();
  
  		$('#gradient').click(function(){
  
  		changeGradient(heatmap);
  	  	});
  	  	$('#radius').click(function(){
  		changeRadius(heatmap);
  	 	});
  	 	$('#opacity').click(function(){
  		changeOpacity(heatmap);
  		});
  
  
  }
  
  */
  
  /*
  function heat(map) {
  	var Green_Distribution 	= ("<?php
    // echo $Green_sqr; ?>");
  	var Red_Distribution 	= ("<?php
    //  echo $Red_sqr; ?>");
  	 var locations 			= (<?php
    // ECHO $DISTRIBUTION; ?>);
  	var marker_heat;
  	  var infowindow = new google.maps.InfoWindow({
                  content: ''
              });
  	 
  	for (i = 0; i < locations.length; i++) 
  	{	
  		marker_heat = {
  			location:new google.maps.LatLng(locations[i][1], locations[i][2]), weight: i}
  		markers2.push(marker_heat);
  
  	}
  
  	heatmap = new google.maps.visualization.HeatmapLayer({
            data: markers2,
            map: map
        	});
  
  			
  	// getPoints(markers2,map);
  
  	$("#heat-hide").show();
  	$("#heat").attr("disabled", true);
  
  		$('#gradient').click(function(){
  		changeGradient(heatmap);
  	  	});
  	  	$('#radius').click(function(){
  		changeRadius(heatmap);
  	 	});
  	 	$('#opacity').click(function(){
  		changeOpacity(heatmap);
  		});
  
  
  }
  */
  
  
  function hideheat(map){
          heatmap.setMap(heatmap.getMap() ? null : map);
        };
  
  function changeGradient(heatmap) {
          var gradient = [
            'rgba(0, 255, 255, 0)',
            'rgba(0, 255, 255, 1)',
            'rgba(0, 191, 255, 1)',
            'rgba(0, 127, 255, 1)',
            'rgba(0, 63, 255, 1)',
            'rgba(0, 0, 255, 1)',
            'rgba(0, 0, 223, 1)',
            'rgba(0, 0, 191, 1)',
            'rgba(0, 0, 159, 1)',
            'rgba(0, 0, 127, 1)',
            'rgba(63, 0, 91, 1)',
            'rgba(127, 0, 63, 1)',
            'rgba(191, 0, 31, 1)',
            'rgba(255, 0, 0, 1)'
          ]
          heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
        }
  
        function changeRadius(heatmap) {
          heatmap.set('radius', heatmap.get('radius') ? null : 20);
        }
  
        function changeOpacity(heatmap) {
          heatmap.set('opacity', heatmap.get('opacity') ? null : 0.2);
        }
  
  
  // --Distribution  -------------------------------------		
  var markers = [];
  var markerCluster=''; 
  var markers1 = [];
  var markers2 = [];
  var markers3 = [];
  var markers4 = [];
  var markers5 = [];
  var markers6 = [];
  var markers7 = [];
  var markers8 = [];
  var markers9 = [];
  var markers10 = [];
  function dist(map){
  
    for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
    for (var i = 0; i < markers1.length; i++) {
            markers1[i].setMap(null);
        }
        for (var i = 0; i < markers2.length; i++) {
            markers2[i].setMap(null);
        }

        for (var i = 0; i < markers3.length; i++) {
            markers3[i].setMap(null);
        }
        for (var i = 0; i < markers4.length; i++) {
            markers4[i].setMap(null);
        }
        for (var i = 0; i < markers5.length; i++) {
            markers5[i].setMap(null);
        }
        for (var i = 0; i < markers6.length; i++) {
            markers6[i].setMap(null);
        }
        for (var i = 0; i < markers7.length; i++) {
            markers7[i].setMap(null);
        }
        for (var i = 0; i < markers8.length; i++) {
            markers8[i].setMap(null);
        }
        for (var i = 0; i < markers9.length; i++) {
            markers9[i].setMap(null);
        }
        for (var i = 0; i < markers10.length; i++) {
            markers10[i].setMap(null);
        }
  
        markers = [];
  <?php include("sales.php");?>
  $('#sel_dist').attr("disabled", true);
  
  //	$('#dist').hide();
  
  	
  $('#sel_dist').show();
  
  	var marker = [];
  	var markerCluster ='';
  	var marker=[];
    var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
    var Red_Distribution 	= ("<?php
    echo $Red_sqr; ?>");
    var locations 			= (<?php
    echo $DISTRIBUTION; ?>);
    var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations.length; i++) 
  {	
                    	marker = new google.maps.Marker({	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
  										map: map,											
  										icon: Red_Distribution,
  										title: 'Postal Code : ' +locations[i][0] + ' - Route : ' + locations[i][3] + ' (Distribution Qty:' + locations[i][4] + ')'
  									 });
  
  											   
  									
  									 // if (locations[i][5] == '1') { marker.setIcon("<?php //echo $Green_sqr;
    ?>");} else{  marker.setIcon("<?php //echo $Red_sqr;
    ?>"); }	
  
  	// AttachSecretMessage(marker, locations[i][5]);
  	// Route_Color(marker, locations[i][5]);
  
    markers.push(marker);
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations[i][0]+',  <b>  Route : </b>'+locations[i][3];
  var loc2 = locations[i][0];
  var route = locations[i][3];
  var lat =  locations[i][1];
  var long = locations[i][2];
    Mark_Color_Message(marker, loc,loc2,route,lat,long);
  
  }
  var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'images/m',minimumClusterSize:'40'});
  
  function randon(){
  for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
      	markerCluster.removeMarkers( markerCluster.getMarkers() );
      markerCluster.clearMarkers(markerCluster.getMarkers());
      $('#hide_dist').css("display", "none");
      $('#dist').css("display", "block");
      
  }
  $("#decile1").click(function(){
  randon();
  
  });
  $("#decile2").click(function(){
  randon();
  
  });
  $("#decile3").click(function(){
  randon();
  
  });
  $("#decile4").click(function(){
  randon();
  
  });
  $("#decile5").click(function(){
  randon();
  
  });
  $("#decile6").click(function(){
  randon();
  
  });
  $("#decile7").click(function(){
  randon();
  
  });
  $("#decile8").click(function(){
  randon();
  
  });
  $("#decile9").click(function(){
  randon();
  
  });
  $("#decile10").click(function(){
  randon();
  
  });
  
  	$('#hide_clust').click(function(){
  
  		$('#hide_clust').css("display", "none");
  		$('#show_clust').css("display", "block");
  		//$("#dist").show();
      for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        for (var i = 0; i < markers1.length; i++) {
            markers1[i].setMap(null);
        }
        for (var i = 0; i < markers2.length; i++) {
            markers2[i].setMap(null);
        }
        for (var i = 0; i < markers10.length; i++) {
            markers10[i].setMap(null);
        }
        for (var i = 0; i < markers3.length; i++) {
            markers3[i].setMap(null);
        }
        for (var i = 0; i < markers4.length; i++) {
            markers4[i].setMap(null);
        }
        for (var i = 0; i < markers5.length; i++) {
            markers5[i].setMap(null);
        }
        for (var i = 0; i < markers6.length; i++) {
            markers6[i].setMap(null);
        }
        for (var i = 0; i < markers7.length; i++) {
            markers7[i].setMap(null);
        }
        for (var i = 0; i < markers8.length; i++) {
            markers8[i].setMap(null);
        }
        for (var i = 0; i < markers9.length; i++) {
            markers9[i].setMap(null);
        }
  		markerCluster.clearMarkers();
  		var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  	var Red_Distribution 	= ("<?php
    echo $Red_sqr; ?>");
  	 var locations 			= (<?php
    echo $DISTRIBUTION; ?>);
  	var marker_heat;
  	  var infowindow = new google.maps.InfoWindow({
                  content: ''
              });
  	 
  	for (i = 0; i < locations.length; i++) 
  	{	
  
  		// marker_heat = new google.maps.LatLng(locations[i][1], locations[i][2]);
  
  
  		marker = new google.maps.Marker({	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
  											map: map,											
  											icon: Red_Distribution,
  											title: 'Postal Code : ' +locations[i][0] + ' - Route : ' + locations[i][3] + ' (Distribution Qty:' + locations[i][4] + ')'
  		 								});
  
                                                     
  		// if (locations[i][5] == '1') { marker.setIcon("<?php
    //echo $Green_sqr; ?>");} else{  marker.setIcon("<?php
    //echo $Red_sqr; ?>"); }	
  
  		// AttachSecretMessage(marker, locations[i][5]);
  		// Route_Color(marker, locations[i][5]);
  		// markers2.push(marker_heat);
  
   markers.push(marker);
  
  // markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations[i][0]+',  <b>  Route : </b>'+locations[i][3];
  var loc2 = locations[i][0];
  var route = locations[i][3];
  var lat = locations[i][1];
  var long= locations[i][2];
  Mark_Color_Message(marker, loc,loc2,route,lat,long);
  	}
  
   });
  
   $('#analysis_result').click(function(){
  		markerCluster.removeMarkers( markerCluster.getMarkers() );
  		markerCluster.clearMarkers(markerCluster.getMarkers());
  		//markerClusterer.clearMarkers();
   });
  $('#hide_dist').click(function(){
    $('#salescontent').html("");
    $('.mapbasic.deciles').css("display", "block");
  
  
  		$('#dist').css("display", "block");
  		$('#hide_dist').css("display", "none");
      $('#hide_clust').css("display", "none");
      $('#show_clust').css("display", "none");
  
  		//alert(markers.length);
  	
      for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
      /*  for (var i = 0; i < markers1.length; i++) {
            markers1[i].setMap(null);
        }
        for (var i = 0; i < markers2.length; i++) {
            markers2[i].setMap(null);
        }
        for (var i = 0; i < markers10.length; i++) {
            markers10[i].setMap(null);
        }
        for (var i = 0; i < markers3.length; i++) {
            markers3[i].setMap(null);
        }
        for (var i = 0; i < markers4.length; i++) {
            markers4[i].setMap(null);
        }
        for (var i = 0; i < markers5.length; i++) {
            markers5[i].setMap(null);
        }
        for (var i = 0; i < markers6.length; i++) {
            markers6[i].setMap(null);
        }
        for (var i = 0; i < markers7.length; i++) {
            markers7[i].setMap(null);
        }
        for (var i = 0; i < markers8.length; i++) {
            markers8[i].setMap(null);
        }
        for (var i = 0; i < markers9.length; i++) {
            markers9[i].setMap(null);
        }*/
  		markerCluster.removeMarkers( markerCluster.getMarkers() );
  		markerCluster.clearMarkers(markerCluster.getMarkers());
  		//markerClusterer.clearMarkers();
  
  	});
  
  	// var markerCluster = new MarkerClusterer(map, markersArray,
             // {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  
  
  	function Mark_Color_Message(marker, Var1,Var2,route,lat,long) 
  	{
  		marker.addListener('click', function() {
  			$('#img').show();
  			$('#salescontent').css("display", "block");
        $('#salescontent2').css("display", "block");
        $('#distancecontent').css("display", "block");
  			$('#distancecontent2').css("display", "block");
     //map.setZoom(16);
  
  $('#salescontent2').css("display", "block");
     // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
  
     map.setCenter(marker.getPosition());
     $.ajax({
          type: 'POST',
          url:'google/distance.php',
          data: {'latv':lat,'longv':long}, 
          success: function(data){
  		//var splitted = data.split("</br>"); // RESULT
  			 //alert(data);
  			$('#distance').append(data);
  			$('#img').hide();
          }
  
      });

      	var contentString = '<div class="iw-content">' +
  					  '<div id="distance"></div>'+
  
                        // '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
  
  					  /*'<div class="iw-subTitle">PostalCode Analysis</div>' +
  					  '<p><b>' +Var2+ '</b></p>'+
                        '<p><b>LDU sales:</b> <r id="ldusales"></r> <br /><b>LDU Sales HHLD Week: </b><r id="hhldweek"></r>'+
  					  '<br /><b>LDU HHLD:</b> <r id="lduhhld"></r><br /></p>'+
                      '</div>' +
  					'<div class="iw-subTitle">Route Analysis</div>' +
  					'<p><b>' +route+ '</b></p>'+
                        '<p><b>Sales: </b><r id="sales"></r>'+
  					  '<br /><b>HHLD WEEK:</b> <r id="slduhhld"></r><br />'+
  					  '<b>Route: </b><r id="route"></r></p>'+
                      '</div>' +*/
                      '<div class="iw-bottom-gradient"></div>' +
                    '</div>';
  				infowindow.close();
           		$("#distancecontent").html(contentString);	
  				//infowindow.open(map, marker);
  		  		marker.setIcon("<?php
    echo $Green_sqr; ?>"); 	  


     $.ajax({
          type: 'POST',
          url:'google/sales.php',
          data: {'pcode':Var2}, 
          success: function(data){
  			var splitted = data.split("</br>"); // RESULT
  			// alert(splitted);
  			$('#sales').append(splitted[0]);
  			$('#img').hide();
          }
  
      });
  	var contentString = '<div id="iw-container">' +
                      '<div class="iw-title"><img class=jysklogo src=<?php
    echo $Store_Logo; ?>>  '+Var2+'</div>' +
                      '<div class="iw-content">' +
  					  '<div id="sales"></div>'+
  
                        // '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
  
  					  /*'<div class="iw-subTitle">PostalCode Analysis</div>' +
  					  '<p><b>' +Var2+ '</b></p>'+
                        '<p><b>LDU sales:</b> <r id="ldusales"></r> <br /><b>LDU Sales HHLD Week: </b><r id="hhldweek"></r>'+
  					  '<br /><b>LDU HHLD:</b> <r id="lduhhld"></r><br /></p>'+
                      '</div>' +
  					'<div class="iw-subTitle">Route Analysis</div>' +
  					'<p><b>' +route+ '</b></p>'+
                        '<p><b>Sales: </b><r id="sales"></r>'+
  					  '<br /><b>HHLD WEEK:</b> <r id="slduhhld"></r><br />'+
  					  '<b>Route: </b><r id="route"></r></p>'+
                      '</div>' +*/
                      '<div class="iw-bottom-gradient"></div>' +
                    '</div>';
  				infowindow.close();
           		$("#salescontent").html(contentString);	
  				//infowindow.open(map, marker);
  		  		marker.setIcon("<?php
    echo $Green_sqr; ?>"); 	  
  		
  	});	
  
  	
  	}
  
  }
    
  
  function analysis_result(map){
  
    for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
    var markerCluster=''
  var locations_rate='';
  
  $('#sel_dist').attr("disabled", true);
  
  //	$('#dist').hide();
  
  $('#sel_dist').show();
  
  // $('#hide_dist').show();
  // --Distribution  -------------------------------------		
  
  	var marker_rate = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION2; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	
  //alert(locations_rate[i][5]);
  	// marker_heat = new google.maps.LatLng(locations[i][1], locations[i][2]);
      
    
    
    
    if(locations_rate[i][5]==0){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test10.png"  ?>");
  }
   else if(locations_rate[i][5]==1){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test9.png"  ?>");
  }
  
  else if(locations_rate[i][5]==2){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test8.png" ?>");
  }
  else if(locations_rate[i][5]==3){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test7.png" ?>");
  }
  else if(locations_rate[i][5]==4){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test6.png" ?>");
  }
  else if(locations_rate[i][5]==5){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test5.png" ?>");
  }
  else if(locations_rate[i][5]==6){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test4.png" ?>");
  }
  else  if(locations_rate[i][5]==7){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test3.png" ?>");
  }
  else  if(locations_rate[i][5]==8){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test2.png" ?>");
  }
  else if(locations_rate[i][5]==9){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test.png" ?>");
  }
  /*else if((locations_rate[i][5]!=0)&&(locations_rate[i][5]!=1)&&(locations_rate[i][5]!=2)&&(locations_rate[i][5]!=3)(locations_rate[i][5]!=4)(locations_rate[i][5]!=5)(locations_rate[i][5]!=6)(locations_rate[i][5]!=7)(locations_rate[i][5]!=8)(locations_rate[i][5]!=9)){
    var rate_marker 	= ("<?php
    // echo "google/Store_Icons/test.png" ?>");
  }*/
  
  	marker_rate = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
  											   
  									
  									 // if (locations[i][5] == '1') { marker.setIcon("<?php //echo $Green_sqr;
    ?>");} else{  marker.setIcon("<?php //echo $Red_sqr;
    ?>"); }	
  
  	// AttachSecretMessage(marker, locations[i][5]);
  	// Route_Color(marker, locations[i][5]);
  
    markers.push(marker_rate);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker_rate, loc,loc2,route);
  
  }
  //var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'images/m',minimumClusterSize:'40'});
  /*
  
   $('#dist').click(function(){
  /*  $('#decile1').css("display", "none");
  $('#decile2').css("display", "none");
  $('#decile3').css("display", "none");
  $('#decile4').css("display", "none");
  $('#decile5').css("display", "none");
  $('#decile6').css("display", "none");
  $('#decile7').css("display", "none");
  $('#decile8').css("display", "none");
  $('#decile9').css("display", "none");
  $('#decile10').css("display", "none");*/
  /*   for (var i = 0; i < markers.length; i++ ) {
      markers[i].setMap(null);
    }
    
    markerCluster.removeMarkers( markerCluster.getMarkers() );
    markerCluster.clearMarkers(markerCluster.getMarkers());
    //markerClusterer.clearMarkers();
  });
  */
  
  }
  
  
  function analysis_result_hide(map){
  		$('#analysis_result').css("display", "block");
  	//	$('#analysis_resulthide').css("display", "none");
  		for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
  	
  	}
  
  	// var markerCluster = new MarkerClusterer(map, markersArray,
             // {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
  
  /*
  	function Mark_Color_Message(marker, Var1,Var2,route) 
  	{
  		marker.addListener('click', function() {
  			$('#img').show();
  			$('#salescontent').css("display", "block");
  			$('#salescontent2').css("display", "block");
     //map.setZoom(16);
  
  $('#salescontent2').css("display", "block");
     // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
  
     map.setCenter(marker.getPosition());
  	
  	
      $.ajax({
          type: 'POST',
          url:'google/sales.php',
          data: {'pcode':Var2}, 
          success: function(data){
  			var splitted = data.split("</br>"); // RESULT
  			// alert(splitted);
  			$('#sales').append(splitted[0]);
  			$('#img').hide();
          }
  
      });
  	var contentString = '<div id="iw-container">' +
                      '<div class="iw-title"><img class=jysklogo src=<?php
    // echo $Store_Logo; ?>>  '+Var2+'</div>' +
                      '<div class="iw-content">' +
  					  '<div id="sales"></div>'+
  
                        // '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
  
  					  '<div class="iw-subTitle">PostalCode Analysis</div>' +
  					  '<p><b>' +Var2+ '</b></p>'+
                        '<p><b>LDU sales:</b> <r id="ldusales"></r> <br /><b>LDU Sales HHLD Week: </b><r id="hhldweek"></r>'+
  					  '<br /><b>LDU HHLD:</b> <r id="lduhhld"></r><br /></p>'+
                      '</div>' +
  					'<div class="iw-subTitle">Route Analysis</div>' +
  					'<p><b>' +route+ '</b></p>'+
                        '<p><b>Sales: </b><r id="sales"></r>'+
  					  '<br /><b>HHLD WEEK:</b> <r id="slduhhld"></r><br />'+
  					  '<b>Route: </b><r id="route"></r></p>'+
                      '</div>' +
                     '<div class="iw-bottom-gradient"></div>' +
                    '</div>';
  				infowindow.close();
           		$("#salescontent").html(contentString);	
  				//infowindow.open(map, marker);
          marker.setIcon("");
          marker.setIcon("<?php
    // echo $Green_sqr; ?>"); 	  
  		
  	});	
  */
  	
  //}
  
  //}
  
  
  
  //analysis  ends here
  
  
  function decile1(map){
  //   $('#decile1').click(function(){
  
  var i = 0, l = markers.length;
  for (i; i<l; i++) {
    markers[i].setMap(null)
  }
  //alert (markers.length);
  
  var mc =window.MarkerClusterer.prototype.onRemove = function(){
  for ( var i = 0 ; i < this.clusters_.length; i++){
  this.clusters_[i].remove()
  }
  }
  markers = [];
  // Clears all clusters and markers from the clusterer.
    var marker = [];
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==9){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers1.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  
  function decile1_hide(map){
  for (var c = 0; c < markers1.length; c++) {
          markers1[c].setMap(null);
      }
  
  }
  function decile2(map){
  
  
  
  //$('#decile2').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==8){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test2.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers2.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  function decile2_hide(map){
  for (var c = 0; c < markers2.length; c++) {
          markers2[c].setMap(null);
      }
  
  }
  function decile3(map){
  
  //$('#decile3').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
      	var marker = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==7){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test3.png" ?>");
  
  
  marker= new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers3.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  function decile3_hide(map){
  for (var c = 0; c < markers3.length; c++) {
          markers3[c].setMap(null);
      }
  
  }
   function decile4(map){
  
  //$('#decile4').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==6){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test4.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers4.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  
   function decile4_hide(map){
  for (var c = 0; c < markers4.length; c++) {
          markers4[c].setMap(null);
      }
  
  }
  
   function decile5(map){
  
  
  //$('#decile5').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==5){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test5.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers5.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  function decile5_hide(map){
  for (var c = 0; c < markers5.length; c++) {
          markers5[c].setMap(null);
      }
  
  }
  
   function decile6(map){
  //$('#decile6').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==4){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test6.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers6.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  function decile6_hide(map){
  for (var c = 0; c < markers6.length; c++) {
          markers6[c].setMap(null);
      }
  
  }
  
   function decile7(map){
  //$('#decile7').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==3){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test7.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers7.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  
   function decile7_hide(map){
  for (var c = 0; c < markers7.length; c++) {
          markers7[c].setMap(null);
      }
  
  }
  
   function decile8(map){
  //$('#decile8').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  //	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==2){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test8.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers8.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  function decile8_hide(map){
  for (var c = 0; c < markers8.length; c++) {
          markers8[c].setMap(null);
      }
  
  }
  
   function decile9(map){
  //$('#decile9').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  //	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==1){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test9.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers9.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  function decile9_hide(map){
  for (var c = 0; c < markers9.length; c++) {
          markers9[c].setMap(null);
      }
  
  }
   function decile10(map){
  //$('#decile10').click(function(){
  
  for (var c = 0; c < markers.length; c++) {
          markers[c].setMap(null);
      }
  
  
      	var marker = [];
  //	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  
   var locations_rate 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations_rate.length; i++) 
  {	 
    
    if(locations_rate[i][5]==0){
    var rate_marker 	= ("<?php
    echo "google/Store_Icons/test10.png" ?>");
  
  
  marker = new google.maps.Marker({	position: new google.maps.LatLng(locations_rate[i][1], locations_rate[i][2]),
  										map: map,											
  										icon: rate_marker,
  										title: 'Postal Code : ' +locations_rate[i][0] + ' - Route : ' + locations_rate[i][3] +  ' - Rate : ' + locations_rate[i][5]+' (Distribution Qty:' + locations_rate[i][4] + ')'
  									 });
  
                     markers10.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations_rate[i][0]+',  <b>  Route : </b>'+locations_rate[i][3];
  var loc2 = locations_rate[i][0];
  var route = locations_rate[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
                    }
  }
  
  
  }
  function decile10_hide(map){
  for (var c = 0; c < markers10.length; c++) {
          markers10[c].setMap(null);
      }
  
  }
  
  
  /*
  alert("i am called");
    <?php //include("dynamicicon.php");
    ?>
  
     var markers = [];
  	var marker = [];
  	var markerCluster ='';
  	
  var Green_Distribution 	= ("<?php
    echo $Green_sqr; ?>");
  var Red_Distribution 	= ("<?php
    echo $Red_sqr; ?>");
   var locations 			= (<?php
    echo $DISTRIBUTION; ?>);
  var marker_heat;
    var infowindow = new google.maps.InfoWindow({
  			content: ''
  		});
   
  for (i = 0; i < locations.length; i++) 
  {	
  
  	// marker_heat = new google.maps.LatLng(locations[i][1], locations[i][2]);
  
  
  	marker = new google.maps.Marker({	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
  										map: map,											
  										icon: Red_Distribution,
  										title: 'Postal Code : ' +locations[i][0] + ' - Route : ' + locations[i][3] + ' (Distribution Qty:' + locations[i][4] + ')'
  									 });
  
  											   
  									
  									 // if (locations[i][5] == '1') { marker.setIcon("<?php //echo $Green_sqr;
    ?>");} else{  marker.setIcon("<?php //echo $Red_sqr;
    ?>"); }	
  
  	// AttachSecretMessage(marker, locations[i][5]);
  	// Route_Color(marker, locations[i][5]);
  
    markers.push(marker);
    
    
  
  	// markers2.push(marker_heat);
  
  var loc = '<b>PostalCode : </b>'+locations[i][0]+',  <b>  Route : </b>'+locations[i][3];
  var loc2 = locations[i][0];
  var route = locations[i][3];
    Mark_Color_Message(marker, loc,loc2,route);
  
  }
  }
    
  
  /*
    var allocation = []; 
    var locations 			= (<?php
    // echo $DISTRIBUTION; ?>);
   var location = '';
   alert(locations.length);
  for (i = 0; i < locations.length; i++) 
  {	
  /*  
  if(i == ((locations.length)-1)){
    //alert("this is last");
  allocation.push("'"+locations[i][3]+"'");
  }
  else{
  
  allocation.push("'"+locations[i][3]+"',"); 
  }
  }
  
    alert(i);
    console.log(allocation); 
    //alert("i am called");
    $.ajax({
          type: 'POST',
          url:'google/dynamicicon.php',
          data: {'route':allocation}, 
          success: function(data){
          console.log(data);
  
          if(data==4){
            alert("marker color for rate 4");
          }
        }
      });
      */
  //}
  
  
  
  	
  function AttachSecretMessage(marker, secretMessage) 
  	{	var infowindow = new google.maps.InfoWindow({content: secretMessage});
  		marker.addListener('click', function() {infowindow.open(marker.get('map'), marker);
  		});
  	}
  
  
  
  // --Function Mark_Color_Message  -------------------------------------	
  
  	function Mark_Color_Message(marker, Var1) 
  	{	
  	
  		var infowindow = new google.maps.InfoWindow({content: Var1});
  		marker.addListener('click', function() {infowindow.open(marker.get('map'), marker); 
     map.setZoom(16);
  
     // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printMapControl(map));
  
     map.setCenter(marker.getPosition());
   
  
  
  												marker.setIcon("<?php
    echo $Green_sqr; ?>");
  												});
  	}
  
  
  
  
  
  $(document).ready(function(){
      $('#mapbasics').click(function() {
        $('.menu1').toggle("slide");
      });
  	$('#analysis').click(function() {
        $('.menu2').toggle("slide");
      });
  	$('#distribution').click(function() {
        $('.menu3').toggle("slide");
      });
  	$('#kquest').click(function() {
        $('.menu4').toggle("slide");
      });
  
  });
</script>
<body onLoad='initialize();'>
  <!--              
    <div class="row">
    <div class="col-xs-12">
    <button class="btn btn-danger" onclick="javascript:history.back()">Back</button> 
    <button class="btn btn-Primary" onclick="fsa()">Show Store</button> 
    <button class="btn btn-Primary" onclick="boundry()">Show Boundry</button>-->
  <!-- <button class="btn btn-Primary" onclick="fsa();">Show FSA</button>-->
  <!-- <button class="btn btn-Primary" id="dist">Show Distribution</button>
    <button class="btn btn-Primary" id="hide_clust">Hide Clusters</button>
    
    </div>
    
    <div id="sel_dist">
     <b>Enter Pcode:</b> <input id="spcode"  type="text" placeholder="Search" aria-label="Search By Pcode">
    <button class="btn btn-warning" id="spcodeshow" onclick="">GO</button>
    <button class="btn btn-warning" id="reset" onclick="">RESET</button>
    
       <button class="btn btn-warning" id="heat" onclick="">Show Heatmap</button>
    <button class="btn btn-warning" id="heat-hide" onclick="">Hide Heatmap</button>
       <button class="btn btn-warning" id="gradient" onclick="">Change gradient</button>
       <button class="btn btn-warning" id="radius">Change radius</button>
       <button class="btn btn-warning" id="opacity">Change opacity</button>
     </div>
    
    <div id="sel_dist2">
    <button class="btn btn-warning" onclick="">A Distribution</button>
    <button class="btn btn-warning" onclick="">B Distribution</button>
    <button class="btn btn-warning" onclick="">C Distribution</button>
    </div>-->
  <br/>
  <div width="100%">
    <div  class="mapnenu" style="line-height:20px">
      <button class="btn btn-danger" onclick="javascript:history.back()">BACK</button> 
      <button class="btn btn-danger" id="reset" onclick="">RESET</button>
      <!--<button class="btn btn-Primary" onclick="fsa()">Show Store</button> 
        <button class="btn btn-Primary" onclick="boundry()">Show Boundry</button>-->
      <!-- <button class="btn btn-Primary" onclick="fsa();">Show FSA</button>-->
      <div id="mapbasics" style="border-top: solid 0.1px;border-color:blue">Map Characteristics</div>
      <div class="menu1" style="display: none;">
        <table class="mapbasic">
          <tr>
            <td><a id="store"><i>Show Store Boundary</i></a></td>
          </tr>
          <tr>
            <td><a id="hidestore"><i>Hide Store Boundary</i></a></td>
          </tr>
          <tr>
            <td><a id="fsa"><i>Show FSA Boundary</i></a></td>
          </tr>
          <tr>
            <td><a id="fsa_hide"><i>Hide FSA Boundary</i></a></td>
          </tr>
        </table>
      </div>
      <div id="distribution" style="border-top: solid 0.1px; border-color:blue">Flyer Distribution</div>
      <div class="menu3" style="display: none;">
        <table class="mapbasic">
          <tr>
            <td><a id="dist"><i>Show Current Distribution</i></a></td>
          </tr>
          <tr>
            <td><a id="hide_dist"><i>Hide Current Distribution</i></a></td>
          </tr>
          <tr>
            <td><a id="hide_clust"><i>Hide Clusters</i></a></td>
          </tr>
          <tr>
            <td><a id="show_clust"><i>Show Clusters</i></a></td>
          </tr>
          <!--<tr><td><a id="heat"><i>Show Density Heat Map</i></a></td></tr>
            <tr><td><a id="heat-hide"><i>Hide Density Heat Map</i></a></td></tr>
            <tr><td><a id="gradient"><i>Change Gradient Heat Map</i></a></td></tr>
            <tr><td><a id="opacity"><i>Change Opacity Heat Map</i></a></td></tr>
            <tr><td><a id="radius"><i>Change Radius Heat Map</i></a></td></tr>-->
          <!--<tr><td><button class="btn btn-Primary" id="fsa">Show FSA Boundary</button></td></tr>
            <tr><td><button class="btn btn-Primary" id="fsa_hide">Hide FSA Boundary</button></td></tr>
               <tr><td><button class="btn btn-Primary" id="hide_clust">Hide Clusters</button></td></tr>
               <tr><td><button class="btn btn-Primary" id="heat" onclick="">Show Heatmap</button></td></tr>
               <tr><td><button class="btn btn-Primary" id="gradient" onclick="">Change gradient</td></tr>
            <tr><td><button class="btn btn-Primary" id="radius">Change radius</td></tr>
            <tr><td><button class="btn btn-Primary" id="opacity">Change opacity</td></tr>
            <tr><td><button class="btn btn-Primary" id="heat-hide" onclick="">Hide Heatmap</td></tr>-->
        </table>
      </div>

      
      <div id="analysis" style="border-top: solid 0.1px;border-color:blue">Analysis</div>
      <div class="menu2" style="display: none;">
        <table class="mapbasic deciles">
          <tr>
            <td><img src="google/Store_Icons/test.png" style="width:8%"><i>All Analysis  </i><input type="checkbox" id="analysis_result" class="decile_chk"></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test.png" style="width:8%"><i>Decile1</i><input type="checkbox" id="decile1" class="decile_chk"></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test2.png" style="width:8%"><i>Decile2<input type="checkbox" id="decile2" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test3.png" style="width:8%"><i>Decile3<input type="checkbox" id="decile3" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test4.png" style="width:8%"><i>Decile4<input type="checkbox" id="decile4" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test5.png" style="width:8%"><i>Decile5<input type="checkbox" id="decile5" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test6.png" style="width:8%"><i>Decile6<input type="checkbox" id="decile6" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test7.png" style="width:8%"><i>Decile7<input type="checkbox" id="decile7" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test8.png" style="width:8%"><i>Decile8<input type="checkbox" id="decile8" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test9.png" style="width:8%"><i>Decile9<input type="checkbox" id="decile9" class="decile_chk"></i></td>
          </tr>
          <tr>
            <td><img src="google/Store_Icons/test10.png" style="width:8%"><i>Decile10<input type="checkbox" id="decile10" class="decile_chk"></i></td>
          </tr>
          <!-- <tr><td><button class="btn btn-Primary" id="hide_clust2">Hide Clusters</button></td></tr>
            <tr><td><button class="btn btn-warning" id="heat2" onclick="">Show Heatmap</button></td></tr>
            <tr><td><button class="btn btn-warning" id="gradient2" onclick="">Change gradient</td></tr>
            <tr><td><button class="btn btn-warning" id="radius2">Change radius</td></tr>
            <tr><td><button class="btn btn-warning" id="opacity2">Change opacity</td></tr>
            <tr><td><button class="btn btn-warning" id="heat-hide2" onclick="">Hide Hea1tmap</td></tr>-->
        </table>
      </div>
    
      <div id="salescontent2" style="border-top: solid 0.1px;border-color:blue">Sales Data
        <img src="images/loading-4.gif" id="img" style="display:none">
      </div>
      <div id="salescontent" style="border-top: solid 0.1px;border-color:blue"></div>
    
    
    <div id="distancecontent2" style="border-top: solid 0.1px;border-color:blue">Distance
        <img src="images/loading-4.gif" id="img" style="display:none">
      </div>
      <div id="distancecontent" style="border-top: solid 0.1px;border-color:blue"></div>
    </div>
     
    <!--
      <div id="kquest"><span class="glyphicon glyphicon-hand-right"></span><strong>KQUEST DEMOGRAPHICS</strong></div>
       <div class="menu4" style="display: none;">
          <table class="mapbasic">
      <tr><td><button class="btn btn-Primary" id="dist">Show Distribution</button></td></tr>
          <tr><td><button class="btn btn-Primary" id="hide_clust">Hide Clusters</button></td></tr>
          <tr><td><button class="btn btn-warning" id="heat" onclick="">Show Heatmap</button></td></tr>
          <tr><td><button class="btn btn-warning" id="gradient" onclick="">Change gradient</td></tr>
      	<tr><td><button class="btn btn-warning" id="radius">Change radius</td></tr>
      	<tr><td><button class="btn btn-warning" id="opacity">Change opacity</td></tr>
      	<tr><td><button class="btn btn-warning" id="heat-hide" onclick="">Hide Heatmap</td></tr>
          </table>
       </div>
      -->
    <!--
      <div id="sel_dist">
       <b>Enter Pcode:</b> <input id="spcode"  type="text" placeholder="Search" aria-label="Search By Pcode">
      <button class="btn btn-warning" id="spcodeshow" onclick="">GO</button>
      <button class="btn btn-warning" id="reset" onclick="">RESET</button>
      
         <button class="btn btn-warning" id="heat" onclick="">Show Heatmap</button>
      <button class="btn btn-warning" id="heat-hide" onclick="">Hide Heatmap</button>
         <button class="btn btn-warning" id="gradient" onclick="">Change gradient</button>
         <button class="btn btn-warning" id="radius">Change radius</button>
         <button class="btn btn-warning" id="opacity">Change opacity</button>
       </div>
      
      
      
      
      <button class="btn btn-Primary" id="dist">Show Distribution</button>
      <button class="btn btn-Primary" id="hide_clust">Hide Clusters</button>
      
      
      <table width="50%">
      <tr>
      <td>
       		<b>Enter Pcode:</b> <input id="spcode"  type="text" placeholder="Search" aria-label="Search By Pcode">
      <button class="btn btn-warning" id="spcodeshow" onclick="">GO</button>
      </td>
      </tr>
      <tr>
      <td>
      <button class="btn btn-warning" id="reset" onclick="">RESET</button>
      </td>
      </tr>
      <tr>
      <td>
         	<button class="btn btn-warning" id="heat" onclick="">Show Heatmap</button>
      	</td>
      </tr>
      <tr>
      <td>
      	<button class="btn btn-warning" id="heat-hide" onclick="">Hide Heatmap</button>
      </td>
      </tr>
      <tr>
      <td>
         	<button class="btn btn-warning" id="gradient" onclick="">Change gradient</button>
      </td>
      </tr>
      <tr>
      <td>
         	<button class="btn btn-warning" id="radius">Change radius</button>
      </td>
      </tr>
      <tr>
      <td>
         	<button class="btn btn-warning" id="opacity">Change opacity</button>
       </td>
      </tr>
      </table>
      -->
  </div>
  <?php
    if (isMobile())
    	{
    ?>
  <div style="width:98%;margin-bottom:10px;margin-top:1%;margin-right:1%;margin-left:1%;">
  <div id="map" style="width: 100%; height: 70%;margin-left: 0;">
  <?php
    }
     else
    {
    ?>
  <div style="width:81%;float:right;margin-right:15px;margin-bottom:10px">
    <div id="map" style="width: 100%; height: 90%;margin-left: 0;">
      <?php
        }
        
        ?>
      <center><b>
        <?php
          if (($UStore_Lat && $UStore_Long) == '')
          	{
          	echo "NO Boundry Data found for this Store";
          	}
          
          ?>
        </b>
      </center>
    </div>
    <?php
      }
      
      ?>
  </div>
