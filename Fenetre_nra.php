
<?php
		require('controle_user.php');
		require('connect.php');
if (isset($_GET['nra'])){
?>

<!--    //////////     Fenetre détails NRA     ////////////    -->	

		<div id="users-contain" class="ui-widget">
	<?php
	
			$nra =$_GET['nra'];

		$conn = mysqli_connect("localhost","root","","base_ombt") or die("Erreur connexion BDD" .mysqli_error($conn));
		$sql = "SELECT IDTrans, TypeTrans, DateTrans, NomOPDslam, RPL, Montant, CI 
				FROM nra N,op_trans OT, dslam DS, op_dslam OD
				WHERE  N.IDNra=DS.IDNra
				AND DS.IDDslam=OT.IDDslam
				AND DS.IDDslam=OD.IDDslam
				AND CONCAT(N.dr,N.codenra) = '$nra';";
		$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());	
	?>
		<h1>Liste des operations sur le NRA <?php echo $nra ?> : </h1>
		<table id="users" class="ui-widget ui-widget-content">
			<thead>
				<tr>
					<th>Operation</th>
					<th>Date</th>
					<th>Declencheur</th>
					<th>RPL</th>
					<th>Budget</th>
					<th>Valide CI</th>
				</tr>
			</thead>
			<tbody>
				<?php while($ligne= mysqli_fetch_array($requete)){ ?>
				<tr class="TabNRA">
					<td class="<?php echo $ligne['IDTrans']; ?>"><?php echo $ligne['TypeTrans'];?></td>
					<td class="<?php echo $ligne['IDTrans']; ?>"><?php echo $ligne['DateTrans'];?></td>
					<td class="<?php echo $ligne['IDTrans']; ?>"><?php echo $ligne['NomOPDslam'];?></td>
					<td id="RPLNRA" class="<?php echo $ligne['IDTrans']; ?>"><?php echo $ligne['RPL'];?></td>
					<td id="MontantNRA" class="<?php echo $ligne['IDTrans']; ?>"><?php echo $ligne['Montant'];?></td>
					<td id="ValideCINRA" class="<?php echo $ligne['IDTrans']; ?>"><?php echo $ligne['CI'];?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<button id="create-user">Creer nouvelle Operation</button>
		
	</div>
	<div id="commentaire">
		
	<label for="ComNra"><p>Commentaire :</p></label>
	<textarea type="text" name="ComNra" id="ComNra"></textarea>
 
	</div>
<div id="nouvelle_op">
  
</div>	



<!-- Fin fenetre -->
<?php }?>
