<?php
ob_start();

	$status = 0;
	$url = '';
	$sql = "UPDATE test_order SET set_admin = :set_admin, admin_url = :admin_url, zamowione = :zamowione";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':set_admin', $status, PDO::PARAM_INT);   
	$stmt->bindParam(':admin_url', $url);   
	$stmt->bindParam(':zamowione', $status);   
	$stmt->execute();

	$i = 1;

	$sql = "DELETE FROM test_order WHERE status2 = :status2";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':status2', $i, PDO::PARAM_INT);   
	$stmt->execute();

	$null = '';
	$sql = "UPDATE `test_order` SET `status3` = :status3";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':status3', $null, PDO::PARAM_INT);   
	$stmt->execute();

 ob_end_flush();
?>