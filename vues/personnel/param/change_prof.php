  <div class="personal-info">
    <div class="profile-pic-change" style=<?php if($user_avatar){echo "\"background-image: url('../vues/app/img/utilisateurs/" . $infos_user[9] ."/" . $user_avatar[0][0] ."')\"";} else {echo "\"background-image: url('../vues/app/img/defaut/inconnu.jpg')\"";} ?>></div>
    <?php 
        if(isset($msg_1)) {
            echo '<h2 style="color: white;">'.$msg_1.'</h2>';
            header( "refresh:1;url=param" );
        } elseif (isset($msg_2)){
            echo '<h2 style="color: white;">'.$msg_2.'</h2>';
            include "form-change.html";
        } elseif (isset($msg)) {
            echo '<h2 style="color: white;">'.$msg.'</h2>';
            include "form-change.html";
        } else {
            include "form-change.html";
        }
    ?>
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