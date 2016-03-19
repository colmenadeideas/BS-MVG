require.config({
	
    baseUrl: "http://localhost/BS-MVG/html/public/js",
    requireDefine:true,
    waitSeconds: 50,
    paths: {
      jquery:[  'jquery.min', '//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min'],
      'async': 'assets/requirejs-plugins/async',          
    }, 

    shim: {
      'jquery': {
        exports: '$'
      },
      gmaps: {
        exports: 'google',
        exports: '$',
      },       
      'bootstrap.min': {
        deps: ['jquery'],
        exports: '$'
      },
      'all.min': ['jquery'],
      'functions': ['jquery', 'assets/jquery.validate.min'],
      'assets/bootstrap-datetimepicker-v4':['jquery','assets/bootstrap.min'],       

      'app/app': ['jquery','common', 'globals','assets/jquery.validate.min'],
      'app/login': ['jquery','globals','assets/jquery.validate.min'],


        'app/hashchange': ['common'],
        'assets/jquery.ba-bbq.min': ['jquery'],
        'assets/bootstrap.min' : ['jquery'],
        'assets/jquery.PrintArea' : ['jquery'],
        'assets/bootstrap-editable.min': ['jquery', 'assets/bootstrap.min'],        
        'assets/jquery.easing.min': ['jquery'], 
        'assets/jquery.validate.min': ['jquery'],               
        'assets/jquery.dataTables.min': ['jquery'],
        'assets/jquery.maskedinput.min': ['jquery'],
        'assets/dataTables.bootstrap': ['jquery', 'assets/bootstrap.min', 'assets/jquery.dataTables.min'], 
        'assets/jquery.fullpage.min': ['jquery', 'assets/jquery.slimscroll.min'],


		'paging': ['jquery','assets/jquery.dataTables.min'],
        'common': [	'jquery','assets/jquery.ba-bbq.min',
        			'assets/jquery.validate.min',
        			'assets/bootstrap-editable.min', 
        			'assets/jquery.easing.min', 
        			'assets/jquery-ui.min','assets/bootstrap-datetimepicker',
        			'assets/dataTables.bootstrap','assets/jquery.PrintArea', 
        			'assets/jquery.maskedinput.min', 
              'assets/jquery.fullpage.min',
              'config'],
        'app/admin': ['globals','common'],
        'app/registration': ['globals','common'],
        'app/profesor': ['globals','common'], 
        'app/periodo': ['globals','common'], 
        'app/notas': ['globals','common'], 

        'app/login': ['globals','common'],
        'app/registration': ['globals','jquery','assets/bootstrap-datetimepicker','assets/jquery.maskedinput.min'],
       'app/profesor': ['globals','jquery','assets/bootstrap-datetimepicker','assets/jquery.maskedinput.min'],
       'app/periodo': ['globals','jquery','assets/bootstrap-datetimepicker','assets/jquery.maskedinput.min'],
       'app/notas': ['globals','jquery','assets/bootstrap-datetimepicker','assets/jquery.maskedinput.min'],
        'app/newsletter': ['globals','assets/jquery.validate.min'],
        'app/escuela': ['globals','common'],
        'app/app': ['globals','common', 'app/registration','app/newsletter','app/profesor','app/periodo','app/notas'],
        'app/site': ['globals','common', 'app/login']
      
        
    }
});

require([
    'jquery',
    'globals', //would replace 'common' eventually
    'app/hashchange'
    ],
    function($, app, start) { 
 
      var accessArray = window.location.pathname.split('/');
      console.log(window.location);


      var accessHash = $.param.fragment();
      
      console.log("Access:" + accessArray[3] +" Hash:" + accessHash);
      $('#preloader').fadeOut();
      switch(accessArray[3]) {
        case "site":
          require(['app/site'], function(Site) {
            Site.run();                                                    
          });     
          break;
        case "academia":
          require(['app/academia'], function(Academia) {
            Academia.run();                                                    
          });     
          break;
        case "productora":
          require(['app/productora'], function(Productora) {
            Productora.run();                                                    
          });     
          break;
        case "agencia":
           
          require(['app/agencia'], function(agencia) {
            agencia.run();


          });     
          break;

        case "app":  
          break;

        case "escuela":  
          if (accessHash.length == 0) {

            window.location.hash  = "#presidencia/welcome";  
          }          
          /*require(['app/app'], function(app) {              
              switch(accessHash) {
                case 'posts':
                  app.posts();
                  break;
                default: 
                  app.boards();                   
                  break;
              }                      
          }); */
          break;
        case "presidencia":  
          if (accessHash.length == 0) 
          {
            window.location.hash  = "#presidencia/welcome";  
          }          
          /*require(['app/app'], function(app) {              
              switch(accessHash) {
                case 'posts':
                  app.posts();
                  break;
                default: 
                  app.boards();                   
                  break;
              }                      
          }); */
          break;
        case "controldeestudios":  
            if (accessHash.length == 0) {
              console.log("ao");

            window.location ='/BS-MVG/html/controldeestudios/#welcome';

          }         
          break;

        case "courses":
            switch(accessArray[4]) {
              case 'preregistration':
                require(['app/registration'], function(registration) {
                  registration.checkcurrentform();                                                    
                });                 
                break;
            }             
          break;          

        default:
        	require(['app/login'], function(login) {              
              login.run();
          }); 
          break;
      } 

    }
);