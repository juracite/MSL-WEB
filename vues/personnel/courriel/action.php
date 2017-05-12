<?php
$action = (isset($_POST['action']))?htmlspecialchars($_POST['action']):''; //On récupère la valeur de la variable $action
include(ROOT.'core/modele/dbconnect.php');
$id = $_COOKIE['id_user'];
switch($action)
{
case "consulter": //1er cas : on veut lire un mp
//Ici on a besoin de la valeur de l'id du mp que l'on veut lire
    $id_mess = (int) $_POST['id']; //On récupère la valeur de l'id

    //La requête nous permet d'obtenir les infos sur ce message :
    $query = $dbh->prepare('SELECT  mp_expediteur, mp_receveur, mp_titre,
    mp_time, mp_text, mp_lu, id_salarie, login
    FROM mp
    LEFT JOIN salarie ON id_salarie = mp_expediteur
    WHERE mp_id = :id');
    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
    $query->execute();
    $data=$query->fetch();
    echo '<h1>'.$data['mp_titre'].'</h1><br />';

    // Attention ! Seul le receveur du mp peut le lire !
    if ($id != $data['mp_receveur']) print_r('ERR_WRONG_USER : Mauvais utilisateur !');

?>

<strong>Envoyé par : </strong></th>
<?php echo'<p><strong>
    <a href="#">
    '.stripslashes(htmlspecialchars($data['login'])).'</a></strong></p>
    Reçu à '.date('H\hi \l\e d M Y',$data['mp_time']);
    ?>
<?php
        
    echo '<br/><br/><p>'.nl2br(stripslashes(htmlspecialchars($data['mp_text']))).'</p>';

    if ($data['mp_lu'] == 0) //Si le message n'a jamais été lu
    {
        $query->CloseCursor();
        $query=$dbh->prepare('UPDATE mp 
        SET mp_lu = :lu
        WHERE mp_id= :id');
        $query->bindValue(':id',$id_mess, PDO::PARAM_INT);
        $query->bindValue(':lu','1', PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();
    }
    //bouton de réponse
    ?>
    <form id="form-hidden" method="post" action="">
        <button type="submit" class="btn btn-primary" name="action" value="repondre">Répondre</button>
        <button type="submit" class="btn btn-danger" name"action" value="supprimer">Supprimer</button>
<?php
        echo '<input type="hidden" name="dest_id" value="'.$data['mp_expediteur'].'">';
        echo '<input type="hidden" name="dest_login" value="'.$data['login'].'">';
        echo '<input type="hidden" name="id" value="'.$id_mess.'">';
?>
    </form>
    
    
    <?php
break;

case "repondre": //3eme cas : on veut répondre à un mp reçu
    echo '<h2><span id="title-new-message">Réponse</span> <span id="title-new-message-rest"> à '. $_POST['dest_login'] .'</span></h2><br /><br />';

    $dest = (int) $_POST['dest_id'];
?>
    <form method="post" action="" name="formulaire" class="col-lg-6">
        <p>
            <label for="titre">Titre : </label>
            <input type="text" size="80" id="titre" name="titre" class="form-control" placeholder="Titre"/>
            <br /><br />
            <textarea cols="80" rows="8" name="message" id="textarea" class="form-control" placeholder="Message à envoyer"></textarea>
            <br />
<?php
            echo '<input type="hidden" name="to" value="'. $_POST['dest_login'] .'">';
?>
            <input type="submit" name="action" value="Envoyer" class="btn btn-primary" />
            <input type="reset" name="Effacer" value="Vider" class="btn btn-danger" />
        </p>
    </form>
<?php
break;
 
case "nouveau": //2eme cas : on veut poster un nouveau mp
    echo '<h2><span id="title-new-message">Nouveau</span> <span id="title-new-message-rest">message privé</span></h2><br />';
?>
    <form method="post" action="" name="formulaire" class="col-lg-6">
    <p>
    <label for="to">Envoyer à : </label>
    <select class="form-control" id="select" name="to">
      <?php
        foreach($all_login_personnel as $login){
            echo '<option>'.$login[0].'</option>';
        }
      ?>
    </select>
    <br />
    <label for="titre">Titre : </label>
    <input type="text" size="80" id="titre" name="titre" class="form-control" placeholder="Titre"/>
    <br /><br />
    <textarea cols="80" rows="8" name="message" id="textarea" class="form-control" placeholder="Message à envoyer"></textarea>
    <br />
    <input type="submit" name="action" value="Envoyer" class="btn btn-primary" />
    <input type="reset" name="Effacer" value="Vider" class="btn btn-danger" /></p>
    </form>

<?php
break;

case "envoyer":
    //On récupère le titre et le message
    $message = $_POST['message'];
    $titre = $_POST['titre'];
    $temps = time();
    $dest = $_POST['to'];

    //On récupère la valeur de l'id du destinataire
    //Il faut déja vérifier le nom

    $query=$dbh->prepare('SELECT id_salarie FROM salarie
    WHERE LOWER(login) = :dest');
    $query->bindValue(':dest',strtolower($dest),PDO::PARAM_STR);
    $query->execute();
    if($data = $query->fetch())
    {
        $query=$dbh->prepare('INSERT INTO mp
        (mp_expediteur, mp_receveur, mp_titre, mp_text, mp_time, mp_lu)
        VALUES(:id, :dest, :titre, :txt, :tps, :lu)');
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->bindValue(':dest',(int) $data['id_salarie'],PDO::PARAM_INT);
        $query->bindValue(':titre',$titre,PDO::PARAM_STR);
        $query->bindValue(':txt',$message,PDO::PARAM_STR);
        $query->bindValue(':tps',$temps,PDO::PARAM_INT);
        $query->bindValue(':lu','0',PDO::PARAM_STR);
        $query->execute();
        $query->CloseCursor();

        echo'<p>Votre message a bien été envoyé!
        <br /><br />Cliquez <a href="courriel">ici</a> pour retourner à
        la messagerie</p>';
    }
    //Sinon l'utilisateur n'existe pas !
    else
    {
        echo'<p>Désolé ce membre n existe pas, veuillez vérifier et
        réessayez à nouveau.</p>';
    }
break;
 
case "supprimer": //4eme cas : on veut supprimer un mp reçu
    //On récupère la valeur de l'id
    $id_mess = (int) $_POST['id'];
    //Il faut vérifier que le membre est bien celui qui a reçu le message
    $query=$dbh->prepare('SELECT mp_receveur
    FROM mp WHERE mp_id = :id');
    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    //Sinon la sanction est terrible :p
    if ($id != $data['mp_receveur']) {
            erreur(ERR_WRONG_USER);
        }
        $query->CloseCursor(); 
    $query=$dbh->prepare('DELETE from mp WHERE mp_id = :id');
    $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
    $query->execute();
    $query->CloseCursor();

    header("Location: courriel");

    //2 cas pour cette partie : on est sûr de supprimer ou alors on ne l'est pas
    if(isset($_POST['sur'])){
        $sur = (int) $_POST['sur'];
        //Pas encore certain
        if ($sur == 0)
        {
            echo'<p>Etes-vous certain de vouloir supprimer ce message ?<br />
            <a href="./index.php?action=supprimer&amp;id='.$id_mess.'&amp;sur=1">
            Oui</a> - <a href="./index.php">Non</a></p>';
        }
        //Certain
        else
        {
            $query=$dbh->prepare('DELETE from mp WHERE mp_id = :id');
            $query->bindValue(':id',$id_mess,PDO::PARAM_INT);
            $query->execute();
            $query->CloseCursor(); 
            echo'<p>Le message a bien été supprimé.<br />
            Cliquez <a href="./index.php">ici</a> pour revenir à la boite
            de messagerie.</p>';
        }
    }
break;
} //Fin du switch
?>
