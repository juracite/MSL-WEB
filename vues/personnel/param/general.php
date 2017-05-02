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
    <?php if(isset($_POST['change-ok'])){ 
      echo '
      <input type="text" name="" id="input1/(\w+)/\u\1/g" class="form-control input-pers" value="" required="required" pattern="" title="" placeholder="Service">
      ';
     }?>
    <div class="mail"><h3><b>Email: </b><i><?php echo $infos_user[5];?></i></h3></div>
    <?php if(isset($_POST['change-ok'])){ 
      echo '
      <input type="text" name="" id="input1/(\w+)/\u\1/g" class="form-control input-pers" value="" required="required" pattern="" title="" placeholder="Service">
      ';
     }?>
    <div class="vehicule"><h3><b>Véhicule utilisé : </b><i><?php echo $user_vehicule[2]." - ".$user_vehicule[3]." - ".$user_vehicule[1];?></i></h3></div>
    <?php if(isset($_POST['change-ok'])){ 
      echo '
      <input type="text" name="" id="input1/(\w+)/\u\1/g" class="form-control input-pers" value="" required="required" pattern="" title="" placeholder="Service">
      ';
     }?>
    <div class="immatriculation"><h3><b>Immatriculation : </b><i><?php echo $user_vehicule_infos[1];?></i></h3></div>
    <?php if(isset($_POST['change-ok'])){ 
      echo '
      <input type="text" name="" id="input1/(\w+)/\u\1/g" class="form-control input-pers" value="" required="required" pattern="" title="" placeholder="Service">
      ';
     }?>
    <div class="km"><h3><b>Kilometrage du véhicule : </b><i><?php echo $user_vehicule_infos[4]." Km";?></i></h3></div>
    <?php if(isset($_POST['change-ok'])){ 
      echo '
      <input type="text" name="" id="input1/(\w+)/\u\1/g" class="form-control input-pers" value="" required="required" pattern="" title="" placeholder="Service">
      ';
     }?>

     <?php 
     if(isset($_POST['change-ok'])){
        echo '<input type="submit" class="btn btn-primary changer-info" value="Ok" name="change-ok-fini">';
     } elseif(!isset($_POST['change-ok'])) {
        echo '<form action="" method="post">';
        echo '<input type="submit" class="btn btn-primary changer-info" value="Changer" name="change-ok">';
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