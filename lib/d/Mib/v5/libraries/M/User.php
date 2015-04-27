<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User
{
	//--
	private $route = array();
	private $db = null;
	private $params = array();
	public function __construct($params)
	{
		$this->params = $params;
		$this->db = Mysql::getInstance();
	}

	//方法 :
	public function info($sign)
	{
		print_r($sign);
	}

	public function test($sign)
	{
//		print_r($sign);
//echo time();
	}

	public function __call($name,$arguments) {
		//在这里
		$id = $arguments[0]['se'][0];
		$sql = "select response from userapi where id = $id";
		$rs = $this->db->getone($sql);
		$r = json_decode($rs);
		$r->timestamp = time();
		echo json_encode($r);
		exit;
		//查看在数据库中的映射,并且判断是否返回调试数据
	}










//--

}