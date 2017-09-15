<?php
    /**
    * session类
    */
    class Session extends Common
    {
        function __construct()
        {
            parent::__construct();
            session_start();
        }
        /**
         * 获取session
         * @param  String $name key
         * @return String       value
         */
        public function getSession($name)
        {
            return isset($_SESSION[$name]) ? $_SESSION[$name] : NULL;
        }
        /**
         * 设置session
         * @param  String $name key
         * @param  String $data value
         * @return String       value
         */
        public function setSession($name, $data)
        {
            return $_SESSION[$name] = $data;
        }
    }