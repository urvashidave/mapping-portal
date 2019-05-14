<?php 
  session_start();
  if (!isset($_SESSION['jy_pwd']) && $_SESSION['jy_store'] == true) {
      header("Location: index.php");
      exit;
  }
  $j=0;
  $k=0;
  $totalval ='';
  /*$FSA2	= '[';
  $FSA3 = '[';
  $FSA4 = '[';
  $FSA5 = '[';
  $FSA6 = '[';
  $FSA7 = '[';
  $FSA8 = '[';
  $FSA9 = '[';
  $FSA10 = '[';
  $FSA11 = '[';*/
  $ICOUNT	= 0;

  require_once('User_Connection.php'); 
  $q = "select  * FROM DISTRIBUTION.DBO.WEB_CLIENT_PROJECT WHERE CLIENT_CODE = 'JY'";

    $params = array($Client_Code, $Store);
  	$stmt2 = sqlsrv_query( $conn, $q, $params);
  	if( $stmt2=== false ) 
  	{
       		die( print_r( sqlsrv_errors(), true));
  	}
  	$row2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC);

  		 $proj = $row2['PROJECT'];
//get list of fsa
  	$qmap_pc = "select fsa from google.dbo.CLIENT_FSA where store= '$Store' and client_code='JY' and project='$proj'";
    $qmap_pc3 = "select COUNT(*) AS fsa from google.dbo.CLIENT_FSA where store= '$Store' and client_code='JY' and project='$proj'";

     // echo "select COUNT(*) from google.dbo.CLIENT_FSA where store= '$Store' and client_code='JY' and project='$proj'";

      $params = array($Client_Code, $Store);
      $stmt = sqlsrv_query( $conn, $qmap_pc);

    $stmt3 = sqlsrv_query( $conn, $qmap_pc3);
  	 if( $stmt === false ) 
  	{
       		die( print_r( sqlsrv_errors(), true));
    }

    $row3 = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_ASSOC);
    $total = $row3['fsa'];
    $i=0;

  	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
  	{ 

          $i++;
          $fsa = $row['fsa'];

          if($fsa!='N/A'){
          if($i == ($total))
          {
              $ids.= "'".$fsa."'";
          }
          else{
           $ids.= "'".$fsa."',";
          }
        }

    }
    $str_arr = explode (",", $ids);  
    $totalval =  count($str_arr);
    
    //echo($str_arr[i]); 
    foreach($str_arr as $value){

        //echo $j;
        $FSA[$j]	= '[';
        //print $value."\n";
      
      

      //boundry for selected fsa1
          $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[$j]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
         //echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[$j]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
        // echo "<br/><br/>";
          $params2 = array($Client_Code, $Store);
          $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
          if( $stmt2 === false ) 
          {
                   die( print_r( sqlsrv_errors(), true));
          }
          while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
          {
              $FSA[$j] .= " new google.maps.LatLng(" ;
              $FSA[$j] .= $row['LAT'] ;
              $FSA[$j] .= "," ;
              $FSA[$j] .= $row['LONG'] ;
              $FSA[$j] .= ")," ;
              $ICOUNT = 1;
              $FSA2[$k]=$row['FSA'].',';
          }
          $FSA3[$k].=$FSA2[$k];
          IF ($ICOUNT === 1)
          {	$FSA[$j]	= substr($FSA[$j], 0, -1) ;
          }
          $FSA[$j] .= "]";
          
          //echo $FSA[$j];
         // echo "<br/>";
         // echo "<br/>";
          $j++;
        }
        //echo $FSA[1];
      // echo "Total FSA:".$j;
        ?>


<?php
          //boundry for selected fsa2

         /* $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[2]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
         // echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[2]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
        $params2 = array($Client_Code, $Store);
        $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
        if( $stmt2 === false ) 
        {
                 die( print_r( sqlsrv_errors(), true));
        }
        while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
        {
            $FSA2 .= " new google.maps.LatLng(" ;
            $FSA2 .= $row['LAT'] ;
            $FSA2 .= "," ;
            $FSA2 .= $row['LONG'] ;
            $FSA2 .= ")," ;
            $ICOUNT = 1;
        }
        IF ($ICOUNT === 1)
        {	$FSA2	= substr($FSA2, 0, -1) ;
        }
        $FSA2 .= "]" ;

         // echo $FSA2;
    
      //boundry for selected fsa3

       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[3]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
      // echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[3]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA3 .= "new google.maps.LatLng(" ;
           $FSA3 .= $row['LAT'] ;
           $FSA3 .= "," ;
           $FSA3 .= $row['LONG'] ;
           $FSA3 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA3	= substr($FSA3, 0, -1) ;
       }
       $FSA3 .= "]" ;

       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[4]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
      // echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[4]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA4 .= "new google.maps.LatLng(" ;
           $FSA4 .= $row['LAT'] ;
           $FSA4 .= "," ;
           $FSA4 .= $row['LONG'] ;
           $FSA4 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA4	= substr($FSA4, 0, -1) ;
       }
       $FSA4 .= "]" ;


       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[5]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       //echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[5]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA5 .= "new google.maps.LatLng(" ;
           $FSA5 .= $row['LAT'] ;
           $FSA5 .= "," ;
           $FSA5 .= $row['LONG'] ;
           $FSA5 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA5	= substr($FSA5, 0, -1) ;
       }
       $FSA5 .= "]" ;


       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[6]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       //echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[6]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA6 .= "new google.maps.LatLng(" ;
           $FSA6 .= $row['LAT'] ;
           $FSA6 .= "," ;
           $FSA6 .= $row['LONG'] ;
           $FSA6 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA6	= substr($FSA6, 0, -1) ;
       }
       $FSA6 .= "]" ;


       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[7]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
      // echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[7]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA7 .= "new google.maps.LatLng(" ;
           $FSA7 .= $row['LAT'] ;
           $FSA7 .= "," ;
           $FSA7 .= $row['LONG'] ;
           $FSA7 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA7	= substr($FSA7, 0, -1) ;
       }
       $FSA7 .= "]" ;


       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[8]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
      // echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[8]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA8 .= "new google.maps.LatLng(" ;
           $FSA8 .= $row['LAT'] ;
           $FSA8 .= "," ;
           $FSA8 .= $row['LONG'] ;
           $FSA8 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA8	= substr($FSA8, 0, -1) ;
       }
       $FSA8 .= "]" ;


       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[9]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       //echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[9]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA9 .= "new google.maps.LatLng(" ;
           $FSA9 .= $row['LAT'] ;
           $FSA9 .= "," ;
           $FSA9 .= $row['LONG'] ;
           $FSA9 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA9	= substr($FSA9, 0, -1) ;
       }
       $FSA9 .= "]" ;


       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[10]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
      // echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[10]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
       $params2 = array($Client_Code, $Store);
       $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
       if( $stmt2 === false ) 
       {
                die( print_r( sqlsrv_errors(), true));
       }
       while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
       {   
           $FSA10 .= "new google.maps.LatLng(" ;
           $FSA10 .= $row['LAT'] ;
           $FSA10 .= "," ;
           $FSA10 .= $row['LONG'] ;
           $FSA10 .= ")," ;
           $ICOUNT = 1;
       }
       IF ($ICOUNT === 1)
       {	$FSA10	= substr($FSA10, 0, -1) ;
       }
       $FSA10 .= "]" ;


       $qmap_pc2 = "select * from google.dbo.FSA_BOUNDARY where fsa IN('V0N') and BOUND_ID1 = 18 ORDER BY FSA,BOUND_ID";
       // echo "select * from google.dbo.FSA_BOUNDARY where fsa IN($str_arr[10]) and BOUND_ID1 = 0 ORDER BY FSA,BOUND_ID";
        $params2 = array($Client_Code, $Store);
        $stmt2 = sqlsrv_query( $conn, $qmap_pc2, $params2);
        if( $stmt2 === false ) 
        {
                 die( print_r( sqlsrv_errors(), true));
        }
        while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ) 
        {   
            $FSA11 .= "new google.maps.LatLng(" ;
            $FSA11 .= $row['LAT'] ;
            $FSA11 .= "," ;
            $FSA11 .= $row['LONG'] ;
            $FSA11 .= ")," ;
            $ICOUNT = 1;
        }
        IF ($ICOUNT === 1)
        {	$FSA11	= substr($FSA11, 0, -1) ;
        }
        $FSA11 .= "]" ;

*/
     
  ?>