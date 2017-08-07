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
	        $usefulCtrl = LIB_PATH . 'UsefulCtrl/' . $class . 'Ctrl.php';

	        if (file_exists($controllers)) {
	        	include $controllers;
	        	$className = $class . 'Ctrl';
				return new $className; 
	        } elseif(file_exists($usefulCtrl)) {
	        	include $usefulCtrl;
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
	       
	        $lib = LIB_PATH . $class . '.php';
	        if (file_exists($lib)) {
	        	include $lib;
				return new $class; 
	        } 

	    }
	    /**
		 * 加载Component类
		 * @param  [String] $class 类名
		 * @return [Object] 	   $class的对象
		 */
	    static function component($class) {
	       
	        $lib = ROOT_PATH . 'Component/' .$class . '.php';
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
	    /**
	     * 获取访问Ip地址
	     * @return [type] [description]
	     */
	    public function getClientIP() {  
		    global $ip;  
		    if (getenv("HTTP_CLIENT_IP")){
		    	$ip = getenv("HTTP_CLIENT_IP");  
		    } else if(getenv("HTTP_X_FORWARDED_FOR")){
		    	$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		    } else if(getenv("REMOTE_ADDR")){
		    	$ip = getenv("REMOTE_ADDR"); 
		    } else {
		    	$ip = "Unknow";
		    }  
		    return $ip;  
		} 
		public function _safe($str){
		    $html_string = array("&amp;", "&nbsp;", "'", '"', "<", ">", "\t", "\r");
		    $html_clear = array("&", " ", "&#39;", "&quot;", "&lt;", "&gt;", "&nbsp; &nbsp; ", "");
		    $js_string = array("/<script(.*)<\/script>/isU");
		    $js_clear = array("");
		    $frame_string = array("/<frame(.*)>/isU", "/<\/fram(.*)>/isU", "/<iframe(.*)>/isU", "/<\/ifram(.*)>/isU",);
		    $frame_clear = array("", "", "", "");
		    $style_string = array("/<style(.*)<\/style>/isU", "/<link(.*)>/isU", "/<\/link>/isU");
		    $style_clear = array("", "", "");
		    $str = trim($str);
		    //过滤字符串
		    $str = str_replace($html_string, $html_clear, $str);
		    //过滤JS
		    $str = preg_replace($js_string, $js_clear, $str);
		    //过滤ifram
		    $str = preg_replace($frame_string, $frame_clear, $str);
		    //过滤style
		    $str = preg_replace($style_string, $style_clear, $str);
		    return $str;
		}    
	}