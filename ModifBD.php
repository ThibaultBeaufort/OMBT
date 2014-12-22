    <?php
	session_start();

	$Nra =$_GET['Nra'];
	$OP  =$_GET['OP'];
	$Valeur = $_GET['Valeur'];
	
	$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
	
	$sqlCom = "UPDATE specificdata s1, nra n1
	SET s1.valeur = '$Valeur'  
	WHERE NomData like '$OP' 
	and s1.IDNra = n1.IDNra 
	and Concat(n1.dr,n1.CodeNRA) like '$Nra'";
				
	$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
	
	
	$IDUser = $_SESSION['login'];
	$datehist = date("Y-m-d");
	
	$sqlCom ="INSERT INTO historique(DateHistorique,IDUser, COmmentaireHistorique) VALUES ('$datehist', '$IDUser', 'Modif de $IDUser sur $Nra pour $OP')";
				
	$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
	?>
         