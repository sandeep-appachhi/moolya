<?php 

// Start session if not exists
if( !isset( $_SESSION ) ) session_start();

error_reporting(E_ALL);

$domain = preg_replace('/^www\./','',$_SERVER['SERVER_NAME']);
$protocol = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) ? 'https:' : 'http:';

switch ($domain) {
	case 'localhost': 
					$baseUrl = $protocol."//$domain/moolya/" ;
					$dbname = "moolya_db";
					$user = "sandy";
					$password = "root";
					$cacheDir = "$protocol//$domain/moolya/home/app/cache/";
					$viewsDir = "$protocol//$domain/moolya/home/app/views/";
					$publicDir = "$protocol//$domain/moolya/home/public/";
					
					break;
	case 'moolya.com' : $baseUrl = "//$domain/webskey/" ;
					$dbname = "sandeep";
					$user = "phpmyadmin";
					$password = "root";
					break;
	default:		$baseUrl = "//$domain/webskey/" ;
					$dbname = "sandeep";
					$user = "phpmyadmin";
					$password = "root";
					break;
}
	
return new \Phalcon\Config(array(
	'database' => array(
		'adapter'     => 'Mysql',
		'host'        => 'localhost',
		'username'    => $user,
		'password'    => $password,
		'dbname'      => $dbname
	),
	'application' => array(
		'domain' =>$domain,
		'baseUrl' =>$baseUrl,
		'cacheDir' =>$cacheDir,
		'viewsDir' => $viewsDir,
		'publicDir' => $publicDir )
	));

?>