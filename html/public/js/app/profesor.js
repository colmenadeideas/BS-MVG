define(['globals', 'functions', 'app/newsletter'], function(globals, functions, newsletter) {
	
	//define ( function (){
/*$('#print').click(function() {
		//$('#limited-view').removeClass('limited-view');
		$('#printable-area').printArea();
    	return false;
});	*/

	function printdocs(){
		$('#printable-area').printArea();
	}
	function limpiarforma(idform)
	{
      $("#"+idform+" :input").each(function(){
      $(this).val('');
      });
	}
	function loadform(what, id)
	{
		console.log();
		switch (what) {
			case 'payment':
				var rute = 'registration/paymentform/';
				var table = 'registrations';
				var element = 'registrations';
				break;

		}
		$.post(URL + rute + id, function(data) {
			$('#loadmodal .modal-body').hide().html(data).fadeIn('slow');
			functions.initForm();
			//validates & process this form
			switch (what) {
				case 'payment':
					registerpayment();
					break;
			}
			showModal('#loadmodal');

			$('#loadmodal').on('hide.bs.modal', function(e) {
				//$('#'+table+'-list').dataTable().fnDraw();
			});
		});
		return false;
	}

	function registerpayment() {

		$('#payment-registration').validate({
			rules : {
				"payment-number": {	number: true }, 
				"payment-amount": { bsformat: true },
				"payment-code": {
					minlength: 8,
		            maxlength: 8,
					remote: {
						url: URL+'registration/verifycode/',
						type: 'post',
						data: {
		                   // "code": function(){ return $('[name="payment-code"]').val(); },
		                    id: function(){ return $('[name="id"]').val(); }
		               }
					},
					
				},
			},
			messages: {
				"payment-code": { remote:jQuery.format("Codigo de Descuento Invalido") },
			},
			onkeyup: false,
			onfocusout: false,
			onclick: false,
			submitHandler : function(form) {
				$('.send').attr('disabled', 'disabled'); //prevent double send
				$.ajax({
					type : "POST",
					url : URL + "registration/process/payment",
					data : $(form).serialize(),
					timeout : 12000,
					success : function(response) {
						console.log(response);
						closeModal('loadmodal');
						location.hash = 'registration/verify/again';
					},
					error : function(response) {
						console.log(response);
					}
				});
				return false;
			}
		});
		

	}

	function checkcurrentform() 
	{

	console.log("dd2");
	if ($('#complete-registration-cde').length === 1) {
		var form = '#complete-registration-cde';
		functions.initForm();
		console.log("dd3");
		var direccionE = globals.URL + "controldeestudios/saveinfo";
		
		var $validator = $(form).validate({
			rules : {				
			},
		submitHandler : function(form) {
				$('.send').attr('disabled', 'disabled'); //prevent double send
				$.ajax({
					type : "POST",
					url : direccionE,
					data : $(form).serialize(),
					timeout : 12000,
					success : function(response)
					 {
						console.log(response);
						$('#response').html(response); //descomentar al terminar 
						$('.send').removeAttr("disabled");
						limpiarforma("complete-registration-cde");
					},
					error : function(response) {
						$('.send').removeAttr("disabled");
				
					}
				});
				return false;
			}
		});
	
	}

//Step 0
	if ($('#registration').length === 1) {
		functions.initForm();
		console.log('exists registration!');
		var $validator = $('#registration').validate({
			rules : {
				confirm_email : {
					equalTo : "#email"
				},
				"name": {
					remote: {
						url: URL+'registration/alreadylisted/',
						type: 'post',
						data: {
		                   course_id: function(){ return $('[name="course_available_group_id"]').val(); },
		                   email: function(){ return $('[name="email"]').val(); }
		               }
					},
					
				},
			},
			messages: {
				"name": { remote:jQuery.format("Esta inscripción ya existe. Comuniquese con nosotros") },
			},
			onkeyup: false,
			onfocusout: false,
			onclick: false,
			submitHandler : function(form) {
				$('.send').attr('disabled', 'disabled'); //prevent double send
				$.ajax({
					type : "POST",
					url : URL + "registration/process",
					data : $(form).serialize(),
					timeout : 12000,
					success : function(response) {
						console.log('works' + response);
						  $('#registration').animate({opacity: 0 });
						  $('#response').html(response).fadeIn('fast');
					},
					error : function(response) {
						console.log(response);
						 $('.send').removeAttr("disabled");
						 $('#response').html(response).fadeIn('fast');
					}
				});
				return false;
			}
		});
	}
	if ($('#complete-registration-teacher').length === 1)
	{
		var $validator = $('#complete-registration-teacher').validate({
			rules : {
				confirm_email : {
					equalTo : "#email"
				},
				cedula: {
			      digits: true
			   },
			    age: {
			      digits: true
			    },
			     
			},submitHandler : function(form) {
				$('.send').attr('disabled', 'disabled'); //prevent double send
				$.ajax({
					type : "POST",
					url : URL + "registration/process/fullregistration",
					data : $(form).serialize(),
					timeout : 12000,
					success : function(response) {
						console.log(response);
						$('#response').html(response);
						$('.send').removeAttr("disabled");
					},
					error : function(response) {
						console.log(response);
						$('.send').removeAttr("disabled");
						//  $('#registration').animate({opacity: 0 }, 800);
						// $('#failed').bPopup({ modal: false });
					}
				});
				return false;
			}
		});


	}
	//jQuery time
	var current_fs, next_fs, previous_fs; //fieldsets
	var left, opacity, scale; //fieldset properties which we will animate
	var animating; //flag to prevent quick multi-click glitches
	var i = 0;
	
	$(".next").click(function() {
	
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