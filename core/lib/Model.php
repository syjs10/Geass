<?php
	/**
	* 基本模型类
	*/

	class Model extends Common {
		
		function __construct() {
			parent::__construct();
			$this->db = new Medoo\Medoo(MEDOO);

		}
		public function insert($table, $data) {
			$error = $this->db->insert($table, $data);
			$errorMsg = implode('  ', $error->errorInfo());
			$Log = $this->library('Log');
			$Log->putLog($errorMsg,'database');
		}
		
	}