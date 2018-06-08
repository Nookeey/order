<?php session_start(); opcache_reset(); ob_start();?>

<?php include('templates/_head.php'); ?>


<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="post" action="php/login.php" id="formLogin">
					<p>Zaloguj sie do panelu:</p>
					<div class="input-group">
				      <input type="text" class="form-control" placeholder="Haslo" name="haslo">
				      <!-- <span class="input-group-btn">
				        <button id="btnLogin" class="btn btn-secondary" type="button">Zaloguj</button>
				      </span> -->
				    </div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
