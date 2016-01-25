define(['globals', 'functions'], function(globals, functions) {
	function run() {
		$('#fullpage').fullpage({
			sectionsColor: ['', '', '', '', '#ccddff'],
			anchors: ['cursos-disponibles','escuela-infantil', 'escuela-pre-juvenil', 'escuela-juvenil', 'escuela-certificacion-5-estrellas', 'escuela-taller-automaquillaje'],
			menu: '#escuela-menu',
			paddingBottom:'40px',
			fixedElements: '.fixedfooter, .fixedtitle',
			scrollingSpeed: 1000,
			scrollOverflow: true,
			onLeave: function(index, nextIndex, direction){
	            var leavingSection = $(this);
	            //after leaving section 2
	            if(index == 1 && direction =='down'){
	               $('nav#escuela-menu').css('left', '-450px');
	               $('.fixedtitle').css('top', '0');
	               $('header').css('opacity', '0');	               
	            }
	            if(nextIndex == 1 && direction =='up'){
	               $('nav#escuela-menu').css('left', '0');
	               $('.fixedtitle').css('top', '50px');
	               $('header').css('opacity', '1');
	            }	            
				
      	        $(this).find('.register-instructions').animate({ bottom: '-160px'});
      	        
	        },
	        afterLoad: function(anchorLink, index){

	        	$(this).find('.register-instructions').delay(700).animate({ bottom: '40px'
				}, 1500, 'easeOutExpo');
				
	        },
	        
		});

	   
	}

return {
      run: run     
	}
});