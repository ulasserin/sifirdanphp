<?php
 session_start();

/* Sürücü isteğiyle bir MySQL veritabanına bağlanalım */
$dsn = 'mysql:dbname=udemy;host=localhost';
$user = 'root';
$password = '';

$dbh = new PDO($dsn, $user, $password);



$servername      = '';
$database        = '';
$username        = '';
$password        = '';
//!PDO CONNECTION 

try {

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conn->query("SET NAMES utf8");

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