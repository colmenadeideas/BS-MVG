define(['globals', 'functions'], function(globals, functions) {
	function run() {
		
		$(window).scroll(function(){
			var category = $('[name="category"]').last().val();

            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
               //Call for Pagination
                var pagination = $('[name="pagination"]').last().val();
                console.log( "Hit the end"+pagination);
                $('div#loadmore').show();
                $.ajax({
					url: globals.URL+"agencia/load/"+category+"/"+pagination,
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