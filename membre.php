<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MSL - Gestion Web</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="app/css/bootstrap.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="app/css/style.css">
		<!-- Bootstrap CSS -->
		<script src="app/js/bootstrap.js"></script>
		<script src="app/js/jquery-3.1.1.min.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		

		<nav class='sidebar sidebar-menu-collapsed'>
      <a href='#' id='justify-icon'>
        <span class='glyphicon glyphicon-align-justify'></span>
      </a>
      <ul>
        <li class='active'>
          <a class='expandable' href='#' title='Dashboard'>
            <span class='glyphicon glyphicon-home collapsed-element'></span>
            <span class='expanded-element'>Acceuil</span>
          </a>
        </li>
        <li>
          <a class='expandable' href='#' title='APIs'>
            <span class='glyphicon glyphicon-wrench collapsed-element'></span>
            <span class='expanded-element'>API</span>
          </a>
        </li>
        <li>
          <a class='expandable' href='#' title='Settings'>
            <span class='glyphicon glyphicon-envelope collapsed-element'></span>
            <span class='expanded-element'>Courriel</span>
          </a>
        </li>
        <li>
          <a class='expandable' href=<?php if(isset($_SESSION['connecte']))
					{
						if ($_SESSION['connecte'] === '1') {
							echo '\'membre.php\'';
						}
						else{
							echo '\'index.php\'';
						}
					} ?> title='Account'>
            <span class='glyphicon glyphicon-user collapsed-element'></span>
            <span class='expanded-element'>
				<?php
					if(isset($_SESSION['connecte']))
					{
						if ($_SESSION['connecte'] === '1') {
							echo $_SESSION['username'];
						}
						else{
							echo 'Connectez-vous';
						}
					}
					?>
            </span>
          </a>
        </li>
      </ul>
      <a href='#' id='logout-icon' title='Logout'>
        <span class='glyphicon glyphicon-off'></span>
      </a>
    </nav>

		<nav class="navbar navbar-inverse navbar-fixed-bottom">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<?php
					if(isset($_SESSION['connecte']))
					{
						if ($_SESSION['connecte'] === '1') {
							echo 'Connecté en tant que <span class="text-primary">'.$_SESSION['username'].'</span> !';
						}
						else{
							echo 'Vous n\'êtes pas connecté';
						}
					}
					?>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<a class="navbar-brand" href="index.php">
								<?php
									if(isset($_SESSION['connecte']))
									{
										if ($_SESSION['connecte'] === '1') {
											echo '<span class="text-danger">Déconnexion</span>';
										}
										else{
											echo '<span class="text-danger">Connexion</span>';
										}
									}
								?>
							</a>
						</ul>
					</div>
				</div>
			</nav>
			<div class="container-fluid">
				<h1 class="text-center">
				<span id="titre">MSL</span> - Gestionnaire 
			</button></a>
			<!-- Boutton pour activer la boîte de dialog -->
			<button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">
			À savoir | Important
			</button>
			</h1>
		</div>
		<!-- Boîte de dialogue -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Informations importantes</h4>
					</div>
					<div class="modal-body">
						<u>Il est important de respecter les règles suivantes : </u><br><br>

						- Utilisez un mot de passe unique pour chaque service. En particulier, l’utilisation d’un même mot de passe entre sa messagerie professionnelle et sa messagerie personnelle est impérativement à proscrire.
<br><br>
						- Choisissez un mot de passe qui n’a pas de lien avec vous (mot de passe composé d’un nom de société, d’une date de naissance, etc.).
<br><br>
						- Ne demandez jamais à un tiers de générer pour vous un mot de passe.
<br><br>
						- Modifiez systématiquement et au plus tôt les mots de passe par défaut lorsque les systèmes en contiennent.
<br><br>
						- Renouvelez vos mots de passe avec une fréquence raisonnable. Tous les 90 jours est un bon compromis pour les systèmes contenant des données sensibles.
						Ne stockez pas les mots de passe dans un fichier sur un poste informatique particulièrement exposé au risque (exemple : en ligne sur Internet), encore moins sur un papier facilement accessible.
<br><br>
						- Ne vous envoyez pas vos propres mots de passe sur votre messagerie personnelle.
<br><br>
						- Configurez les logiciels, y compris votre navigateur web, pour qu’ils ne se "souviennent" pas des mots de passe choisis.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">C'est compris</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	<!-- jQuery -->
	<script src="app/js/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="app/js/bootstrap.js"></script>
	<script src="app/js/jquery-3.1.1.min.js"></script>
	<script src="app/js/nav-left.js"></script>
</html>