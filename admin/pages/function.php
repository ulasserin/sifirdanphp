<?php
 session_start();
$servername      = 'localhost';
$database        = 'udemy';
$username        = 'root';
$password        = '';
//!PDO CONNECTION 

try {

	try {
		$dbh = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->query("SET NAMES utf8");

	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
		
	}
} catch (\Throwable $th) {
	throw $th;

}

function session_check(){
    if( !isset($_SESSION['giriskontrol']) ):
        echo 'Not authorized! You\'ll be redirected in 5 seconds...';
        header('refresh: 5; url=login.php');
        die();
    endif;
}