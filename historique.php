
<?php
$sql = 'SELECT DateHistorique,IDUser,CommentaireHistorique FROM Historique';
		$requete = mysqli_query($conn,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());	


?>

<table class="historique">
		<thead>
			<tr>
				<th> Date </th>
				<th> Utilisateur </th>
				<th> Modification </th>
			</tr>
		</thead>		
		<tbody>
					<?php while ($ligne= mysqli_fetch_array($requete)){ // On stocke le resultat sous forme d'un tableau ?>

			<tr>
				<td> <?php echo($ligne['DateHistorique']); ?> </td>
				<td> <?php echo($ligne['IDUser']); ?> </td>
				<td> <?php echo($ligne['CommentaireHistorique']); ?> </td>
			</tr>
			
			<?php } ?>
		</tbody>
</table>