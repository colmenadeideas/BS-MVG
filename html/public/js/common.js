
function roundNumber(num) {
	return (num.toString().indexOf(".") !== -1) ? num.toFixed(2) : num;
}

jQuery.validator.addMethod("bsformat", function(value, element) {
	return this.optional(element) || /^([0-9]+(\.[0-9][0-9]?)?)$/i.test(value);
}, "Ej 100.00");

//Add Method for URL no http
jQuery.validator.addMethod("web", function(value, element) {
	return this.optional(element) || /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/.test(value);

}, "Introduzca un url válido");

jQuery.validator.addMethod("rifnoguion", function(value, element) {
	return this.optional(element) || /^(V|E|P|J|G)([0-9]{9})$/i.test(value);
	//^(V|E|P|J|G)\d{9}$
	///^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;

}, "Sólo letras mayúsculas y números");

jQuery.validator.addMethod("rif", function(value, element) {
	return this.optional(element) || /^(j|V|E|P|J|G)(-)([0-9]{8})(-)([0-9]{1})$/i.test(value);

}, "Introduzca RIF como J-12345678-9");



//Change Validation default Messages

jQuery.extend(jQuery.validator.messages, {
	required : "requerido",
	email : "Hay un error con el correo.. revisalo!",
	url : "Esto no parece un URL...",
	date : "Please enter a valid date.",
	number : "Sólo números",
	digits : "Sólo números.",
	creditcard : "Please enter a valid credit card number.",
	equalTo : "los campos no coinciden",
	accept : "Please enter a value with a valid extension.",
	maxlength : jQuery.validator.format("Please enter no more than {0} characters."),
	minlength : jQuery.validator.format("Coloca al menos {0} caracteres."),
	rangelength : jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
	range : jQuery.validator.format("Please enter a value between {0} and {1}."),
	max : jQuery.validator.format("Please enter a value less than or equal to {0}."),
	min : jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});

// Caracteres extraÃ±os, acentos y eÃ±es
var normalize = (function() {
	var from = "ÃƒÃ€ÃÃ„Ã‚ÃˆÃ‰Ã‹ÃŠÃŒÃÃÃŽÃ’Ã“Ã–Ã”Ã™ÃšÃœÃ›Ã£Ã Ã¡Ã¤Ã¢Ã¨Ã©Ã«ÃªÃ¬Ã­Ã¯Ã®Ã²Ã³Ã¶Ã´Ã¹ÃºÃ¼Ã»Ã‘Ã±Ã‡Ã§", to = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc", mapping = {};

	for (var i = 0, j = from.length; i < j; i++)
		mapping[ from.charAt(i)] = to.charAt(i);

	return function(str) {
		var ret = [];
		for (var i = 0, j = str.length; i < j; i++) {
			var c = str.charAt(i);
			if (mapping.hasOwnProperty(str.charAt(i)))
				ret.push(mapping[c]);
			else
				ret.push(c);
		}
		return ret.join('');
	}
})();

/*function getPage(position){
	
	var pathArray = window.location.pathname.split( '/' );
	var accessToArray = pathArray[position];
	console.log("Access:" + accessToArray);
	return accessToArray;
	
}*/

function pad (str, max) {
  str = str.toString();
  return str.length < max ? pad("0" + str, max) : str;
}


//Definition for mask



// Datatable vars
language_emptytable = "No hay resultados";
language_processing = "Cargando...";
language_info = "_START_ - _END_ de _TOTAL_";
language_show = "_MENU_ items";
language_search = "Buscar: ";
language_search_placeholder = 'Escriba para filtrar...';


