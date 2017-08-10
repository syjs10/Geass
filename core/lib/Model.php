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
			if (LOG && '00000    ' != $errorMsg) {
				$Log = $this->library('Log');
				$Log->putLog('InsertError: ' . $errorMsg,'database');
			}
			
		}
		public function select($table, $join, $columns = NULL, $where = NULL) {
			return $this->db->select($table, $join, $columns, $where);
		}
		
	}