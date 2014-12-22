<?php

	session_start();

	$idTrans = $_GET['Id'];
	
	$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
	
	$sql = "SELECT o.IDTrans, o.NomTrans, o.DateTrans, o.TypeTrans, o.LanceTrans, o.NombreFo, o.` NombreFH`, o.Kilometre, 
		o.Nombre_BondFH, o.Nombre_BondWDM, o.Nombre_Extension, o.Nombre_Creation, o.MPG, o.RPL, o.Montant, o.Date_Mad, 
		o.Date_Validation, o.Date_MEST, o.Commentaire_CI, o.CI, o.IDUser, 
		d.NomDSLAM, n.NomNRA, n.DR, n.DPT, n.Boucle,  
		Concat(n.dr,n.CodeNRA) as 'CodeNra' , s.CommentaireData
		FROM op_trans o, dslam d, nra n, specificdata s WHERE
		o.IDDslam = d.IDDslam and
		d.IDNra = n.IDNra and
		o.IDTrans = $idTrans and
		n.IDNra = s.IDNra and
		s.NomData = 'CommentaireCI';";
	
	$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	
	$ligne= mysqli_fetch_array($requete);
	
	$Type = $ligne['TypeTrans']; 
?>
<!--    //////////     Fenetre  OP DSLAM   ////////////    -->	

<div id="FenetreOPTrans">

	<div id="PartOP">
	
		Details OP :
		
		<?php

			switch($Type) 
		{
		case 'WDM':
			
			

        break;
		
		case 'FO':
			
			

        break;
		
		case 'FH':
			
				

        break;

		}
		?>


	</div>
	
	<div id="PartCI">
	
		<p>Detail CI :</p>
		

		<label for="MPG">MPG</label>
		<input type="text" name="MPG" id="MPG" class="text ui-widget-content ui-corner-all" value="<?php echo $ligne['MPG'];?>">
		
		<label for="RPL">RPL</label>
		<input type="text" name="RPL" id="RPL" class="text ui-widget-content ui-corner-all" value="<?php echo $ligne['RPL'];?>">
		
		<label for="Montant">Budget</label>
		<input type="text" name="Montant" id="Montant" class="text ui-widget-content ui-corner-all" value="<?php echo $ligne['Montant'];?>">
		
		<?php if($ligne['CI']==1){     ?>
		
		<label for="valideCI">Valide CI</label>
		<input type="checkbox" name="valideCI" id="valideCI" checked>
		
		<?php } else{     ?>
		
		<label for="valideCI">Valide CI</label>
		<input type="checkbox" name="valideCI" id="valideCI">
		<?php  }    ?>
	
	</div>

</div>

<?php



?>