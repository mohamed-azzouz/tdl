<?php

require 'class/bdd.php';
require 'class/user.php';

$bdd = new bdd() ; 
$user = new user() ;

$bdd-> connect() ;


$recupTacheAccompli = $bdd->execute("SELECT * FROM tache WHERE etat = 'Accompli' ORDER BY id DESC");
$nbTacheAccompli = count($recupTacheAccompli);
?>

<table id="accompli">
	<th  colspan="3" style="text-align: center;">
		Tache Accompli
	</th>
	<tbody>
		<tr>
			<td>NOM</td>
			<td>Fini le</td>
			<td></td>
		</tr>
		<?php
		for ($i=0; $i < $nbTacheAccompli ; $i++) 
		{ ?>

			<tr>			
			<input name="idTache" id="<?php echo $recupTacheAccompli[$i][0]; ?>" class="idTache" value="<?php echo $recupTacheAccompli[$i][0]; ?>" style="display: none;">
		
				
			</tr>
			<td>
				<?php echo $recupTacheAccompli[$i][1]; ?>
					
			</td>
			<td>
				<?php 
				$date = $recupTacheAccompli[$i][2];
				$changeFormatDate = date("d-m-Y à H:i:s", strtotime($date));
				echo $changeFormatDate;
			?>
			</td>
			<td>
				<button class="cancelTache" id="<?php echo $recupTacheAccompli[$i][0]; ?>">&#10006;</button>
			</td>
			
			
		
		

		<?php
	}
	?>

		

	</tbody>
</table>

