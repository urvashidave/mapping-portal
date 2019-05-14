<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
.table.table-hover {

font-size: 11px;
width: 100%;
border:solid dotted;
font-family: Arial Narrow,Arial,sans-serif !important;line-height: 0.8;
}
.table{
	padding:2px !important;
}
c,b{
	font-size:13px;
}
</style>
<?php 

ini_set('max_execution_time', 300);
session_start();
$pcode = $_POST['pcode'];
$route = $_POST['route'];
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
	
	echo "<table class='table table-hover' border='1' >";
	echo "<thead><tr class='bg-danger'><th colspan='2'><center><b>PCODE SALES</b></center></th></tr><tr class=''><th><b>SALES </b></th><th><b>\$/HHLD/WEEK </b></th></tr></thead><tbody>";
	$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
	
	$LDUsales = $row['LDU_SALES'];
	$LDUsales_round = number_format($LDUsales,2,'.',',');
	$LDU_SALES_HHLD_WEEK = $row['LDU_SALES_HHLD_WEEK'];
	$LDU_SALES_HHLD_WEEK_ROUND = number_format($LDU_SALES_HHLD_WEEK,2,'.',',');


		 echo "<tr><td>$".$LDUsales_round.'</td>';
		 echo "<td>$".$LDU_SALES_HHLD_WEEK_ROUND.'</td></tr>';	
		 echo "</tbody></table>";

	$qmap_pc2  =  "EXEC DBO.p_Web_PostalCode_Analysis_Report
	@CLIENT_CODE	= 'JY'
	,@FSALDU		= '$pcode'";//echo "select * from ANALYSIS.DBO.PINPOINT_SALES where CLIENT_CODE='JY' AND PROJECT='JY863' AND STORE='$Store' AND ROUTE='$route'";
	$params = array($Client_Code, $Store);
	$stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params);
	if( $stmt2=== false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}

	echo "<table class='table table-hover' border='1'>";
	echo "<thead><tr class='bg-danger'><th colspan='3'><center><b>ROUTE SALES</b></center></th></tr><tr class=''><th><b>ROUTE </b></th><th><b>SALES </b></th><th><b>\$/HHLD/WEEK </b></th></tr></thead><tbody>";
	while($row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC)){
		
		$route = $row2['ROUTE'];		
		$sales = ($row2['SALES']);
		$sales_round =number_format($sales, 2, '.', ',');

		$hhld_week = ($row2['SALES_HHLD_WEEK']);
		$hhld_week_round = number_format($hhld_week, 2, '.', ',');

		 echo "<tr><td>".$route.'</td>';
		 echo "<td>$".$sales_round.'</td>';
		 echo "<td>$".$hhld_week_round.'</td></tr>';
		
	}

?>	
</tbody></table>
		
	
  
  
 