<?php
$host = "localhost"; //ip adresiniz.
$user = "root"; //database myphp userınız
$pass = ""; //şifresi
$db = "api_egitim"; //database adınız:

try {
	$db = new PDO("mysql:host=$host;dbname=$db", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}catch(PDOException $e) {
	echo $e->getMessage();
}
error_reporting(0);
?>
