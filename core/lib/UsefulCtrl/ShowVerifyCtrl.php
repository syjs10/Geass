<?php 
	/**
	* 
	*/
	class ShowVerifyCtrl extends Ctrl {
		
		function __construct() {
			parent::__construct();
			$this->Verifty = $this->component('VerifyCode');
		}
		public function showVerify() {
			$this->Verifty->verifyImage(2, 4, 50, 3);
	    }
	}