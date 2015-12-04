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
        'all.min': ['jquery'],
        'assets/bootstrap.min' : ['jquery'],
        'assets/bootstrap-editable.min': ['jquery', 'assets/bootstrap.min'],
        'assets/jquery.validate.min': ['jquery'],
        'assets/jquery.easing.min': ['jquery'],             
        'assets/jquery.dataTables.min': ['jquery'],
        'assets/jquery.maskedinput.min': ['jquery'],
        'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
        'paging': ['jquery','assets/jquery.dataTables.min'],
        'common': ['jquery','assets/jquery.validate.min','assets/bootstrap-editable.min', 'assets/jquery.easing.min', 'assets/jquery-ui.min','assets/bootstrap-datetimepicker', 'config'],
        'app/login': ['common'],
        'app/registration': ['jquery','assets/bootstrap-datetimepicker','assets/jquery.maskedinput.min'],
        'app/newsletter': ['assets/jquery.validate.min'],
        'app/app': ['common', 'app/registration','app/newsletter'],
        
        
       
	}
});

require([
        'jquery',
        'app/login','app/app',
    ],
    function($, Login, App) {
    	$('.datepicker').datepicker({
	        format: 'dd/mm/yyyy',
	        language: 'da',
	        keyboardNavigation: false,
	        autoclose: true
	    });
    	console.log("Loaded!s"); 
    	//Login.signin();
    	//App.run();
    	checkcurrentform();
    }
);