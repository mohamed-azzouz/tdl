<?php
session_start();

require 'class/bdd.php';
require 'class/user.php';

$bdd = new bdd() ;
$user = new user() ;

$bdd-> connect() ;



?>


<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>
	<main id="indexToDoList">
		<?php

		if (isset($_SESSION['login'])) 
		{?>
			
			<div id="alreadyConnected">
				Vous êtes déja connecté
				<br />
				<br />

				<form method="post" action="">
					<input type="submit" name="disconnect" value="Se deconnecter">
				</form>

			</div>
			
			
		<?php	
			if (isset($_POST['disconnect'])) 
			{
				session_destroy();
				header('location:index.php');
			}
		}

		else
			{?>
				<section id="formSignUpAndSignIn">
					<div id="fullFormSignUp">

						<div id="openSignUp" onclick="AfficherMasquerSignUp()">INSCRIPTION</div>
						<br />
						<form method="post" action="" id="formSignUp" style="display: none;" >

							
							<input type="text" name="loginSignUp" placeholder="Login">
							<br />
							<br />

							
							<input type="password" name="passwordSignUp" placeholder="Password">
							<br />
							<br />

							 
							<input type="password" name="confirmPassword" placeholder="Confirmer Password">
							<br />
							<br />

							<input type="submit" name="signUp" value="Inscription">
						</form>
						<?php

						if (isset($_POST["signUp"])) 
						{
							if ($user->inscription($_POST['loginSignUp'], $_POST["passwordSignUp"], $_POST['confirmPassword'], $bdd) == "userCheck") 
							{
								echo "<span class='erreur'>Compte créer</span>";

							}
							elseif ($user->inscription($_POST['loginSignUp'], $_POST["passwordSignUp"], $_POST['confirmPassword'], $bdd) == "userExist") 
							{
								echo "<span class='erreur'>Ce login existe déja</span>";
							}
							elseif ($user->inscription($_POST['loginSignUp'], $_POST["passwordSignUp"], $_POST['confirmPassword'], $bdd) == "mdpFaux") 
							{
								echo "<span class='erreur'>Mot de passe different</span>";
							}
							elseif ($user->inscription($_POST['loginSignUp'], $_POST["passwordSignUp"], $_POST['confirmPassword'], $bdd) == "logVide") 
							{
								echo "<span class='erreur'>Champ manquant</span>";
							}
						}
						?>
					</div>

					<div id="fullFormSignIn">
						<div id="openSignIn" onclick="AfficherMasquerSignIn()">CONNEXION</div>
						<br />
						<form method="post" action="" id="formSignIn" style="display: none;">

							
							<input type="text" name="loginSignIn" placeholder="Login">
							<br />
							<br />

							
							<input type="password" name="passwordSignIn" placeholder="Password">
							<br />
							<br />

							<input type="submit" name="signIn" value="Connexion">
						</form>
						<?php

						if(isset($_POST["signIn"]))
						{
							$user->connexion($_POST["loginSignIn"],$_POST["passwordSignIn"], $bdd);


						}

						?>
					</div>

				</section>
				<?php
			}

			?>
		
		
	</main>



	<script src="https://code.jquery.com/jquery-1.12.3.js" integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc=" crossorigin="anonymous"></script>
	
</body>
</html>

<script type="text/javascript">

		function AfficherMasquerSignUp(){
			divInfo = document.getElementById('formSignUp');
			if(divInfo.style.display == 'none'){
				divInfo.style.display = "block";
			} else {
				divInfo.style.display = "none";
			}
		}
		function AfficherMasquerSignIn(){
			divInfo = document.getElementById('formSignIn');
			if(divInfo.style.display == 'none'){
				divInfo.style.display = "block";
			} else {
				divInfo.style.display = "none";
			}
		}
	</script>