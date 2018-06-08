<?php
ob_start();
	require_once "connect.php";
    
    $status3 = strip_tags($_POST['status3']);
    $gets = $_POST['gets'];

        
    $sql = "UPDATE test_order SET status3 = :status3";
    $stmt = $pdo->prepare($sql);  
    $stmt -> bindValue(':status3', $status3);

    $stmt->execute(); 

	header("Location: ../admin/index.php?s=$gets");
    exit;
ob_end_flush();
?>