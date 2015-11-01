<?php

/** Configuration Variables **/

define ('DEVELOPMENT_ENVIRONMENT',true);

define('DB_NAME', 'thanh_my');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

 $site_path = realpath( dirname( dirname( __FILE__ ) )  );
 define ('__SITE_PATH', $site_path);
 define ('__PATH_URL', DS.'framework'.DS);


$config = array(
		
		// layout config
		'layout' => array (
				// = = = = = =   === error ========= = =============
				// index Controller
				'guest/index' => array(
						'actions'=>array(
							
						),
						'default' => 'layout/loginLayout'
				),
    		    'guest/login' => array(
    		        'actions'=>array(
    		            	
    		        ),
    		        'default' => 'layout/loginLayout'
    		    ),
    		    'guest/register' => array(
    		        'actions'=>array(
    		             
    		        ),
    		        'default' => 'layout/defaultLayout'
    		    ),
		    
				'error/index' => array(
					'actions'=>array(
							
					),
					'default' => 'layout/error404Layout'
				),
    		    'application/index' => array(
    		        'actions'=>array(
    		    
    		        ),
    		        'default' => ''
    		    ),
		      
		)
		
);
