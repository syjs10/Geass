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
				return false;
			}
			return true;

			
		}
		public function select($table, $join, $columns = NULL, $where = NULL) {
			return $this->db->select($table, $join, $columns, $where);
		}
		public function getByPage($table, $page, $num){
			return self::select($table, '*', ["LIMIT"=>[($page - 1) * $num, $num]]);
		}
		public function count($table, $where = array()){
			return $this->db->count($table, $where);
		}
		public function update($table, $data, $where = null){
			return $this->db->update($table, $data, $where);
		}
		
	}