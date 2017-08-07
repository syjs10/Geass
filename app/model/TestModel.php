
<?php 
	/**
	* 	测试模型
	*/
	class TestModel extends Model{
		function __construt(){
			parent::__construt();
		}
		public function index(){
			// echo "TestModel is ok";
			dump($this->db->select('admin', '*'));
		}
	}