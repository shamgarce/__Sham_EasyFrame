<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class W extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->S = new Set();		//里面包含系列的单例对象
		$this->node = 197;
	}

	public function view($viewid)
	{
		$nodeid = $viewid;			//背诵和记忆单元

		//=============================================
		$sql	= "select id,preid,title from doc_document where enable = 0 order by sort desc ,id";
		$_rc	= $this->S->db->getall($sql,'id');		//所有的数据

		$this->load->library('tree',$_rc);
		$leaf = $this->tree->leaf($nodeid);
		$data['leaf'] = $leaf;

		$sql			= "select * from doc_document where id={$viewid} order by sort desc ,id";
		$leafcontent	= $this->S->db->getrow($sql);		//所有的数据
		$data['leafcontent'] = $leafcontent;


//		//=============================================================
//		//本页内容
		$sql	= "select * from doc_document where (preid = $nodeid) AND enable = 0 order by sort desc ,id";
		$mast	= $this->S->db->getall($sql);		//所有的数据
		$data['mast'] = $mast;

		foreach($mast as $key=>$value){
			$_id[] = $value['id'];
		}

		$ids = Set::getstr($_id,0,',');
		empty($ids) && $ids = "9999999999";
		$sql	= "select * from doc_document where id in($ids) or preid in($ids) order by sort desc ,id";
		$mc	= $this->S->db->getall($sql,'id');		//所有的数据

//print_r($mc);
		$data['mc'] = $mc;

		//print_r($leaf);
//		//=============================================================
		$this->load->view('W/W_view',$data);
	}


	//可编辑的首页,在适当的位置会有个edit标签		首页 是一个封面
	public function index()
	{
		$nodeid = $this->node;			//背诵和记忆单元

		//=============================================
		$sql	= "select id,preid,title from doc_document where enable = 0 and test = 0 order by sort desc ,id";
		$_rc	= $this->S->db->getall($sql,'id');		//所有的数据

		$this->load->library('tree',$_rc);
		$leaf = $this->tree->leaf($nodeid);
		$data['leaf'] = $leaf;

//		//=============================================================
//		//本页内容
		$sql	= "select * from doc_document where (preid = $nodeid) AND enable = 0 and test = 0 order by sort desc ,id";
		$mast	= $this->S->db->getall($sql,'id');		//所有的数据
		$data['mast'] = $mast;
//print_r($mast);
//		//=============================================================
		$this->load->view('W/W_index',$data);

	}


	//另外一种模式 - 可以在微信上访问 Doc->Docview
	public function ____doc()
	{
		$nodeid = $this->node;			//背诵和记忆单元
		//echo $nodeid;


//		//=============================================================
//		//本页内容
		$sql	= "select id,preid,title from doc_document where (preid = $nodeid) AND enable = 0 order by sort desc ,id";
		$mast	= $this->S->db->getall($sql);		//所有的数据
		$data['mast'] = $mast;

		foreach($mast as $key=>$value){
			$_id[] = $value['id'];
		}

		$ids = Set::getstr($_id,0,',');
		empty($ids) && $ids = "9999999999";
		$sql	= "select id,preid,title from doc_document where id in($ids) or preid in($ids) order by sort desc ,id";
		$mc	= $this->S->db->getall($sql,'id');		//所有的数据
		$data['mc'] = $mc;


		$this->load->view('W/W_doc',$data);
	}



	//具体内容
	public function viewm($viewid)
	{

		$nodeid = $viewid;			//背诵和记忆单元

		//=============================================
		$sql	= "select id,preid,title from doc_document where enable = 0 and test = 0 order by sort desc ,id";
		$_rc	= $this->S->db->getall($sql,'id');		//所有的数据

		$this->load->library('tree',$_rc);
		$leaf = $this->tree->leaf($nodeid);
		$data['leaf'] = $leaf;

		$sql			= "select * from doc_document where id={$viewid} and test = 0 order by sort desc ,id";
		$leafcontent	= $this->S->db->getrow($sql);		//所有的数据
		$data['leafcontent'] = $leafcontent;


//		//=============================================================
//		//本页内容
		$sql	= "select * from doc_document where (preid = $nodeid) AND enable = 0 and test = 0 order by sort desc ,id";
		$mast	= $this->S->db->getall($sql);		//所有的数据
		$data['mast'] = $mast;

		foreach($mast as $key=>$value){
			$_id[] = $value['id'];
		}

		$ids = Set::getstr($_id,0,',');
		empty($ids) && $ids = "9999999999";
		$sql	= "select * from doc_document where id in($ids) or preid in($ids) and test = 0 order by sort desc ,id";
		$mc	= $this->S->db->getall($sql,'id');		//所有的数据

//print_r($mc);
		$data['mc'] = $mc;

		//print_r($leaf);
//		//=============================================================
		//$this->load->view('W/W_view',$data);

		$this->load->view('W/W_viewm',$data);
	}

	//具体内容
	public function viewt($viewid)
	{

		$nodeid = $viewid;			//背诵和记忆单元

		//=============================================
		$sql	= "select id,preid,title from doc_document where enable = 0 and test = 0 order by sort desc ,id";
		$_rc	= $this->S->db->getall($sql,'id');		//所有的数据

		$this->load->library('tree',$_rc);
		$leaf = $this->tree->leaf($nodeid);
		$data['leaf'] = $leaf;

		$sql			= "select * from doc_document where id={$viewid} and test = 0 order by sort desc ,id";
		$leafcontent	= $this->S->db->getrow($sql);		//所有的数据
		$data['leafcontent'] = $leafcontent;


//		//=============================================================
//		//本页内容
		$sql	= "select * from doc_document where (preid = $nodeid) AND enable = 0 and test = 0 order by sort desc ,id";
		$mast	= $this->S->db->getall($sql);		//所有的数据
		$data['mast'] = $mast;

		foreach($mast as $key=>$value){
			$_id[] = $value['id'];
		}

		$ids = Set::getstr($_id,0,',');
		empty($ids) && $ids = "9999999999";
		$sql	= "select * from doc_document where id in($ids) or preid in($ids) and test =1 order by sort desc ,id";
		$mc	= $this->S->db->getall($sql,'id');		//所有的数据

//print_r($mc);
		$data['mc'] = $mc;

		//print_r($leaf);
//		//=============================================================
		//$this->load->view('W/W_view',$data);

		$this->load->view('W/W_viewt',$data);
	}
//	//具体内容
//	public function doctest($did)
//	{
//
//		$sql	= "select * from doc_document where id =$did order by sort desc ,id";
//		$rc	= $this->S->db->getrow($sql);
//		$data['rc'] = $rc;
//
//		$this->load->view('W/W_doctest',$data);
//	}





















}




