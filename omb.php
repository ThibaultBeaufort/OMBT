<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
		<META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		<script src="jquery-ui-1.11.2.custom/external/jquery/jquery.js"></script>
		<script src="jquery-ui-1.11.2.custom/jquery-ui.js"></script>
		<script src="princeFilter.JQuery.js"></script>
		<script src="jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="design.css"/>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css"/>
	</head>
	<body>
		<?php
		session_start();
		include_once('controle_user.php');
		if ((isset($_SESSION['nom']))&& ($_SESSION['nom'] != '')){
			?>
			<header>
				<img src="image/logo.jpg" alt="logo" id="logo"/>
				<div id="banniere"><h1>Outil de Modélisation des Besoins Transmission</h1></div>
				<form action='omb.php' method='post' name='deconnexion' id='form-banniere'>
				<input id="probleme" type="button" value="Signaler un problème" />
				<input type="submit" value="Déconnexion" name="bouton_deco"></input><br/>
				<?php 
				echo "Bonjour ".$_SESSION['nom']." ".$_SESSION['prenom']; ?></form><?php
				if(isset($_POST['bouton_deco'])){
					session_start();
					// On écrase le tableau de session
					$_SESSION = array();
					// On détruit la session
					session_destroy();
					// On redirige vers la page Connexion/Inscription
					header ('Location:index.php');
				}
				?>
			</header>
			<hr/>
			<section>
				<ul class="tabs">
					<li>
						<input type="radio" checked name="tabs" id="tab1">
						<label for="tab1">Accueil</label>
						<div id="tab-content1" class="tab-content animated fadeIn">
							<!-- Contenu de l'onglet  -->
							<?php include_once('accueil.php');?>
						</div>
					</li>
					<li>
						<input type="radio" name="tabs" id="tab2">
						<label for="tab2">PSDR</label>
						<div id="tab-content2" class="tab-content animated fadeIn">
							<!-- Contenu de l'onglet  -->
							<?php include_once('psdr.php');?>
						</div>
					</li>
					<li>
						<input type="radio" name="tabs" id="tab3">
						<label for="tab3">Budget</label>
						<div id="tab-content3" class="tab-content animated fadeIn">
							<!-- Contenu de l'onglet  -->
						</div>
					</li>
					<li>
						<input type="radio" name="tabs" id="tab4">
						<label for="tab4">Historique</label>
						<div id="tab-content4" class="tab-content animated fadeIn">
							<!-- Contenu de l'onglet  -->		
						</div>
					</li>
				</ul>
			</section>
			<?php
		}
		else {
			echo "Vous avez tenter de pénétrer sur une application nécessitant une authentification ! Vous allez être redirigé.";
			header('refresh:3; index.php');
		}
		?>
	</body>
</html>
