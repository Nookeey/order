<?php 
include('connect.php');
 if (isset($_POST['showNofi'])){
 	$adminData = $pdo->query('SELECT * FROM admin');
	$admin = $adminData -> fetch(PDO::FETCH_ASSOC);
    $stmt = $pdo->query('SELECT * FROM orders WHERE status=0');
    $count = $stmt->rowCount();
    if ($count > 0) { 
		echo '<script>
		    Push.create("Nowe zamowienie!",{
		      body: "'.$admin['imie'].' akceptuj !!!",
		      icon: "iconn.ico",
		      timeout: 4000,
		      onClick: function () {
		        window.location="http://10.0.0.200/order/";
		        this.close();
		      }
		    });
		  </script>';
    }
}
?>