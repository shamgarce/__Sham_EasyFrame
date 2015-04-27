<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sse
{
	//--
	private $tmp = array();
	private $params = array();
	private $CI = null;
	private $de = array();
	private $log = array();

	public function __construct($params)
	{
		$this->CI =& get_instance();
		$this->vdb = new V1db();                    //数据逻辑层
		$this->params = $params;                    //路由参数
		$this->tmp['timestamp_'] = Set::T();        //$sign //参数是签名
		//======================================================================
		!empty($params) && $this->log['params'] = $params;              //log
		$this->log['time']['timecu'] = time();;        //log
		$this->log['time']['timebe'] = $this->tmp['timestamp_'];        //log
		$this->log['class'] = __class__;        //log
		//======================================================================
		//print_r($this->log);
	}

	public function feedback($sign)
	{
		!empty($sign) && $this->log['sign'] = $sign;        //方法中截取
		$this->log['mothod'] = __METHOD__;        //方法中截取
		//=======================================
		//接收信息,并且反馈入库



		//=======================================
		$this->J(200, "数据已经接收");
	}

	public function updateUserInfo($sign)
	{
		!empty($sign) && $this->log['sign'] = $sign;        //方法中截取
		$this->log['mothod'] = __METHOD__;        //方法中截取
		//=======================================
		//接收信息,并且反馈入库
		//入库信息


		//$u_login = $sign;









		//=======================================
		$this->J(200, "信息更新完毕");
	}

	public function updateApp($sign)
	{
		!empty($sign) && $this->log['sign'] = $sign;        //方法中截取
		$this->log['mothod'] = __METHOD__;        //方法中截取
		//=======================================
		//接收信息,并且反馈入库 [没有信息输入]
		//=======================================
		$de['version'] = "3.14";
		$de['url'] = "http://www.baidu.com/";
		$this->data($de);
		$this->J(200, "获取信息成功");
	}


	public function register($sign)
	{
		!empty($sign) && $this->log['sign'] = $sign;        //方法中截取
		$this->log['mothod'] = __METHOD__;        //方法中截取
		//=======================================
		//接收信息,并且反馈入库
		$username = trim($_POST['username']);
		$pwd = $_POST['pwd'];
		if (empty($username) || empty($pwd)) $this->J(-100, "用户名和密码不能为空");

		$_march = '/[^A-Za-z0-9]/';             //如果发现字母数字意外的字符 报错
		if(preg_match($_march, $username)) {
			$this->J(-200, '用户名非法，请重新输入正确的用户名');
		}
		//密码长度
		if(strlen($pwd)<6) {
			$this->J(-300, '密码长度不够,最少6位');
		}

		//判断是否重复
		$sql = "select * from v3_user WHERE  user_login = '$username'";
		$row = $this->dbv3->getall($sql);
		if(!empty($row)){
			$this->J(-400, '用户名已经存在');
		}

		//数据准备
		$mc['user_login'] 	= Set::saddslashes($username);
		$mc['user_password']= Set::saddslashes($pwd);;

		$mc['enable'] 		= 1;
		$mc['f_regtime'] 	= time();

		//主体执行入库
		$this->dbv3->autoexecute("v3_user",$mc,'INSERT');

		//=======================================
		$this->J(200, "注册成功");
	}

	public function login($sign)
	{
		!empty($sign) && $this->log['sign'] = $sign;        //方法中截取
		$this->log['mothod'] = __METHOD__;        //方法中截取
		//=======================================
		//接收信息,并且反馈入库
		$username = trim($_POST['username']);
		$pwd = $_POST['pwd'];
		if (empty($username) || empty($pwd)) $this->J(-100, "登陆失败");
		//=======================================
		$username 	= Set::saddslashes($username);
		$sql = "SELECT * from v3_user where user_login = '$username'";
		$row = $this->dbv3->getrow($sql);;

		//用户不存在
		if(empty($row)){
			$this->J(-100, '该用户不存在');
		}

		if($row['enable'] ==0){
			$this->J(-200, '该用户禁止登陆');
		}

		if($row['user_password'] != $pwd ){
			$this->J(-200, '密码不对');
		}

		//登陆成功的日志计算
		$mc['f_logintime'] 	= time();;
		$mc['f_loginip'] 	= Set::GetIP();
		$this->dbv3->autoexecute("v3_user",$mc,'update',"user_login = '$username'");
		//=======================================
		$this->J(200, "登陆成功");
	}

	public function test($sign)
	{
		$this->checksign($sign);
		!empty($sign) && $this->log['sign'] = $sign;        //方法中截取
		$this->log['mothod'] = __METHOD__;        //方法中截取
		//=======================================
		//接收信息,并且反馈入库
		$username = trim($_POST['username']);
		$pwd = $_POST['pwd'];
		if (empty($username) || empty($pwd)) $this->J(-100, "登陆失败");


		//=======================================
		$this->J(200, "登陆成功");
	}

	/**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 * /**********************************************************************
	 *
	 * */

	public function checksign($sign){



		$this->sign['signature'] 	= $this->input->get('signature',true);	//$_GET['signature'];	//计算出来的签名比对 2014087451d28443c11e84107dfaae1f
			$this->sign['salt'] 		= $this->salt;		//约定
			$this->sign['timestamp'] 	= $this->input->get('timestamp',true);	//$_GET['timestamp'];	//时间
			$this->sign['openid'] 		= $this->input->get('openid',true);		//$_GET['openid'];		//用户唯一
				$this->sign['user'] 		= $this->input->get('user',true);		//$_GET['ush'];			//ush //获取得到 再次获取则会更换
				$this->sign['deviceid'] 	= $this->input->get('deviceid',true);	//$_GET['deviceid'];	//设备唯一

		/*
		 * 算法
		 * 1 : openid = md5(deviceid.user)
		 * 2 : bsalt = salt.timestamp.openid
		 * 3 : signature = hash(bsalt)
		 *
		 *
		 * */


		///
		/*
    [salt] => ccab8f440ff0825e
    [timestamp] =>
    [deviceid] =>
    [openid] => sd568
    [signature] =>
    [user] =>
    [sign] =>
//    [mothod] => vvvvv
//    [mothod_action] => ssssss
//    [params] => Array
//        (
//        )
    [dbid] => 34
		 *
		 *
		 * */
		print_r($sign);
	}

	private function data($data)
	{
		$this->de['data'] = $data;
	}
	private function data2($data)
	{
		$this->de['data2'] = $data;
	}
	private function msg($msg = '')
	{
		$this->de['msg'] = $msg;
	}
	private function get($msg = '')
	{
		$this->de['get'] = $msg;
	}
	private function code($code = '')
	{
		$code = intval($code);
		$this->de['code'] = $code;
	}
	public function D($code = 0, $data)
	{
		$code = intval($code);
		if (!empty($code)) $this->de['code'] = $code;
		$this->de['data'] = $data;
		$this->de['ExecuteTime'] = Set::T() - $this->tmp['timestamp_'];
		$this->de['ExecuteModel'] = 'Enter';
		$this->logmon->L($code,$this->de['msg'],$this->log);
		echo json_encode($this->de);
		exit;
	}

	public function J($code=0,$msg='')
	{
		$code = intval($code);
		if(!empty($code))  $this->de['code'] = $code;
		if(!empty($msg))   $this->de['msg']  = $msg;
		$this->de['ExecuteTime'] = Set::T() - $this->tmp['timestamp_'];
		$this->de['ExecuteModel']  = 'Enter';
		$this->logmon->L($code,$msg,$this->log);
		echo json_encode($this->de);
		exit;
	}

	//魔术
	public function __call($name,$arguments) {
		echo $name;
		$code = -999;
		if(!empty($code))  $this->de['code'] = $code;
		if(!empty($msg))   $this->de['msg']  = $msg;
		$this->de['ExecuteTime'] = Set::T() - $this->tmp['timestamp_'];
		$this->de['ExecuteModel']  = 'Enter';
		$this->logmon->L($code, '_call_miss',$this->log);
		echo json_encode($this->de);
		exit;
	}

	//资源重定向到ci->s下
	public function __get($key)
	{
		return $this->CI->S->$key;
	}

	public function __set($key, $value)
	{
		return $this->CI->S->$key = $value;
	}

	public function __isset($key)
	{
		return isset($this->CI->S->$key);
	}

	public function __unset($key)
	{
		unset($this->CI->S->$key);
	}

}