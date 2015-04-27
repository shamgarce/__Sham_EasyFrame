<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class D extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		//连接数据库================================================两种方式都可以
		$this->load->library('Db');			//数据库
	}


    //主要的管理界面
    public function index()
    {
		echo '首页';
        $this->load->view('D/D_index',$data);
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */