define(['globals', 'functions'], function(globals, functions) {
	
	
	function run(){
		var all_list = 'cronogramas-all-list';	
		
		//Selects current visible table
		var	currenttable = $('.table-list').last().attr('id');
		console.log(currenttable);

		//Confimation Modal for Complete process button		
		$('#confirm-completation, #confirm-approve').last().on('hidden.bs.modal', function(e) {
			updateTables(currenttable);
		});
		$('.showtooltip').tooltip();

		$('#'+all_list).dataTable({
			"bProcessing": true,
			"bServerSide": true,
			"iDisplayLength": 20,
			"sAjaxSource": globals.URL+"cronogramas/get/all",		
			//"aaSorting": [[ 5, "desc" ]],
		       "aoColumnDefs": [ 
		       		//{ "sClass": "text-left", "aTargets": [ 0, 1 ] },
				   //Format Columns

				   	{   //Profesor     	
			     	 "aTargets": [ 1 ],
			      	 	/*"mData":  function (data) {
			       			//return '<strong class="text-course">'+data[1] +'</strong>';
			       			return '<div class="col-lg-1"><img src="'+globals.URL+'public/img/photo.png" class="img-responsive img-circle" /></div><div class="row col-lg-10"><h4>'+data[1] +'<br><small>'+data[2] +'</small></h4></div>';
			      		}*/
			   	 	

						/*"mData":  function (data) {
			       			//return '<strong class="text-course">'+data[1] +'</strong>';
			       			return '<div class="col-lg-1"><img src="http://localhost/BS-MVG/html/public/img/photo.png" class="img-responsive img-circle" /></div><div class="row col-lg-10"><h4>'+data[1] +'<br><small>'+data[2] +'</small></h4></div>';
			      		}*/
						/*"mData":  function (data) {
							return data[2];
						},*/
						//"mData": "lastname",
			      		"mRender": function (data) {
			      			var response = JSON.parse(data);
			      			console.log(response);
			      			
                        	return '<img src="http://localhost/BS-MVG/html/public/img/photo.png"></>'+data ;
						}

					},

			   	 	{   //Group     	
			     	 "aTargets": [ 2 ],
			      	 	"mData":  function (data) {
			       			return '<small class="text-course">'+data[2] +'</small>';
			      		}
			   	 	},/*
				   	{   //Full Name     	
			     	 "aTargets": [ 3 ],
			      	 	"mData":  function (data) {
		    	   			return data[3] +' '+data[4];
			      		}
			   	 	},
					{   //Lastname     	
				  	 "aTargets": [ 4 ],
				   	 	"mData":  function (data) {
				   			return '';
				   		}
				 	},
				   	{   //Date     	
				   	 "aTargets": [ 5 ],
				   	 	"mData":  function (data) {
				   			return functions.getOnlyDate(data[5]);
				  		}
				 	},
				 	{   //Status     	
				   	 "aTargets": [ 6 ],
				   	 	"mData":  function (data) {
				   			return '<span class="label label-default '+data[6]+'">'+translateStatus(data[6])+'</span>';
				  		}
				 	},
					{   //Botones y Detalle     	
					  	 "aTargets": [ 7 ],
					  	 	"mData":  function (data) {
					  	 		
					  	 		var currentstatus = data[6];
					  	 		
					  	 		switch(currentstatus) {
					  	 			case 'pending':
					  	 				return '<div class="btn-group">'+actionbuttons('delete',data[0])+actionbuttons('edit',data[0])+actionbuttons('registerpayment',data[0])+'</div>'; 
					  	 				break;
					  	 				
					  	 			case 'clearpayment':
					  	 				return '<div class="btn-group">'+actionbuttons('delete',data[0])+actionbuttons('edit',data[0])+actionbuttons('approve',data[0])+'</div>'; 
					  	 				break;
					  	 				
					  	 			case 'approved':
					  	 				return '<div class="btn-group">'+actionbuttons('delete',data[0])+actionbuttons('edit',data[0])+actionbuttons('docsreminder',data[0])+actionbuttons('complete',data[0])+'</div>'; 
					  	 				break;
					  	 				
					  	 			default:
					  	 				return '<div class="btn-group">'+actionbuttons('edit',data[0])+'</div>';
					  	 				break;
					  	 			
					  	 		}
					  	 		
					  	 		
					   			
					      	},
					      	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
				                activateCells(nTd);

				            }
					   	 },*/
					   	 	
					   	 ],		
						"oLanguage": {
					      "sInfo": language_info,
					      "sLengthMenu": language_show,
					      "sSearch": language_search,
					      "sProcessing": language_processing,
					      "sEmptyTable" : language_emptytable,
					      
					      "oPaginate": {
					        "sPrevious": "",
					        "sNext": "",
					        
					      }
					    }
				});
				$('#'+all_list).each(function(){
						var datatable = $(this);
						// SEARCH - Add the placeholder for Search and Turn this into in-line form control
						var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
						search_input.attr('placeholder', language_search_placeholder);
						search_input.addClass('form-control input-sm');
						// LENGTH - Inline-Form control
						var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
						length_sel.addClass('form-control input-sm');
				});

	}
	
	function updateTables(tablename) {
		$('#'+tablename).dataTable().fnDraw(false);
	}
	function activateCells(nTd){
		$(".showtooltip", nTd).tooltip();
	                
		//THIS IS SUBSTITUTE FOR "ONCLICK" PREVIOUS FUNCTIONS
	    $(".action-approve", nTd).click(function() {											
			var buttonfrom = $(this);
			var element 	= $(this).data('element');
			var id			= $(this).data('registration');
			var targetmodal = "#confirm-approve";//$(this).data('target');
			
			
			$.post(globals.URL+'registrations/showapprovebutton', function(data) {	
				
				$('div.view:visible').find(targetmodal+' .modal-content').hide().html(data).fadeIn('slow');	
				
				functions.showModal(targetmodal);

				$('#confirm-approve .confirmbutton').last().click( function(){ 
					approve(element,id,	functions.closeModal(targetmodal), buttonfrom);	
				});
			});
			
		});
		
/*		$('#confirm-approve').last().on('hidden.bs.modal', function(e) {
			updateTables(currenttable);								 	
	    });
*/	    $(".action-complete", nTd).click(function() {											
			//complete("registrations", $(this).data('registration'));
			var buttonfrom = $(this);
			var element 	= $(this).data('element');
			var id			= $(this).data('registration');
			var targetmodal = "#confirm-completation"; //$(this).data('target');
			
			$.post(globals.URL+'registrations/showcompletationbutton', function(data) {	
				//$('#confirm-completation .modal-content').last().html(data);	
				$('div.view:visible').find(targetmodal+' .modal-content').hide().html(data).fadeIn('slow');
				functions.showModal(targetmodal);	

				$('#confirm-completation .confirmbutton').last().click( function(){ 
					completeregistration(element,id,functions.closeModal(targetmodal), buttonfrom);			 	
				});		
			});
													 	
	    });
	    $(".action-view", nTd).click(function() {											
			edit("registrations", $(this).data('registration'));									 	
	    });
	    $(".action-register-payment", nTd).click(function() {											
			loadform("payment", $(this).data('registration'));									 	
	    });
	    $(".action-docs-reminder", nTd).click(function() {											
			docsreminder("registrations", $(this).data('registration'), $(this));	

	   	});
	}


	function translateStatus(data) {
		switch (data) {
			case 'pending':				newvalue = 'por pago pendiente';					break;
			case 'clearpayment':		newvalue = 'esperando aprobación de pago';			break;
			case 'approved':			newvalue = 'esperando por recepción documentos';	break;
			case 'completed':			newvalue = 'completado';							break;
			case 'cancelled':			newvalue = 'anulado';								break;
			case 'archived':			newvalue = 'anulado';								break;
			
		}
		return newvalue;
	}

	function actionbuttons(buttonname,data) {
		switch (buttonname) {
			case 'approve':
				//finalbutton = '<button title="Aprobar Pago" data-element="registrations" data-registration="'+data+'" data-toggle="modal" data-target="#confirm-approve" type="button" class="btn btn-sm btn-success action-approve showtooltip"><i class="glyphicon glyphicon-ok"></i></button>';
				finalbutton = '<button type="button" title="Aprobar Pago" class="btn btn-sm btn-success action-approve showtooltip" data-registration="'+data+'" data-element="registrations"><i class="glyphicon glyphicon-ok"></i></button>';				
				break;
			case 'delete':
				finalbutton = '<button data-element="registrations" data-registration="'+data+'" data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-sm btn-danger action-delete showtooltip"><i class="glyphicon glyphicon-trash"></i></button>';
				break;
			case 'edit': 
				finalbutton = '<button type="button" title="Ver Información" class="btn btn-sm btn-info action-view showtooltip" data-registration="'+data+'"><i class="glyphicon glyphicon-search"></i></button>';
				break;
			case 'registerpayment': 
				finalbutton = '<button type="button" title="Registrar Pago" class="btn btn-sm btn-default action-register-payment showtooltip" data-registration='+data+'"><i class="fa fa-credit-card fa-lg"></i></button>';
				break;
			case 'docsreminder':  //Step 3
				finalbutton = '<button type="button" title="Reenviar instrucciones" class="btn btn-sm btn-default action-docs-reminder showtooltip" data-registration="'+data+'"><i class="glyphicon glyphicon-envelope"></i></button>';
				break;
			case 'complete':
				//finalbutton = '<button title="Aprobar Documentos Recibi" data-element="registrations" data-registration="'+data+'" data-toggle="modal" data-target="#confirm-completation" type="button" class="btn btn-sm btn-success action-approve action-approve-docs showtooltip"><i class="glyphicon glyphicon-file"></i></button>';				
				finalbutton = '<button type="button" title="Aprobar Documentos Recibidos" class="btn btn-sm btn-success action-complete showtooltip" data-registration="'+data+'" data-element="registrations"><i class="glyphicon glyphicon-file"></i></button>';
				break;					
			
		}
		return finalbutton;
	}
	
	
 



	return {
      run: run
	}
});