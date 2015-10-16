$(document).ready(function() {
	signin();
	
	$('#password-recovery form').validate({
		submitHandler : function(form) {
			$('.recovery-send').attr('disabled', 'disabled');
			$('#recovery-response').html('');
			$.ajax({
				type : "POST",
				url : URL + "account/recover/",
				data : $(form).serialize(),
				timeout : 12000,
				success : function(response) {
					console.log('(' + response + ')');
					$('.recovery-send').removeAttr('disabled');
					$('#recovery-response').html(response).fadeIn('fast');
				},
				error : function(obj, errorText, exception) {
					$('.recovery-send').removeAttr('disabled');
					console.log(errorText);	
				}
			});
			return false;
		}
	});
});
function signin() {

		$('#login').validate({
			messages : {
				email : 'requerido',
				password : 'requerido',
			},
			submitHandler : function(form) {
				$('.send').attr('disabled', 'disabled');
				//prevent double send
				$.ajax({
					type : "POST",
					url : URL + "account/login",
					data : $(form).serialize(),
					timeout : 12000,
					success : function(response) {
						console.log('(' + response + ')');
						$('.send').removeAttr("disabled");
						$("#response").addClass('alert alert-danger');
						switch (response) {
							case 'timeout':
								var htmlz = "<div>¿tienes internet? pacere que hay problemas de conexión</div>";
								$("#response").slideDown(500);
								$(htmlz).hide().appendTo("#response").fadeIn(1000).delay(3000).fadeOut(function() {
									$("#response").slideUp(500);
								});

								break;

							case 'error':
							
								var htmlz = "<div>Usuario o Clave incorrecto</div>";
								
								$("#response").slideDown(500);
								$(htmlz).hide().appendTo("#response").fadeIn(1000).delay(3000).fadeOut(function() {
									$("#response").slideUp(500);
								});

								break;
							
							case 'welcome':
								document.location = URL + 'account/identify';
								break;
								
						}

					},
					error : function(obj, errorText, exception) {
						console.log(errorText);

					}
				});
				return false;
			}
		});

	}
function showrecovery() {
		closeModal('signin');
		$('#signin').on('hidden.bs.modal', function (e) {
			console.log('hidden');
			showModal('password-recovery');
		});
}

	
