<?php 
ob_start();
require_once "connect.php";


$sql = "UPDATE orders SET zaplacil = :zaplacil WHERE id = :id";
$stmt = $pdo->prepare($sql);                                  
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_STR);        
$stmt->bindParam(':zaplacil', $_POST['zaplacil'], PDO::PARAM_STR);                
$stmt->execute(); 
ob_end_flush();

?>