<?php

/*** error reporting on ***/
 error_reporting(E_ALL);

 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
 define ('__SITE_PATH', $site_path);
 define ( '__DOMAIN' , 'http://localhost' );
 define ('__FOLDER', '/lampart_less00/bt/');
 define ('__FOLDER_UPLOADS', 'uploads');

 /*** include the config.php file ***/
 include __SITE_PATH . '/config/config.php';

 /*** include the init.php file ***/
 include  __SITE_PATH.'/includes/init.php';

 include  __SITE_PATH.'/simple-php-captcha/simple-php-captcha.php';

 /*** include the entity file ***/
/*  function __autoload($class){
 	if(file_exists(__SITE_PATH . '/' . $class .".php")){
 		require(__SITE_PATH . '/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/base/' . $class.".php")){
 		require(__SITE_PATH . '/base/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/controllers/' . $class.".php")){
 		require(__SITE_PATH . '/controllers/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/config/' . $class.".php")){
 		require(__SITE_PATH . '/config/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/models/' . $class.".php")){
 		require(__SITE_PATH . '/models/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/utility/' . $class.".php")){
 		require(__SITE_PATH . '/utility/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/class/' . $class.".php")){
 		require(__SITE_PATH . '/class/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/entity/' . $class.".php")){
 		require(__SITE_PATH . '/entity/' . $class.".php");
 	}
 } */

 function __autoload($class){
 	if(file_exists(__SITE_PATH . '/' . $class .".php")){
 		require_once(__SITE_PATH . '/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/base/' . $class.".php")){
 		require_once(__SITE_PATH . '/base/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/controllers/' . $class.".php")){
 		require_once(__SITE_PATH . '/controllers/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/config/' . $class.".php")){
 		require_once(__SITE_PATH . '/config/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/models/' . $class.".php")){
 		require_once(__SITE_PATH . '/models/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/utility/' . $class.".php")){
 		require_once(__SITE_PATH . '/utility/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/class/' . $class.".php")){
 		require_once(__SITE_PATH . '/class/' . $class.".php");
 	}else if(file_exists(__SITE_PATH . '/entity/' . $class.".php")){
 		require_once(__SITE_PATH . '/entity/' . $class.".php");
 	}
 }


 /*** include the entity file ***/
 /* function __autoload($class){
 	if(file_exists(__SITE_PATH . '/' . $class .".php")){
 		include_once __SITE_PATH . '/' . $class.".php";
 	}else if(file_exists(__SITE_PATH . '/base/' . $class.".php")){
 		include_once __SITE_PATH . '/base/' . $class.".php";
 	}else if(file_exists(__SITE_PATH . '/controllers/' . $class.".php")){
 		include_once __SITE_PATH . '/controllers/' . $class.".php";
 	}else if(file_exists(__SITE_PATH . '/config/' . $class.".php")){
 		include_once __SITE_PATH . '/config/' . $class.".php";
 	}else if(file_exists(__SITE_PATH . '/models/' . $class.".php")){
 		include_once __SITE_PATH . '/models/' . $class.".php";
 	}else if(file_exists(__SITE_PATH . '/utility/' . $class.".php")){
 		include_once __SITE_PATH . '/utility/' . $class.".php";
 	}else if(file_exists(__SITE_PATH . '/class/' . $class.".php")){
 		include_once __SITE_PATH . '/class/' . $class.".php";
 	}else if(file_exists(__SITE_PATH . '/entity/' . $class.".php")){
 		include_once __SITE_PATH . '/entity/' . $class.".php";
 	}
 } */

 /*** a new registry object ***/
 $registry = new Registry($config);
 $registry->router = new router($registry);
 $registry->router->setPath (__SITE_PATH . '/' . 'modules');
 $registry->router->loader();
?>