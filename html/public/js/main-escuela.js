require.config({
	baseUrl: URL+"public/js",
	requireDefine:true,
	waitSeconds:7,
		paths: {
	        jquery:['jquery.min','//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min'], 
	    },	
	    
	shim: {
		'jquery': {
            exports: '$'
        },
       
        'bootstrap': {
            deps: ['jquery'],
            exports: '$'
        },
        'assets/jquery.ba-bbq.min': ['jquery'],
        'assets/bootstrap.min' : ['jquery'],
        'assets/bootstrap-editable.min': ['jquery', 'assets/bootstrap.min'],        
        'assets/jquery.easing.min': ['jquery'], 
        'assets/jquery.validate.min': ['jquery'],               
        'assets/jquery.dataTables.min': ['jquery'],
        'assets/jquery-ui.min': ['jquery'],  
        'assets/jquery.PrintArea' : ['jquery'],       
        'assets/jquery.maskedinput.min': ['jquery'],
        'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
        'paging': ['jquery','assets/jquery.dataTables.min'],
        'common': ['jquery','assets/jquery.ba-bbq.min','assets/jquery.validate.min','assets/bootstrap-editable.min', 'assets/jquery.easing.min', 'assets/jquery-ui.min','assets/bootstrap-datetimepicker','assets/dataTables.bootstrap', 'assets/jquery.PrintArea','assets/jquery.maskedinput.min', 'config'],
        'app/escuela': ['common'],
        'app/registration': ['common'],
        
        
       
	}
});

require([
        'jquery','app/escuela',
    ],	
    function($, Admin) {    	
    	console.log("Loaded! escuela.js"); 
    }
);