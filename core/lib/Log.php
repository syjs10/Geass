<?php 
	/**
	* 日志类
	*/
	class Log extends Common{
		function __construct(){
			parent::__construct();
		}
		/**
		 * 选择记录日志的形式
		 * @return [Object] 日志对象
		 */
		public function init() {
			$logfile = $this->library('Log'.LOG_DRIVE);
			return $logfile;
		}
		/**
		 * 写入日志
		 * @param  [String] $message 日志信息
		 * @param  string $file    写入文件名
		 * @return [type]          [description]
		 */
		public function putLog($message, $file = 'log'){
			$temp = $this->init();
			$temp->log($message, $file);
		}
	}