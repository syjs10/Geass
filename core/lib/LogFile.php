<?php

    /**
    * 文件日志存储方式
    */
    class LogFile extends Common
    {
        public function __construct()
        {
            parent::__construct();
        }
        /**
         * 写入日志方法
         * @param  String $message 写入信息
         * @param  string $file    写入文件名
         * @return [type]          是否写入成功
         */
        public function log($message, $file = 'log')
        {
            if (!is_dir(LOG_PATH)) {
                mkdir(LOG_PATH, 0777, true);
                chmod(LOG_PATH, 0777);
            }
            if(!is_dir(LOG_PATH.'/'.date('YmdH'))){
                mkdir(LOG_PATH.'/'.date('YmdH'), 0777, true);
                chmod(LOG_PATH.'/'.date('YmdH'), 0777);
            }
            return file_put_contents(LOG_PATH.'/'.date('YmdH').'/'.$file.'.php', date('Y-m-d H:i:s').' '.$this->getClientIP().' '.json_encode($message).PHP_EOL, FILE_APPEND);
            // echo $this->getClientIP();
        }
    }