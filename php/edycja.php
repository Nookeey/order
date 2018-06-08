<?php
ob_start();
require_once "connect.php";

if (isset($_POST['admin'])) {

	print_r($_POST);

	$sql = "UPDATE orders SET imie = :imie, co = :co, cena = :cena WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id', $_POST['id']);
	$stmt->bindParam(':imie', $_POST['imie']);
	$stmt->bindParam(':co', $_POST['co']);
	$stmt->bindParam(':cena', $_POST['cena']);
	$stmt->execute();


}
ob_end_flush();
?>