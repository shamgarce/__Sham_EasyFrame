<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rr
{
	//--
	private $route = array();
	private $db = null;
	private $params = array();

	public function ss($params)
	{
		//include(MBASE.'\Mysql.class.php');
//		echo MBASE.'\My.class.php';
		//$this->params = $params;
		$this->db = Mysql::getInstance();
		$sql = "select id,NAME from userapi";
		$rc = $this->db->getcol($sql,'id');



print_r($rc);







	}











//--
}