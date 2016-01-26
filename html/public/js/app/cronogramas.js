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
			"aaSorting": [[ 4, "desc" ]],
		       "aoColumnDefs": [ 
				   //Format Columns
					{ //Code     	
			     	"aTargets": [ 0 ],
			      	 	"mData":  function (data) {
			       			return '<small class="dim">'+data[0]+'</small>';
			      		}
			   	 	},
				   	{   //Profesor's Profile Pic     	
			     	"aTargets": [ 1 ],
			      	 	"mRender": function (data) {
			      			var data = JSON.parse(data);
                        	return '<img src="http://localhost/BS-MVG/html/public/img/'+data.photo+'"class="img-responsive img-circle profile-list" />' ;
						}
					},
			   	 	{ //Profesor & Class     	
			     	"aTargets": [ 2 ],
			      	 	"mData":  function (data) {
			  	       			return '<div class="row col-lg-10"><h4>'+data[4] +'<br><small>'+data[2]+' '+data[3]+'</small></h4></div>';
			      		}
			   	 	},
			   	 	{ //Last Comment     	
			     	"aTargets": [ 3 ],
			      	 	"mData":  function (data) {
			      	 			if (data[8] === 'null') {console.log(data[8]);};
			      	 			

			      	 			return '<div class="row col-lg-10"><small>'+data[8]+'</small></div>';
			      		}
			   	 	},
			   	 	{ //Date    	
			     	"aTargets": [ 4 ],
			      	 	"mData":  function (data) {
			      	 		if (data[6] != "0000-00-00 00:00:00") {
			      	 			var lastupdate = "Modificado el "+functions.getOnlyDate(data[6]) +" "+ functions.getOnlyTime(data[6]);
			      	 		}			      	 		
			      	 		return '<small class="time-list">'+functions.getOnlyDate(data[5])+"<br>("+ functions.getOnlyTime(data[5])+")</small>";
			      		}
			   	 	},
			   	 	
					{ //Actions
					"aTargets": [ 5 ],
					  	"mData":  function (data) {
					  		var currentstatus = data[7];
					  	 		switch(currentstatus) {
					  	 			case 'pending':
					  	 				return ''+actionbuttons('reject',data[0])+actionbuttons('approve',data[0])+actionbuttons('edit',data[0])+''; 
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

	}
	
	function updateTables(tablename) {
		$('#'+tablename).dataTable().fnDraw(false);
	}
	function activateCells(nTd){
		$(".showtooltip", nTd).tooltip();
	                
		//THIS IS SUBSTITUTE FOR "ONCLICK" PREVIOUS FUNCTIONS
	    activateButtons(nTd);
		
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
				
				finalbutton = '<button type="button" title="Aprobar" class="btn  btn-success btn-circle action-approve showtooltip" data-cronograma="'+data+'" data-element="cronogramas"><i class="glyphicon glyphicon-ok"></i></button>';				
				break;
			case 'reject':
				finalbutton = '<button data-element="cronogramas" title="Rechazar" data-cronograma="'+data+'" data-toggle="modal" data-target="#confirm-delete" type="button" class="btn btn-danger btn-circle action-reject showtooltip"><i class="fa fa-times"></i></button>';
				break;
			case 'delete':
				finalbutton = '<button data-element="cronogramas" data-cronograma="'+data+'" data-toggle="modal" data-target="#confirm-delete" type="button" class="btn  btn-danger btn-circle action-delete showtooltip"><i class="glyphicon glyphicon-trash"></i></button>';
				break;
			case 'edit': 
				//finalbutton = '<button type="button" title="Ver" class="btn  btn-info btn-circle action-view showtooltip" data-cronograma="'+data+'"><i class="glyphicon glyphicon-search"></i></button>';
				finalbutton = '<a title="Ver" class="btn btn-info btn-circle action-view showtooltip" href="#cronogramas/get/'+data+'"><i class="glyphicon glyphicon-search"></i></a>';
				break;
			case 'registerpayment': 
				finalbutton = '<button type="button" title="Registrar Pago" class="btn btn-sm btn-default btn-circle action-register-payment showtooltip" data-cronograma='+data+'"><i class="fa fa-credit-card fa-lg"></i></button>';
				break;
			case 'complete':
				//finalbutton = '<button title="Aprobar Documentos Recibi" data-element="cronogramas" data-cronograma="'+data+'" data-toggle="modal" data-target="#confirm-completation" type="button" class="btn btn-sm btn-success action-approve action-approve-docs showtooltip"><i class="glyphicon glyphicon-file"></i></button>';				
				finalbutton = '<button type="button" title="Aprobar Documentos Recibidos" class="btn btn-sm btn-success action-complete showtooltip" data-cronograma="'+data+'" data-element="cronogramas"><i class="glyphicon glyphicon-file"></i></button>';
				break;					
			
		}
		return finalbutton;
	}
	//Esto permite que los botones estén en ambas vistas get/all get/$id
	function activateButtons(nTd){

		$('.showtooltip').tooltip();

		$(".action-approve", nTd).click(function() {											
			var buttonfrom  = $(this);
			var element 	= $(this).data('element');
			var id			= $(this).data('cronograma');
			var targetmodal = "#confirm-approve";//$(this).data('target');
			
			
			$.post(globals.URL+'cronogramas/showbutton/approve', function(data) {	
				
				$('div.view:visible').find(targetmodal+' .modal-content').hide().html(data).fadeIn('slow');	
				
				functions.showModal(targetmodal);

				$('#confirm-approve .confirmbutton').last().click( function(){ 
					approve(element,id,	functions.closeModal(targetmodal), buttonfrom);	
				});
			});
			
		});

		$(".action-reject", nTd).click(function() {											
			var buttonfrom  = $(this);
			var element 	= $(this).data('element');
			var id			= $(this).data('cronograma');
			var targetmodal = "#confirm-reject";
			
			
			$.post(globals.URL+'cronogramas/showbutton/reject', function(data) {	
				
				$('div.view:visible').find(targetmodal+' .modal-content').hide().html(data).fadeIn('slow');	
				
				functions.showModal(targetmodal);

				$('#confirm-reject .confirmbutton').last().click( function(){ 
					reject(element,id,	functions.closeModal(targetmodal), buttonfrom);	
				});
			});
			
		});
	}

	function approve(what, id, callback, buttonfrom) 
	{
		console.log('approve process');
		switch (what) {
			case 'cronogramas':		var controller = 'cronogramas';	var element = 'cronogramas';		break;				
		}
		var	table = $('.table-list').attr('id');

		$(buttonfrom).prop('disabled', true);

		$.post(globals.URL+controller+"/approve/"+id, function(data) {	
			
			$('#'+table).dataTable().fnDraw();	
					
		}).done( function(data){
			var response = JSON.parse(data);
			//console.log(data);
			if (response.success == "1") {
				callback;
				$(buttonfrom).prop('disabled', false);
			}
		});
	}

	function reject(what, id, callback, buttonfrom) {
		switch (what) {
			case 'cronogramas':		var controller = 'cronogramas';	var element = 'cronogramas';		break;				
		}
		var	table = $('.table-list').attr('id');

		$(buttonfrom).prop('disabled', true);

		$.post(globals.URL+controller+"/reject/"+id, function(data) {	
			
			$('#'+table).dataTable().fnDraw();	
					
		}).done( function(data){
			var response = JSON.parse(data);
			//console.log(data);
			if (response.success == "1") {
				callback;
				$(buttonfrom).prop('disabled', false);
			}
		});
	}


	function validateComments() {
		
//		functions.initForm();
		console.log("SS");
		/*$('form#cronograma-reject').validate({
			submitHandler : function(form) {
				console.log("11");	
				$('.send').attr('disabled', 'disabled'); //prevent double send
				$.ajax({
					type : "POST",
					url : globals.URL + "comments/process",
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
		});*/


		$('#cronograma-reject').last().validate({
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
						functions.closeModal('loadmodal');
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

	 



	return {
      run: run,
      approve: approve,
      reject: reject,
      activateButtons: activateButtons,
      validateComments: validateComments
	}
});