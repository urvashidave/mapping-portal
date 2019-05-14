<?php session_start();
if (!isset($_SESSION['jy_pwd']) && $_SESSION['jy_store'] == true) {
    header("Location: index.php");
    exit;
}

?>


<?php
	$Client_Code = "JY";
	$Store = $_SESSION['jy_store'];	
?>

 
<?php require_once('User_Connection.php'); ?>	
<?php
	$qmap_pc = "EXEC google.DBO.p_Loading_Store_Info @CLIENT_CODE = '$Client_Code' ,@STORE = '$Store'";
// echo "EXEC GOOGLE.DBO.p_Loading_Store_Info @CLIENT_CODE = '$Client_Code' ,@STORE = '$Store'";

	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	
  
  
        $UStore_Lat = $row['LAT'];
		$UStore_Long = $row['LONG'];
		$UStore_Address = $row['ADDRESS'];
		$UStore_Name = $row['STORE_NAME'];
		$UStore_City = $row['CITY'];
		$UStore_FSALDU = $row['FSALDU'];
	}
	
?>	
<?php
	$Client_Code = "JY";

	
           $STR	= '[';
	$ICOUNT	= 0;
          
?>

