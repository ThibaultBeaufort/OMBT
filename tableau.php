
	<table border=1 id="tbl_MytableID" class="tbl_MytableID">
		<thead>
			<tr>
								<th class="EnteteTab">DR</th>
								<th class="EnteteTab">DPT</th>
								<th class="EnteteTab">Boucle</th>
								<th class="EnteteTab">Code42C</th>
								<th class="EnteteTab">Nom NRA</th>
								<th class="EnteteTab">Type Racc</th>
								<th class="EnteteTab">OP ATM</th>
								<th class="EnteteTab">DSLAM GE</th>
								<th class="EnteteTab">PM GE</th>
								<th class="EnteteTab">CM GE</th>
								<th class="EnteteTab">Up FE</th>
								<th class="EnteteTab">BIGE</th>
								<th class="EnteteTab">Up STM1</th>
								<th class="EnteteTab">Opti</th>
								<th class="EnteteTab">FTTH</th>
								<th class="EnteteTab">AIR COM</th>
								<th class="EnteteTab">Besoin Trans</th>
								<th class="EnteteTab">Année BIGE</th>
								<th class="EnteteTab">BIGE secu</th>
								<th class="EnteteTab">Année 10GE</th>
								<th class="EnteteTab">10GE sécu</th>
								<th class="EnteteTab">Check NRA</th>
			</tr>
		</thead>
		<tbody>
		
			<?php
				while ($ligne= mysqli_fetch_array($requete)){ // On stocke le resultat sous forme d'un tableau
					?>
					<tr>
					<td class="TabGauche"><?php echo $ligne['dr'] ?></td>
					
									<td class="TabGauche"><?php echo $ligne['dpt'] ?></td>
									<td class="TabGauche"><?php echo $ligne['boucle'] ?></td>
									<td class="TabGauche"><?php echo $ligne['CONCAT(n1.dr,n1.codenra)'] ?></td>
									<td class="TabGauche"><?php echo $ligne['nomnra'] ?></td>
									<td class="TabGauche"><?php echo $ligne['typeracc'] ?></td>	
									<td class="TabDroite"><?php echo $ligne['valeur'] ?></td>
									<td class="TabDroite"><?php echo $ligne['valeur2'] ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 0 ?></td>
									<td class="TabDroite"><?php echo 1 ?></td>
									<td class="TabDroite"><?php echo $ligne['check_nra'] ?></td>
					</tr>
					<?php 
			}?>
			

		</tbody>
	</table>                
