define(function() {
	
	var cache = {
		'' : $('.default')
	};

	$(window).bind('hashchange', function () {
		var url = $.param.fragment();
		// Hide any visible ajax content.
		$('#desktop').children(':visible').hide();	

		if (cache[url]) {
			cache[url].show();	//$('#preloader').fadeOut();			
		} else {
			$('#preloader').show();			
			//show preloader per request -- This is not related to first login preloader			
			cache[url] = $('<div class="view"/>').appendTo('#desktop').load(url, function() {
				
				//run function according to page
				var active_page = url.split('/');
				
				console.log(active_page[0]);

				switch(active_page[0]) {
					
					case "registrations":
						require(['app/registrations'], function(registrations) {
							registrations.run(active_page[1]);
						});						
						break;

					case "registration":
						require(['app/registration'], function(registration) {
							registration.checkcurrentform();
																										
						});						
						break;
					case "profesor":
						require(['app/profesor'], function(profesor) {
							profesor.checkcurrentform();
																										
						});
					case "cronogramas":
						require(['app/cronogramas'], function(Cronogramas) {
							Cronogramas.run();																										
						});						
						break;
					case "users":
						require(['app/users'], function(Users) {
							Users.run();																										
						});						
						break;
					case "profesores":
						require(['app/profesores'], function(profesores) {
							profesores.run();																										
						});						
						break;	
						
				}

				$('#preloader').fadeOut();
			});
			
		}
		
	});
	// Trigger and Handle the hash the page may have loaded with
	$(window).trigger('hashchange');		
});