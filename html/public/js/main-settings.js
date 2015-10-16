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
        //'all.min': ['jquery'],
        'assets/bootstrap.min' : ['jquery'],
        'assets/bootstrap-editable.min': ['jquery', 'assets/bootstrap.min'],
        'assets/jquery.validate.min': ['jquery'],               
        'assets/jquery.dataTables.min': ['jquery'],
        'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
        'paging': ['jquery','assets/jquery.dataTables.min'],
        'common': ['jquery','assets/jquery.validate.min','assets/bootstrap-editable.min'],
        'app/settings': ['assets/jquery.validate.min', 'common'],
       
	}
});

require([
        'jquery',
        'app/settings',
    ],
    function($, Settings) {
    	
    	console.log("Loaded!"); 
    	Settings.run();
    }
);