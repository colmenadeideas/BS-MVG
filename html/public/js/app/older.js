function edit(what, id){
	switch (what) {
		case 'registrations':		var controller = 'registrations';	var table = 'registrations';		var element = 'registrations';		break;
				
	}
		
	//$.post(URL+controller+"/edit/"+element+"/"+id, function(data) {			
	$.post(URL+controller+"/edit/"+id, function(data) {	
		$('#edit').hide().html(data).fadeIn('slow');
		showModal('edit');
			//editing(controller);
				/*switch (what) {
					case 'facturas':	initEdit(); 		break;
				}*/
		$('#edit').on('hide.bs.modal', function (e){
				//	$('#'+table+'-list').dataTable().fnDraw();
					
		});
			$('.soloenview').addClass('hide');
				
	});
	return false;
}
		
function approve(what, id) {
	switch (what) {
		case 'registrations':		var controller = 'registrations';	var element = 'registrations';		break;				
	}
	var	table = $('.table-list').attr('id');
	$.post(URL+controller+"/approve/"+id, function(data) {	
		$('#'+table).dataTable().fnDraw();
	});
	return false;
}
		
	
function check_list() {
	var pending_list = 'registrations-pending-list';
	var all_list = 'registrations-all-list';
	var clearpayment_list = 'registrations-clearpayment-list';	
	var active_list = 'registrations-active-list';	
						
	//Selects current visible table
	var	currenttable = $('.table-list').last().attr('id');
			
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
				       			return '<div class="btn-group"><button type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button><button type="button" class="btn btn-sm btn-info action-view" onclick="edit('+"'registrations',"+data[7]+')"><i class="glyphicon glyphicon-search"></i></button><button onclick="approve('+"'registrations',"+data[7]+')")" type="button" class="btn btn-sm btn-success action-approve"><i class="glyphicon glyphicon-ok"></i></button></div>';
				      		}
				   	 	},
				   	 ],		
					"oLanguage": {
				      "sInfo": " _START_ - _END_ de _TOTAL_",
				      "sProcessing": language_processing,
				      
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
						   			return '<div class="btn-group"><button type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button><button type="button" class="btn btn-sm btn-info action-view" onclick="edit('+"'registrations',"+data[7]+')"><i class="glyphicon glyphicon-search"></i></button><button onclick="approve('+"'registrations',"+data[7]+')")" type="button" class="btn btn-sm btn-success action-approve"><i class="glyphicon glyphicon-ok"></i></button></div>';
						      		}
						   	 	},
						   	 	
						   	 ],		
							"oLanguage": {
						      "sInfo": " _START_ - _END_ de _TOTAL_",
						      "sProcessing": language_processing,
						      
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
							   /* {   //Buttons     	
						     	 "aTargets": [ 4 ],
						      	 	"mData":  function (data) {
						       			return '<button type="button" class="btn btn-info btn-xs" onclick="edit('+"'price'"+','+data[4]+')"><i class="glyphicon glyphicon-pencil"></i> <span class="hidden-xs">modificar</span></button> <button type="button" class="btn btn-danger btn-xs" onclick="deleteit('+"'price'"+','+data[4]+')"><i class="glyphicon glyphicon-trash"></i> <span class="hidden-xs">borrar</span></button>';
						      		}
						   	 	},*/
						   	 ],		
							"oLanguage": {
						      "sInfo": " _START_ - _END_ de _TOTAL_",
						      "sProcessing": language_processing,
						      
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
						       			return '<div class="btn-group"><button type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></button><button type="button" class="btn btn-sm btn-info action-view" onclick="edit('+"'registrations',"+data[7]+')"><i class="glyphicon glyphicon-search"></i></button><button onclick="approve('+"'registrations',"+data[7]+')")" type="button" class="btn btn-sm btn-success action-approve"><i class="glyphicon glyphicon-ok"></i></button></div>';
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
			
			console.log(currenttable);
}	
		
		
		
		
		$(function() {
		
		
		
		});
//define({ 
	//run : function() {
		function translateStatus(data) {
			switch (data) {
				case 'pending': 		newvalue = 'por pago pendiente'; break;
				case 'clearpayment': 	newvalue = 'esperando aprobación de pago'; break;
				case 'approved': 		newvalue = 'aprobado'; break;
				case 'completed': 		newvalue = 'completado'; break;
				case 'cancelled': 		newvalue = 'anulado'; break;
			}
			return newvalue;
		}
		
		
				
		
		
		

	//}
