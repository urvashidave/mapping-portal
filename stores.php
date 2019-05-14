
<?php
session_start();
//This file is updated by Urvashi on 22 aug 2018
$connectionInfo = array(
    "Database" => "db1101621_marketfocus",
    "UID" => "u1101621_marketfocus",
    "PWD" => "550Alden@2211",
    "CharacterSet" => "UTF-8"
);
$conn           = sqlsrv_connect('win-mssql04.hostmanagement.net', $connectionInfo);

$password =  $_GET['data'];
$location1 ="'11','13','14','16','28','32','66','83','15','25','82'";
$location2 ="'22','29','20','31','33','26','61','70','74','41','21','17','18','23'";
$location3 ="'53','62','65','68','71','43','52','48','49','55','78'";
$location4 ="'37','56','80','77','36','38','40','42','54','57','63','69','76'";
$location5 ="'19','24','27','44','46','51','75','59','79','50','58','73','81'";


if($password == "KOL9376"){
	$stmt = sqlsrv_query($conn, "SELECT DISTINCT LOCATION,MARKET FROM dbo.JYSKStores where LOCATION IN ($location1) order by MARKET ASC");
	//echo "SELECT DISTINCT LOCATION,MARKET FROM dbo.JYSKStores where LOCATION IN ($location1) order by MARKET ASC";
	echo "<option value=''>--Select Store--</option>";
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))  
	{  
	if($_SESSION['jy_store'] == $row['LOCATION']){
		$val = "selected";
	}
	else{
		$val ="";
	}
			echo "<option $val value=".$row['LOCATION'].">".$row['LOCATION']." - ".$row['MARKET']."</option>";
		
	}
}
else if($password == "EXC6821"){
	echo "<option value=''>--Select Store--</option>";
	$stmt = sqlsrv_query($conn, "SELECT DISTINCT LOCATION,MARKET FROM dbo.JYSKStores where LOCATION IN ($location2) order by MARKET ASC");
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))  
	{  
		if($_SESSION['jy_store'] == $row['LOCATION']){
			$val = "selected";
		}
		else{
			$val ="";
		}
		
			echo "<option $val value=".$row['LOCATION'].">".$row['LOCATION']." - ".$row['MARKET']."</option>";
		
	}
}

else if($password == "IMS7439"){
	echo "<option value=''>--Select Store--</option>";
	$stmt = sqlsrv_query($conn, "SELECT DISTINCT LOCATION,MARKET FROM dbo.JYSKStores where LOCATION IN ($location3) order by MARKET ASC");
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))  
	{  
		if($_SESSION['jy_store'] == $row['LOCATION']){
			$val = "selected";
		}
		else{
			$val ="";
		}
		
			echo "<option $val value=".$row['LOCATION'].">".$row['LOCATION']." - ".$row['MARKET']."</option>";
		
	}
}

else if($password == "DGU0385"){
	echo "<option value=''>--Select Store--</option>";
	$stmt = sqlsrv_query($conn, "SELECT DISTINCT LOCATION,MARKET FROM dbo.JYSKStores where LOCATION IN ($location4) order by MARKET ASC");
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))  
	{  
		if($_SESSION['jy_store'] == $row['LOCATION']){
			$val = "selected";
		}
		else{
			$val ="";
		}
		
			echo "<option $val value=".$row['LOCATION'].">".$row['LOCATION']." - ".$row['MARKET']."</option>";
		
	}
}

else if($password == "PTN4487"){
	echo "<option value=''>--Select Store--</option>";
	$stmt = sqlsrv_query($conn, "SELECT DISTINCT LOCATION,MARKET FROM dbo.JYSKStores where LOCATION IN ($location5) order by MARKET ASC");
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))  
	{  
		if($_SESSION['jy_store'] == $row['LOCATION']){
			$val = "selected";
		}
		else{
			$val ="";
		}
		
			echo "<option $val value=".$row['LOCATION'].">".$row['LOCATION']." - ".$row['MARKET']."</option>";
		
	}
}

else{
	echo "";
}



?>
