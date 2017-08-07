<?php 
	/**
	* 输入过滤类
	*/
	class Input extends Common {
		
		function __construct() {
			 parent::__construct();
		}
		public function post($name = NULL) {
			$post = array_map("addslashes", $_POST);
			// $post= get_magic_quotes_gpc() ? $_POST : array_map("addslashes", $_POST);
			return is_null($name) ? $post : $post[$name];
		}
		public function get($name = NULL) {
			// $get= get_magic_quotes_gpc() ? $_GET : addslashes($_GET);
			// return $name ? $get : $get[$name]; 
			return $_GET;
		}
	}