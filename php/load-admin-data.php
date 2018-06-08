<?php
ob_start();
	$adminData = $pdo->query('SELECT * FROM admin');
	$admin = $adminData -> fetch(PDO::FETCH_ASSOC);

	$h = substr($admin['deadline'],0,2);
	$m = substr($admin['deadline'],3);
ob_end_flush();
?>

<div class="time">
  <input type="hidden" value="<?=$h?>" id="h">
  <input type="hidden" value="<?=$m?>" id="m">
</div>


