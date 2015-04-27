<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		//连接数据库================================================两种方式都可以
//		include(FCPATH.APPPATH.'libraries\Db.php');
//		$this->db = Db::getInstance();
		//连接数据库================================================
		$this->load->library('Db');			//数据库
	}


    //主要的管理界面
    public function index()
    {
        $sql= "select * from doc_metro_group where enable = 1 ORDER by sort desc";
        $group = $this->db->getall($sql);

        $sql= "SELECT * FROM `doc_metro` where enable=1 ORDER by sort desc";
        $_rc = $this->db->getall($sql);
        foreach($_rc as $key=>$value){
            $rc[$value['groupid']][] = $value;
        }
        $data['rc']     = $rc;
        $data['group'] = $group;

        $this->load->view('M/M_index',$data);
    }

    public function setup_group_sort_exc(){
        $setgroup_sort = $_POST['setgroup_sort'];


        foreach($setgroup_sort as $key=>$value){

            $this->db->autoexecute('doc_metro',$value,'UPDATE',"id=$key");
        }

        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);

    }

    public function vselect($nodeid = 0)
    {
        $this->load->helper('cookie');
        $nodeid = intval($_COOKIE['___groupname']);

        //检索所有的信息,选择归属
        //功能 :设置是否显示编辑和排序,还有是否展示地址
        //=============================================================
        $sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
        $_rc	= $this->db->getall($sql);		//所有的数据
        //=============================================================
        $this->load->library('tree',$_rc);


        $leaf 	= $this->tree->leaf($nodeid);
        $level 	= $this->tree->leaf_level($nodeid);
        $list 	= $this->tree->getlist();
        //=============================================================
        $_rc['id'] = 0;
        $_rc['title'] = '根';
        $data['list'] = $list;
        $data['_rc'] = $_rc;
        //=============================================================

        //一级枝干 供筛选
        $sql	= "select id,title from doc_document where preid= 0 and enable = 0 order by sort desc ,id";
        $mc	= $this->db->getall($sql);
        $data['mc'] = $mc;



        //=============================================================
        $this->sor = $_rc;
        $this->load->view('M/M_select',$data);
    }





    public function setup_group($groupid){
        $this->load->helper('cookie');

        $groupid = intval($groupid);
        $sql = "select * from doc_metro_group where groupid = $groupid";
        $row = $this->db->getrow($sql);

        //检索出该分组id的瓷片数据
        $sql = "select * from doc_metro
                where groupid = $groupid and enable = 1
                order by sort desc";
        $rc = $this->db->getall($sql);

        $data['row'] = $row;
        $data['rc'] = $rc;
//print_r($rc);
        $this->load->view('M/M_setup_group',$data);
    }

    public function vedit_exc()
    {
        $id = $_POST['id'];
        $rc['preid'] 	= $_POST['bguishu'];
        $rc['titleonly'] = empty($_POST['titleonly'])?0:1;
        $rc['startscreen'] = empty($_POST['startscreen'])?0:1;
        $rc['test'] = empty($_POST['test'])?0:1;

        $rc['title'] 	= trim($_POST['btiaoti']);
        if($rc['titleonly'] !=1) $rc['content'] 	= addslashes($_POST['bnr']);
        if($rc['titleonly'] !=1) $rc['url'] 		= $_POST['burl'];
        if($rc['test'] ==1 && isset($_POST['content_hidden']))    $rc['content_hidden'] 	= trim($_POST['content_hidden']);


        if(empty($rc['title']))	{
            echo json_encode(array("code"=>"-200","msg"=>'标题必须填写'));
            exit;
        }
        //$rc = saddslashes($rc);
        $this->db->autoExecute("doc_document",$rc,'UPDATE',"id=$id");

        //===========================================================
        //startscreen 处理

        //首先update
        $sql= "update doc_metro set enable = {$rc['startscreen']} where docid = $id";
        $this->db->query($sql);
        //查找
        if($rc['startscreen']==1){
            $sql = "select count(*) from doc_metro where docid = $id";
            $count = $this->db->getone($sql);
            if($count<1){   //没有找到
                $md['groupid'] = 20;
                $md['docid'] = $id;
                $md['title'] = $rc['title'];
                $md['sort'] = 0;
                $md['enable'] = 1;
                $md['wg'] = 'double double-vertical';
                $md['color'] = 'bg-cobalt';
                $md['icon'] = 'icon-tree-view';
                $md['brand'] = '<div class="tile-status"><span class="name">{title}</span></div>';
                $md['content'] = '<div class="tile-content icon"><i class="{icon}"></i></div>';
                //拼接瓷片
                $md['cpcode']  = '<a href=/M/tnode/$id class="tile double double-vertical bg-cobalt" data-click="transform">
<div class="tile-content icon"><i class="icon-tree-view"></i></div>
<div class="tile-status"><span class="name">'.$rc['title'].'</span></div>
</a>';

                $this->db->autoExecute("doc_metro",$md,'INSERT');
            }
        }

        //===========================================================

        echo json_encode(array("code"=>"200","msg"=>'完成'));
        exit;
    }


    public function vedit($id)
    {
        $id = intval($id);
        $this->load->helper('cookie');


        $sql	= "select * from doc_document where id=$id";
        $rc	= $this->db->getrow($sql);
        $data['rc']=$rc;

        //功能 :设置是否显示编辑和排序,还有是否展示地址
        $sql	= "select id,preid,title from doc_document where enable = 0 order by sort desc ,id";
        $_rc	= $this->db->getall($sql,'id');		//所有的数据
        $data['_rc'] = $_rc;


        $this->load->view('M/M_vedit',$data);
    }

    public function view($nodeid)
    {

        //=============================================================
        $listid = intval($nodeid);
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
        $this->load->view('M/M_view',$data);
    }

    public function tnode($nodeid=0){

        $nodeid = intval($nodeid);
        //=============================================
        $sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
        $_rc	= $this->db->getall($sql,'id');		//所有的数据
        $this->load->library('tree',$_rc);
        $leaf = $this->tree->leaf($nodeid);
        $data['leaf'] = $leaf;

        $level = $this->tree->leaf_level($nodeid);
        $nav = $this->tree->navi($nodeid);
        $data['nav'] = $nav;
//print_r($leaf);

        $sql	= "select * from doc_document where (id = $nodeid)";
        $mcmain	= $this->db->getRow($sql);		//所有的数据
        $data['mcmain'] = $mcmain;

        $this->load->helper('cookie');
        $this->load->view('M/M_tnode',$data);
    }

    public function tree_ext($leaf)
    {
        if(empty($leaf['child'])){
            return "<li><a href=\"/M/view/{$leaf['preid']}#{$leaf['id']}\">{$leaf['title']}</a></li>\r\n";
        }else{
            if($leaf[_pure]==1){
                $html = "<li class=\"node collapsed\"><a href=\"/M/view/{$leaf['id']}\"><span class=\"node-toggle padding10\"></span>".$leaf['title']."</a>
    <ul>"."\n\r";
            }else{
                $html = "<li class=\"node collapsed\"><a href=\"/M/tnode/{$leaf['id']}\"><span class=\"node-toggle padding10\"></span>".$leaf['title']."</a>
    <ul>"."\n\r";
            }
            $html_ = '';
            foreach($leaf['child'] as $key=>$value){
                $html_ .=$this->tree_ext($value);
            }
            $html .= $html_;
            $html .= "
    </ul>
</li>"."\r\n";
            return $html;
        }
    }

    public function add_exc()
    {
//doc_document add
        $rc['preid'] 	= $_POST['bguishu'];
        $rc['title'] 	= trim($_POST['btiaoti']);
        $rc['titleonly'] = empty($_POST['titleonly'])?0:1;
        if(!$rc['titleonly'])$rc['content'] 	= addslashes($_POST['bnr']);
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

    public function add($listid=0)
    {

        $this->load->view('M/M_add',$data);
    }


    public function sort_exc($listid = 0)
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

    public function sort($listid = 0)
    {
        //功能 :设置是否显示编辑和排序,还有是否展示地址
        $sql	= " select id,preid,title,titleonly from doc_document
					where preid =$listid  and enable = 0
					order by sort desc ,id";
        $rc	= $this->db->getall($sql);		//所有的数据



        $data['rc'] = $rc;
        $data['listid'] = $listid;
        $this->load->view('M/M_sort',$data);
    }

    public function tree(){
        //=============================================================
        $sql	= "select id,preid,title,titleonly from doc_document where enable = 0 order by sort desc ,id";
        $_rc	= $this->db->getall($sql,'id');		//所有的数据
        $this->load->library('tree',$_rc);
        $leaf = $this->tree->leaf(0);
        $data['leaf'] = $leaf;
        //=============================================================
        //整课树的运算  第一,运算处小树枝 第二 运算出是否叶子
       // print_r($leaf);
//print_r($leaf['child']);
        //用递归计算
        $html =  '<ul class="treeview" data-role="treeview">'."\r\n";

        foreach($leaf['child'] as $key=>$value){
            $html .= $this->tree_ext($value);
        }
        $html .= "</ul>\r\n".'';

        $data['html'] =  $html;
//echo $html;

        $this->load->helper('cookie');
        $this->load->view('M/M_tree',$data);
    }



    //设置界面
    public function setup()
    {
        $this->load->helper('cookie');
        $this->load->library('Fun');			//函数库
        include 'Config/Set.php';
        $ar = array();
        for($i=1;$i<$num+1;$i++){
           array_push($ar,$i);
        }
        array_push($ar,19);
        array_push($ar,20);


        $ars = $this->fun->getstr($ar);
        $sql = "select * from  doc_metro_group where groupid in($ars)";
        $rc = $this->db->getall($sql);

        $data['rc'] = $rc;
        $data['num'] = $num;


        $this->load->view('M/M_setup',$data);
    }

    public function setup_group_edit_exc()
    {
//edbrand	44444444444
//edcolor	bg-magenta
//edcontent	544455555555
//edgroupid	11111
//edicon	icon-briefcase-2
//edid	6
//edpic	/A/upload/CR-UMnZfet6Cy.jpg
//edtitle	111111111111111111
//edwg	2111111111

        $id = intval($_POST['edid']);

        $rc['groupid'] = $_POST['edgroupid'];
        $rc['title']    = $_POST['edtitle'];
        $rc['wg']       = $_POST['edwg'];
        $rc['color']    = $_POST['edcolor'];
        $rc['icon']     = $_POST['edicon'];

        $rc['img']      = $_POST['edpic'];
        $rc['brand']    = $_POST['edbrand'];
        $rc['content']  = $_POST['edcontent'];
        $rc['url']      = $_POST['edurl'];


        $rc['cpcode']   = $_POST['11111'];        //计算组合

        //获取nodeid[构建url]
        if(empty($rc['url'])){
            $nodeid = $this->db->getone("select docid from doc_metro where id = $id");
            if(!empty($nodeid)){
                $rc['url'] = '/M/tnode/'.$nodeid;
            }
        }

        //拼接瓷片
        $rc['cpcode']  = '<a {url} class="tile {wg} {color}" data-click="transform">
            {content}
            {brand}
        </a>';
        $url = !empty($rc['url'])?"href=\"{$rc['url']}\"":'';
        $rc['cpcode'] = str_replace('{brand}',  $rc['brand'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{content}',$rc['content'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{url}',    $url,       $rc['cpcode']);
        $rc['cpcode'] = str_replace('{title}',  $rc['title'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{wg}',     $rc['wg'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{color}',  $rc['color'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{img}',  $rc['img'],$rc['cpcode']);
        $rc['cpcode'] = str_replace('{icon}',  $rc['icon'],$rc['cpcode']);

        //doc_metro
        $this->db->autoexecute('doc_metro',$rc,'update',"id=$id");
        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);
    }

    public function setup_group_edit_docid($id)
    {
        $id = intval($id);
        $sql = "select * from doc_metro where docid = $id";
        $rc = $this->db->getrow($sql);
//print_r($rc);
        $data['rc'] = $rc;
        $this->load->view('M/M_setup_group_edit',$data);
    }

    public function setup_group_edit($id)
    {
        $id = intval($id);
        $sql = "select * from doc_metro where id = $id";
        $rc = $this->db->getrow($sql);
//print_r($rc);
        $data['rc'] = $rc;
        $this->load->view('M/M_setup_group_edit',$data);
    }


    public function setup_groupinfo_exc()
    {
        $groupvar = $_POST['groupvar'];
        foreach($groupvar as $key=>$value){
            $this->db->autoexecute('doc_metro_group',$value,'UPDATE',"groupid=$key");
        }

        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);
        //print_r($groupvar);
    }

    //设置界面
    public function setup_setgroupnum($num)
    {
        $num = intval($num);

        $content = '<' . "?php\r\n" .
                    '$num = ' . $num . ";\r\n".
                    "\r\n?" . '>';
        @file_put_contents('Config/Set.php', $content);

        //19 有效
        //其他有效
        //============================================================
        //缺少的加上
        $sql = "update doc_metro_group set enable = 0 where groupid<>19";
        $this->db->query($sql);
        for($i=1;$i<$num+1;$i++){
            $sql = "update doc_metro_group set enable = 1 where groupid = $i";
            $this->db->query($sql);
        }

        $rs['code'] = 200;
        $rs['msg'] = '提交成功';
        echo json_encode($rs);
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */