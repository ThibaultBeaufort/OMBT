<!--    //////////     Fenetre  formulaire ajout op trans ////////////    -->	

	
<div id="dialog-form" title="Creation nouvelle Operation">
	<p class="validateTips">All form fields are required.</p>
	<form>
		<fieldset>
		
			<label for="name">Operation</label>
			<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
			
			<label for="email">Date</label>
			<input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all">
			
			<label for="password">Declencheur</label>
			<input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">
			
			<label for="RPL">RPL</label>
			<input type="text" name="RPL" id="RPL" class="text ui-widget-content ui-corner-all">
			
			<label for="Budget">Budget</label>
			<input type="text" name="Budget" id="Budget" class="text ui-widget-content ui-corner-all">
			
			<label for="CI">Valide CI</label>
			<input type="text" name="CI" id="CI" class="text ui-widget-content ui-corner-all">
			
			<!-- Allow form submission with keyboard without duplicating the dialog button -->
			<input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
			
		</fieldset>
	</form>
	
</div>