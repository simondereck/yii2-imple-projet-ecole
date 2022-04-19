

function coin() {
    var reg = /^(94){1}\d{3}$/;
    var num = /^\d{5}$/;

    var site = 0;


    //Si CP géré par Créteil
    if ((num.exec(document.forms.frm.CP.value) != null) &&
        (
            parseInt(document.forms.frm.CP.value)==94480
            || parseInt(document.forms.frm.CP.value)==94140
            || parseInt(document.forms.frm.CP.value)==94470
            || parseInt(document.forms.frm.CP.value)==94380
            || parseInt(document.forms.frm.CP.value)==94220
            || parseInt(document.forms.frm.CP.value)==94600
            || parseInt(document.forms.frm.CP.value)==94000
            || parseInt(document.forms.frm.CP.value)==94200
            || parseInt(document.forms.frm.CP.value)==94450
            || parseInt(document.forms.frm.CP.value)==94700
            || parseInt(document.forms.frm.CP.value)==94520
            || parseInt(document.forms.frm.CP.value)==94440
            || parseInt(document.forms.frm.CP.value)==94310
            || parseInt(document.forms.frm.CP.value)==94520
            || parseInt(document.forms.frm.CP.value)==94100
            || parseInt(document.forms.frm.CP.value)==94410
            || parseInt(document.forms.frm.CP.value)==94440
            || parseInt(document.forms.frm.CP.value)==94370
            || parseInt(document.forms.frm.CP.value)==94460
            || parseInt(document.forms.frm.CP.value)==94440
            || parseInt(document.forms.frm.CP.value)==94290
            || parseInt(document.forms.frm.CP.value)==94190
            || parseInt(document.forms.frm.CP.value)==94400
        ))
    {
        var site = 1;
    }
    //Si CP géré par Nogent
    if ((num.exec(document.forms.frm.CP.value) != null) &&
        (
            parseInt(document.forms.frm.CP.value)==94360
            || parseInt(document.forms.frm.CP.value)==94500
            || parseInt(document.forms.frm.CP.value)==94430
            || parseInt(document.forms.frm.CP.value)==94120
            || parseInt(document.forms.frm.CP.value)==94340
            || parseInt(document.forms.frm.CP.value)==94510
            || parseInt(document.forms.frm.CP.value)==94170
            || parseInt(document.forms.frm.CP.value)==94420
            || parseInt(document.forms.frm.CP.value)==94130
            || parseInt(document.forms.frm.CP.value)==94880
            || parseInt(document.forms.frm.CP.value)==94490
            || parseInt(document.forms.frm.CP.value)==94160
            || parseInt(document.forms.frm.CP.value)==94350
            || parseInt(document.forms.frm.CP.value)==94300
        ))
    {
        var site = 2;
    }
    //Si CP géré par LHayeLesRoses
    if ((num.exec(document.forms.frm.CP.value) != null) &&
        (
            parseInt(document.forms.frm.CP.value)==94110
            || parseInt(document.forms.frm.CP.value)==94230
            || parseInt(document.forms.frm.CP.value)==94550
            || parseInt(document.forms.frm.CP.value)==94260
            || parseInt(document.forms.frm.CP.value)==94250
            || parseInt(document.forms.frm.CP.value)==94270
            || parseInt(document.forms.frm.CP.value)==94240
            || parseInt(document.forms.frm.CP.value)==94150
            || parseInt(document.forms.frm.CP.value)==94320
            || parseInt(document.forms.frm.CP.value)==94800
        ))
    {
        var site = 3;
    }

    if(navigator.cookieEnabled)
    {
        var paramMobile="&mobile="+mobile;
        switch(site) {
            case 0:
                // Mauvaise CP saisie
                alert('Veuillez saisir un code postal valide.');
                document.forms.frm.CP.value = "";
                // Test pour utiliser le champs CP en tant que code AGEDREF
                //var url ='https://rdv-etrangers-94.interieur.gouv.fr/eAppointmentpref94/'+"appointment.do?userZip="+document.forms.frm.CP.value+paramMobile;
                //alert (url);
                break;
            case 1:
                // CP géré par P941 - Créteil
                //var url ='https://rdv-etrangers-94.interieur.gouv.fr/eAppointmentpref94/'+"appointment.do?sitekey=P941&userZip="+document.forms.frm.CP.value+paramMobile;
                var url ='https://rdv-etrangers-94.interieur.gouv.fr/eAppointmentpref94/'+"appointment.do?sitekey=P941"+paramMobile;
                break;
            case 2:
                // CP géré par P942 - Nogent
                //var url ='https://rdv-etrangers-94.interieur.gouv.fr/eAppointmentpref94/'+"appointment.do?sitekey=P942&userZip="+document.forms.frm.CP.value+paramMobile;
                var url ='https://rdv-etrangers-94.interieur.gouv.fr/eAppointmentpref94/'+"appointment.do?sitekey=P942"+paramMobile;
                break;
            case 3:
                // CP géré par P943 - LHayeLesRoses
                //var url ='https://rdv-etrangers-94.interieur.gouv.fr/eAppointmentpref94/'+"appointment.do?sitekey=P943&userZip="+document.forms.frm.CP.value+paramMobile;
                var url ='https://rdv-etrangers-94.interieur.gouv.fr/eAppointmentpref94/'+"appointment.do?sitekey=P943"+paramMobile;
        }

        if(site != 0)
        {
            //alert(url);
            window.location.assign(url);
        }
        // Test pour utiliser le champs CP en tant que code AGDREF
        //if(site = 0)
        //{
        //	//alert(url);
        //	window.location.assign(url);
        //}
        var site = 0;
        document.forms.frm.CP.value = "";

    }
    else
    {
        alert("Vous devez activer les cookies pour pouvoir utiliser l'application de prise de rendez-vous");
    }
}
