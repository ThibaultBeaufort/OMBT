   	<?php 
	//COMMENTAIRE QUEQUE PART
	$Nra =$_GET['Nra'];
	$OP  =$_GET['OP'];
	$ligne[0] = '12';
	
	$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
	$sqlCom = "select s1.CommentaireProg ,s1.CommentaireData 
	from nra n1, specificdata s1 
	where Concat(n1.dr,n1.CodeNRA) like '$Nra' 
	and n1.IDNRA = s1.IDNra 
	and s1.NomData like '$OP'";
				
	$requete = mysqli_query($conn, $sqlCom) or die('Erreur SQL !<br>'.$sqlCom.'<br>'.mysql_error() and $ligne[0] = " ");
	
	if ($ligne[0] == '12')
	{
		$ligne= mysqli_fetch_array($requete);
	}
	
	echo "Commentaire OMAR : $ligne[1]\nCommentaire Prog : $ligne[0]";
	
	?>
	