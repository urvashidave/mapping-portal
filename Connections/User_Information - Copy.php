<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_User_Information = "lin-mysql21.hostmanagement.net";
$database_User_Information = "db177009_DEALER";
$username_User_Information = "u177009_saDealer";
$password_User_Information = "Mfd@@1234";
$User_Information = mysql_connect($hostname_User_Information, $username_User_Information, $password_User_Information) or trigger_error(mysql_error(),E_USER_ERROR); 

class Connection{    
  private $internal_info = array(
    'UID' => 'Sa',
    'PWD' => '50nerfdarts',
  );
  private $internal_server = '10.10.1.10\DEALER, 1433';
 //private $internal_server = 'Swamp.safesecureweb.com'; // /Dealer';
  private $external_info = array(
    'UID' => 'Sa',
    'PWD' => '50nerfdarts',
	'Database' => 'DEALER',
  );
  private  $external_server = '72.143.59.108\12.0.2569, 1494'; // port 1494
  
  public function connect_external_mssql(){
    $conn = sqlsrv_connect($this->external_server, $this->external_info);
	if ($conn === false) {
		die (print_r( sqlsrv_errors(), true));
	}
    return $conn;
  }

  public function connect_internal_mssql(){
    $conn = sqlsrv_connect($this->internal_server, $this->internal_info);
	if ($conn === false) {
		die (print_r( sqlsrv_errors(), true));
	}
    return $conn;
  }
}


