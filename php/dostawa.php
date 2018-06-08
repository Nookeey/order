<?php
ob_start();
require_once "connect.php";

$sql = "UPDATE admin SET dostawa = :dostawa";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':dostawa', $_POST['dostawa'], PDO::PARAM_INT);
$stmt->execute();

exit;
ob_end_flush();
?>