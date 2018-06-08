<?php
	session_start();

	ob_start();
	
	require_once "connect.php";

	$newHaslo = $_POST['haslo'];

	$adminData = $pdo->query('SELECT * FROM admin');
	$admin = $adminData -> fetch(PDO::FETCH_ASSOC);

	$data = $admin['data'];
	$curHaslo = $admin['haslo'];
 	
	$curData = date('Y-m-d');

	

	if ( $curData != $data ) {

		if ($curHaslo != $newHaslo) {
			$sql = "UPDATE admin SET haslo = :haslo, data = :data WHERE id = 1";
			$stmt = $pdo->prepare($sql);                                  
			$stmt->bindParam(':haslo', $_POST['haslo'], PDO::PARAM_STR);        
			$stmt->bindParam(':data', $curData);           
			$stmt->execute();

			$_SESSION['admin']='admin'; 

			header("Location: ../index.php");    
			exit;
		} 
	} else if ( $curHaslo == $newHaslo ) {

			$_SESSION['admin']='admin'; 

			header("Location: ../index.php");    
			exit;

	} else if (  $curData == $data ){
		echo 'Dzis juz mamy admin! <br>';
		echo '<div style="position: absolute; bottom: 0; right: 0; color: transparent; font-size: 0px;">'.$curHaslo.'</div>';
	}

	ob_end_flush();

?>