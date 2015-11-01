<?php
class Controller {

	protected $_model;
	protected $_module;
	protected $_controller;
	protected $_action;
	protected $_template;
	protected $objectModel;
	protected $config;

	function __construct( $module, $controller, &$action ) {
		global $config;
		$this->config = $config;
		$this->_module			= $module;
		$this->_controller 		= $controller;
		$this->objectModel		= null;
		
		//session
		$dataSess = Session::getInstance();
		//$dataSess->nickname = 'Someone';
		// TRUE
		//var_dump(  $dataSess->nickname );
		//$dataSess->destroy();
		
		// include model
		$classModelName  		= $this->_controller . "Model";
		$pathModel 				=  __SITE_PATH . DS . 'modules' . DS . $this->_module . DS . 'models' . DS . $classModelName . ".php";
		
		if( file_exists( $pathModel ) ){
			include_once $pathModel;
			$this->objectModel	= new $classModelName();
		}
		
		/**
		 * check if the action is callable **
		 */
		if ( !is_callable( array( $this, $action ) )) {
			$action	= 'index';
		}
		$this->_action     		= $action;
		
		
		// get template
		$this->_template       	= new template();
		
		$this->getLayout();
	}
	
	protected function redirect($url){
	    header("Location: ". __PATH_URL.$url);
	    exit(0);
	}
	/**
	 * get layout in array config layout
	 *
	 */
	private function getLayout(){
	
		/* @var $controller baseController */
		$configLayout = $this->config['layout'];
		$controlerName = $this->_module . '/' . $this->_controller;
		$lowerAction = strtolower( $this->_action);
		if( isset( $configLayout[ $controlerName ] ) ){
			// if exists action layout
			if( isset( $configLayout[ $controlerName ]['actions'][$lowerAction] ) ){
				$actionLayout = $configLayout[ $controlerName ]['actions'][$lowerAction];
			}
			
			if( isset( $actionLayout ) ){
				$this->getTemplate()->setTemplate( $actionLayout );
			}else{
				$this->getTemplate()->setTemplate( $configLayout[ $controlerName ][ 'default' ] );
			}
		}else{
			    $this->getTemplate()->setTemplate('layout/defaultLayout');
		}
		
		$this->getView();
	}
	
	/**
	 *  select view from action
	 *   */
	private function getView( ){
		
		$viewActionPath 		= 'modules' . DS . $this->_module . DS . 'views' . DS . $this->_controller . DS . $this->_action;
		
		/* @var $content Partial */
		$partial 								= new Partial( $viewActionPath );
		$partial->router 						= $this;
		$this->getTemplate()->contentAction 	= $partial;
	}

	public function getModel() {
		return $this->_model;
	}
	public function setModel($_model) {
		$this->_model = $_model;
		return $this;
	}
	public function getModule() {
		return $this->_module;
	}
	public function setModule($_module) {
		$this->_module = $_module;
		return $this;
	}
	public function getController() {
		return $this->_controller;
	}
	public function setController($_controller) {
		$this->_controller = $_controller;
		return $this;
	}
	public function getAction() {
		return $this->_action;
	}
	public function setAction($_action) {
		$this->_action = $_action;
		return $this;
	}
	/**
	 * @return template  */
	public function getTemplate() {
		return $this->_template;
	}
	public function setTemplate($_template) {
		$this->_template = $_template;
		return $this;
	}
	public function getObjectModel() {
		return $this->objectModel;
	}
	public function setObjectModel($objectModel) {
		$this->objectModel = $objectModel;
		return $this;
	}

}
