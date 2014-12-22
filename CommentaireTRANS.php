   	<?php 
	
	$Nra =$_GET['Nra'];
	$ligne[0] = '2';
	
	$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
	$sqlCom = "select CommentaireData 
	from nra n1, specificdata s1 
	where Concat(n1.dr,n1.CodeNRA) like '$Nra' 
	and n1.IDNRA = s1.IDNra 
	and s1.NomData like 'CommentaireNRA'";
				
	$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error() and $ligne[0] = " ");
	
	if ($ligne[0] == '2')
	{
		$ligne= mysqli_fetch_array($requete);
	}
	
	echo "$ligne[0]";
	?>
	