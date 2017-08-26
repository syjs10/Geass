<?php 
	
	/**
	* 	默认控制器
	*/
	class IndexCtrl extends Ctrl{
		function __construct() {
			parent::__construct();	
		}
		public function index(){
			// var_dump($data);
			// echo"ok";
			// $this->testModel = $this->loadModel('Test');
			// $this->testModel->index();

			// $this->view->display('index.html');
			$objPHPExcel = new PHPExcel();  
			$date = date("Y_m_d",time());  
$fileName = "{$date}.xlsx";  
  
  
//测试数据，正常会从数据库中获取  
$data = array(  
  0 => array('id'=>2012,'name'=>'胡','age' => 25),  
  1 => array('id'=>2012,'name'=>'胡','age' => 25),  
  2 => array('id'=>2012,'name'=>'胡','age' => 25),  
  3 => array('id'=>2012,'name'=>'胡','age' => 25)  
);  
  
  
//Excel文件的说明信息  
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")  
->setLastModifiedBy("Maarten Balliauw")  
->setTitle("Office 2007 XLSX Test Document")  
->setSubject("Office 2007 XLSX Test Document")  
->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")  
->setKeywords("office 2007 openxml php")  
->setCategory("Test result file");  
  
  
//设置表格内容，具体内容根据A1这种具体位置来确定    
$objPHPExcel->setActiveSheetIndex(0)  
            ->setCellValue('A1','编号')  
            ->setCellValue('B1','姓名')  
            ->setCellValue('C1','年龄');  
  
  
//适合把表中数据导入Excel文件中，多数据循环设置值   
foreach($data as $key=> $value) {  
$key+=2;  
$objPHPExcel->setActiveSheetIndex(0)  
           ->setCellValue('A'.$key,$value['id'])  
           ->setCellValue('B'.$key,$value['name'])  
           ->setCellValue('C'.$key,$value['age']);  
}  
  
  
// 重命名表  
// $objPHPExcel->getActiveSheet()->setTitle('Simple');  
  
  
// 设置活动单指数到第一个表,所以Excel打开这是第一个表  
$objPHPExcel->setActiveSheetIndex(0);  
  
  
// 将输出重定向到一个客户端web浏览器(Excel2007)  
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');  
header('Content-Disposition: attachment;filename='.$fileName);  
header('Cache-Control: max-age=0');  
  
  
//要是输出为Excel2007,使用 Excel2007对应的类，生成的文件名为.xlsx.如果是Excel2005,使用Excel5,对应生成.xls文件  
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
  
  
//支持浏览器下载生成的文档  
$objWriter->save('php://output');  
		}
	}
	// echo 'ok';