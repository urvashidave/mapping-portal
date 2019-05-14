<?php

session_start();
$connectionInfo = array(
    "Database" => "db1101621_marketfocus",
    "UID" => "u1101621_marketfocus",
    "PWD" => "550Alden@2211",
    "CharacterSet" => "UTF-8"
);
$conn           = sqlsrv_connect('win-mssql04.hostmanagement.net', $connectionInfo);

 $user_id = $_GET['L'];
 $pwd = $_GET['P'];

 $_SESSION['jy_pwd'] = $pwd;
 $_SESSION['jy_store'] = $user_id;
   if($_SESSION['jy_pwd'])
	 {
	   if($_SESSION['jy_pwd'] == "KOL9376") {
		 $_SESSION['jy_client'] = "Lawrence";
	   echo "Lawrence";  
	   }
	   else if($_SESSION['jy_pwd'] == "EXC6821") {
		 $_SESSION['jy_client'] ="Eythor";
	   echo "Eythor";  
	   }
	   else if($_SESSION['jy_pwd'] == "IMS7439") {
		 $_SESSION['jy_client'] ="Iain";
	   echo "Iain";  
	   }
	   else if($_SESSION['jy_pwd'] == "DGU0385") {
		 $_SESSION['jy_client'] ="Darryl";
	   echo "Darryl";  
	   }
	   else if($_SESSION['jy_pwd'] == "PTN4487") {
		 $_SESSION['jy_client'] ="Paul";
	   echo "Paul";  
	   }
	 }


 $stmt = sqlsrv_query($conn, "SELECT * FROM dbo.JYSKStores where LOCATION = '$user_id'");
 if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
 //echo "SELECT DISTINCT MARKET FROM dbo.JYSKStores where LOCATION = '$user_id'";
 while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
    $_SESSION['jy_store_name']  = $row['MARKET']; 
    $_SESSION['jy_pcode'] = $row['PCODE'];
 }

  // echo $_SESSION['storename'] = $row['MARKET'];

 header("location:dsp_Menu.cfm?L=".$user_id);
?>