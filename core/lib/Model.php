<?php
    /**
    * 基本模型类
    */

    class Model extends Common
    {

        function __construct()
        {
            parent::__construct();
            $this->db = new Medoo\Medoo(MEDOO);

        }
        /**
         * 插入记录
         * @param  String $table 表名
         * @param  Array  $data  数据
         * @return [type]        是否成功
         */
        public function insert($table, $data)
        {
            $res = $this->db->insert($table, $data);
            $Log = $this->library('Log');
            $Log->putLog($res,'database');
            return $res;


        }
        /**
         * 查询记录
         * @param  String $table   表名
         * @param  String $join    需要加入表名
         * @param  String $columns 列名
         * @param  Array  $where   条件
         * @return [type]          是否成功
         */
        public function select($table, $join, $columns = NULL, $where = NULL)
        {
            $res = $this->db->select($table, $join, $columns, $where);
            $Log = $this->library('Log');
            $Log->putLog($res,'database');
            return $res;
        }
        public function getByPage($table, $page, $num)
        {
            $res = self::select($table, '*', ["LIMIT"=>[($page - 1) * $num, $num]]);
            $Log = $this->library('Log');
            $Log->putLog($res,'database');
            return $res;
        }
        public function count($table, $join = null, $column = NULL, $where = NULL)
        {
            $res = $this->db->count($table, $join, $column, $where);
            $Log = $this->library('Log');
            $Log->putLog($res,'database');
            return $res;
        }
        public function update($table, $data, $where = null)
        {
            $res = $this->db->update($table, $data, $where);
            $Log = $this->library('Log');
            $Log->putLog($res,'database');
            return $res;
        }

    }