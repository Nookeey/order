<?php 
ob_start();
require_once "connect.php";

if (isset($_POST['setAdminUrl'])) {

	$status = 1;
	$url = strip_tags($_POST['url']);

	$sql = "UPDATE test_order SET set_admin = :set_admin, admin_url = :admin_url ";
	$stmt = $pdo->prepare($sql);                                  
	$stmt->bindParam(':set_admin', $status);        
	$stmt->bindParam(':admin_url', $url);      
	$stmt->execute(); 

	header("Location: ../admin/index.php?s=$url");
    exit;
}
ob_end_flush();

?>