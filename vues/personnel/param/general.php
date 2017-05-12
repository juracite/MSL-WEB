<div class="personal-info">
  <a href="./change_prof">
    <div class="profile-pic" style=<?php if($user_avatar){echo "\"background-image: url('../vues/app/img/utilisateurs/" . $infos_user[9] ."/" . $user_avatar[0][0] ."')\"";} else {echo "\"background-image: url('../vues/app/img/defaut/inconnu.jpg')\"";} ?>>

      <span class="glyphicon glyphicon-camera"></span>
      <span>Changer</span>

    </div>
  </a>
  <h1><?php echo $nom_prenom_user[0]; ?></h1>
</div>

<div class="container">
  <section class="param-infos">
    <div class="wrapper1">
	<div class="header">
    <h1 class="title">Informations générales</h1>
	</div>
  <div class="other-info">
    <div class="service"><h3><b>Service : </b><i><?php echo $infos_user[4];?></i></h3></div>
    <div class="mail"><h3><b>Email: </b><i><?php echo $infos_user[5];?></i></h3></div>
    <div class="vehicule"><h3><b>Véhicule utilisé : </b><i><?php echo $user_vehicule[2]." - ".$user_vehicule[3]." - ".$user_vehicule[1];?></i></h3></div>
    <div class="immatriculation"><h3><b>Immatriculation : </b><i><?php echo $user_vehicule_infos[1];?></i></h3></div>
    <div class="km"><h3><b>Kilometrage du véhicule : </b><i><?php echo $user_vehicule_infos[4]." Km";?></i></h3></div>

     <?php 
     if(isset($_POST['change-ok'])){
        echo '<div class="container-fluid">';
            echo '<form action="" method="post">';
            
                echo '<div class="form-group">';
                    echo '<label class="pull-left" for="mdp-new">Nouveau mot de passe :</label>';
                    echo '<input type="password" class="form-control" name="mdp" placeholder="Nouveau mot de passe" autofocus="" id="mdp-new"/>';
                echo '</div>';
                
                echo '<div class="form-group">';
                    echo '<label class="pull-left" for="mdp-new">Nouvel email :</label>';
                    echo '<input type="text" class="form-control" name="email" placeholder="Nouvel email" autofocus="" id="mdp-new"/>';
                echo '</div>';
                
                echo '<input type="submit" class="btn btn-primary changer-info pull-left" value="Accepter" name="change-ok-fini">';
                echo '<input type="submit" class="btn btn-danger changer-info pull-right" value="Annuler" name="change-canceled">';
            echo '</form>';
            echo '<cite title="Information">Vous pouvez laisser les champs vide si certains changements ne sont pas voulu</cite>';
        echo '</div>';
     } else if(!isset($_POST['change-ok'])) {
        if(isset($status)){
            echo $status;
        }
        echo '<form action="" method="post">';
            echo '<input type="submit" class="btn btn-primary changer-info" value="Changer de mot de passe & d\'Email" name="change-ok">';
        echo '</form>';
     } else {
     }
    ?>
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