<?php

ob_start();

require_once "connect.php";

$sql = "UPDATE orders SET status = 1 WHERE id = :id";
$gets = $_GET['s'];
$stmt = $pdo->prepare($sql);                                  
$stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);        
$stmt->execute(); 


exit;

ob_end_flush();

?>