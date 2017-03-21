
<script src="//code.jquery.com/jquery.js"></script>
<div class="row">
	<div class="col-md2 col-md-offset-5">
		<img src="../vues/app/img/rolling.svg" alt="Loader" class="loader animated fadeOut">
	</div>
</div>
<header id="header" class="animated fadeIn">
	<h2>Votre messagerie MSL</h2>
</header>
<div class="container-courriel animated fadeIn">
	<div class="messagerie-box">
		<table class="table table-inverse">
			<tr>
				<th><strong><i class="ion-android-checkbox-outline-blank"> Lu / <i class="ion-android-checkbox-blank"> Non lu</strong></th>
				<th><strong>Titre</strong></th>
				<th><strong>Expéditeur</strong></th>
				<th><strong>Date</strong></th>
				<th><strong>Suppression</strong></th>
			</tr>

			<?php
				//On boucle et on remplit le tableau
				if (count($messages_info)>0)
				{
					foreach ($messages_info as $data)
					{
						echo'<tr>';
						//Mp jamais lu, on affiche l'icone en question
						if($data['mp_lu'] == 0)
						{
						echo'<td><i class="ion-android-checkbox-blank"> <span id="new_msg">Nouveau !</span></td>';
						}
						else //sinon une autre icone
						{
						echo'<td><i class="ion-android-checkbox-outline-blank"></td>';
						}
						echo'<td id="mp_titre">
						<form id="form-hidden" method="post" action="courriel"><button type="submit" name="action" value="consulter" class="btn-link" />
						<input type="hidden" name="id" value="'.$data['mp_id'].'">
						'.stripslashes(htmlspecialchars($data['mp_titre'])).'</a></td>
						<td id="mp_expediteur">
						<button type="submit" name="id_salarie" value="'.$data['id_salarie'].'" class="btn-link" />
						'.stripslashes(htmlspecialchars($data['login'])).'</form></td>
						<td id="mp_time">'.date('H\hi \l\e d M Y',$data['mp_time']).'</td>
						<td>
						<form id="form-hidden" method="post" action="courriel">
						<button type="submit" name="action" value="supprimer" class="btn-link" />
						<input type="hidden" name="id" value="'.$data['mp_id'].'">
						<i id="supp" class="ion-android-close"></form></td></tr>';
					} //Fin de la boucle
					echo '</table>';
				}
				else{
					echo'<p>Vous n avez aucun message privé pour l instant, cliquez
			<a href="./index.php">ici</a> pour revenir à la page d index</p>';
				}
			?>
			<form id="form-hidden" method="post" action="courriel">
				<button type="submit" class="btn btn-primary" name="action" value="nouveau">Nouveau</button>
			</form>
	</div>
	<?php
				if(isset($_POST['action']))
				{
					echo '
					<script type="text/javascript">
						$(".messagerie-box").remove();	
						$(".container-courriel").addClass("container-messages");
						$(".container-messages").removeClass("container-courriel");			
					</script>';
					require_once(ROOT.'vues/personnel/courriel/action.php');
				} 
				else{
					
				}
			?>
</div>

<nav class="navbar navbar-fixed-bottom navbar-light bg-faded animated fadeIn">
	<a href="./disconnect">
	    <button class="button button--tamaya button--border-thick button--red" data-text="Sortir"><?php echo 'Deconnexion'; ?></button>
    </a>
	<button class="button button--tamaya button--border-thick button--blue open-modal" data-text="Protection" data-toggle="modal" data-target="#modalperso">À savoir</button>
	<div class="brand info-connection">Bienvenue dans votre interface d'administration <?php echo $nom_prenom_user[0]; ?></div>
</nav>
