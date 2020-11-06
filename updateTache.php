<?php

require 'class/bdd.php';
require 'class/user.php';

$bdd = new bdd() ;
$user = new user() ;

$bdd-> connect() ;

$id = $_POST["idTache"];


if (isset($_POST['updateTache'])) 
{
	$updateTache = $bdd->executeonly("UPDATE tache SET dateFin =NOW(), etat = 'Accompli' WHERE id = '$id' ");
}


?>