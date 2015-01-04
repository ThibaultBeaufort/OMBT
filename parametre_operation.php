<?php
require('connect.php');

	$NomOp=$_GET['NomOp'];
	$FO = "FO";
	$FH = "FH";
	$WDM = "WDM";
	if (strstr($NomOp, $FO)){
	$sql =  'SELECT NombreFO,Kilometre,RPL,Montant,DateTrans FROM op_trans  WHERE NomTrans LIKE "'.$NomOp.'" ORDER BY NomTrans';
	$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$array=array();
	$row = mysqli_num_rows($requete);
	if ($row != "0"){
	$ligne= mysqli_fetch_array($requete);
	array_push($array, $ligne['NombreFO']);
	array_push($array, $ligne['Kilometre']);
	array_push($array, $ligne['RPL']);
	array_push($array, $ligne['Montant']);
	array_push($array, $ligne['DateTrans']);
	echo json_encode($array);
	}
}	
else if (strstr($NomOp, $FH)){
	$sql =  'SELECT NombreFH,Nombre_BondFH,RPL,Montant,DateTrans FROM op_trans  WHERE NomTrans LIKE "'.$NomOp.'" ORDER BY NomTrans';
	$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$array=array(); 
	$ligne= mysqli_fetch_array($requete);
	array_push($array, $ligne['Nombre_Creation']);
	array_push($array, $ligne['Nombre_Extension']);
	array_push($array, $ligne['Nombre_BondWDM']);
	array_push($array, $ligne['RPL']);
	array_push($array, $ligne['Montant']);
	array_push($array, $ligne['DateTrans']);
	echo json_encode($array);
}
else if (strstr($NomOp, $WDM)){
	$sql =  'SELECT Nombre_Creation,Nombre_Extension,Nombre_BondWDM,RPL,Montant,DateTrans FROM op_trans  WHERE NomTrans LIKE "'.$NomOp.'" ORDER BY NomTrans';
	$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	$array=array(); 
	$ligne= mysqli_fetch_array($requete);
	array_push($array, $ligne['Nombre_Creation']);
	array_push($array, $ligne['Nombre_Extension']);
	array_push($array, $ligne['Nombre_BondWDM']);
	array_push($array, $ligne['RPL']);
	array_push($array, $ligne['Montant']);
	array_push($array, $ligne['DateTrans']);
	echo json_encode($array);
}
?>