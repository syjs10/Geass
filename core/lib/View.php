<?php 
	/**
	* 视图类
	*/
	class View extends Common {
		protected $assign;		
		function __construct() {	
			parent::__construct();
			$loader = new \Twig_Loader_Filesystem(TEMPLATE_PATH);
			$this->twig = new \Twig_Environment($loader, array(
			    'cache' => TEMPLATE_CACHE_PATH,
			    'debug' => DEBUG
			));
		}
		/**
		 * 传入模板变量
		 * @param  [String] $name  变量名称
		 * @param  [type] $value 变量值
		 */
		public function assign($name, $value) {
			$this->assign[$name] = $value;
		}
		/**
		 * 显示页面
		 * @param  [Stirng] $page 显示页面
		 */
		public function display($page){
			$this->assign('base_url', BASE_URL);
			$this->assign('source_url', BASE_URL . 'app/view/');
			$this->twig->display($page, $this->assign);
		}
	}