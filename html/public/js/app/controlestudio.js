define(function() {
	
	var cache = {
		'' : $('.default')
	};
	
	$(window).bind('hashchange', function(e) {
		var url = $.param.fragment();
		// Hide any visible ajax content.
		$('#desktop').children(':visible').hide();

		if (cache[url]) {
			cache[url].show();
		} else {
			$('#preloader').show();
			//create container
			cache[url] = $('<div class="view"/>').appendTo('#desktop').load(url, function() {
			
	       		
	       		//run function according to page
	       		var active_page = url.split( '/' );
	       		
	       		

				var assetUrl = "app/"+active_page[0];
				var assetName = active_page[0];	
				
							console.log ("ss"+active_page[0]);
				
				require([assetUrl], function(Asset) {
					
					
					switch(active_page[0]) {
			       		case 'registrations':
			       			runfunctions(active_page[1]);
			       			break;
			       		case 'registration':
			       			checkcurrentform();
			       			break;
			       	}
					
					
				/*	var getAssetName = assetUrl.split('/');
					var assetName = getAssetName[1];
					assetName.run();*/
					//	assetName.run();
				});
				

				

				$('#preloader').fadeOut();
			});
			/*$.post(url, function(data){
			 $("#desktop").html(data);
			 $('#preloader').hide();
			});*/
		}
	});

	// Trigger and Handle the hash the page may have loaded with
	$(window).trigger('hashchange');
}); 