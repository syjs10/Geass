<?php 
	defined('CORE_PATH') or define('CORE_PATH', __DIR__ . '/');
	defined('ROOT_PATH') or define('ROOT_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . '/');
	defined('DEBUG') or define('DEBUG', false);
	defined('CONFIG_PATH') or define('CONFIG_PATH', ROOT_PATH . 'config/');
	defined('LIB_PATH') or define('LIB_PATH', CORE_PATH . 'lib/');
	defined('APP_PATH') or define('APP_PATH', ROOT_PATH . 'app/');
	defined('TEMPLATE_CACHE_PATH') or define('TEMPLATE_CACHE_PATH', APP_PATH.'view/template_c');
	defined('TEMPLATE_PATH') or define('TEMPLATE_PATH', APP_PATH.'view/');


	

	

	// 包含配置文件
	require CONFIG_PATH . 'config.php';
	
	//包含常用方法
	require CORE_PATH . 'Common.php';

	//包含核心框架类
	require CORE_PATH . 'Core.php';

	//基本控制器类
	require LIB_PATH . 'Ctrl.php';
	
	//基本模型类
	require LIB_PATH . 'Model.php';
	//常用函数
	// require LIB_PATH . 'function.php';
		

	
	$common = new Common;
	// $common->load('Index');
	$start = new Core;
	$start->run();