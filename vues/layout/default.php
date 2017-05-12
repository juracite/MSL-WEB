<!DOCTYPE html>
<html lang=""
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MSL - Gestionnaire</title>
    <!-- Bootstrap CSS -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">   
 <link rel="stylesheet" href="../vues/app/css/navbar-perso.css">
    
    <link rel="stylesheet" type="text/css" href="../vues/app/css/vicons-font.css" />
    <link rel="stylesheet" type="text/css" href="../vues/app/css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="../vues/app/css/animate.css" />

    <link rel="stylesheet" href="../vues/app/css/style.css">
	<link rel="stylesheet" type="text/css" href="../vues/app/css/style-test.css" />
    <link rel="icon" href="../vues/app/img/mascotte.png" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="shortcut icon" href="../vues/app/img/favicon.ico">
    <![endif]-->
</head>
<body class="segmenter">
    <nav class='sidebar sidebar-menu-expanded animated fadeIn'>
	<a href='#' id='justify-icon'>
		<span class='glyphicon glyphicon-align-justify'></span>
	</a>
	<ul>
		<li class='active'>
			<a class='expandable' href='./administration' title='Accueil'>
				<span class='glyphicon glyphicon-home collapsed-element'></span>
				<span class='expanded-element'>Accueil</span>
			</a>
		</li>
		<li>
			<a class='expandable' href='../personnel/param' title='Parametres'>
				<span class='glyphicon glyphicon-wrench collapsed-element'></span>
				<span class='expanded-element'>Paramètres</span>
			</a>
		</li>
		<li>
			<a class='expandable' href='../personnel/courriel' title='Courriel'>
				<span class='glyphicon glyphicon-envelope collapsed-element'></span>
				<span class='expanded-element'>Courriel</span>
			</a>
		</li>
		<li>
			<a class='expandable' href='../personnel/entretien' title='Entretien'>
				<span class='glyphicon glyphicon-list collapsed-element'></span>
				<span class='expanded-element'>Les entretiens</span>
			</a>
		</li>
<!--		<li>
			<a class='expandable' href='../personnel/compte' title='Compte'>
				<span class='glyphicon glyphicon-user collapsed-element'></span>
				<span class='expanded-element'><?php echo $nom_prenom_user[0]; ?></span>
			</a>
		</li>-->
	</ul>
    <img id="icon_membre" src="../vues/app/img/mascotte.png" />
</nav>

    <?php echo $content_for_layout; ?>

    <!-- Modal -->
<div id="modal">
	<div id="modal_content">
	<h1>Un mot de passe sécurisé </h1>
		Petite astuce : pour avoir un mot de passe très sécurisé, partez d’un mot qui fait au moins 8 caractères ou d’une phrase qui contient 8 mots. <br><br>

		Pour transformer votre mot de passe, voici quelques idées : <br><br>

		- Transformer les « S » en $ <br>
		- Transformer les « E » en € ou 3 <br>
		- Transformer les « l » en ! <br>
		- Transformer la lettre « O » en 0 <br>
		- Transformer les « i » en 1 <br>
		- Transformer les « B » en 8 <br>
		- Transformer les « P » en 9 <br>
		<a href="#" title="Close" id="close-modal">✖</a>
	</div>
</body>


<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="../vues/app/js/perso.js"></script>
	<!-- Bootstrap JavaScript -->
	<script type="text/javascript">
$(document).ready(function () {
    if(window.location.href.indexOf("compte") > -1) {
        $(".sidebar>ul>li.active").removeClass('active');
        $("body>nav").removeClass('animated');
        $(".sidebar>ul>li:eq(4)").addClass('active');
    }else if(window.location.href.indexOf("courriel") > -1) {
        $(".sidebar>ul>li.active").removeClass('active');
        $("body>nav").removeClass('animated');
	$(".sidebar>ul>li:eq(2)").addClass('active');
    }else if(window.location.href.indexOf("param") > -1) {	
        $(".sidebar>ul>li.active").removeClass('active');
        $("body>nav").removeClass('animated');
	$(".sidebar>ul>li:eq(1)").addClass('active');
    }else if(window.location.href.indexOf("change_prof") > -1) {	
        $(".sidebar>ul>li.active").removeClass('active');
        $("body>nav").removeClass('animated');
	$(".sidebar>ul>li:eq(1)").addClass('active');
    }else if(window.location.href.indexOf("entretien") > -1) {	
        $(".sidebar>ul>li.active").removeClass('active');
        $("body>nav").removeClass('animated');
	$(".sidebar>ul>li:eq(3)").addClass('active');
    }
});
</script>
	<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	 
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="Hello World"></script>
</html>