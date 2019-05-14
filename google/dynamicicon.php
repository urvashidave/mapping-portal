<?php 
session_start();
if (!isset($_SESSION['jy_pwd']) && $_SESSION['jy_store'] == true) {
    header("Location: index.php");
    exit;
}
?>


<?php
	$Client_Code = "JY";
	$Store = $_SESSION['jy_store'];
 
	$DISTRIBUTION2	= '[';
	$STORE_TARGET = 0;
	$TOTAL_DISTRIBUTION = 0;
	$IDIST = 0;
?>
<?php require_once('User_Connection.php'); ?>	
<?php	

$q = "select  A_DISTRIBUTION FROM DISTRIBUTION.DBO.WEB_CLIENT_PROJECT WHERE CLIENT_CODE = 'JY'";

$params = array($Client_Code, $Store);
	$stmt2 = sqlsrv_query( $conn, $q, $params);
	if( $stmt2=== false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	$row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC);
	
  
		 $proj = $row2['A_DISTRIBUTION'];


	$qmap_pc = "EXEC GOOGLE.DBO.p_Loading_Distribution @CLIENT_CODE = '$Client_Code' ,@PROJECT = '$proj'  ,@STORE = '$Store' ";

//$qmap_pc ="select * from dbo.DATA_STORE_ROUTE_INFO where CLIENT_CODE='JY' and PROJECT='$project' and store='$Store'";

//echo "select * from dbo.DATA_STORE_ROUTE_INFO where CLIENT_CODE='JY' and PROJECT='$project' and store='$Store'";
 //echo "<br>EXEC GOOGLE.DBO.p_Loading_Distribution @CLIENT_CODE = '$Client_Code' ,@PROJECT = '$Proj' ,@STORE = '$Store' ";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	$STORE_TARGET = $row['STORE_TARGET'];
		$TOTAL_DISTRIBUTION = $row['TOTAL_DISTRIBUTION'];
		$DISTRIBUTION2 .= "['" ;
		$DISTRIBUTION2 .= $row['FSALDU'] ;
		$DISTRIBUTION2 .= "','" ;
		$DISTRIBUTION2 .= $row['LAT'] ;
		$DISTRIBUTION2 .= "','" ;
		$DISTRIBUTION2 .= $row['LONG'] ;
		$DISTRIBUTION2 .= "','" ;
		$DISTRIBUTION2 .= $row['ROUTE'] ;
		$DISTRIBUTION2 .= "','" ;
		$DISTRIBUTION2 .= $row['DISTRIB_QTY'] ;
		$DISTRIBUTION2 .= "','" ;
		$DISTRIBUTION2 .= $row['ROUTE_RATE'] ;
		$DISTRIBUTION2 .= "','" ;
		$DISTRIBUTION2 .= $row['ROUTE_ID'] ;
		$DISTRIBUTION2 .= "','" ;
		$DISTRIBUTION2 .= $row['MFDCODE'] ;
		$DISTRIBUTION2 .= "']," ;
		$IDIST = 1;
	}
	IF ($IDIST === 1)
		{$DISTRIBUTION2	= substr($DISTRIBUTION2, 0, -1) ;}
	$DISTRIBUTION2 .= "]" ;

?>	

