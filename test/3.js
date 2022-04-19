
// Provide a default path to dwr.engine
if (dwr == null) var dwr = {};
if (dwr.engine == null) dwr.engine = {};
if (DWREngine == null) var DWREngine = dwr.engine;

if (AjaxSelectionFormFeeder == null) var AjaxSelectionFormFeeder = {};
AjaxSelectionFormFeeder._path = '/eAppointmentpref94/dwr';
AjaxSelectionFormFeeder.getHoursProposalForADayJS = function(p2, p3, p4, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getHoursProposalForADayJS', false, false, p2, p3, p4, callback);
}
AjaxSelectionFormFeeder.getHoursProposalForADayAllSites = function(p2, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getHoursProposalForADayAllSites', false, false, p2, callback);
}
AjaxSelectionFormFeeder.getServiceSiteFromSiteCode = function(p1, p2, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getServiceSiteFromSiteCode', false, p1, p2, callback);
}
AjaxSelectionFormFeeder.initTimeAreaBeanListForDayAndHourJS = function(p1, p2, p3, p4, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'initTimeAreaBeanListForDayAndHourJS', false, p1, p2, p3, p4, callback);
}
AjaxSelectionFormFeeder.initTimeAreaBeanListForDayAndHourAllSites = function(p1, p2, p3, p4, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'initTimeAreaBeanListForDayAndHourAllSites', false, p1, p2, p3, p4, callback);
}
AjaxSelectionFormFeeder.checkSelectionValidity = function(p1, p2, p3, p4, p5, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'checkSelectionValidity', false, p1, p2, p3, p4, p5, callback);
}
AjaxSelectionFormFeeder.getServiceBeanList = function(p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getServiceBeanList', false, p1, callback);
}
AjaxSelectionFormFeeder.getClosedDaysList = function(p1, p2, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getClosedDaysList', false, p1, p2, callback);
}
AjaxSelectionFormFeeder.getSiteBeanList = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getSiteBeanList', callback);
}
AjaxSelectionFormFeeder.getMotiveBeanList = function(p1, p2, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getMotiveBeanList', false, p1, p2, callback);
}
AjaxSelectionFormFeeder.getSiteKey = function(p0, p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getSiteKey', p0, p1, callback);
}
AjaxSelectionFormFeeder.getSiteBeanForSiteKey = function(p0, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getSiteBeanForSiteKey', p0, callback);
}
AjaxSelectionFormFeeder.getBeginDateToRetrieveAvailibilities = function(p0, p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getBeginDateToRetrieveAvailibilities', p0, p1, callback);
}
AjaxSelectionFormFeeder.getHoursProposalList = function(p0, p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getHoursProposalList', p0, p1, false, callback);
}
AjaxSelectionFormFeeder.getUpdatedAvailabilities = function(p2, p3, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getUpdatedAvailabilities', false, false, p2, p3, callback);
}
AjaxSelectionFormFeeder.getHoursProposalForADay = function(p2, p3, p4, p5, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getHoursProposalForADay', false, false, p2, p3, p4, p5, callback);
}
AjaxSelectionFormFeeder.initTimeAreaBeanListForDayAndHour = function(p1, p2, p3, p4, p5, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'initTimeAreaBeanListForDayAndHour', false, p1, p2, p3, p4, p5, callback);
}
AjaxSelectionFormFeeder.setLanguage = function(p0, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'setLanguage', p0, callback);
}
AjaxSelectionFormFeeder.getLocaleGMToffSet = function(p0, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getLocaleGMToffSet', p0, callback);
}
AjaxSelectionFormFeeder.getHostGMToffSetWithDayLightForNow = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getHostGMToffSetWithDayLightForNow', callback);
}
AjaxSelectionFormFeeder.getClosedDaysAllSites = function(p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getClosedDaysAllSites', false, p1, callback);
}
AjaxSelectionFormFeeder.setJavascriptGlobalVariable = function(p2, p3, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'setJavascriptGlobalVariable', false, false, p2, p3, callback);
}
AjaxSelectionFormFeeder.returnAfterConfirmation = function(p2, p3, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'returnAfterConfirmation', false, false, p2, p3, callback);
}
AjaxSelectionFormFeeder.goToAPreviousStep = function(p2, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'goToAPreviousStep', false, false, p2, callback);
}
AjaxSelectionFormFeeder.upDateQuantityMotives = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'upDateQuantityMotives', false, false, callback);
}
AjaxSelectionFormFeeder.initMotiveList = function(p1, p2, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'initMotiveList', false, p1, p2, callback);
}
AjaxSelectionFormFeeder.getSubmitFormFunction = function(p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getSubmitFormFunction', false, p1, callback);
}
AjaxSelectionFormFeeder.positionAtBeginStep = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'positionAtBeginStep', false, false, callback);
}
AjaxSelectionFormFeeder.incrementStep = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'incrementStep', false, callback);
}
AjaxSelectionFormFeeder.setNewTimeAreaWhenOnChangeSite = function(p2, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'setNewTimeAreaWhenOnChangeSite', false, false, p2, callback);
}
AjaxSelectionFormFeeder.confirmdeleteAppointmentDuplicated = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'confirmdeleteAppointmentDuplicated', false, false, callback);
}
AjaxSelectionFormFeeder.getSiteKeyAndServciceKeyFromHours = function(p2, p3, p4, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getSiteKeyAndServciceKeyFromHours', false, false, p2, p3, p4, callback);
}
AjaxSelectionFormFeeder.confirmAppointment = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'confirmAppointment', false, false, callback);
}
AjaxSelectionFormFeeder.loadTimeAreaBeanListForDayAndHourJS = function(p2, p3, p4, p5, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'loadTimeAreaBeanListForDayAndHourJS', false, false, p2, p3, p4, p5, callback);
}
AjaxSelectionFormFeeder.premiumSiteListFormSubmit = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'premiumSiteListFormSubmit', false, false, callback);
}
AjaxSelectionFormFeeder.getSiteBeanListFiltered = function(p0, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'getSiteBeanListFiltered', p0, false, false, callback);
}
AjaxSelectionFormFeeder.checkAndProcessMotiveStepOnChangeSite = function(p2, p3, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'checkAndProcessMotiveStepOnChangeSite', false, false, p2, p3, callback);
}
AjaxSelectionFormFeeder.checkServiceSelContainAvailabilities = function(p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'checkServiceSelContainAvailabilities', false, p1, callback);
}
AjaxSelectionFormFeeder.cleanFormFromOrga = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'cleanFormFromOrga', false, callback);
}
AjaxSelectionFormFeeder.cleanFormFromSite = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'cleanFormFromSite', false, callback);
}
AjaxSelectionFormFeeder.cleanFormFromService = function(callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'cleanFormFromService', false, callback);
}
AjaxSelectionFormFeeder.numberOfMonthToDisplayInCalendar = function(p1, callback) {
    dwr.engine._execute(AjaxSelectionFormFeeder._path, 'AjaxSelectionFormFeeder', 'numberOfMonthToDisplayInCalendar', false, p1, callback);
}
