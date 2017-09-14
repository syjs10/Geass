<?php
    /**
    * 输入过滤类
    */
    class Input extends Common
    {

        function __construct()
        {
             parent::__construct();
        }
        /**
         * 返回post的内容,name可选,默认返回post数组
         * @param  Sring $name key
         * @return String/Array $post[$name]/$_POST
         */
        public function post($name = NULL)
        {
            $post = isset($_POST) ? $_POST : array();
            return is_null($name) ? $post : (isset($post[$name]) ? $post[$name] : NULL);
        }
        /**
         * 返回get的内容,name可选,默认返回get数组
         * @param  Sring $name key
         * @return String/Array $get[$name]/$_GET
         */
        public function get($name = NULL)
        {
            $get = isset($_GET) ? $_GET : array();
            return is_null($name) ? $get : (isset($get[$name]) ? $get[$name] : NULL);
        }
    }