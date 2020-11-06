<?php

require 'class/bdd.php';
require 'class/user.php';

$bdd = new bdd() ;
$user = new user() ;

$bdd-> connect() ;



if (isset($_POST['nom']) && !empty($_POST['nom'])) 
{
	$nom = $_POST['nom'];

	$newTask = $bdd->executeonly("INSERT INTO tache(nom, dateDebut, dateFin, etat) VALUES('$nom', NOW(), '', 'En Cour')");
	echo "<span class='sucess'>SUCESS</span>";
	}
else
{
	echo "<span class='error'>Veuillez completer tout les champs</span>";
}

?>