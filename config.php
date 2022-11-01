<?php 


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');


$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if ($con == false) {
	
	die('database not connected' . mysqli_connect_error());
}

else{

	//echo "connected";
}


?>