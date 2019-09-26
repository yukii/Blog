<!-- mettre les commentaires, php, db -->
<?php
	// require_once('db_comm.php');
	// session_start();

	if (!isset($_COOKIE['user']) || is_null($_COOKIE['user'])) {
		$i = rand(0, 1000);
		$name = 'Anonyme'.$i;
		setcookie('user', $name, time() + 365*24*3600);
	}

	if (!isset($_COOKIE['visite']) || is_null($_COOKIE['visite'])) {
		setcookie('visite', 1, time() + 365*24*3600);
	}

// 	if (!isset($_COOKIE['nb_com']) || is_null($_COOKIE['nb_com'])) {
// 		setcookie('nb_com', 1, time() + 365*24*3600);
// 	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blog du Stage</title>
	<meta name="Description" content="Rapport de stage sous forme de blog">
	<meta name="author" lang="fr" content="Mari-Annaig">
	<meta name="robots" content="index, follow">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/comm.css">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Gloria+Hallelujah|Great+Vibes|Indie+Flower|Lobster+Two|Pacifico|Poor+Story|Shadows+Into+Light|Ubuntu+Condensed" rel="stylesheet">
</head>
<body>
	<header>
		<!-- titre du blog, image... -->
		<a href="https://www.ynov.com/formation/ynov-informatique/"><img id="ynov" src="../img/ynov.png"></a>
		<a href="https://www.capgemini.com/fr-fr/"><img id="cap" src="../img/Cap_log.png"></a>
		<h2>7 Semaines en Stage</h2>
	</header>
	<div>
		<?php echo "Nombre de visiteurs : ".$_COOKIE['visite'];?>
	</div>
	<hr>
	<nav>
		<ul>
			<li><a href="../index.php">Acceuil</a></li>
			<li><a href="stage.php">Mon stage</a></li>
			<li><a href="annecdote.php">Acnedotes</a></li>
			<li><a href="annexes.php">Annexes</a></li>
		</ul>
	</nav>
	<hr>

	<img id="my_img" src="../img/correct.jpg">
	<p>Section commentaire</p>
	<p>Ecrivez quelque chose ;)</p>
	<hr>
	<div id="all_comm">
		Moi : hey !
		<br>
		Anonyme882 : hey !
		<br>
		Anonyme258 : super le stage !
		<br>
		Anonyme888 : un peu bizarre que ce soit sous forme de blog....
		<br>
		Anonyme882 : je confirme mais ça passe
		<br>

		<?php
			$my_name = '';
			if (isset($_POST['user']) && $_POST['user'] != '') {
				$my_name = $_POST['user'];
				// var_dump($my_name);
			}
			else{
				$my_name = $_COOKIE['user'];
			}

			if (isset($_POST['com']) && $_POST['com'] != '') {
				// $nb = $_COOKIE['nb_com'];
				// setcookie('com'.$nb, 
				echo $my_name.": ".$_POST['com'];
			}

			// $all = $base -> query('select name, ecrit from commentaire');
			// // var_dump($all);
			// foreach ($all as $key) {
			// 	echo $key['name']." : ".$key['ecrit'].'<br>';
			// }
		?>
	</div>
	<br>
	<div id="ecrit">
		<form method="POST" action="commentaire.php">
			Nom (falcultatif) :
			<input type="text" name="user" id="name">
			<br>
			<br>
			Commentaire : 
			<input type="text" name="com" id="coms">
			<br>
			<input type="submit" value="Envoyer">
		</form>
	</div>

	<footer>
		<!-- mes coordonnées.... -->
		Ingesup 2017-2018
		<br>
		Merci d'avoir laissé un commentaire ^^
	</footer>
</body>
</html>