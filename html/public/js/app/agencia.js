define(['globals', 'functions'], function(globals, functions) {
	function run() {
		
		$(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                // run our call for pagination
                console.log( "·Hit the end");
                $('#pagination').val();
                $('div#loadmore').show();
                $.ajax({
					url: globals.URL+"agencia/load/women/"+pagination,
					success: function(html)	{
						if(html) {
							$("#modelos").append(html);
							$('div#loadmore').hide();
						} else {
							$('div#loadmore').html('<center>No more posts to show.</center>');
						}
					}
				});
            }
        });
		

	   
	}

return {
      run: run     
	}
});