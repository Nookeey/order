<?php


$mysql_host = '';
$port = '3306';
$username = '';
$password = '';
$database = '';

try{
	$pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
}catch(PDOException $e){
	echo 'Połączenie nie mogło zostać utworzone.<br />';
}
?>

