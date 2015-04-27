<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Te extends CI_Controller
{

	/*
	 * 对s下各项单例资源的调试和测试 调整
	 * APC
	 * */
	function __construct()
	{
		parent::__construct();
		$this->S = new Set();

	}

	public function index()
	{

//		$sql = "select * from dy_user";
//		$rc = $this->S->Db->getall($sql);









echo 1;

		//echo $ms;




		/*-------------------------------------------------------------------------------
		Set::T();		//获取时间
		Set::U()		//反序列化数据 空数据也可以转换
		Set::getarr()
		Set::getstr()
		Set::cut()
		Set::Fs()
		Set::Fr()
		Set::saddslashes() -addslashes
		Set::shtmlspecialchars()
		Set::strexists()
		-------------------------------------------------------------------------------*/

		/*-------------------------------------------------------------------------------
		/* Mcache beging
		//$this->S->mcache -> set('keyName','this is value');			//设置
		//$this->S->mcache -> add("keyName2",array(1=>"2"),300);		//新加	//已经很有的就加不上去了
		//$this->S->mcache -> set("keyName",array(1=>"2"),10);			//已经存在会覆盖
		//$this->S->mcache -> replace("keyName",array(1=>"2"),10);		//对已经存在的数据进行替换
		//$this->S->mcache -> append("keyName2",'--');					//追加,字符串后面追加数据
		//$ms =  $this->S->mcache -> get('keyName2');
		//$ms =  $this->S->mcache -> getstats();						//统计情况
		//$ms =  $this->S->mcache -> getversion();						//版本信息
		//$this->S->mcache ->flush();									//清楚所有缓存
		-------------------------------------------------------------------------------*/

		/*-------------------------------------------------------------------------------
		/* APC beging
		$this->S->apc->set_cache("vid",1);
		echo $this->S->apc->get_cache("vidd");
		$this->S->apc->clear();
		$this->S->apc->clear_all($key);
		$this->S->apc->exists($key);
		$this->S->apc->inc("vidd",1);
		$this->S->apc->dec("vidd",1);
		$mr =  $this->S->apc->info();
		*-------------------------------------------------------------------------------*/

	}


}


















