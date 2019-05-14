<?php 
session_start();
$pcode = $_POST['pcode'];
$serverName = "72.143.59.108, 1494";     // Your database server
$dbuser = "hmsservice";      // Your db username
$dbpass = "Retail@Marketing1";      // Your db password
$dbname = "ORCA";      // Your database name
//
$connectioninfo = array( "UID" => $dbuser, "PWD" => $dbpass, "Database" => $dbname);
$conn = sqlsrv_connect ($serverName, $connectioninfo);
$Store = $_SESSION['store'];

if($conn)
{ //echo "connected" ;
}
else
{
echo "not established";
die(print_r(sqlsrv_errors(), true));
}

$qmap_pc = "EXEC  p_Web_LDU_Analysis_Report @CLIENT_CODE = 'JY' ,@FSALDU = '$pcode'";

	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	
	$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
	
	echo $LDUsales = $row['LDU_SALES'];
	$LDUsales_round = number_format($LDUsales,2,'.',',');
	$LDU_SALES_HHLD_WEEK = $row['LDU_SALES_HHLD_WEEK'];
	$LDU_SALES_HHLD_WEEK_ROUND = number_format($LDU_SALES_HHLD_WEEK,2,'.',',');


?>
		
	
  
  
 