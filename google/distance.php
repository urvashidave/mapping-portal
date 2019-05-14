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
		}
	


$lat=$_POST['latv'];
$long=$_POST['longv'];
$details = "https://maps.googleapis.com/maps/api/distancematrix/json?key=AIzaSyCBeIvJweS4ZzyJRvBA7kZnryBH-SZzbFw&origins=".$lat.",".$long."&destinations=".$UStore_Lat.",".$UStore_Long."&mode=driving&sensor=false";


$json = file_get_contents($details);

$details = json_decode($json, TRUE);

echo "<table class='table table-hover' border='1' >";
echo "<tr>";
        echo "<th class='bg-danger'><center><b>DISTANCE</b></center></th><td>";
        echo ($details['rows'][0]['elements'][0]['distance']['text'])."</td></tr><tr><th class='bg-danger'><center><b>DURATION</b></center></th><td>";
        echo ($details['rows'][0]['elements'][0]['duration']['text']).'</td></tr></table>';



?>