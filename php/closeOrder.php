<?php 

ob_start();
require_once "connect.php";

if (isset($_POST['modalCloseOrder'])) {
	$gets = $_POST['gets'];

	$true = 1;

	$sql = "UPDATE test_order SET zamowione = :zamowione";
	$stmt = $pdo->prepare($sql);                                     
	$stmt->bindParam(':zamowione', $true);                
	$stmt->execute(); 

	header("Location: ../admin/index.php?s=$gets");
	exit;
}

if (isset($_GET['s'])) {
	$gets = $_GET['s'];

	$true = 0;

	$sql = "UPDATE test_order SET zamowione = :zamowione";
	$stmt = $pdo->prepare($sql);                                     
	$stmt->bindParam(':zamowione', $true);                
	$stmt->execute(); 

	header("Location: ../admin/index.php?s=$gets");
	exit;
}

if (isset($_POST['endTime'])) {

	$true = 1;

	$sql = "UPDATE test_order SET zamowione = :zamowione";
	$stmt = $pdo->prepare($sql);                                     
	$stmt->bindParam(':zamowione', $true);                
	$stmt->execute(); 

	
	exit;
} 
ob_end_flush();
?>