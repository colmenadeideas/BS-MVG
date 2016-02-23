define(['globals', 'functions', 'app/newsletter'], function(globals, functions, newsletter) {
console.log('load perido');

	function printdocs()
	{
		$('#printable-area').printArea();
	}

	function checkcurrentform() 
	{
		    console.log('load checkcurrentform');
			
			if ($('#newsletter').length === 1) {
				newsletter.validate();
			}
			if ($('#newsletter').length === 1) {
				newsletter.validate();
			}

			if ($('#pensum').length === 1) {
				functions.initForm();
				console.log('exists pensum!');
				var $validator = $('#pensum').validate({
					rules : {},
				
					onkeyup: false,
					onfocusout: false,
					onclick: false,
					submitHandler : function(form) {
						$('.send').attr('disabled', 'disabled'); //prevent double send
						$.ajax({
							type : "POST",
							url : URL + "controldeestudios/process",
							data : $(form).serialize(),
							timeout : 12000,
							success : function(response) {
								console.log('works' + response);
								  $('#pensum').animate({opacity: 0 });
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


			$(document).ready(function() {
			    var panels = $('.user-infos');
			    var panelsButton = $('.dropdown-user');
			    panels.hide();

			    //Click dropdown
			    panelsButton.click(function() {
			        //get data-for attribute
			        var dataFor = $(this).attr('data-for');
			        var idFor = $(dataFor);

			        //current button
			        var currentButton = $(this);
			        idFor.slideToggle(400, function() {
			            //Completed slidetoggle
			            if(idFor.is(':visible'))
			            {
			                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
			            }
			            else
			            {
			                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
			            }
			        })
			    });
			    $('[data-toggle="tooltip"]').tooltip();
			});


			$(document).ready(function() 
			{
			 	var add_new_row = "#add_row"/*+$("#prueba").val()*/;

   			$(add_new_row).on("click", function() 
   			{
				        // Dynamic Rows Code
				        
				        // Get max row id and set new id
				        var newid = 0;
				        $.each($("#tab_logic tr"), function() 
				        {
				            if (parseInt($(this).data("id")) > newid) {
				                newid = parseInt($(this).data("id"));
				            }
				        });
				        newid++;
				        
				        var tr = $("<tr></tr>", {
				            id: "addr"+newid,
				            "data-id": newid
				        });
				        
				        // loop through each td and create new elements with name of newid
				        $.each($("#tab_logic tbody tr:nth(0) td"), function() 
				        {
				            var cur_td = $(this);
				            
				            var children = cur_td.children();
				            
				            // add new td and element if it has a nane
				            if ($(this).data("name") != undefined) {
				                var td = $("<td></td>", {
				                    "data-name": $(cur_td).data("name")
				                });
				                
				                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
				                c.attr("name", $(cur_td).data("name") + newid);
				                c.appendTo($(td));
				                td.appendTo($(tr));
				            } else {
				                var td = $("<td></td>", {
				                    'text': $('#tab_logic tr').length
				                }).appendTo($(tr));
				            }
				        });
				        
	        
				        // add the new row
				        $(tr).appendTo($('#tab_logic'));
				        
				        $(tr).find("td button.row-remove").on("click", function() {
				             $(this).closest("tr").remove();
				        });
				});




				    // Sortable Code
				    var fixHelperModified = function(e, tr) 
				    {
				        var $originals = tr.children();
				        var $helper = tr.clone();
				    
				        $helper.children().each(function(index) {
				            $(this).width($originals.eq(index).width())
				        });
				        
				        return $helper;
				    };
				  
				   /*$(".table-sortable tbody").sortable({
				        helper: fixHelperModified      
				    }).disableSelection();

				   $(".table-sortable thead").disableSelection();*/



				    $(add_new_row).trigger("click");
});
		
		//jQuery time
		var current_fs, next_fs, previous_fs;   //fieldsets
		var left, opacity, scale; 			   //fieldset properties which we will animate
		var animating; 						  //flag to prevent quick multi-click glitches
		var i = 0;
		

		

		$(".next").click(function(){
			
			if($(this).val()=='Asignar pensum »'){

				$.ajax({
							type : "POST",
							url : URL + "controldeestudios/periodo",
							data : $("form").serialize(),
							timeout : 12000,
							success : function(response) {
								console.log(response);
								  console.log('paseeee');
								  $('#response').html(response);
								  
								  checkcurrentform(); 
								  console.log('probando');

								 // $('#periodo-step2').html(response).fadeIn('fast');
							},
							error : function(response) {
								console.log(response);
								 
							}
						});
			}
			console.log('load next');

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
 
 function run() 
 {

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