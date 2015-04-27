<?php
/**
 *  管理 /T/mem.php   [admin / admin]
 * Memcache 操作类
 * 在config文件中 添加
     相应配置(可扩展为多memcache server)
    define('MEMCACHE_HOST', '10.35.52.33');
    define('MEMCACHE_PORT', 11211);
    define('MEMCACHE_EXPIRATION', 0);
    define('MEMCACHE_PREFIX', 'licai');
    define('MEMCACHE_COMPRESSION', FALSE);
/* Mcache beging */
/*-------------------------------------------------------------------------------

    //格式
    //==================================================================
//class     //class cu中
//params    //class cu中
//time [cutime / timebeg / endtime] //class cu cu log

//code      //方法e
//msg       //方法e
//get       //log中
//post      //log中
//mothod    //方法中
//sign      //方法中
    //==================================================================

------------------------------------------------------------------------------* /
 */

define(SHAMLOGSYSTEM,true);
define(SHAMLOGGET,true);
define(SHAMLOGPOST,true);
define(SHAMLOG,true);

class Logmon{
    protected $errors = array();

    /*
    DEBUG   Level   指出细粒度信息事件对调试应用程序是非常有帮助的。
    INFO    level   表明消息在粗粒度级别上突出强调应用程序的运行过程。
    WARN    level   表明会出现潜在错误的情形。
    ERROR   level   指出虽然发生错误事件，但仍然不影响系统的继续运行。
    */

    public function __construct()
    {
        $this->CI =& get_instance();                //返回本类的实例 [引用]
        //计算产生一个id

    }

    //系统的开发日志
    public function L($code=0,$info='',$loginfo)
    {
        $loginfo['code'] = $code;        //code
        $loginfo['info'] = $info;        //info

        $loginfo= $this->inv($loginfo);     //获取信息
        $this->Write($loginfo);             //写数据
        return true;
    }

    //获取信息
    public function inv($loginfo)
    {
        !empty($_GET)   && $loginfo['_GET']   = $_GET;          //log
        !empty($_POST)  && $loginfo['_POST'] = $_POST;          //log
        $loginfo['time']['timeen']  = Seter::T();      //log
    }

    //保存数据
    public function Write($loginfo)
    {
        $this->CI->S->mdb->insert('dy_log',$loginfo);
        return true;
    }

    //格式
    //==================================================================
    //code
    //msg
    //time
    //input
    //==================================================================



    public static function actionid($ac = 'none')
    {
        if($ac == 'none'){
            list($usec, $sec) = explode(" ",microtime());
            $num = ((float)$usec + (float)$sec);
            $cid = MD5($num.rand(100000,999999));
            return 'L'.$cid;
        }else{

        }
    }


}// END class









