<div class="row">
	<div class="col-md2 col-md-offset-5">
		<img src="../vues/app/img/rolling.svg" alt="Loader" class="loader animated fadeOut">
	</div>
</div>

<nav class="navbar navbar-fixed-bottom navbar-light bg-faded animated fadeIn">
	<a href="./disconnect">
	    <button class="button button--tamaya button--border-thick button--red" data-text="Sortir"><?php echo 'Deconnexion'; ?></button>
    </a>
	<button class="button button--tamaya button--border-thick button--blue open-modal" data-text="Protection" data-toggle="modal" data-target="#modalperso">À savoir</button>
	<div class="brand info-connection">Bienvenue dans votre interface d'administration <?php echo $nom_prenom_user[0]; ?></div>
</nav>