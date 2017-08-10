<?php 
	/**
	* 
	*/
	class ShowVerifyCtrl extends Ctrl {
		
		function __construct() {
			parent::__construct();
			$this->Verifty = $this->component('VerifyCode');
		}
		public function index() {
			$this->Verifty->verifyImage(3, 4, 50, 3);
	    }
	}