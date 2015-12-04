var modo = 'local';//local or server

var f = 'bootstrap3';
//To Avoid multiple AJAX requests
var isProcessing = false;

if (modo === 'local') {
	//var URL = "http://192.168.1.107/Edil/Web/";
	var URL = "http://localhost/BS-MVG/html/";
	var urlCheck = '/html/';

	var position = 2;

} else {
	var URL = "http://mi.modelsviewgroup.com/";
	var urlCheck = '/';
	var position = 1;

}

var VALOR_IVA = 1.12;
var VALOR_RETENCION = 0.02;