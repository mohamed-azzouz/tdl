<?php
session_start();

require 'class/bdd.php';
require 'class/user.php';

$bdd = new bdd() ;
$user = new user() ;

$bdd-> connect() ;  

if (isset($_SESSION)) 
{
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>To Do List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/todolist.js"></script>
</head>

<header>
	<nav class="navbar navbar-expand-sm bg-light">
		<ul class="navbar-nav">
			<li class="nav-item">
				<form method="post" action="">
					<input type="submit" name="disconnect" value="Se deconnecter">
				</form>
				<?php	
				if (isset($_POST['disconnect'])) 
				{
					session_destroy();
					header('location:index.php');
				}
				?>
			</li>
		</ul>
	</nav>
</header>
<body>
	<main id="mainToDoList">
		<div id="userTdl">To Do List de : <?php echo $_SESSION['login']; ?></div>
		<div class="return"></div>
		<section id="toDoList">
			<form method="post" action="" id="formulaire">
				<input type="text" name="tdl" id="nom" placeholder="Que faire ??">
				<input type="submit" name="newAjout" value="Ajouter">

			</form>

		</section>

		<br>
		<div class="return2"></div>
		<section id="allTaches">
			<section id="taches">
				<div id="tacheEnCour">

				</div>
				<br/>
				<div id="tacheAccompli">

				</div>
			</section>
		</section>

	</main>

</body>
</html>