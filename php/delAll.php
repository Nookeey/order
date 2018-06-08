<?php 
ob_start();
require_once "connect.php";


$sql = "DELETE FROM orders";
$stmt = $pdo->prepare($sql);
$stmt->execute();


exit;
ob_end_flush();
?>