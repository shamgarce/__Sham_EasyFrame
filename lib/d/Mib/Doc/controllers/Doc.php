<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doc extends CI_Controller
{

	function __construct()
	{

		//$pn = $this->input->post('pageNum', TRUE);

		//[FCPATH] => E:\www\slim-API\public_html\
		//[APPPATH] => Mib/Te/
		//BASEPATH //:// E:/www/slim-API/public_html/C/

		parent::__construct();
		$this->load->library('Db');			//数据库
	}

	//可编辑的首页,在适当的位置会有个edit标签		首页 是一个封面
	public function index($listid = 0)
	{
		//=============================================================
		$listid = intval($listid);
		$sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->db->getall($sql,'id');		//所有的数据


		$this->load->library('tree',$_rc);
		$leaf = $this->tree->leaf($listid);

		$data['leaf'] = $leaf;
		$level = $this->tree->leaf_level($listid);
		$nav = $this->tree->navi($listid);

		$data['nav'] = $nav;

		//=============================================================
		//整课树的运算  第一,运算处小树枝 第二 运算出是否叶子
		$_rc['id'] = 0;
		$_rc['title'] = '根';

		//=============================================================
		//跟本id同级,以及下级的
		$data['listid'] = $listid;
		$data['TA'] = array("0"=>"A","1"=>"T");		//路径

		$this->load->helper('cookie');
		$this->load->view('index',$data);

	}

	//=============================================================
	//查看
	public function nrview($listid = 0){
		//=============================================================
		$listid = intval($listid);
		$sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->db->getall($sql,'id');		//所有的数据

		$this->load->library('tree',$_rc);

		$leaf = $this->tree->leaf($listid);
		$data['leaf'] = $leaf;
//		$level = $Tree->leaf_level($listid);
		$nav = $this->tree->navi($listid);
		$data['nav'] = $nav;

		//=============================================================
		//整课树的运算  第一,运算处小树枝 第二 运算出是否叶子

		$_rc['id'] = 0;
		$_rc['title'] = '根';

		//=============================================================
		$data['listid'] = $listid;		//跟本id同级,以及下级的

		//=============================================================
		//本页内容
		$sql	= "select * from doc_document where (id = $listid) AND enable = 0 order by sort desc ,id";
		$mcmain	= $this->db->getRow($sql);		//所有的数据
		$sql	= "select * from doc_document where (preid = $listid) AND enable = 0 order by sort desc ,id";
		$mc	= $this->db->getall($sql,'id');		//所有的数据

		$data['mcmain'] = $mcmain;
		$data['mc'] = $mc;
		//=============================================================

		$this->load->helper('cookie');
		$this->load->view('nrview',$data);
	}



	//=============================================================
	//内容页
	public function content(){
		$this->load->helper('cookie');
		$this->load->view('index_view_list',$data);
	}

	//=============================================================
	//内容编辑
	public function content_edit(){

	}

	//=============================================================
	//设置
	public function vset(){
		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$this->load->helper('cookie');
		$this->load->view('vset',$data);
	}

	//=============================================================
	//选择 归属
	public function vset_select(){
		//检索所有的信息,选择归属
		//功能 :设置是否显示编辑和排序,还有是否展示地址
		//=============================================================
		$sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->db->getall($sql);		//所有的数据
		//=============================================================
		$this->load->library('tree',$_rc);


		$leaf 	= $this->tree->leaf(0);
		$level 	= $this->tree->leaf_level(0);
		$list 	= $this->tree->getlist();
		//=============================================================
		$_rc['id'] = 0;
		$_rc['title'] = '根';
		$data['list'] = $list;
		$data['_rc'] = $_rc;
		//=============================================================
		$this->sor = $_rc;
		$this->load->view('vset_select',$data);
	}


	public function vset_edit_exc()
	{
		$id = $_POST['id'];
		$rc['preid'] 	= $_POST['bguishu'];
		$rc['titleonly'] = empty($_POST['titleonly'])?0:1;

		$rc['title'] 	= trim($_POST['btiaoti']);
		if($rc['titleonly'] !=1) $rc['content'] 	= $_POST['bnr'];
		if($rc['titleonly'] !=1) $rc['url'] 		= $_POST['burl'];

		if(empty($rc['title']))	{
			echo json_encode(array("code"=>"-200","msg"=>'标题必须填写'));
			exit;
		}
		//$rc = saddslashes($rc);
		$this->db->autoExecute("doc_document",$rc,'UPDATE',"id=$id");
		echo json_encode(array("code"=>"200","msg"=>'完成'));
		exit;
	}
	//=============================================================
	//设置
	public function vset_edit($id){
		$sql	= "select * from doc_document where id = $id ";
		$rc	= $this->db->getrow($sql);		//所有的数据
		$data['rc'] = $rc;

		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$sql	= "select id,preid,title from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->db->getall($sql,'id');		//所有的数据
		$data['_rc'] = $_rc;

		$this->load->view('vset_edit',$data);
	}

	//=============================================================
	//设置
	public function vset_addnew(){
		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$this->load->view('vset_addnew',$data);
	}

	public function vset_addnew_exc(){

		//doc_document add
		$rc['preid'] 	= $_POST['bguishu'];
		$rc['title'] 	= trim($_POST['btiaoti']);
		$rc['titleonly'] = empty($_POST['titleonly'])?0:1;
		if(!$rc['titleonly'])$rc['content'] 	= $_POST['bnr'];
		$rc['url'] 		= $_POST['burl'];
		if(empty($rc['title']))	{
			echo json_encode(array("code"=>"-200","msg"=>'标题必须填写'));
			exit;
		}
		//$rc = saddslashes($rc);
		$this->db->autoExecute("doc_document",$rc,'INSERT');
		echo json_encode(array("code"=>"200","msg"=>'完成'));
		exit;
	}

	public function vset_sort_exc()
	{
		$hsort = $_POST['hsort'];
		foreach($hsort as $key=>$value){
			//--------------------------------------------
			$v = intval($value);
			$i = intval($key);
			$sql = "update doc_document set sort= $v where id = $i";
			$this->db->query($sql);
			//--------------------------------------------
		}

		echo json_encode(array("code"=>"200","msg"=>'完成'));
		exit;
	}

	//=============================================================
	//排序
	public function vset_sort($listid = 0){
		//功能 :设置是否显示编辑和排序,还有是否展示地址
		$sql	= " select id,preid,title,titleonly from doc_document
					where preid =$listid  and enable = 0
					order by sort desc ,id";
		$rc	= $this->db->getall($sql);		//所有的数据



		$data['rc'] = $rc;
		$data['listid'] = $listid;
		$this->load->view('vset_sort',$data);
	}




}




