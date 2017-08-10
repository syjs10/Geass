<?php 
	/**
	* session类
	*/
	class Session extends Common {
		function __construct() {
			parent::__construct();
			session_start();
		}
		public function getSession($name){
			return isset($_SESSION[$name]) ? $_SESSION[$name] : NULL;
		}
		public function setSession($name, $data) {
			return $_SESSION[$name] = $data;
		}
	}