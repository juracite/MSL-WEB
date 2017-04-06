<div class="row">
	<div class="col-md2 col-md-offset-5">
		<img src="../vues/app/img/rolling.svg" alt="Loader" class="loader animated fadeOut">
	</div>
</div>
<div class="row row-perso animated fadeIn">
	<figure class="snip1344"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample1.jpg" alt="profile-sample1" class="background"/><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample1.jpg" alt="profile-sample1" class="profile"/>
		<figcaption>
		<h3><?php echo $nom_prenom_user[0]; ?><span>Engineer</span></h3>
		<div class="icons"><a href="#"><i class="ion-social-reddit-outline"></i></a><a href="#"> <i class="ion-social-twitter-outline"></i></a><a href="#"> <i class="ion-social-vimeo-outline"></i></a></div>
		</figcaption>
	</figure>
</div>
<nav class="navbar navbar-fixed-bottom navbar-light bg-faded animated fadeIn">
	<a href="./disconnect">
		<button class="button button--tamaya button--border-thick button--red" data-text="Sortir"><?php echo 'Deconnexion'; ?></button>
	</a>
	<button class="button button--tamaya button--border-thick button--blue open-modal" data-text="Protection" data-toggle="modal" data-target="#modalperso">À savoir</button>
	<div class="brand info-connection">Bienvenue dans votre interface d'administration <?php echo $nom_prenom_user[0]; ?></div>
</nav>