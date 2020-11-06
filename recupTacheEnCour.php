<?php
require 'class/bdd.php';
require 'class/user.php';

$bdd = new bdd() ;
$user = new user() ;

$bdd-> connect() ;



$recupTacheEnCour = $bdd->execute("SELECT * FROM tache WHERE etat = 'En Cour' ORDER BY id DESC");

$nbTache = count($recupTacheEnCour);
?>

<table id="enCour">
	<th colspan="3" style="text-align: center;">
		Tache En Cour
	</th>

	<tbody>
		<tr>
			<td>NOM</td>
			<td>Creer le </td>
			<td></td>
		</tr>

			
			<?php

			for ($i=0; $i < $nbTache; $i++) 
				{ ?>

					
						<tr>
						<input name="idTache" id="<?php echo $recupTacheEnCour[$i][0]; ?>" class="idTache" value="<?php echo $recupTacheEnCour[$i][0]; ?>" style="display: none;">
						<td><?php echo $recupTacheEnCour[$i][1]; ?></td>
						<td><?php
						$date = $recupTacheEnCour[$i][2];
						$changeFormatDate = date("d-m-Y à H:i:s", strtotime($date));
						echo $changeFormatDate;
						?></td>

						<td>
							<button class="updateTache" id="<?php echo $recupTacheEnCour[$i][0]; ?>">&#10003;</button>
							<button class="cancelTache" id="<?php echo $recupTacheEnCour[$i][0]; ?>">&#10006;</button>
						</td>
					</tr>
					
					

					<?php
				}

				?>
			
			
		</tbody>
	</table>


