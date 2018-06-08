<?php 
ob_start();
header('Content-type: application/json');

require_once "connect.php";

$stmt = $pdo->query('SELECT * FROM test_order WHERE status2 = 0 ORDER BY co');
ob_end_flush();
?>