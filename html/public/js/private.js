function runapp(){
	console.log('RUN');
	$(window).bind( 'hashchange', function(e) {
		var hash = location.hash;
		document.title = ( hash.replace( /^#/, '' ) || 'Mi Web | Bienvenido' );
		// Iterate over all nav links, setting the "selected" class as-appropriate.
		$('.nav a').each(function(){
			var that = $(this);
			that[ that.attr( 'href' ) === hash ? 'addClass' : 'removeClass' ]( 'selected' );
		});
	});
	
	//URL Mapping for cache
	/*$('.action').each(function(){
		$(this).data( 'action', {
	      	cache: {
	        // If url is '' (no fragment), display this div's content.
	        //'': $(this).find('.bbq-default')
	    	}
		});
	});
	//Push state for History
	$('.action a[href^=#]').bind( 'click', function(e){
    	var state = {},
		id = $(this).closest( '.action' ).attr( 'id' ),
      	url = $(this).attr( 'href' ).replace( /^#/, '' );
    	state[ id ] = url;
    	$.action.pushState( state );
    	return false;
  	});*/
  	
  	var cache = {
	    '': $('.default')
  	};
  	$(window).bind( 'hashchange', function(e) {
    	var url = $.param.fragment();
        // Hide any visible ajax content.
    	$('#desktop').children(':visible').hide();
    	
    	if ( cache[ url ] ) {
      		cache[ url ].show();
     	} else {
	     	$( '#preloader' ).show();
      		//create container
      		cache[ url ] = $( '<div class="view"/>' )
      		.appendTo( '#desktop' )
	       	.load( url, function(){
	       		
	       		//run function according to page
	       		var active_page = url.split( '/' );
	       		
	       		switch(active_page[0]) {
	       			case 'filejobs':
	       				filejobs();
	       				break;
	       			case 'users':
		       			users();
		       			break;
	       			case 'supplies':
	       				supplies();
	       				break;
	       			case 'payments':
	       				payments();
	       				break;
	       			case 'prices':
	       				prices();
		       			break;
	       			default:
	       				pages();
	       				break;
	       		}
	       		
	       		
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
};