<?php session_start(); opcache_reset(); ob_start(); include('php/connect.php');


// $adminData = $pdo->query('SELECT * FROM admin');
// $admin = $adminData -> fetch(PDO::FETCH_ASSOC);

// $data = $admin['data'];

// if ( $data < date("Y-m-d") ) include('php/delAll.php');

// USER ======================================================
$page = "user";
$_SESSION["page"] = "user";

// ADMIN ======================================================
if ( (isset($_GET['page'])) && ($_GET['page']='admin') ) { $_SESSION["page"] = "admin"; $page = "login"; }

if ( (isset($_SESSION['admin'])) && ($_SESSION['admin']=='admin')  ) { 

 	$page='admin';  
	$_SESSION["page"] = "admin"; 

}



// ============================================================

include('templates/index-'.$page.'.php');

ob_end_flush();
?>

