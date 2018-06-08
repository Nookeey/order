<?php 
ob_start();
require_once "connect.php";
$gets = $_POST['gets'];

$sql = "UPDATE test_order SET przesylka = :przesylka";
$stmt = $pdo->prepare($sql);                                  
$stmt->bindParam(':przesylka', $_POST['przesylka'], PDO::PARAM_INT);        
$stmt->execute(); 

header("Location: ../admin/index.php?s=$gets");

exit;
ob_end_flush();
?>