<?php 
	/**
	* 核心类
	* 	包含启动方法
	*/
	class Core extends Common{
		function __construct() {
			parent::__construct();			
			//解析URL获取控制器/方法
			$this->Route = $this->library('Route');
			$url = $this->Route->parseURL();
			$this->ctrl = $url['ctrl'];
			$this->action = $url['action'];
			$this->data = $url['data'];
		}
		/**
		 * 启动框架方法
		 * @return [type] [description]
		 */
		public function run() {
			//打印日志
			$Log = $this->library('Log');	
			$Log->putLog("Access => controller: $this->ctrl action: $this->action");
			//解析路由并显示页面
			
			$class = $this->loadCtrl($this->ctrl);
			$action = $this->action;
			// 向方法中传入参数
			// dump($this->data);
			call_user_func_array(array($class, $action), $this->data);
			
		}
		
	}