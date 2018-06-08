<?php
ob_start();
	require_once "connect.php";
	
	$sql = "UPDATE admin SET imie = :imie, miejsce = :miejsce, link = :link, tel = :tel, deadline = :deadline WHERE id = 1";
	$stmt = $pdo->prepare($sql);                                  
	$stmt->bindParam(':imie', $_POST['imie'], PDO::PARAM_STR);        
	$stmt->bindParam(':miejsce', $_POST['miejsce'], PDO::PARAM_STR);        
	$stmt->bindParam(':link', $_POST['link'], PDO::PARAM_STR);        
	$stmt->bindParam(':tel', $_POST['tel']);       
	$stmt->bindParam(':deadline', $_POST['deadline']);       
	$stmt->execute(); 

ob_end_flush();
?>