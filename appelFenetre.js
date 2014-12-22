
function initFenetre(){



//ouverture fenetre Détails pour les OP Trans
$(function() {
	$( "#FenetreDetailOPtrans" ).dialog({

		autoOpen: false,
		height: 400,
		width: 800,
		show: {
		effect: "blind",
		duration: 500
		},
		hide: {
		effect: "explode",
		duration: 500
		}
	});

});



//Ouverture de la fenetre OP DSLAM
$(function() {
$( "#FenetreOPDslam" ).dialog({
autoOpen: false,
height: 400,
width: 500,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});

});

//Ouverture de la fenetre NRA
$(function() {
$( "#fenetre_nra" ).dialog({

autoOpen: false,
height: 400,
width: 1000,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});

});




//ouverture formulaire ajout OP
$(function() {
	$( "#dialog-form" ).dialog({

		autoOpen: false,
		height: 650,
		width: 350,
		show: {
		effect: "blind",
		duration: 500
		},
		hide: {
		effect: "explode",
		duration: 500
		}
	});

});



}


