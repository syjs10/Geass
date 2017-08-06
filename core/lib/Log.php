<?php 
	/**
	* 日日志类
	*/
	class Log extends Common{
		function __construct(){
			parent::__construct();
		}
		public function init() {
			$this->log = $this->library('Log'.LOG_DRIVE);
			return $this->log;
		}
		public function putLog($message, $file = 'log'){
			$temp = $this->init();
			$temp->log($message, $file);
		}
	}