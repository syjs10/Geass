<?php 
	/**
	* 基本模型类
	*/
	class Model extends \Medoo\Medoo {
		
		function __construct() {
			parent::__construct();
			$option = MEDOO;
			try {
				parent::__construct($option);
			} catch (\PDOException $e) {
				p($e->getMessage());
			}
		}
	}