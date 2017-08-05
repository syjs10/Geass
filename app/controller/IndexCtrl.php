<?php 
	
	/**
	* 	默认控制器
	*/
	class IndexCtrl extends Ctrl{
		function __construct() {
			parent::__construct();
			$this->testModel = $this->loadModel('Test');
		}
		public function index(){
			// var_dump($data);
			// echo"ok";
			$this->testModel->index();
		}
	}
	// echo 'ok';