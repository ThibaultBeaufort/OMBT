    <?php
	session_start();

	$Nra =$_GET['Nra'];
	
	$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
	
	if(isset($_GET['Prog'])){
	
	
		$OP  =$_GET['OP'];
		$Commentaire = $_GET['Prog'];
		
		$sqlCom = "UPDATE specificdata s1, nra n1
		SET s1.CommentaireProg = '$Commentaire'  
		WHERE NomData like '$OP' 
		and s1.IDNra = n1.IDNra 
		and Concat(n1.dr,n1.CodeNRA) like '$Nra'";
					
		$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
		
		
		$IDUser = $_SESSION['login'];
		$datehist = date("Y-m-d");
		
		$sqlCom ="INSERT INTO historique(DateHistorique,IDUser, COmmentaireHistorique) VALUES ('$datehist', '$IDUser', 'Ajout Commentaire Prog de $IDUser sur $Nra pour $OP')";
					
		$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
		
	
	}
	elseif (isset($_GET['OMAR'])){
		
		$OP  =$_GET['OP'];
		$Commentaire = $_GET['OMAR'];
		
		$sqlCom = "UPDATE specificdata s1, nra n1
		SET s1.CommentaireData = '$Commentaire'  
		WHERE NomData like '$OP' 
		and s1.IDNra = n1.IDNra 
		and Concat(n1.dr,n1.CodeNRA) like '$Nra'";
					
		$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
		
		
		$IDUser = $_SESSION['login'];
		$datehist = date("Y-m-d");
		
		$sqlCom ="INSERT INTO historique(DateHistorique,IDUser, COmmentaireHistorique) VALUES ('$datehist', '$IDUser', 'Modif commentaire OMAR de $IDUser sur $Nra pour $OP')";
					
		$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
		
	}
	elseif (isset($_GET['ComNra'])){
		
		$Commentaire = $_GET['ComNra'];
		
		$sqlCom = "UPDATE specificdata s1, nra n1
		SET s1.CommentaireData = '$Commentaire'  
		WHERE NomData like 'CommentaireNRA' 
		and s1.IDNra = n1.IDNra 
		and Concat(n1.dr,n1.CodeNRA) like '$Nra'";
					
		$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
		
		
		$IDUser = $_SESSION['login'];
		$datehist = date("Y-m-d");
		
		$sqlCom ="INSERT INTO historique(DateHistorique,IDUser, COmmentaireHistorique) VALUES ('$datehist', '$IDUser', 'Modif commentaire NRA (Prog Trans) de $IDUser sur $Nra')";
					
		$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
		
	}
	else{
	
	}
	
	?>
         