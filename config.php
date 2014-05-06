<?php
session_start();
ini_set( "display_errors", true );

//SITE CONFIGURATIONS
date_default_timezone_set( "America/New_York" );  // http://www.php.net/manual/en/timezones.php
define( "DB_HOST", "localhost" ); 		//Database host
define( "DB_NAME", "php_orm" ); 		//Database username
define( "DB_USERNAME", "root" ); 		//Database username
define( "DB_PASSWORD", "password" );	//Database password

?>

