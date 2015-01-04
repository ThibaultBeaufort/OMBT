	<?php  
	
    if (isset($_GET['term']) && isset($_GET['nra'])){
			$term = htmlentities($_GET['term']);
			$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
			$secure = htmlspecialchars($_GET['term']);      
			if (!$secure) return;  
			$array = array();
			$result = mysqli_query($conn,'SELECT CONCAT(n1.dr,n1.codenra) FROM nra n1 WHERE CONCAT(n1.dr,n1.codenra) LIKE "%'.$secure.'%" ORDER BY codenra LIMIT 25');
			while ($ligne= mysqli_fetch_array($result)){ 
				array_push($array, $ligne['CONCAT(n1.dr,n1.codenra)']);
		}
		echo json_encode($array);
	}    
	else if (isset($_GET['term']) && isset($_GET['boucle'])){
			$term = htmlentities($_GET['term']);
			$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
			$secure = htmlspecialchars($_GET['term']);      
			if (!$secure) return;  
			$array = array();
			$result = mysqli_query($conn,'SELECT boucle FROM nra n1 WHERE upper(boucle) LIKE upper("%'.$secure.'%") GROUP BY boucle ORDER BY boucle LIMIT 25');
			while ($ligne= mysqli_fetch_array($result)){ 
				array_push($array, $ligne['boucle']);
		}
		echo json_encode($array);
	}
	if (isset($_GET['term']) && isset($_GET['nomfo'])){
			$term = htmlentities($_GET['term']);
			$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
			$secure = htmlspecialchars($_GET['term']);   
			if (!$secure) return;  
			$array = array();
			$result = mysqli_query($conn,'SELECT NomTrans FROM op_trans WHERE NomTrans LIKE "%'.$secure.'%" AND TypeTrans="FO"  LIMIT 25');
			while ($ligne= mysqli_fetch_array($result)){
				
				array_push($array, $ligne['NomTrans']);
		}
				echo json_encode($array);
		}
else 	if (isset($_GET['term']) && isset($_GET['nomfh'])){
			$term = htmlentities($_GET['term']);
			$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
			$secure = htmlspecialchars($_GET['term']);   
			if (!$secure) return;  
			$array = array();
			$result = mysqli_query($conn,'SELECT NomTrans FROM op_trans WHERE NomTrans LIKE "%'.$secure.'%" AND TypeTrans="FH" LIMIT 25');
			while ($ligne= mysqli_fetch_array($result)){
				
				array_push($array, $ligne['NomTrans']);

		}
				echo json_encode($array);

		}
		else 	if (isset($_GET['term']) && isset($_GET['nomwdm'])){
			$term = htmlentities($_GET['term']);
			$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
			$secure = htmlspecialchars($_GET['term']);   
			if (!$secure) return;  
			$array = array();
			$result = mysqli_query($conn,'SELECT NomTrans FROM op_trans WHERE NomTrans LIKE "%'.$secure.'%" AND TypeTrans="WDM" LIMIT 25');
			while ($ligne= mysqli_fetch_array($result)){
				
				array_push($array, $ligne['NomTrans']);
		}
				echo json_encode($array);
		}
	if (isset($_GET['term']) && isset($_GET['op_declencheuse'])){
			$term = htmlentities($_GET['term']);
			$nra=$_GET['codenra'];
			$nra=substr($nra,0,2);		
			$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
			$secure = htmlspecialchars($_GET['term']);   
			if (!$secure) return;  
			$array = array();
			$sql = 'SELECT o.NomOPDslam FROM op_dslam o, dslam d, nra n WHERE NomOPDslam LIKE "%'.$secure.'%" and o.IDDslam = d.IDDslam and d.IDNra = n.IDNra and n.DR ="'.$nra.'" LIMIT 25';
			$result = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());;
			while ($ligne= mysqli_fetch_array($result)){
				array_push($array, $ligne['NomOPDslam']);
		}
				echo json_encode($array);
		}
    ?>