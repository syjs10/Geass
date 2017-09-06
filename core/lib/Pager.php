<?php

    /**
    *
    */
    class Pager extends Common
    {

        protected $total;
        protected $listRows;
        protected $currentPage;
        protected $lastPage;
        protected $hasNext;
        protected $hasPre;
        protected $data = [];
        protected $options = [
            'var_page' => 'page',
            'path'     => '',
            'query'    => [],
            'fragment' => ''
        ];

        public function __construct()
        {
            self::getdata();
            $this->options['path'] = $this->data['url'];
        }
        protected function getdata()
        {
            $data = [];
            $url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
            $urlArr = explode('/', trim($url,'/'));
            //多余参数转换成数组
            for($i = 2; $i < count($urlArr); $i += 2){
                $data[$urlArr[$i]] = $urlArr[$i + 1];
            }
            $data['url'] = BASE_URL . $urlArr[0] . '/' . $urlArr[1];
            $this->data = $data;
        }
        public function set($total, $listRows, $options = [])
        {
            $this->options        = array_merge($this->options, $options);
            $this->total          = $total;
            $this->listRows       = $listRows;
            $this->lastPage       = (int)ceil($total / $listRows);
            $this->currentPage    = $this->getCurrentPage();
            $this->hasNext        = ($this->currentPage < $this->lastPage);
        }
        public function getCurrentPath()
        {
            return $_SERVER['PHP_SELF'];    //返回当前脚本路径
        }
        public function getCurrentPage($default=1)
        {

            $page = isset($this->data[$this->options['var_page']]) ? (int)$this->data[$this->options['var_page']] : $default;    //通过$_GET从url中获取page页码，默认为1
            return (int)$page;
        }
        public function buildUrl($page)
        {
            if ($page <= 0) {
                $page = 1;
            }
            $url = $this->options['path'] . '/' . $this->options['var_page'] . '/' . $page;
            return $url;
        }

    }