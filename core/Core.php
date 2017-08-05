<?php 
	/**
	* 
	*/
	class Core extends Common{
		function __construct() {
			// parent::__construct();
			
			$this->Route = $this->library('Route');
		}
		public function run() {
			// spl_autoload_register(array($this, 'loadClass'));
			
			// $this->Index = $this->load('Index');
			// $this->Index->index();
			$url = $this->Route->parseURL();
			$class = $this->loadCtrl($url['ctrl']);
			$action = $url['action'];
			$class->$action();
		}
		
	}