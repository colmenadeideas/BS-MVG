define(['globals', 'functions'], function(globals, functions) {
	function run() {
		


		$(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                // run our call for pagination
                console.log( "·Hit the end");
            }
        });
		

	   
	}

return {
      run: run     
	}
});