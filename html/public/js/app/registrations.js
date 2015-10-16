function updateTables(tablename) {
	$('#'+tablename).dataTable().fnDraw(false);
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
			finalbutton = '<button title="Aprobar Pago" data-element="registrations" data-registration="'+data+'" data-toggle="modal" data-target="#confirm-approve" type="button" class="btn btn-sm btn-success action-approve showtooltip"><i class="glyphicon glyphicon-ok"></i></button>';
			break;
		case 'delete':
			finalbutton = '<button data-element="registrations" data-registration="'+data+'" data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-sm btn-danger action-delete showtooltip"><i class="glyphicon glyphicon-trash"></i></button>';
			break;
		case 'edit': 
			finalbutton = '<button type="button" title="Ver Información" class="btn btn-sm btn-info action-view showtooltip" onclick="edit('+"'registrations',"+data+')"><i class="glyphicon glyphicon-search"></i></button>';
			break;
		case 'registerpayment': 
			finalbutton = '<button type="button" title="Registrar Pago" class="btn btn-sm btn-default action-view showtooltip" onclick="loadform('+"'payment',"+data+')"><i class="fa fa-credit-card fa-lg"></i></button>';
			break;
		case 'docsreminder':  //Step 3
			finalbutton = '<button type="button" title="Reenviar instrucciones" class="btn btn-sm btn-default action-view showtooltip" onclick="docsreminder('+"'registrations',"+data+')"><i class="glyphicon glyphicon-envelope"></i></button>';
			break;
		case 'complete':
			finalbutton = '<button title="Aprobar Documentos Recibi" data-element="registrations" data-registration="'+data+'" data-toggle="modal" data-target="#confirm-completation" type="button" class="btn btn-sm btn-success action-approve showtooltip"><i class="glyphicon glyphicon-file"></i></button>';
			break;
					
		
	}
	return finalbutton;
}

function docsreminder(what, id){
	switch (what) {
		case 'registrations':		var controller = 'registration';	var table = 'registrations';		var element = 'registrations';		break;
				
	}
		
	$.post(URL+controller+"/reminder/bringdocs/"+id, function(data) {	
		
		$('#loadmodal .modal-body').hide().html(data).fadeIn('slow');
		showModal('#loadmodal');
		console.log(data);					
	});
	
	return false;
}
function edit(what, id){
	switch (what) {
		case 'registrations':		var controller = 'registrations';	var table = 'registrations';		var element = 'registrations';		break;
				
	}
		
	//$.post(URL+controller+"/edit/"+element+"/"+id, function(data) {			
	$.post(URL+controller+"/edit/"+id, function(data) {	
		//$('#edit').hide().html(data).fadeIn('slow');
		$('div.view:visible').find('#edit').hide().html(data).fadeIn('slow');
		showModal('#edit');
			//editing(controller);
				/*switch (what) {
					case 'facturas':	initEdit(); 		break;
				}*/
		$('#edit').on('hide.bs.modal', function (e){
		$('.table-list').last().dataTable().fnDraw();
					
		});
		$('.soloenview').addClass('hide');
				
	});
	return false;
}
function loadform(what, id){
	switch (what) {
		case 'payment':		var rute = 'registrations/registerpayment/';	var table = 'registrations';		var element = 'registrations';		break;
				
	}
	$.post(URL+rute+id, function(data) {	
		
		$('#loadmodal .modal-body').last().hide().html(data).fadeIn('slow');
		initForm();
		registerpayment();
		showModal('.modal-load');
			
		$('#loadmodal').on('hide.bs.modal', function (e){
			$('.table-list').last().dataTable().fnDraw();					
		});				
	});
	return false;
}
function approve(what, id, callback) {
	switch (what) {
		case 'registrations':		var controller = 'registrations';	var element = 'registrations';		break;				
	}
	var	table = $('.table-list').attr('id');
	$.post(URL+controller+"/approve/"+id, function(data) {	
		closeModal('loadmodal');
		$('#'+table).dataTable().fnDraw();
		console.log(data);
		callback;
		
	});
}


function completeregistration(what, id, callback) {
	console .log (what+ id);
	switch (what) {
		case 'registrations':		var controller = 'registrations';	var element = 'registrations';		break;				
	}
	var	table = $('.table-list').attr('id');
	$.post(URL+controller+"/complete/"+id, function(data) {	
		closeModal('loadmodal');
		$('#'+table).dataTable().fnDraw();
		console.log(data);
		//callback;
		
	});
}

function registerpayment() {

	$('#payment-registration').last().validate({
		rules : {
			"payment-number": {	number: true }, 
			"payment-amount": { bsformat: true },
		},
		submitHandler : function(form) {
			$('.send').attr('disabled', 'disabled'); //prevent double send
			$.ajax({
				type : "POST",
				url : URL + "registration/process/payment",
				data : $(form).serialize(),
				timeout : 12000,
				success : function(response) {
					console.log(response);
					closeModal('loadmodal');
					//location.hash = 'registration/verify/again';
				},
				error : function(response) {
					console.log(response);
				}
			});
			return false;
		}
	});

}
function runfunctions(page) {
	
	//Confimation Modal for Approve button
	$('#confirm-approve').last().on('show.bs.modal', function(e) {	
		
		var element 	= $(e.relatedTarget).data('element');
		var id			= $(e.relatedTarget).data('registration');
		var targetmodal = $(e.relatedTarget).data('target');
		
		$.post(URL+'registrations/showapprovebutton', function(data) {	
			$('#confirm-approve .modal-content').last().html(data);	
			
			$('#confirm-approve .confirmbutton').last().click( function(){ 
				approve(element,id,	closeModal(targetmodal));			 	
			});		
		});
		
	});
	
	$('#confirm-approve').last().on('hidden.bs.modal', function(e) {
		updateTables(currenttable);
	});	
	
	//Confimation Modal for Complete process button
	$('#confirm-completation').last().on('show.bs.modal', function(e) {	
		
		var element 	= $(e.relatedTarget).data('element');
		var id			= $(e.relatedTarget).data('registration');
		var targetmodal = $(e.relatedTarget).data('target');
		
		$.post(URL+'registrations/showcompletationbutton', function(data) {	
			$('#confirm-completation .modal-content').last().html(data);	
			
			$('#confirm-completation .confirmbutton').last().click( function(){ 
				completeregistration(element,id,closeModal(targetmodal));			 	
			});		
		});
		
	});
	$('#confirm-completation').last().on('hidden.bs.modal', function(e) {
		updateTables(currenttable);
	});
	/*$('#confirm-completation').on('show.bs.modal', function(e) {				
		$(this).find('.confirmbutton').click( function(){ 
			var element 	= $(e.relatedTarget).data('element');
			var id			= $(e.relatedTarget).data('registration');
			var targetmodal = $(e.relatedTarget).data('target');
			completeregistration(element,id, closeModal(targetmodal));		
			 
		});
	});*/
	
	$( "#boton_imprimir_pendientes" ).click(function() {
		
 		 $("div#myPrintArea").printArea();
 		
	});

	$('.showtooltip').tooltip();
	
	
	var pending_list = 'registrations-pending-list';
	var all_list = 'registrations-all-list';
	var clearpayment_list = 'registrations-clearpayment-list';	
	var active_list = 'registrations-active-list';	
	
	//Selects current visible table
	var	currenttable = $('.table-list').last().attr('id');
	setInterval(function(){
		updateTables(currenttable);
		 console.log ("Refresh: "+currenttable);
	 },10000);
	 
	switch (currenttable) {
		
		case active_list:				
			
			
			$('#'+active_list).dataTable({
				"bProcessing": true,
				"bServerSide": true,
				"iDisplayLength": 20,
				"sAjaxSource": URL+"registrations/get/active",		
				//"aaSorting": [[ 2, "desc" ]],
			       "aoColumnDefs": [ 
			       		//{ "sClass": "text-left", "aTargets": [ 0, 1 ] },
					   //Format Columns
					   	{   //Course     	
				     	 "aTargets": [ 1 ],
				      	 	"mData":  function (data) {
				       			return '<strong class="text-course">'+data[1] +'</strong>';
				      		}
				   	 	},
				   	 	{   //Group     	
				     	 "aTargets": [ 2 ],
				      	 	"mData":  function (data) {
				       			return '<small class="text-course">'+data[2] +'</small>';
				      		}
				   	 	},
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
					   			return getOnlyDate(data[5]);
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
						  	 		
						  	 		
						  	 		
						  	 				return '<div class="btn-group">'+actionbuttons('edit',data[0])+'</div>';
						  	 			
						  	 		
						  	 		
						   			
						      	},
						      	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
					                //  console.log( nTd );
					                $(".showtooltip", nTd).tooltip();
					            }
						   	 },
						   	 	
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
					$('#'+active_list).each(function(){
							var datatable = $(this);
							// SEARCH - Add the placeholder for Search and Turn this into in-line form control
							var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
							search_input.attr('placeholder', language_search_placeholder);
							search_input.addClass('form-control input-sm');
							// LENGTH - Inline-Form control
							var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
							length_sel.addClass('form-control input-sm');
					});
				
				
				
				
				
				break;
			case all_list:
				
			$('#'+all_list).dataTable({
				"bProcessing": true,
				"bServerSide": true,
				"iDisplayLength": 20,
				"sAjaxSource": URL+"registrations/get/all",		
				"aaSorting": [[ 5, "desc" ]],
			       "aoColumnDefs": [ 
			       		//{ "sClass": "text-left", "aTargets": [ 0, 1 ] },
					   //Format Columns
					   	{   //Course     	
				     	 "aTargets": [ 1 ],
				      	 	"mData":  function (data) {
				       			return '<strong class="text-course">'+data[1] +'</strong>';
				      		}
				   	 	},
				   	 	{   //Group     	
				     	 "aTargets": [ 2 ],
				      	 	"mData":  function (data) {
				       			return '<small class="text-course">'+data[2] +'</small>';
				      		}
				   	 	},
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
					   			return getOnlyDate(data[5]);
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
					                //  console.log( nTd );
					                $(".showtooltip", nTd).tooltip();
					            }
						   	 },
						   	 	
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
					break;
					
				case pending_list:
					//Create List
					$('#'+pending_list).dataTable({
						"bProcessing": true,
						"bServerSide": true,
						"iDisplayLength": 20,
						"sAjaxSource": URL+"registrations/get/pending",		
						//"aaSorting": [[ 2, "desc" ]],
					       "aoColumnDefs": [ 
					       		{ "bSortable": false, "aTargets": [ 3 ] }, 
								{ "sClass": "text-left", "aTargets": [ 0, 1 ] },
							   	//Format Columns
							   	{   //Course     	
						     	 "aTargets": [ 1 ],
						      	 	"mData":  function (data) {
						       			return '<strong class="text-course">'+data[1] +'</strong>';
						      		}
						   	 	},
						   	 	{   //Group     	
						     	 "aTargets": [ 2 ],
						      	 	"mData":  function (data) {
						       			return '<small class="text-course">'+data[2] +'</small>';
						      		}
						   	 	},
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
						       			return getOnlyDate(data[5]);
						      		}
						   	 	},
						   	 	{   //Status     	
						     	 "aTargets": [ 6 ],
						      	 	"mData":  function (data) {
						       			return '<span class="label label-default '+data[6]+'">'+translateStatus(data[6])+'</span>';
						      		}
						   	 	},
							   {   //Buttons     	
						     	 "aTargets": [ 7 ],
						      	 	"mData":  function (data) {
						  	 			return '<div class="btn-group">'+actionbuttons('delete',data[7])+actionbuttons('registerpayment',data[7])+'</div>'; 
						  	 		
						  	 		},
							      	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
						                //  console.log( nTd );
						                $(".showtooltip", nTd).tooltip();
						            }
						   	 	},
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
						$('#'+pending_list).each(function(){
							var datatable = $(this);
							// SEARCH - Add the placeholder for Search and Turn this into in-line form control
							var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
							search_input.attr('placeholder', language_search_placeholder);
							search_input.addClass('form-control input-sm');
							// LENGTH - Inline-Form control
							var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
							length_sel.addClass('form-control input-sm');
					});
					break;
				case clearpayment_list:
					$('#'+clearpayment_list).dataTable({
						"bProcessing": true,
						"bServerSide": true,
						"iDisplayLength": 20,
						"sAjaxSource": URL+"registrations/get/clearpayment",		
						"aaSorting": [[ 0, "DESC" ]],
					       "aoColumnDefs": [ 
					       		//{ "sClass": "text-left", "aTargets": [ 0, 1 ] },
							   //Format Columns
							   	{   //Course     	
						     	 "aTargets": [ 1 ],
						      	 	"mData":  function (data) {
						       			return '<strong class="text-course">'+data[1] +'</strong>';
						      		}
						   	 	},
						   	 	{   //Group     	
						     	 "aTargets": [ 2 ],
						      	 	"mData":  function (data) {
						       			return '<small class="text-course">'+data[2] +'</small>';
						      		}
						   	 	},
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
						       			return getOnlyDate(data[5]);
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
							  	 		
							  	 		return '<div class="btn-group">'+actionbuttons('delete',data[7])+actionbuttons('edit',data[7])+actionbuttons('approve',data[7])+'</div>'; 
							  	 		
							   			
							      	},
							      	"fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
						                //  console.log( nTd );
						                $(".showtooltip", nTd).tooltip();
						            }
						      	 							      	 	
						   	 	},
						   	 	
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
					$('#'+clearpayment_list).each(function(){
						var datatable = $(this);
						// SEARCH - Add the placeholder for Search and Turn this into in-line form control
						var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
						search_input.attr('placeholder', language_search_placeholder);
						search_input.addClass('form-control input-sm');
						// LENGTH - Inline-Form control
						var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
						length_sel.addClass('form-control input-sm');
					});
					break;
				
			}
}