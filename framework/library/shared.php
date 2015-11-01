<?php
class router {
	
	private $moduleName         = "";
	private $controllerName     = "";
	private $actionName         = "";
	private $path 				= "";
	private $arg                = array();
	private $fileController     = "";
	private $config  				;
	
	public function __construct(){
		global $config;
		$this->config	= $config; 
		$this->path 	= __SITE_PATH . DS . 'modules';
		$this->url 		= isset( $_GET['url'] ) ? $_GET['url'] : "";
		
		$this->setReporting();
		$this->removeMagicQuotes();
		$this->unregisterGlobals();
		$this->callHook();
	}
	
	/** Check if environment is development and display errors **/
	
	function setReporting() {
		if (DEVELOPMENT_ENVIRONMENT == true) {
			//echo "1";
			error_reporting(E_ALL);
			ini_set('display_errors','On');
		} else {
			error_reporting(E_ALL);
			ini_set('display_errors','Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
		}
	}
	
	/** Check for Magic Quotes and remove them **/
	
	function stripSlashesDeep($value) {
		$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
		return $value;
	}
	
	function removeMagicQuotes() {
		if ( get_magic_quotes_gpc() ) {
			//echo "2";
			$_GET    = stripSlashesDeep($_GET   );
			$_POST   = stripSlashesDeep($_POST  );
			$_COOKIE = stripSlashesDeep($_COOKIE);
		}
	}
	
	/** Check register globals and remove them **/
	
	function unregisterGlobals() {
		if (ini_get('register_globals')) {
			$array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
			foreach ($array as $value) {
				foreach ($GLOBALS[$value] as $key => $var) {
					if ($var === $GLOBALS[$key]) {
						unset($GLOBALS[$key]);
					}
				}
			}
		}
	}
	
	/** Main Call Function **/
	
	function callHook() {
		
	    
	    
		// get name module, controller and action
		$this->getController();
		
		
		if ( !is_readable( $this->fileController ) ) {
			$this->moduleName 		= 'error';
			$this->controllerName 	= 'error404';
			$this->actionName		= 'index';
			$this->fileController	= $this->path . '/error/controllers/error404Controller.php';	
		}
		
		include_once $this->fileController;
		
		$className		  			= $this->controllerName . 'Controller';
		
		/* @var $classController Controller */
		$classController 			= new $className
										( 
											$this->moduleName, $this->controllerName, $this->actionName 
										);
		$action = $this->actionName;
		if (! empty ( $this->arg )){
			
			$classController->$action( $this->args );
		}
		else{
			$classController->$action();
		}
		$classController->getTemplate()->router = $this;
		echo $classController->getTemplate()->render();		
	}
	
	function getController()
	{	
		
		$route = ( empty( $this->url ) ) ? '' : $this->url ;
	
		if ( empty( $route ) ) {
			// if not have $url then
			// moduleName is login
			// controller is index
			// action     is index
			// redimenu1
			$this->moduleName 		= "guest";
			$this->controllerName 	= "index";
			$this->actionName  		= "index";
	
		} else {
	
			// get name module, controller and action
			$parts = explode("/", $route);
	
			$this->moduleName = $parts[0];
	
			if( isset( $parts[1] ) ){
				$this->controllerName = strtolower($parts[1]);
			}
			if (isset($parts[2])) {
				$this->actionName = strtolower($parts[2]);
			}
			if (isset($parts[3])) {
				$count_args = count($parts);
				$k = 1;
				for ($i = 3; $i < $count_args; $i ++)
					$this->args[$k ++] = $parts[$i];
			}
		}
	
		if( empty( $this->moduleName ) ){
			$this->moduleName     = 'login';
		}
	
		if ( empty( $this->controllerName ) ) {
			$this->controllerName = 'index';
		}
		
		if ( empty( $this->actionName ) ) {
			$this->actionName     = 'index';
		}
		
		$this->fileController = $this->path . DS . $this->moduleName . DS . 'controllers'. DS . $this->controllerName . 'Controller.php';

	}
	
	

    public function getModuleName()
    {
        return $this->moduleName;
    }

    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
        return $this;
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function setControllerName($controllerName)
    {
        $this->controllerName = $controllerName;
        return $this;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function setActionName($actionName)
    {
        $this->actionName = $actionName;
        return $this;
    }
 
	
}



/** Autoload any classes that are required **/
function __autoload($className) {
	
	if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
		/* Error Generation Code Here */
	}
}

$router = new router();