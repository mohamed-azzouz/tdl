<?php

require 'class/bdd.php';
require 'class/user.php';

$bdd = new bdd() ;
$user = new user() ;

$bdd-> connect() ;

$id = $_POST["idTache"];
echo "<span>ca marche pas </span>";

if (isset($_POST['cancelTache'])) 
{
	$supprimerTache = $bdd->executeonly("DELETE FROM tache WHERE id = '$id' ");
	echo "<span>Ca marche</span>";
}


?>