function apply_prnc_filter(tblID, currClsss) {
    var allObjcts = [];
    $('.' + currClsss).each(function () {
        var currTxtClass = this;

        if ($(currTxtClass).val().match('{')) {
            allObjcts.push($.parseJSON($(currTxtClass).val()));
        }
    });

    $('#' + tblID + ' tr').css('display', '');

    for (var i = 1; i < $('#' + tblID)[0].rows.length; i++) {
        var showCell = true;

        for (var j = 0; j < allObjcts.length; j++) {
            var myAtIndx = parseInt(allObjcts[j].index);
            try {
					if (allObjcts[j].operand == 'like') {
										if ($('#' + tblID)[0].rows[i].cells[myAtIndx].innerHTML.toLowerCase().match(allObjcts[j].value.toLowerCase())) {
											//showCell = true;
										} 
					else {
                        showCell = false;
                    }
                }
            } catch (e) {
                alert(e + ' -- ' + tblID + ' -- ' + myAtIndx);
            }
        }

        if (showCell == false) {
            $('#' + tblID)[0].rows[i].style.display = 'none';
        }
    }

    $('#dv_prncFltr_FilterSettings').css('display', 'none');

    while (allObjcts.length > 0) {
        allObjcts.pop();
    }
// initFenetre();
// initTab();
};