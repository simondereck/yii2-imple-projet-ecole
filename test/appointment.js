/* Gestion minimale du nombre de motif : si la case est coch�, la quantit� passe � 1.
	Si on deselectionne la case � coch�, la valeur de la quantit� repasse � 0. */
function setQuantity(checkBoxMotive) {

    var nextButton = document.getElementById('nextButtonId');
    var layerMotive = document.getElementById('layerMotive');
    layerMotive.className = "layerMotive";
    disableNextButton(nextButton);

    var previousButton = document.getElementById('previousButtonId');
    disablePreviousButton(previousButton);

    /** r�cup�ration du select en inspectant l'arbre DOM */
    var divChildren = jQuery(checkBoxMotive).parent().parent().children("div");
    var quantity = jQuery(divChildren).children("select");
    if (quantity.length > 0) {
        /** s'il est � 0 => il passe a 1 sinon, il revient � 0. */
        if (checkBoxMotive.checked == false) {
            quantity.val('0');
        } else {
            quantity.val(1);
        }
    }
    layerMotive.className = "noLayerMotive";
    enableNextButton();
    if (currentStep > 1) {
        enablePreviousButton();
    }
    var previousFromFirstStepButtonId = document
        .getElementById("previousFromFirstStepButtonId");
    if (previousFromFirstStepButtonId != null) {
        if (currentStep == beginStep) {
            jQuery("#previousFromFirstStepButtonId").show();
        }
    }

}

/**
 * gestion de l'interface et de l'interaction entrela checkbox et la liste des
 * quantit�s.
 */
function setSelectMotive(selectQuantity) {

    var nextButton = document.getElementById('nextButtonId');
    var layerMotive = document.getElementById('layerMotive');
    layerMotive.className = "layerMotive";
    disableNextButton(nextButton);

    var previousButton = document.getElementById('previousButtonId');
    disablePreviousButton(previousButton);

    var checkMotive = jQuery(selectQuantity).parent().parent().find(
        "input:checkbox");

    if (selectQuantity.value == '0') {
        checkMotive.prop('checked', false)
    } else {
        checkMotive.prop('checked', true)
    }
    layerMotive.className = "noLayerMotive";
    enableNextButton();
    if (currentStep > 1) {
        enablePreviousButton();
    }
    var previousFromFirstStepButtonId = document
        .getElementById("previousFromFirstStepButtonId");
    if (previousFromFirstStepButtonId != null) {
        if (currentStep == beginStep) {
            jQuery("#previousFromFirstStepButtonId").show();
        }
    }
}

/* Gestion de la mise � jour des dispo en fonction du nombre de motifs. */
function upDateAvailabilities(selectQuantity) {
    /** recalcul des disponibilit�s en envoyant la valeur en param�tre */
    refreshAvailabilities(callBackAvailabilities);
}

/**
 *
 * @param callBackFunctionName
 *            fonction pour mettre a jours les disponibilit�s
 * @return
 */
function refreshAvailabilities(callBackFunctionName) {

    var motiveCheckedMap = {};

    /** r�cup�ration des diff�rentes valeur dont on a besoin. */
    var aSiteKey = document.getElementById("ISiteBeanKeySelect").value;
    var aServiceKey = document.getElementById("serviceBeanKey").value;
    var aStartHour = document.getElementById("hourValueSelect").value;
    var aEndHour = document.getElementById("hourValueSelect").value;
    var daySelStr = document.getElementById("dayValueId").value;
    var dayDate = new Date();
    var dateFormatStr = document.getElementById("dateFormatStrId").value;
    dayDate = jQuery.datepicker.parseDate(dateFormatStr, daySelStr);
    // dayDate.setTime(getDateFromFormat(daySelStr, dateFormatStr));
    var aDaySelected = formatDate(dayDate, "yyyy-MM-dd");

    // cr�ation du contenair
    var AppointmentDataBean = {
        siteKey : aSiteKey,
        serviceKey : aServiceKey,
        startHour : aStartHour,
        endHour : aEndHour,
        dateSelected : aDaySelected
    };

    /**
     * r�cup�ration des motifs selectionn� et de leur quantit�s dans la
     * premi�re liste
     */
    var firstField = jQuery('#displayDiv').find('.motiveField1');
    var motiveoneBoxChild = jQuery(firstField).find("input:checkbox");
    var motiveoneQuantityChild = jQuery(firstField).find("select");

    var increment = 0;
    var indexChecked = 0;
    jQuery.each(motiveoneBoxChild, function() {
        if (jQuery(this).prop('checked')) {
            if (motiveoneQuantityChild.length) {
                motiveCheckedMap[jQuery(this).val()] = motiveoneQuantityChild
                    .get(increment).value;
            } else {
                motiveCheckedMap[jQuery(this).val()] = 1;
            }
            indexChecked++;
        }
        increment++;
    });

    /**
     * r�cup�ration des motifs selectionn� et de leur quantit�s dans la
     * deuxi�me liste
     */
    var secondField = jQuery('#displayDiv').find('.motiveField2');
    var motiveTwoBoxChild = jQuery(secondField).find("input:checkbox");
    var motiveTwoQuantityChild = jQuery(secondField).find("select");

    increment = 0;
    jQuery.each(motiveTwoBoxChild, function() {
        if (jQuery(this).prop('checked')) {
            if (motiveTwoQuantityChild.length) {
                motiveCheckedMap[jQuery(this).val()] = motiveTwoQuantityChild
                    .get(increment).value;
            } else {
                motiveCheckedMap[jQuery(this).val()] = 1;
            }
            indexChecked++;
        }
        increment++;
    });

    AjaxSelectionFormFeeder.getUpdatedAvailabilities(motiveCheckedMap,
        AppointmentDataBean, callBackFunctionName);
}

/**
 * Callback si l'appel de rafraichissement proviend des checkbox ou des liste
 * d�roulantes.
 *
 * @param timeareaList
 *            la liste des tiemarea possibles
 *
 */
function callBackAvailabilities(timeareaList) {
    /** nettoyage des disponibilit�s */
    document.getElementById('nbProposalsMaxId').value = 0;

    // r�cup�ration du bouton "suivant"
    var nextButton = document.getElementById('nextButtonId');
    var previousButton = document.getElementById('previousButtonId');
    var layerMotive = document.getElementById('layerMotive');
    layerMotive.className = "noLayerMotive";

    // si la liste n'est pas vide : r�initialisation de l'offset,
    // red�finition
    // du max de dispos et r�activation du bouton "next"
    if (timeareaList != null && timeareaList.length > 0) {
        jQuery('#offsetPageId').val(0);
        document.getElementById('nbProposalsMaxId').value = timeareaList.length;
        // enableNextButton();
        // enablePreviousButton();
        document.getElementById("timeareaempty").style.visibility = "hidden";

        var previousValueId = document.getElementById("previousValueId");
        if (previousValueId.value == 'true') {
            processPreviousStepFadeOut();
        } else {
            processFadeOut('form2');
        }
    } else {
        var previousValueId = document.getElementById("previousValueId");
        if (previousValueId.value == 'true') {
            document.getElementById("timeareaempty").style.visibility = "hidden";
            processPreviousStepFadeOut();
        } else {
            disableNextButton(nextButton);
            disablePreviousButton(previousButton);
            document.getElementById("timeareaempty").style.visibility = "visible";
            enableNextAndPrevious();
        }
    }

}

/**
 * Callback si l'appel de rafraichissement provient du bouton de soumission.
 *
 * @param timeareaList
 *            la liste des tiemarea possibles
 *
 */
function callBackSubmitAvailabilities(timeareaList) {
    // appel de la callback standard.
    callBackAvailabilities(timeareaList);

    // soumission du formulaire.
    document.forms['form2'].submit();
}

/**
 * appell� au chargement de la page, elle permet, via ajax, de mettre � jour
 * correctement les quantit�s.
 *
 * @return
 */
function upDateQuantityMotives() {
    AjaxSelectionFormFeeder.upDateQuantityMotives(QuantityMotivesCallBack);
}

/**
 * callback de l'appel ajax de la m�thode upDateQuantityMotives.
 *
 * @param quantityList
 *            la liste des quantit�s
 * @return
 */
function QuantityMotivesCallBack(quantityList) {
    if (quantityList != null) {

        // r�cup�ration des quantities
        var firstField = jQuery('#displayDiv').find('.motiveField1');
        var secondField = jQuery('#displayDiv').find('.motiveField2');
        var motiveoneQuantityChild = jQuery(firstField).find("select");
        var motiveTwoQuantityChild = jQuery(secondField).find("select");

        // variable pour boucler sur quantityList
        var i = 0;

        // boucle sur la premi�re partie des motifs
        for (j = 0; j < motiveoneQuantityChild.length; j++) {
            var quantity = quantityList[i];
            motiveoneQuantityChild.get(j).value = quantityList[i];

            // si la quantit� est > � z�ro, la checkbox doit �tre
            // 'checked'
            if (quantity > 0) {
                jQuery(motiveoneQuantityChild.get(j)).parent().find(
                    "input:checkbox").attr('checked', 'true');
            } else {
                jQuery(motiveoneQuantityChild.get(j)).parent().find(
                    "input:checkbox").removeAttr('checked');
            }
            i++;
        }

        // boucle sur la deuxi�me partie des motifs
        for (j = 0; j < motiveTwoQuantityChild.length; j++) {
            var quantity = quantityList[i];
            motiveTwoQuantityChild.get(j).value = quantityList[i];

            // si la quantit� est > � z�ro, la checkbox doit �tre
            // 'checked'
            if (quantity > 0) {
                jQuery(motiveTwoQuantityChild.get(j)).parent().find(
                    "input:checkbox").attr('checked', 'true');
            } else {
                jQuery(motiveTwoQuantityChild.get(j)).parent().find(
                    "input:checkbox").removeAttr('checked');
            }
            i++;
        }
    }
}

function loadSoonestAvailabilities() {
    var motiveCheckedMap = {};

    /**
     * r�cup�ration des motifs selectionn� et de leur quantit�s dans la
     * premi�re liste
     */
    var firstField = jQuery('#displayDiv').find('.motiveField1');
    var motiveoneBoxChild = jQuery(firstField).find("input:checkbox");
    var motiveoneQuantityChild = jQuery(firstField).find("select");
    var increment = 0;
    var indexChecked = 0;
    jQuery.each(motiveoneBoxChild, function() {
        if (jQuery(this).prop('checked')) {
            if (motiveoneQuantityChild.length) {
                motiveCheckedMap[jQuery(this).val()] = motiveoneQuantityChild
                    .get(increment).value;
            } else {
                motiveCheckedMap[jQuery(this).val()] = 1;
            }
            indexChecked++;
        }
        increment++;
    });

    /**
     * r�cup�ration des motifs selectionn� et de leur quantit�s dans la
     * deuxi�me liste
     */
    var secondField = jQuery('#displayDiv').find('.motiveField2');
    var motiveTwoBoxChild = jQuery(secondField).find("input:checkbox");
    var motiveTwoQuantityChild = jQuery(secondField).find("select");

    increment = 0;
    jQuery.each(motiveTwoBoxChild, function() {
        if (jQuery(this).prop('checked')) {
            if (motiveTwoQuantityChild.length) {
                motiveCheckedMap[jQuery(this).val()] = motiveTwoQuantityChild
                    .get(increment).value;
            } else {
                motiveCheckedMap[jQuery(this).val()] = 1;
            }
            indexChecked++;
        }
        increment++;
    });
    AjaxMotive.motiveMultiSiteSubmit(motiveCheckedMap,
        motiveMutliSiteSubmitCallback);

}

function motiveMutliSiteSubmitCallback(motiveMultiSiteSubmitAjaxReturn) {
    var msg = "callback is null";
    soonestTimeAreasMap = {};
    if (motiveMultiSiteSubmitAjaxReturn != null) {
        if (motiveMultiSiteSubmitAjaxReturn.foundAvailabilities) {
            if (motiveMultiSiteSubmitAjaxReturn.overrideValue != null) {
                document.getElementById("serviceBeanKey").value = motiveMultiSiteSubmitAjaxReturn.overrideValue.serviceKey;
            }
            if (motiveMultiSiteSubmitAjaxReturn.initPreviousSelectedService) {
                document.getElementById("serviceBeanKey").value = "";
                if (motiveMultiSiteSubmitAjaxReturn.initPreviousSelectedSite) {
                    document.getElementById("ISiteBeanKeySelect").value = "";
                }
            }
            processFadeOut('form2');
            return;
        }
        msg = motiveMultiSiteSubmitAjaxReturn.msg;
    }
    alert(msg);
    enableNextAndPrevious();
}
