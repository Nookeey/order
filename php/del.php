<?php 
ob_start();
require_once "connect.php";


$sql = "DELETE FROM orders WHERE id =  :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
$stmt->execute();


exit;
ob_end_flush();
?>