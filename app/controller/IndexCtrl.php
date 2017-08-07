<?php 
	
	/**
	* 	默认控制器
	*/
	class IndexCtrl extends Ctrl{
		function __construct() {
			parent::__construct();	
		}
		public function index(){
			// var_dump($data);
			// echo"ok";
			$this->testModel = $this->loadModel('Test');
			$this->testModel->index();

			// $this->view->display('index.html');
		}
	}
	// echo 'ok';