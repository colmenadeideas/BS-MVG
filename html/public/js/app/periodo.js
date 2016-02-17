define(['globals', 'functions', 'app/newsletter'], function(globals, functions, newsletter) {
console.log('load perido');

	function printdocs()
	{
		$('#printable-area').printArea();
	}

	function checkcurrentform() 
	{
	    console.log('load checkcurrentform');
		
		if ($('#newsletter').length === 1) {
			newsletter.validate();
		}
		if ($('#newsletter').length === 1) {
			newsletter.validate();
		}


		if ($('#complete-registration').length === 1) {
			functions.initForm();
			
		$('#factura1').click(function() {
			if ($('#factura1').is(':checked')) {
					$('#factura-juridica').collapse('show');
				} 
		}); 
		
		$('#factura2').click(function() {
			if ($('#factura2').is(':checked')) {
					$('#factura-juridica').collapse('hide');
		}
	}); 


	}

		$(function(){
		  // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
		  $("#agregar").on('click', function(){
		    $("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
		  });
		 
		  // Evento que selecciona la fila y la elimina 
		  $(document).on("click",".eliminar",function(){
		    var parent = $(this).parents().get(0);
		    $(parent).remove();
		  });
		});
	//jQuery time
	var current_fs, next_fs, previous_fs;   //fieldsets
	var left, opacity, scale; 			   //fieldset properties which we will animate
	var animating; 						  //flag to prevent quick multi-click glitches
	var i = 0;
	

	

	$(".next").click(function() 
	{
			
		if($(this).val()=='Asignar pensum »')
		{
			$.ajax({
						type : "POST",
						url : URL + "controldeestudios/periodo",
						data : $("form").serialize(),
						timeout : 12000,
						success : function(response) {
							console.log(response);
							  console.log('paseeee');
							  $('#response').html(response);

							 // $('#periodo-step2').html(response).fadeIn('fast');
						},
						error : function(response) {
							console.log(response);
							 
						}
					});
		}
		console.log('load next');

		//if(animating) return false;
		//animating = true;
		
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		// Besign: Validate before going further //
		//find the form to validate
		var formulario = $(this).closest('form');
			
		var $valid = formulario.valid(); 
			if(!$valid) { 
				$validator.focusInvalid();
				return false;
			} //else  continuar!
			//show the next fieldset
			next_fs.show(); 
		//end Besign //	
	
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");	
		
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')'});
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
		
	});
	
	$(".previous").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		
		//de-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		
		//show the previous fieldset
		previous_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});
}
 function run() {

 	$('.datetimepicker').datetimepicker({
		pickTime : false
	});
	$('[name=birthdate]').on("dp.change", function(e) {
		//TODO get date and fill AGE
		// e.date
		//  function _calculateAge(birthday) { // birthday is a date
		/* var ageDifMs = Date.now() - birthday.getTime();
		var ageDate = new Date(ageDifMs); // miliseconds from epoch
		// return
		agea = Math.abs(ageDate.getUTCFullYear() - 1970);*/
		// agea = e.date;
		// console.log(agea);
		//}
	});
 }




return {
      run: run,
      checkcurrentform: checkcurrentform
	}
});