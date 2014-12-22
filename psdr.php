<script type="text/javascript" src="appelFenetre.js"></script>
<script type="text/javascript" src="PropTabPSDR.js"></script>	
<script type="text/javascript" src="princeFilter.JQuery.js"></script>	

<?php

require('controle_user.php');
require('connect.php');
$sql = "SELECT codeNRA FROM NRA";
$requete = mysqli_query($conn, $sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$data = mysqli_fetch_assoc($requete);
$nbligne = mysqli_num_rows($requete);

?>

<form id="liste_tri">
	<select name="DR" id="liste_dr" onChange="find_dr(this.value)">
		<option selected="selected">DR</option>
		<option value="B2" >B2</option>
		<option value="K2">K2</option>
		<option value="T1">T1</option>
		<option value="P0">P0</option>
	</select>
	<div class="ui-widget">
		<input   type='text' name='nomnra' id='nra' onChange="find_nra(this.value)" onFocus="javascript:this.value=''" value = "Rechercher NRA"/>
		<input   type='text' name='nomboucle' id='boucle' onChange="find_boucle(this.value)" onFocus="javascript:this.value=''" value = "Rechercher par boucle"/>
	</div>
</form>
<div id="test">
	<!-- S'affiche le tableau ! -->
</div>

<!-- Declaration des fenetres du tableau -->
<div id="fenetre_nra">

</div>
<div id="fenetre_OPDslam">

</div>
<div id="fenetre_formulaire">
	
</div>

<div id="FenetreDetailOPtrans">

</div>


<script>  

$(function(value) {
	$("#nra").autocomplete({
		source : 'autocomplet.php?nra='+value,
        minLength: 1,
		dataType : 'json',
		error:function(msg, string){
			alert( "Error !: " + string );
		},
		success:function(data){
			document.getElementById('nra').innerHTML = data;
		}
	}); 
 });
$(function(value){
    $("#boucle").autocomplete({  
		source : 'autocomplet.php?boucle='+value,
        minLength: 1,
		dataType : 'json',
		error:function(msg, string){
			alert( "Error !: " + string );
		},
		success:function(data){
			document.getElementById('boucle').innerHTML = data;
		}
	}); 
});
function find_nra(value){
	$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "tab.php?param2=" + value,
			dataType : "html",
			error:function(msg, string){
				alert( "Error ! : " + string );
			},			
			success:function(data){
				document.getElementById('test').innerHTML = data;
					$('#tbl_MytableID').princeFilter();
			}
		});
	});
}
function find_boucle(value){
	$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "tab.php?param3=" + value,
			dataType : "html",
			error:function(msg, string){
				alert( "Error ! : " + string );
			},				
			success:function(data){
				document.getElementById('test').innerHTML = data;
				$('#tbl_MytableID').princeFilter();
			}
		});
	});
}
function find_dr(value){
	$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "tab.php?param1=" + value,
			dataType : "html",
			error:function(msg, string){
				alert( "Error !: " + string );
			},
			success:function(data){
				document.getElementById('test').innerHTML = data;
					$('#tbl_MytableID').princeFilter();
			}
		});
	});
	return(value);	
}			
function find_op(value){
 if (value == 'FO'){
  $("#form_FO").show();
  $("#form_FH").hide();
  $("#form_WDM").hide(); 

 }
 else if (value == 'FH'){
  $("#form_FH").show();
  $("#form_FO").hide();
  $("#form_WDM").hide();
 }
 else if (value == 'WDM'){
  $("#form_WDM").show(); 
  $("#form_FO").hide();
  $("#form_FH").hide();
 }
}  


</script>