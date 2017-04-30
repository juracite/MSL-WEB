<div class="wrapper animated fadeIn">
			<h1 class="title"></h1>
			<form class="form-signin" action="" method="POST">
				<img id="icon_connect" src="../vues/app/img/mascotte.png" />
				<h2 class="form-signin-heading">Connexion<br><small>Page d'administration</small></h2>
				
				<input type="text" class="form-control" name="username" placeholder="Identifiant" required="" autofocus=""/>
				<input type="password" class="form-control" name="password" placeholder="Mot de passe" required="" />
				<?php
					if(!empty($message)){
						echo $message;
						if(!empty($id_con)){
							header("refresh:2;url=administration");
						}
					}
				?>
				<button class="button button--tamaya button--border-thick button--blue button-connexion" data-text="Entrer" type="submit">Connexion</button>
			</form>
		</div>
		
		<nav class="navbar navbar-fixed-bottom navbar-light bg-faded">
			<a class="navbar-brand" href="#">Interface d'administration de Moret-sur-Loing</a>
		</nav>
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>

	<script>
		$(".sidebar").remove();
	</script>