define(['globals', 'functions'], function(globals, functions) {
	
	function validate() {

		$('#newsletter').validate({
						
			submitHandler: function(form) {
				$.ajax({
				  type: "POST",
				  url: globals.URL+"newsletter/notifyme",
				  data: $(form).serialize(),
				  timeout: 12000,
				  success: function(response) {
					  console.log(response);
					 $('#response').html(response);					  
					  
				  },
				  error: function(response) {
					  console.log(response);
					$('#response').html(response);	
				  }
				});
				return false;
			}
		});
	}		
return {
      validate: validate
    }
});
