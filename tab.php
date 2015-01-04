<?php
		require('controle_user.php');
		require('connect.php');

	$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));

	if(isset($_GET['param1'])){
	$dr=$_GET['param1'];
		switch($_GET['param1']){

			case 'B2':
				$tri = "and n1.DR ='B2'";
			break;		
			case 'K2':
				$tri = "and n1.DR ='K2'";
			break;		
			case 'T1':
				$tri = "and n1.DR ='T1'";
			break;
			case 'P0':
				$tri = "and n1.DR ='P0'";
			break;
		}
		$sql = "select n1.dr,n1.dpt, n1.boucle, CONCAT(n1.dr,n1.codenra), n1.nomnra, n1.typeracc, n1.check_nra, s1.valeur, s2.valeur as 'valeur2' 
				from NRA n1, specificdata s1, specificdata s2 
				where s1.nomdata like 'OP DSLAM'
				and s1.IDNra = n1.IDNra
				and s2.nomdata like 'Nx DSLAM GE'
				and s2.IDNra = n1.IDNra
				$tri;";
		$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	}
	if(isset($_GET['param2'])){

		$nra="and upper(CONCAT(n1.dr,n1.codenra))LIKE '%".$_GET['param2']."%'";
		$sql = "select n1.dr,n1.dpt, n1.boucle, CONCAT(n1.dr,n1.codenra), n1.nomnra, n1.typeracc, n1.check_nra, s1.valeur, s2.valeur as 'valeur2' 
				from NRA n1, specificdata s1, specificdata s2 
				where s1.nomdata like 'OP DSLAM'
				and s1.IDNra = n1.IDNra
				and s2.nomdata like 'Nx DSLAM GE'
				and s2.IDNra = n1.IDNra
				$nra;";
		$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	}	
	if(isset($_GET['param3'])){

		$boucle="and upper(boucle)LIKE '%".$_GET['param3']."%'";
		$sql = "select n1.dr,n1.dpt, n1.boucle, CONCAT(n1.dr,n1.codenra), n1.nomnra, n1.typeracc, n1.check_nra, s1.valeur, s2.valeur as 'valeur2' 
				from NRA n1, specificdata s1, specificdata s2 
				where s1.nomdata like 'OP DSLAM'
				and s1.IDNra = n1.IDNra
				and s2.nomdata like 'Nx DSLAM GE'
				and s2.IDNra = n1.IDNra
				$boucle;";
		$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	}
if (isset($_GET['param1']) || isset($_GET['param2']) || isset($_GET['param3'])){
		include('tableau.php');
		include ('fenetre_nra.php');
		include ('fenetre_OPDslam.php');	
		include ('fenetre_DetailOPtrans.php');
		include ('fenetre_Nouvelle_Op.php');

}
?>
