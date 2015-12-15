define(['globals', 'functions'], function(globals, functions) {
	
	
	function run(){

//function users() {
	
	console.log('usuarios');
	$.fn.editable.defaults.mode = 'inline';
	//Functions
	//Add Forms
	$('.add-users').validate({	
				
		submitHandler: function(form) {
			$('.send').attr('disabled', 'disabled'); //prevent double send
			$.ajax({
				type: "POST",
				//url: URL+"users/add/user",
				url: URL+"profesores/process",				
				data: $(form).serialize(),
				timeout: 12000,
				success: function(response) {
					console.log(response);
					form_name = 'add-users';
					$('.'+form_name).closest('form').find("input, textarea").val("");
					$('.send').removeAttr('disabled');
					$('#'+form_name).modal('hide');
					//redraw table for update	
					$('#users-list').dataTable().fnDraw();																   	
				},
				error: function(response) { console.log(response); }
			});
			return false;
		}
	});
	
		
	$('#users-list').dataTable({
		"bProcessing": true,
		"bServerSide": true,
		"iDisplayLength": 5,
		//"sAjaxSource": URL+"users/get/users",	
		"sAjaxSource": URL+"profesores/get/users",
		"aaSorting": [[ 0, "desc" ]],
        "aoColumnDefs": [ { 
        	"bSortable": false, "aTargets": [ 2 ] }, 
			{ "sClass": "text-left", "aTargets": [ 0 ] },
		  {        	
	      "aTargets": [ 2 ],
	      "mData":  function (data) {
	        return '<button type="button" class="btn btn-info btn-xs" onclick="edit('+"'user'"+','+data[2]+')">editar</button> <button type="button" class="btn btn-danger btn-xs" onclick="deleteit('+"'user','"+data[1]+"'"+')">borrar</button>';
	      }
	    } ]	,		
		"oLanguage": {
	      "sInfo": " _START_ - _END_ de _TOTAL_",
	      "sProcessing": "espere...",
	      "oPaginate": {
	        "sPrevious": "",
	        "sNext": "",
	        
	      }
	    }
	});
	$('#users-list').each(function(){
		var datatable = $(this);
		// SEARCH - Add the placeholder for Search and Turn this into in-line form control
		var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
		search_input.attr('placeholder', 'Buscar');
		search_input.addClass('form-control input-sm');
		// LENGTH - Inline-Form control
		var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
		length_sel.addClass('form-control input-sm');
	});
	
	//ActionLog
	$('#actionlog-listo').dataTable({
		"bProcessing": true,
		"bServerSide": true,
		"iDisplayLength": 10,
		"sAjaxSource": URL+"users/get/actionlogs",				
		"aaSorting": [[ 5, "desc" ]],
        "aoColumnDefs": [ 
				{"bSortable" : false, "aTargets" : [0,1,2,3,4] },
				{ "sClass": "text-left", "aTargets": [ 0, 1 ] },
				//Format Columns
					   	{   //Course     	
				     	 "aTargets": [ 0 ],
				      	 	"mData":  function (data) {
				      	 		
				       			return '<small>'+data[0]+' '+ translateAction(data[1]) +' '+ translateController(data[2]) +'</small>';
				      		}
				   	 	},{   //Course     	
				     	 "aTargets": [ 1 ],
				      	 	"mData":  function (data) {
				      	 		
				       			return ''; //'<small>'+ translateAction(data[1]) +'</small>';
				      		}
				   	 	},
				   	 	{   //Course     	
				     	 "aTargets": [ 2 ],
				      	 	"mData":  function (data) {
				      	 		
				       			return ''; //'<small>'+ translateController(data[2]) +'</small>';
				      		}
				   	 	},
				   	 	{   //Course     	
				     	 "aTargets": [ 3 ],
				      	 	"mData":  function (data) {
				      	 		return '<small><i>('+ getOnlyDate(data[3]) + ')</i></small> ';
				      		}
				   	 	},
				   	 	{   //Course     	
				     	 "aTargets": [ 4 ],
				      	 	"mData":  function (data) {
				       			return '<button type="button" class="btn btn-info btn-xs" onclick="viewit(\'' + data[2]+"'," + data[4] + ')"><i class="glyphicon glyphicon-search"></i></button> ';
				      		}
				   	 	},
				   	 	{   //Course     	
				     	 "aTargets": [ 5 ],
				      	 	"mData":  function (data) {
				       			return '';
				      		}
				   	 	},
				   	 	
				   	 	
						
		 ],	
		"oLanguage": {
	      "sInfo": " _START_ - _END_ de _TOTAL_",
	      "sProcessing": "espere...",
	      "oPaginate": {
	        "sPrevious": "",
	        "sNext": "",
	        
	      }
	    }
	});
	$('#actionlog-list_filter').css('display', 'none');
	$('#actionlog-list').each(function(){
		var datatable = $(this);
		// SEARCH - Add the placeholder for Search and Turn this into in-line form control
		var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
		search_input.attr('placeholder', 'Buscar');
		search_input.addClass('form-control input-sm');
		// LENGTH - Inline-Form control
		var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
		length_sel.addClass('form-control input-sm');
	});
	
	//Update Selects
	/*$('#add-users').on('shown.bs.modal', function (e) {
		var items="<option></option>";
		
		$.getJSON(URL+"services/services",function(data){
		    $.each(data,function(index,item) {
		      items+="<option value='"+item.value+"'>-- "+item.text+"</option>";
		    });
		    $("#parent_id").html(items); 
		});
	});*/
	
	
	$('.paginate_button').click(function(e) {
		e.preventDefault();	
	});
	
}


	return {
      run: run
	}
});