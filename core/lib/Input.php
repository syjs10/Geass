<?php 
	/**
	* 输入过滤类
	*/
	class Input extends Common {
		
		function __construct() {
			 parent::__construct();
		}
		public function post($name = NULL) {
			$post=$_POST;
			return is_null($name) ? $post : $post[$name];
		}
		public function get($name = NULL) {
			$get = $_GET;
			return is_null($name) ? $get : $get[$name];
		}
	}