    <?php
	session_start();

	$idT =$_GET['ID'];
	$Carac =$_GET['Carac']; 
	$Val =$_GET['Val']; 
	
	$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
	
	// Requete udate
	$sqlCom = "UPDATE op_trans SET $Carac='$Val' WHERE IDTrans='$idT';";
				
	$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
	
	
	//Requete historique
	$IDUser = $_SESSION['login'];
	$datehist = date("Y-m-d");
	
	$sqlCom ="INSERT INTO historique(DateHistorique, OP_trans, IDUser) VALUES ('$datehist', '$idT', '$IDUser')";
				
	$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error());
		
	echo $sqlCom;
	?>