<?php session_start();
if (!isset($_SESSION['jy_pwd']) && $_SESSION['jy_store'] == true) {
    header("Location: index.php");
    exit;
}

?>


<?php
	$Client_Code = "JY";

	
           $STR	= '[';
	$ICOUNT	= 0;
          
?>


<?php require_once('User_Connection.php'); ?>	
<?php	
	$qmap_pc = "SELECT * FROM GOOGLE.DBO.STORE_BOUNDARY WHERE CLIENT_CODE = '$Client_Code' AND PROJECT = (SELECT PROJECT FROM DISTRIBUTION.DBO.WEB_CLIENT_PROJECT WHERE CLIENT_CODE = 'JY') AND STORE = '$Store' AND BOUND_ID1 = 0 ORDER BY BOUND_ID";
 
//echo "SELECT * FROM GOOGLE.DBO.STORE_BOUNDARY WHERE CLIENT_CODE = '$Client_Code' AND PROJECT = (SELECT PROJECT FROM DISTRIBUTION.DBO.WEB_CLIENT_PROJECT WHERE CLIENT_CODE = 'JY') AND STORE = '$Store' AND BOUND_ID1 = 0 ORDER BY BOUND_ID";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		echo "No boundry data found for this store ttt";
         die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	$STR .= " new google.maps.LatLng(" ;
		$STR .= $row['LAT'] ;
		$STR .= "," ;
		$STR .= $row['LONG'] ;
		$STR .= ")," ;
		$ICOUNT = 1;
	}
	IF ($ICOUNT === 1)
	{	$STR	= substr($STR, 0, -1) ;
	}
	$STR .= "]" ;
	
?>	

