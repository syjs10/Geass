<?php
	/**
	* 常用函数类
	*/
	class Common {
		function __construct() {

		}
		
		/**
		 * 加载控制器类
		 * @param  [String] $class 类名
		 * @return [Object] 	   $class的对象
		 */
		static function loadCtrl($class) {
	        // 加载控制器类
	        $controllers = APP_PATH . 'controller/' . $class . 'Ctrl.php';
	        if (file_exists($controllers)) {
	        	include $controllers;
	        	$className = $class . 'Ctrl';
				return new $className; 
	        } else {
	        	self::show404();
	        }

	    }
	    /**
		 * 加载模型类
		 * @param  [String] $class 类名
		 * @return [Object] 	   $class的对象
		 */
	    static function loadModel($class) {
	        // 加载模板类
	        $model = APP_PATH . 'model/' . $class . 'Model.php';
	        if (file_exists($model)) {
	        	include $model;
	        	$className = $class . 'Model';
				return new $className;
	        } else {
	        	self::show404();
	        }

	    }
	    /**
		 * 加载lib类
		 * @param  [String] $class 类名
		 * @return [Object] 	   $class的对象
		 */
	    static function library($class) {
	       
	        $lib = LIB_PATH.$class.'.php';
	        if (file_exists($lib)) {
	        	include $lib;
				return new $class; 
	        } 

	    }
	    /**
	     * 显示404页面(待完善)
	     * @return [type] [description]
	     */
	    public function show404(){
	    	echo "404";
	    }
	    
	}