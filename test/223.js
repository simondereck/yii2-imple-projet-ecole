// Provide a default path to dwr.engine
if (dwr == null) var dwr = {};
if (dwr.engine == null) dwr.engine = {};
if (DWREngine == null) var DWREngine = dwr.engine;

if (AjaxAvailableTimeArea == null) var AjaxAvailableTimeArea = {};
AjaxAvailableTimeArea._path = '/eAppointmentpref94/dwr';
AjaxAvailableTimeArea.loadSoonestAvailabilities = function(p2, callback) {
    dwr.engine._execute(AjaxAvailableTimeArea._path, 'AjaxAvailableTimeArea', 'loadSoonestAvailabilities', false, false, p2, callback);
}
AjaxAvailableTimeArea.processSoonestTimeAreaSelected = function(p2, callback) {
    dwr.engine._execute(AjaxAvailableTimeArea._path, 'AjaxAvailableTimeArea', 'processSoonestTimeAreaSelected', false, false, p2, callback);
}
AjaxAvailableTimeArea.savePreselectedRdv = function(callback) {
    dwr.engine._execute(AjaxAvailableTimeArea._path, 'AjaxAvailableTimeArea', 'savePreselectedRdv', callback);
}




// Provide a default path to dwr.engine
if (dwr == null) var dwr = {};
if (dwr.engine == null) dwr.engine = {};
if (DWREngine == null) var DWREngine = dwr.engine;

if (AjaxMotive == null) var AjaxMotive = {};
AjaxMotive._path = '/eAppointmentpref94/dwr';
AjaxMotive.main = function(p0, callback) {
    dwr.engine._execute(AjaxMotive._path, 'AjaxMotive', 'main', p0, callback);
}
AjaxMotive.motiveMultiSiteSubmit = function(p1, callback) {
    dwr.engine._execute(AjaxMotive._path, 'AjaxMotive', 'motiveMultiSiteSubmit', false, p1, callback);
}



