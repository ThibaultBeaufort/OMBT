<?php

	if(isset($_GET['Type'])){
	$Type =$_GET['Type'];
	
	

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
	
	Detail CI :
	
		<?php




		?>
	</div>

</div>

<?php

}

?>