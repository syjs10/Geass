<?php 
	/**
	* 输入过滤类
	*/
	class Input extends Common {
		
		function __construct() {
			 parent::__construct();
		}
		public function post($name = NULL) {
			$post = isset($_POST) ? $_POST : array();
			return is_null($name) ? $post : (isset($post[$name]) ? $post[$name] : NULL);
		}
		public function get($name = NULL) {
			$get = isset($_GET) ? $_GET : array();
			return is_null($name) ? $get : (isset($get[$name]) ? $get[$name] : NULL);
		}
	}