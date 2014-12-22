<?php
require('connect.php');
	if (isset($_POST['log_in'])){
		if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
		  $login = $_POST['login'];
		  $pass = $_POST['pass'];
		  // on recupère le password de la table qui correspond au login du visiteur
		  $sql ="select mdp, nomuser, prenomuser from user where iduser='$login'";
		  $req = mysqli_query($conn, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		  $data = mysqli_fetch_assoc($req);

		  if($data['mdp'] != $pass) {
			echo '<p>Mauvais login / password. Vous allez être redirigé</p>';
			header ('refresh:3; index.php');
		  }
		  
		  else {
			//session_start();
			$_SESSION['login'] = $login;
			$_SESSION['pwd']= $pass;
			$_SESSION['nom']= $data['nomuser'];
			$_SESSION['prenom']= $data['prenomuser'];
		  }   
		}
		else{
				echo '<p>Champs vides. Vous allez être redirigé</p>'; //A remplacer par JS
				header ('refresh:3; index.php');
		}
	}

?>