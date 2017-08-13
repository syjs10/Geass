<?php
	/**
	* 常用函数类
	* 用self::$classLoaded解决了重复加载类报错的问题
	*/

	class Common {
		function __construct() {
		}
	
		static public $classLoaded;
		/**
		 * 加载控制器类
		 * @param  [String] $class 类名
		 * @return [Object] 	   $class的对象
		 */
		static function loadCtrl($class) {
	        // 加载控制器类
	        $controllers = APP_PATH . 'controller/' . $class . 'Ctrl.php';
	        $usefulCtrl = LIB_PATH . 'UsefulCtrl/' . $class . 'Ctrl.php';
	        $className = $class . 'Ctrl';

	        if (isset(self::$classLoaded[$className])) {
				return self::$classLoaded[$className];
	        }else{
	        	if (file_exists($controllers)) {
		        	include $controllers;
					self::$classLoaded[$className] = new $className; 
					return self::$classLoaded[$className];
		        } elseif(file_exists($usefulCtrl)) {
		        	include $usefulCtrl;
					self::$classLoaded[$className] = new $className; 
					return self::$classLoaded[$className];
		        } else {
		        	self::show404();
		        }
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
	        $className = $class . 'Model';
	        if (isset(self::$classLoaded[$className])) {
				return self::$classLoaded[$className];
	        }
	        if (file_exists($model)) {
	        	include $model;
				self::$classLoaded[$className] = new $className; 
				return self::$classLoaded[$className];
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
	        if (isset(self::$classLoaded[$class])) {
				return self::$classLoaded[$class];
	        } else {
	        	if (file_exists($lib)) {
		        	include $lib;
					self::$classLoaded[$class] = new $class; 
					return self::$classLoaded[$class];
		        } 
	        }
	        

	    }
	    /**
		 * 加载Component类
		 * @param  [String] $class 类名
		 * @return [Object] 	   $class的对象
		 */
	    static function component($class) {
	       
	        $lib = ROOT_PATH . 'Component/' .$class . '.php';
	        if (isset(self::$classLoaded[$class])) {
				return self::$classLoaded[$class];
	        }
	        if (file_exists($lib)) {
	        	include $lib;
				self::$classLoaded[$class] = new $class; 
				return self::$classLoaded[$class];
	        } 

	    }
	    
	    /**
	     * 显示404页面(待完善)
	     * @return [type] [description]
	     */
	    public function show404(){
	    	echo "404";
	    }
	    function alert($message){
	    	echo "<script>alert('$message')</script>";
	    }
	    function jump($page){
	    	header("location:$page");
	    	
	    	exit();

	    }
	    function back(){
	    	echo "<script>history.go(-1);</script>";

	    }
	    function jumps($page){
	    	echo "<script>window.location.href='$page'</script>";

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
		// public function _safe($str){
		//     $html_string = array("&amp;", "&nbsp;", "'", '"', "<", ">", "\t", "\r");
		//     $html_clear = array("&", " ", "&#39;", "&quot;", "&lt;", "&gt;", "&nbsp; &nbsp; ", "");
		//     $js_string = array("/<script(.*)<\/script>/isU");
		//     $js_clear = array("");
		//     $frame_string = array("/<frame(.*)>/isU", "/<\/fram(.*)>/isU", "/<iframe(.*)>/isU", "/<\/ifram(.*)>/isU",);
		//     $frame_clear = array("", "", "", "");
		//     $style_string = array("/<style(.*)<\/style>/isU", "/<link(.*)>/isU", "/<\/link>/isU");
		//     $style_clear = array("", "", "");
		//     $str = trim($str);
		//     //过滤字符串
		//     $str = str_replace($html_string, $html_clear, $str);
		//     //过滤JS
		//     $str = preg_replace($js_string, $js_clear, $str);
		//     //过滤ifram
		//     $str = preg_replace($frame_string, $frame_clear, $str);
		//     //过滤style
		//     $str = preg_replace($style_string, $style_clear, $str);
		//     return $str;
		// }    
	}