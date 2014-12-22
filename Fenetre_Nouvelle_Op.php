<!--    //////////     Fenetre  formulaire ajout op trans ////////////    -->	
<div id="dialog-form"  title="Creation nouvelle Operation">

	<?php $nra=$_GET['nra'];?>
	<form>
			<label for="name">Operation</label>
			<select name="Operation" id="liste_op" onChange="find_op(this.value)">
				<option selected="selected"></option>
				<option value="FO" >FO</option>
				<option value="FH">FH</option>
				<option value="WDM">WDM</option>
			</select>
			<div id="form_FO" class="form_FO">
				<label for="NomFO">Nom FO</label>
				<input type="text" name="NomFO" id="NomFO" onChange="find_caract_FO(this.value)" class="text ui-widget-content ui-corner-all"/>
				<label for="NbFO">Nombre FO</label>
				<input type="text" name="NbFO" id="NbFO" class="text ui-widget-content ui-corner-all"/>				
				<label for="Km">Kilomètres</label>
				<input type="text" name="Km" id="Km_FO" class="text ui-widget-content ui-corner-all"/>
				<label for="RPL">RPL</label>
				<input type="text" name="RPL" id="RPL_FO" class="text ui-widget-content ui-corner-all"/>
				<label for="Cout">Coût</label>
				<input type="text" name="Cout" id="Cout_FO" class="text ui-widget-content ui-corner-all"/>
				<label for="Date">Date</label>
				<input type="Date" name="Date" id="Date_FO" class="text ui-widget-content ui-corner-all DateFO"/>
				<!-- Allow form submission with keyboard without duplicating the dialog button -->
				<input type="submit" tabindex="-1" style="position:absolute; top:-1000px"/>
			</div>			
			<div id="form_FH">
				<label for="NomFH">Nom FH</label>
				<input type="text" name="NomFH" id="NomFH" onChange="find_caract_FH(this.value)" class="text ui-widget-content ui-corner-all"/>
				<label for="NbFH">Nombre FH</label>
				<input type="text" name="NbFH" id="NbFH" class="text ui-widget-content ui-corner-all"/>				
				<label for="NbBonds">Nombre Bonds</label>
				<input type="text" name="NbBonds" id="NbBonds_FH" class="text ui-widget-content ui-corner-all"/>
				<label for="RPL">RPL</label>
				<input type="text" name="RPL" id="RPL_FH" class="text ui-widget-content ui-corner-all"/>
				<label for="Cout">Coût</label>
				<input type="text" name="Cout" id="Cout_FH" class="text ui-widget-content ui-corner-all"/>
				<label for="Date">Date</label>
				<input type="Date" name="Date" id="Date_FH" class="text ui-widget-content ui-corner-all DateFH"/>
				<!-- Allow form submission with keyboard without duplicating the dialog button -->
				<input type="submit" tabindex="-1" style="position:absolute; top:-1000px"/>			</div>			
			<div id="form_WDM">
				<label for="NomWDM">Nom WDM</label>
				<input type="text" name="NomWDM" id="NomWDM" onChange="find_caract_WDM(this.value)" class="text ui-widget-content ui-corner-all"/>
				<label for="NbCreation">Nombre Création</label>
				<input type="text" name="NbCreation" id="NbCreation" class="text ui-widget-content ui-corner-all"/>				
				<label for="NbExtensions">Nombre Extensions</label>
				<input type="text" name="NbExtensions" id="NbExtensions" class="text ui-widget-content ui-corner-all"/>
				<label for="NbBonds">Nombre Bonds</label>
				<input type="text" name="NbBonds" id="NbBonds_WDM" class="text ui-widget-content ui-corner-all"/>
				<label for="RPL">RPL</label>
				<input type="text" name="RPL" id="RPL_WDM" class="text ui-widget-content ui-corner-all"/>
				<label for="Cout">Coût</label>
				<input type="text" name="Cout" id="Cout_WDM" class="text ui-widget-content ui-corner-all"/>
				<label for="Date">Date</label>
				<input type="Date" name="Date" id="Date_WDM" class="text ui-widget-content ui-corner-all DateWDM"/>
				<!-- Allow form submission with keyboard without duplicating the dialog button -->
				<input type="submit" tabindex="-1" style="position:absolute; top:-1000px"/>			</div>
			

	</form>

</div>
<script>

</script>