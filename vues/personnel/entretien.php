<div class="row">
	<div class="col-md2 col-md-offset-5">
		<img src="../vues/app/img/rolling.svg" alt="Loader" class="loader animated fadeOut">
	</div>
</div>

<div class="container-courriel">
	<div class="messagerie-box">
		

			<?php

			
				//On boucle et on remplit le tableau
				if($rdv_entretiens){
                        ?>
                                    <table class="table table-inverse">
                                    <tr>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Heure</strong></th>
                                        <th><strong>Commentaire</strong></th>
                                        <th><strong>Immatriculation</strong></th>
                                        <th><strong>Supprimer</strong></th>
                                    </tr>
                        <?php
					if (count($rdv_entretiens)>0)
					{
						foreach ($rdv_entretiens as $data)
						{
                                                        $id = $data['id'];
                                                        $date = $data['date'];
                                                        $heure = $data['heure'];
                                                        $commentaire = $data['commentaire'];
                                                        $imma = $data['immatriculation'];
                                                        
							echo'<tr>';
							echo '<td>'. $date .'</td>';
                                                        echo '<td>'. $heure .'</td>';
                                                        echo '<td>'. $commentaire .'</td>';
                                                        echo '<td>'. $imma .'</td>';
                                                        echo '
                                                            <td> 
                                                            <form id="form-hidden" method="post" action="">
                                                                <button type="submit" name="action" value="supprimer" class="btn-link" />
                                                                <input type="hidden" name="id" value="'. $id .'">
                                                                <i id="supp" class="ion-android-close">
                                                            </form>
                                                            </td>
                                                            ';
                                                        echo '</tr>';
						} //Fin de la boucle
						echo '</table>';
					}
					
				}
				else{
						echo'<p>Vous n avez aucun message privé pour l\'instant.';
					}
			?>
	</div>
</div>

<nav class="navbar navbar-fixed-bottom navbar-light bg-faded animated fadeIn">
	<a href="./disconnect">
	    <button class="button button--tamaya button--border-thick button--red" data-text="Sortir"><?php echo 'Deconnexion'; ?></button>
    </a>
	<button class="button button--tamaya button--border-thick button--blue open-modal" data-text="Protection" data-toggle="modal" data-target="#modalperso">À savoir</button>
	<div class="brand info-connection">Bienvenue dans votre interface d'administration <?php echo $nom_prenom_user[0]; ?></div>
</nav>