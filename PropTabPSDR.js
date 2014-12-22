function initTab(){

// Proprietes fonctionnelles du tableau PSDR

var rows = document.getElementsByTagName('tr');
var nbRows = rows.length;

var jEntete;
var notfound = true;
var j = 0;


//recherche de la premiere ligne entete
while(notfound & j<nbRows){
	
	if(rows[j].cells[0].className == 'EnteteTab'){
		
		notfound = false;
		jEntete = j;
	}
	else{
	j++;
	
	}
}

var nbCols = rows[jEntete].cells.length;
	
//parcours du tableau
for(j=jEntete; j<nbRows; j++){

	for(i=0; i<nbCols; i++)  
	{
		var cellule = rows[j].cells[i];
		
		switch(cellule.className) 
		{
		case 'EnteteTab':
			
			cellule.style.backgroundColor = 'red';


        break;
		
		case 'TabGauche':
		
			if (i==3){
				
				cellule.style.backgroundColor = 'blue';
			
				cellule.id = "NRA-"+j;
				cellule.onclick = function(){LeftPartClick(this)};
				cellule.onmouseenter = function(){LeftPartMouseOver(this)};
			
			
			}
			else{
			
				cellule.style.backgroundColor = 'blue';
			
				cellule.id = ""+j+"-"+i;
				cellule.onclick = function(){LeftPartClick(this)};
				cellule.onmouseenter = function(){LeftPartMouseOver(this)};
			}
			
        break;
		
		case 'TabDroite':
		
			cellule.style.backgroundColor = 'green';
			
			cellule.id = ""+j+"-"+i;
			cellule.ondblclick = function(){RightPartDbClick(this)};
			cellule.onmouseenter = function(){RightPartMouseOver(this)};
        break;
		
		} 

	}
	
	
}
}

//Fonctionnalitées par parties

function RightPartDbClick(monid)
{

	var partsArray = monid.id.split('-');
	var j = partsArray[0];
	var i = partsArray[1];
	
	var CodeNRA = document.getElementById('NRA-'+j).innerHTML;
	var OPDSLAM = document.getElementsByClassName('EnteteTab')[i].getElementsByTagName('div')[0].innerHTML;
	
	///////////////////////////////////////////// RECUP Données ////////////////////////////////////////
	
	
	//// Valeur ///
	 document.getElementById('Valeur').value = document.getElementById(monid.id).innerHTML;
   
   ///////// CHamp COmmentaire ///////////////////////
   
   ///// OMAR :
   
    $.ajax({
                    type: "GET",
                    url: "CommentaireOMAR.php?Nra="+CodeNRA+"&OP="+OPDSLAM+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						document.getElementById('OMAR').value = data;
						
                    }
                });
	
	//// PROG :	
		        $.ajax({
                    type: "GET",
                    url: "CommentaireProg.php?Nra="+CodeNRA+"&OP="+OPDSLAM+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						document.getElementById('Prog').value = data;
						
                    }
                });
   

	
	//////////////////Ouvre la fenetre OP DSLAM //////////////////////////////////////
	
   $( "#FenetreOPDslam" ).dialog( "open" );
   
    
   //////////////////////////UPDATE ////////////////////////////////////////////////////////
   
   document.getElementById('Valeur').onchange = function(){
		
		var Valeur = document.getElementById('Valeur').value;
		
		// Update valeur
		$.ajax({
                    type: "POST",
                    url: "ModifBD.php?Nra="+CodeNRA+"&OP="+OPDSLAM+"&Valeur="+Valeur+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						
						document.getElementById(monid.id).innerHTML = Valeur;
                    }
                });
		
		};
   
		   
			//On change OMAR
      document.getElementById('OMAR').onchange = function(){
		
		var Valeur = document.getElementById('OMAR').value;
		
		// Update OMAR
		$.ajax({
                    type: "POST",
                    url: "ModifBDCommentaire.php?Nra="+CodeNRA+"&OP="+OPDSLAM+"&OMAR="+Valeur+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						
						//nothing
						//alert(Valeur);
                    }
                });
		
		};
		
		//On change Prog
		document.getElementById('Prog').onchange = function(){
		
		var Valeur = document.getElementById('Prog').value;
		
		// Update Prog
		$.ajax({
                    type: "POST",
                    url: "ModifBDCommentaire.php?Nra="+CodeNRA+"&OP="+OPDSLAM+"&Prog="+Valeur+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						//nothing
						//alert(Valeur);
                    }
                });
		
		};
   
   		
}

function LeftPartClick(monid)
{
	//Ouvre la fenetre NRA
	
		var partsArray = monid.id.split('-');
		var j = partsArray[0];
		var i = partsArray[1];
		
		var CodeNRA;
		
		if(monid.id == "NRA-"+i){
			CodeNRA = monid.innerHTML;
		}
		else{
			CodeNRA = document.getElementById('NRA-'+j).innerHTML;
		}
		
		
        $.ajax({
                    type: "GET",
                    url: "Fenetre_nra.php?nra="+CodeNRA+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						/////////////////////SI SUCCES ////////////////////
						
						document.getElementById('fenetre_nra').innerHTML = data,
						$( "#fenetre_nra" ).dialog( "open" );
						 
						 
						 document.getElementById('create-user').onclick = function(){OuvertureFentreFormulaire(this)};
					

						////////////////Param Tableau ////////////////////////////OuvertureFentreFormulaire

						var TabOP = document.getElementsByClassName("TabNRA");
						var ligneTab = TabOP.length;
						
						if(ligneTab == 0){
						//nothing
						}
						else{
							var ColTab =  TabOP[0].cells.length;
							//Parcours de lignes
							for(n=0; n<ligneTab; n++){
								//Parcours des colonees
								for(k=0; k<ColTab; k++){
								
									TabOP[n].cells[k].style.backgroundColor = 'green';
									TabOP[n].cells[k].onclick = function(){OuvertureFentreOPTrans(this)};
							
								}
							
							}
						}
						/////////////////////////// Recupere donnée COmmentaire NRA
							
						$.ajax({
									type: "GET",
									url: "CommentaireTRANS.php?Nra="+CodeNRA+"",
									dataType : "text",
				 
								 
									error:function(msg, string){
										alert( "Error !: " + string );
									},
								 
									success:function(data){
										//alert(data);
										document.getElementById('ComNra').value = data;
										
									}
								});

								
						///////////////// Update du commentaire ///////////////////////////
						
						
						document.getElementById('ComNra').onchange = function(){
						
						alert("detection changement");
						var Valeur = document.getElementById('ComNra').value;
						

						// Update Prog
						$.ajax({
									type: "POST",
									url: "ModifBDCommentaire.php?Nra="+CodeNRA+"&ComNra="+Valeur+"",
									dataType : "text",
				 
								 
									error:function(msg, string){
										alert( "Error !: " + string );
									},
								 
									success:function(data){
										//nothing
										alert(Valeur);
										alert(data);
									}
								});
						
						};
											 
					//////////////FIN SUCCES //////////////
                    }
					
					//FIn ajax
                });
				

		
		
		
}








function RightPartMouseOver(monid)
{
   //Au passage de la souris
		
		var partsArray = monid.id.split('-');
		var j = partsArray[0];
		var i = partsArray[1];
	
		var CodeNRA = document.getElementById('NRA-'+j).innerHTML;
		var OPDSLAM = document.getElementsByClassName('EnteteTab')[i].getElementsByTagName('div')[0].innerHTML;
		
        $.ajax({
                    type: "GET",
                    url: "CommentaireDSLAM.php?Nra="+CodeNRA+"&OP="+OPDSLAM+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						document.getElementById(monid.id).title = data;
						
                    }
                });
				
  
		
}

function LeftPartMouseOver(monid)
{
    //Au passage de la souris
	
		var partsArray = monid.id.split('-');
		var j = partsArray[0];
		var i = partsArray[1];
	
		
		var CodeNRA;
		
		if(monid.id == "NRA-"+i){
			CodeNRA = monid.innerHTML;
		}
		else{
			CodeNRA = document.getElementById('NRA-'+j).innerHTML;
		}
		
		
				$.ajax({
                    type: "GET",
                    url: "CommentaireTRANS.php?Nra="+CodeNRA+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						document.getElementById(monid.id).title = data;
                     
                    }
                });
				
   
}

function OuvertureFentreOPTrans(monid){

	// Traitement pour passer en parametre l'ID OP Trans.
	
	var idTrans = monid.className;

	$.ajax({
                    type: "GET",
                    url: "fenetre_DetailOPtrans.php?Id="+idTrans+"",
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						/////////////////////SI SUCCES ////////////////////
						
						document.getElementById('FenetreDetailOPtrans').innerHTML = data,
						$( "#FenetreDetailOPtrans" ).dialog( "open" );	
						
						
						OnChangeCI(idTrans, 'MPG');
						OnChangeCI(idTrans, 'RPL');
						OnChangeCI(idTrans, 'Montant');
						
						
						document.getElementById('valideCI').onclick = function() {
						var Val = 0;	
							if($(this).is(":checked")) 
							{
								
								alert('home is checked');
								Val = 1;
								
							}
							else{
							
								alert("home isn't checked");
								val = 0;
							}
							
							$.ajax({
									type: "POST",
									url: "ModifBDCI.php?ID="+idTrans+"&Carac=CI&Val="+Val+"",
									dataType : "text",

								 
									error:function(msg, string){
										alert( "Error !: " + string );
									},
								 
									success:function(data){
										
										alert(data);
										
									}
							});
	
							
								
								
								
						}
							
					}
						
				});	
			}

	

function OnChangeCI(idTrans, CaracCI){
	

	document.getElementById(CaracCI).onchange = function(){
		
	var Valeur = document.getElementById(CaracCI).value;
;
	// Update Prog
	$.ajax({
				type: "POST",
				url: "ModifBDCI.php?ID="+idTrans+"&Carac="+CaracCI+"&Val="+Valeur+"",
				dataType : "text",

			 
				error:function(msg, string){
					alert( "Error !: " + string );
				},
			 
				success:function(data){
					
					alert(data);
					
					if(CaracCI == 'RPL' || CaracCI == 'Montant'){

						document.getElementById(''+CaracCI+'NRA').innerHTML = Valeur;
					}
					
				}
			});
	
	};

	
	
	

}


function OuvertureFentreFormulaire(monid){
	 $.ajax({
                    type: "GET",
                    url: "Fenetre_Nouvelle_Op.php?nra="+monid,
                    dataType : "text",
 
                 
                    error:function(msg, string){
                        alert( "Error !: " + string );
                    },
                 
                    success:function(data){
						/////////////////////SI SUCCES ////////////////////
					document.getElementById('dialog-form').innerHTML = data,
				
					$( "#dialog-form" ).dialog( "open" );
					$(document).ready(function(){
					// On cache le div a afficher :
					$("#form_FO").hide();
					$("#form_FH").hide();
					$("#form_WDM").hide();
					//un datepicker pour chaque div
					$(".DateFO").datepicker({ dateFormat: 'yy-dd-mm' });
					$(".DateFH").datepicker({ dateFormat: 'yy-dd-mm' });
					$(".DateWDM").datepicker({ dateFormat: 'yy-dd-mm' });
					$(function(value) {
						$("#NomFO").autocomplete({
							source : 'autocomplet.php?nomfo='+value,
							minLength: 1,
							dataType : 'json',
							error:function(msg, string){
								alert( "Error !: " + string );
							},
							success:function(data){
								alert ('toto');
								document.getElementById('NomFO').innerHTML = data;
							}
						}); 
					 });
					$(function(value) {
						$("#NomFH").autocomplete({
							source : 'autocomplet.php?nomfo='+value,
							minLength: 1,
							dataType : 'json',
							error:function(msg, string){
								alert( "Error !: " + string );
							},
							success:function(data){
								alert ('toto');
								document.getElementById('NomFH').innerHTML = data;
							}
						}); 
					 });
					$(function(value) {
						$("#NomWDM").autocomplete({
							source : 'autocomplet.php?nomfo='+value,
							minLength: 1,
							dataType : 'json',
							error:function(msg, string){
								alert( "Error !: " + string );
							},
							success:function(data){
								alert ('toto');
								document.getElementById('NomWDM').innerHTML = data;
							}
						}); 
					 });					 
					 
					});

					}	
			});
			
}
 function find_caract_FO(value){
$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "parametre_operation.php?NomOp=" + value,
			dataType : 'json',
			error:function(msg, string){
				alert( "Error ! : " + string );
			},				
			success:function(data){
				document.getElementById('NbFO').value = data[0];
				document.getElementById('Km_FO').value = data[1];
				document.getElementById('RPL_FO').value = data[2];
				document.getElementById('Cout_FO').value = data[3];
				document.getElementById('Date_FO').value = data[4];
			}
		});
	});
 }
 function find_caract_FH(value){
$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "parametre_operation.php?NomOp=" + value,
			dataType : 'json',
			error:function(msg, string){
				alert( "Error ! : " + string );
			},				
			success:function(data){
				document.getElementById('NbFH').value = data[0];
				document.getElementById('NbBonds_FH').value = data[1];
				document.getElementById('RPL_FH').value = data[2];
				document.getElementById('Cout_FH').value = data[3];
				document.getElementById('Date_FH').value = data[4];
			}
		});
	});
 }
  function find_caract_WDM(value){
$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "parametre_operation.php?NomOp=" + value,
			dataType : 'json',
			error:function(msg, string){
				alert( "Error ! : " + string );
			},				
			success:function(data){
				document.getElementById('NbCreation').value = data[0];
				document.getElementById('NbExtensions').value = data[1];
				document.getElementById('NbBonds_WDM').value = data[2];
				document.getElementById('RPL_WDM').value = data[3];
				document.getElementById('Cout_WDM').value = data[4];
				document.getElementById('Date_WDM').value = data[5];
			}
		});
	});
 }