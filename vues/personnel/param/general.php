<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
  <section class="param-infos">
    <div class="wrapper1">
	<div class="header">
    <h1 class="title">Informations générales</h1>
     <i class="fa fa-info"></i>
	</div>
  <div class="personal-info col-xs-12">
  	<img src="../vues/app/img/defaut/inconnu.jpg" alt=""/>
    <h1 class="col-xs-12"><?php echo $nom_prenom_user[0]; ?></h1>
  </div>
  <div class="other-info">
  	<div class="service"><h3><b>Service : </b><i><?php echo $infos_user[4];?></i></h3></div>
    <div class="mail"><h3><b>Email: </b><i><?php echo $infos_user[5];?></i></h3></div>
    <div class="vehicule"><h3><b>Véhicule utilisé : </b><i><?php echo $user_vehicule[2]." - ".$user_vehicule[3]." - ".$user_vehicule[1];?></i></h3></div>
    <div class="immatriculation"><h3><b>Immatriculation : </b><i><?php echo $user_vehicule_infos[1];?></i></h3></div>
    <div class="km"><h3><b>Kilometrage du véhicule : </b><i><?php echo $user_vehicule_infos[4]." Km";?></i></h3></div>
  </div>
  
</div>
  </section>
</div>

<nav class="navbar navbar-fixed-bottom navbar-light bg-faded animated fadeIn">
  <a href="./disconnect">
    <button class="button button--tamaya button--border-thick button--red" data-text="Sortir">
      <?php echo 'Deconnexion'; ?>
    </button>
  </a>
  <button class="button button--tamaya button--border-thick button--blue open-modal" data-text="Protection" data-toggle="modal" data-target="#modalperso">À savoir</button>
  <div class="brand info-connection">Bienvenue dans votre interface d'administration
    <?php echo $nom_prenom_user[0]; ?>
  </div>
</nav>