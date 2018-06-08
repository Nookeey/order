<?php session_start(); include('../php/connect.php'); ?>

<?php 
$adminData = $pdo->query('SELECT * FROM admin');
$admin = $adminData -> fetch(PDO::FETCH_ASSOC);


$suma = 0;
$stmt = $pdo->query('SELECT * FROM orders WHERE status=1');
foreach($stmt as $row) { 
	$suma += $row['cena'];
}
$sumaDostawa = $suma + $admin['dostawa']; 
		
?>
	
	<div class="list-group">
	  <?php if ($_SESSION["page"] == "admin"){ ?>
	  	<a href="php/logout.php"><button type="button" class="btn btn-outline-warning" id="btnLogOut">Wyloguj</button></a>
	  <?php } ?>
	  <p class="list-group-item active">
	    Informacje
	  </p>
	  <p class="list-group-item list-group-item-action"><strong>Zamawia: </strong><?= $admin['imie'] ?></p>
	  <p class="list-group-item list-group-item-action"><strong>Miejsce: </strong><a href="<?= $admin['link'] ?>" target="_blank"><?= $admin['miejsce'] ?></a></p>
	  <p class="list-group-item list-group-item-action"><strong>Nr. Tel: </strong><?= $admin['tel'] ?></p>
	  <p class="list-group-item list-group-item-action"><strong>Deadline: </strong><?= $admin['deadline'] ?></p>
	  <p class="list-group-item list-group-item-action" id="formDostawa">
	  	<?php if ($_SESSION["page"] == "admin"){ ?>
	  		<strong>Dostawa: </strong>
	  		<input type="text" name="dostawa" id="inputDostawa" value="<?= $admin['dostawa'] ?>" >
	  	<?php } else { ?>
			<strong>Dostawa: </strong><?= $admin['dostawa'] ?>
	  	<?php } ?>
	  </p>
	  <p class="list-group-item list-group-item-action">
	  	<strong>Pozostało czasu: 
		  	<span id="clockdiv" style=" ">
	          <span id="hours"></span> <span id="minutes"></span> <span id="seconds"></span>
	        </span>
		</strong>
	  </p>
	  <?php if ($_SESSION["page"] == "admin"){ ?>
	  	<button type="button" class="btn btn-outline-primary bae" data-toggle="modal" data-target="#modalSetAdminData">Edytuj</button>
	  <?php } ?>
	</div>

	<div class="podsumowanie">
		<div class="list-group">
		   	<p class="list-group-item active">Podsumowanie zamówienia</p>
		    <p class="list-group-item list-group-item-action"><strong>Suma: </strong><?= $suma ?> zł</p>
		    <p class="list-group-item list-group-item-action"><strong>Suma z dostawa: </strong><?= $sumaDostawa ?> zł</p>
		    <p class="list-group-item list-group-item-action"><strong>Dostawa: </strong><?= $admin['dostawa'] ?></p> 
		</div>
	</div>
	