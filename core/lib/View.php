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
		public function assign($name, $value) {
			$this->assign[$name] = $value;
		}
		public function display($page){
			$this->assign('base_url', BASE_URL);
			$this->twig->display($page, $this->assign);
		}
	}