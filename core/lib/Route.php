<?php 
	/**
	* 路由类
	* URL解析
	*/
	class Route extends Common{
		/**
		 * URL解析成类,方法与参数
		 * @return [array] [类,方法与参数]
		 */
		function parseURL() {
			$url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
			$urlArr = explode('/', trim($url,'/'));
			//多余参数转换成数组
			for($i = 2; $i < count($urlArr); $i += 2){
				$data[$urlArr[$i]] = $urlArr[$i + 1];
			}
			return array(
				'ctrl'   => isset($urlArr[0]) && $urlArr[0] ? ucfirst($urlArr[0]) : 'Index',
				'action' => isset($urlArr[1]) && $urlArr[1] ? $urlArr[1] : 'index',
				'data'   => isset($data) ? $data : array()
			);

		}
	}