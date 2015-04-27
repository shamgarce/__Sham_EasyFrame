<?php
error_reporting(1); //抑制所有错误信息
@header("content-Type: text/html; charset=utf-8"); //语言强制

include "Config.php";
include "Act.php";

ob_start();
date_default_timezone_set('Asia/Shanghai');//此句用于消除时间差
$title = 'EASY PHP探针 [简体版]';
$version = "v0.1.1"; //版本号
define('HTTP_HOST', preg_replace('~^www\.~i', '', $_SERVER['HTTP_HOST']));
$time_start = microtime_float();

// 根据不同系统取得CPU相关信息
switch(PHP_OS)
{
	case "Linux":
		$sysReShow = (false !== ($sysInfo = sys_linux()))?"show":"none";
		break;
	case "FreeBSD":
		$sysReShow = (false !== ($sysInfo = sys_freebsd()))?"show":"none";
		break;
	case "WINNT":
		//$sysReShow = (false !== ($sysInfo = sys_windows()))?"show":"none";
		break;
	default:
		break;
}

//测试mysql数据库是否连接
$conntest = @mysql_connect($com['mysql']['hostname'], $com['mysql']['username'], $com['mysql']['password']);
if($conntest) { 
	$res=mysql_query("select VERSION()");
	$row=mysql_fetch_row($res);
	$Version['mysql']  = $row[0];				//获取版本
}else{
	echo "连接失败";
}

//测试memcache是否连接
$memcache = new Memcache;
$memcache->connect($com['memcache']['host'],  $com['memcache']['port']);
$Version['memcache'] =  $memcache->getVersion();
$memcache->close();

//mongodb
//$mongo = new Mongo("127.0.0.1:27017",array('connect'=>1));
//$conn= new Mongo("mongodb://user:password@127.0.0.1:27017");
//$mongo->selectDb("v1");
//var_dump($mongo);

?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>雅黑PHP探针[简体版]v0.4.7</title>
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script language="JavaScript" type="text/javascript" src="/A/jquery-1.7.2.min.js"></script>
		<link href="css.css" rel="stylesheet">
		<!--<style type="text/css"></style>-->

		<script type="text/javascript">
			<!--
function g(id){
	return document.getElementById(id);	
}

function show_form(vd){
	
	
	return (g(vd).style.display == '') ? g(vd).style.display = 'none' : g(vd).style.display = '';
}				


			$(document).ready(function(){
				
				
				
				function displayData(dataJSON){
				}
				$(".mysqlcheck").click(function(){
					alert(1);
				})
			});
			-->
		</script>

	</head>

	<body>
	<a name="w_top"></a>

	<div id="page">


		<table>
			<tr>
				<th class="w_logo">EASY PHP探针</th>
				<th class="w_top"><a href="#w_php">PHP参数</a></th>
				<th class="w_top"><a href="#w_module">组件支持</a></th>
				<th class="w_top"><a href="#w_module_other">第三方组件</a></th>
				<th class="w_top"><a href="#w_db">数据库支持</a></th>
				<th class="w_top"><a href="#w_MySQL">MySQL检测</a></th>
				<th class="w_top"><a href="#w_function">函数检测</a></th>
			</tr>
		</table>


<!-- 第三方 -->
<table width="100%" cellpadding="3" cellspacing="0" align="center">

			<tr>

				<th colspan="4">重要的信息</th>

			</tr>

			<tr>
			  <td colspan="4"></td>
    </tr>
			
			<tr>

				<td colspan="4">
<div style="width:100px;float:left;">扩展检测 : </div>

<div style="width:100px;float:left;"><a href="index.php?act=phpinfo" target="_blank">PHPINFO</a></div>

<div style="width:100px;float:left;"><a href="index.php?act=ser" target="_blank">SERVER</a></div>

<div style="width:100px;float:left;"><a href="N_Function.php" target="_blank">函数</a></div>

<div style="width:100px;float:left;"><a href="index.php?act=disable_functions" target="_blank">被禁用的函数</a></div>


				</td>

			</tr>
<tr>
			  <td colspan="4">
              <div style="width:100px;float:left;">管理 : </div>
              <div style="width:100px;float:left;"><a href="APC/apc.php" target="_blank">APC</a></div>
              <div style="width:100px;float:left;"><a href="Mem/" target="_blank">MemCache</a></div>
				  <div style="width:100px;float:left;"><a href="PM/" target="_blank">PhpMyadmin</a></div>
				  <div style="width:100px;float:left;"><a href="SQLiteManager/" target="_blank">SQLiteManager</a></div>

              </td>
    </tr>
		</table>




<table>

			<tr>
			  <th colspan="4">必须</th></tr>
			<tr>
			  <td width="17%"> <a onclick="show_form('php_dis');" href="javascript:void(0);">
PHP版本
</a></td>
			  <td width="33%"><?php echo PHP_VERSION;?></td>
			  <td width="13%"></td>
			  <td width="37%">PHP 5.1.0或更高版本是必须的。 </td>
    </tr>
<tr id="php_dis" style="display:none">
<td colspan="4" style="background:#DFDFDF;color:blue;"><P>
官网地址 : <a href="http://php.net/" target="_blank">http://php.net/</a><br />
百度百科 : <a href="http://baike.baidu.com/subview/99/5828265.htm" target="_blank">http://baike.baidu.com/subview/99/5828265.htm</a><br />
  下载地址 : <a target="_blank" href="http://windows.php.net/downloads/releases/archives/">http://windows.php.net/downloads/releases/archives/</a> [WIN]<br />
  资料参考 : <br />
  调试版本 :  PHP/5.4.36<br />
  发布版本 :
  <br />
  详细参数 : <a href="N.php?act=phpinfo" target="_blank">N.php?act=phpinfo</a></P></td>
</tr>
			<tr>
			  <td><a onclick="show_form('apache_dis');" href="javascript:void(0);">Apache</a></td>
			  <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr id="apache_dis" style="display:none">
			  <td colspan="4" style="background:#DFDFDF;color:blue;"><p>官网地址 :<a href="http://apache.org/" target="_blank"> http://apache.org/</a><br />
			    百度百科 : <a href="http://baike.baidu.com/subview/28283/5418752.htm" target="_blank">http://baike.baidu.com/subview/28283/5418752.htm</a><br />
			    下载地址 : <a href="http://archive.apache.org/dist/httpd/binaries/win32/" target="_blank">http://archive.apache.org/dist/httpd/binaries/win32/</a> [MSI版]<br />
			    资料参考 : <br />
		      调试版本 : Apache/2.2.22 (Win32) <br />
		      发布版本 : </p></td>
    </tr>
			<!-- tr>
			  <td>$_SERVER变量 </td>
			  <td></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr -->
    
	<tr>
			  <td><a onclick="show_form('pear_dis');" href="javascript:void(0);">pear扩展模块</a> </td>
			  <td></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
	<tr id="pear_dis" style="display:none">
			  <td colspan="4" style="background:#DFDFDF;color:blue;">
              
                <p>官网地址 : http://pear.php.net/<br />
                百度百科 : http://baike.baidu.com/subview/20453/16587839.htm<br />
			    下载地址 : http://pear.php.net/manual/en/installation.php<br />
			    http://pear.php.net/manual/en/installation.getting.php			    <br />
                <a href="http://pear.php.net/go-pear.phar" target="_blank"> http://pear.php.net/go-pear.phar</a><br />
			    资料参考 :
                 <br />
                调试版本 :  <br />
        发布版本 : </p></td>
    </tr>    
    
    
    
    
			<tr>
			  <td><a onclick="show_form('memcache_dis');" href="javascript:void(0);">Memcache扩展模块</a> </td>
			  <td><?php echo $Version['memcache']?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr id="memcache_dis" style="display:none">
			  <td colspan="4" style="background:#DFDFDF;color:blue;">
              
                <p>官网地址 : <a href="http://memcached.org/" target="_blank">http://memcached.org/</a><br />百度百科 : <a href="http://baike.baidu.com/view/1193094.htm" target="_blank">http://baike.baidu.com/view/1193094.htm</a>
              
              </ul>
              <br />
			    下载地址 :<a target="_blank" href="http://pecl.php.net/package/memcache"> http://pecl.php.net/package/memcache</a><br />
			    DLL 下载 : 【memcache.dll】 [微云]<br />
			    资料参考 :
                 <br />
                调试版本 :  <br />
                发布版本 : </p></td>
    </tr>
			<tr>
			  <td><a onclick="show_form('APC_dis');" href="javascript:void(0);">APC扩展模块</a> </td>
			  <td><?php if((phpversion('APC'))!=''){echo phpversion('APC');}else{ echo NO;} ?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr id="APC_dis" style="display:none">
			  <td colspan="4" style="background:#DFDFDF;color:blue;"><p>官网地址 : <a href="http://php.net/manual/zh/book.apc.php" target="_blank">http://php.net/manual/zh/book.apc.php</a><br />
			  百度百科 : <a href="http://baike.baidu.com/subview/281295/5341407.htm" target="_blank">http://baike.baidu.com/subview/281295/5341407.htm</a><br />
			  DLL 下载 :              http://pecl.php.net/package/apc<br />
			  资料参考 :			  </p></td>
    </tr>
			<tr>
			  <td><a onclick="show_form('Mysql_dis');" href="javascript:void(0);">Mysql</a></td>
			  <td><?php echo $Version['mysql']?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr id="Mysql_dis" style="display:none">
			  <td colspan="4" style="background:#DFDFDF;color:blue;"><p>官网地址 : <a href="http://www.mysql.com/" target="_blank">http://www.mysql.com/</a><br />
			    百度百科 :			  <a href="http://baike.baidu.com/subview/24816/15308361.htm" target="_blank">http://baike.baidu.com/subview/24816/15308361.htm</a><br />
			    下载地址			  : <a href="http://www.mysql.com/downloads/" target="_blank">http://www.mysql.com/downloads/</a><br />
			    资料参考 : <br />
调试版本 : 5.1.62-community<br />
发布版本 : <br />
详细参数 :</p></td>
    </tr>
			<tr>
			  <td><a onclick="show_form('MongoDb_dis');" href="javascript:void(0);">MongoDb</a></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr id="MongoDb_dis" style="display:none">
			  <td colspan="4" style="background:#DFDFDF;color:blue;"><p>官网地址 : <a href="http://www.mongodb.org/" target="_blank">http://www.mongodb.org/</a><br />
			    百度百科 :			  <a href="http://baike.baidu.com/subview/3385614/9338179.htm" target="_blank">http://baike.baidu.com/subview/3385614/9338179.htm</a><br />
			    下载地址 : <a target="_blank" href="https://s3.amazonaws.com/drivers.mongodb.org/php/index.html">https://s3.amazonaws.com/drivers.mongodb.org/php/index.html</a> 【mongodb】<br />
			    DLL 下载 :			    <a target="_blank" href="http://pecl.php.net/package/mongo">http://pecl.php.net/package/mongo</a> 【mongodb.dll】<br />
			    资料参考 : <br />
调试版本 : Ver 1.5.3.0 <br />
发布版本 : <br />
详细参数 :</p></td>
    </tr>
			<tr>
			  <td>压缩文件支持(Zlib)</td>
			  <td><?php echo is_func("gzclose");?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr>
			  <td>正则表达式函数库</td>
			  <td><?php echo is_func("preg_match");?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr>
			  <td>Iconv编码转换</td>
			  <td><?php echo is_func("iconv");?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr>
			  <td>mbstring</td>
			  <td><?php echo is_func("mb_eregi");?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<tr>
			  <td>GD库支持</td>
			  <td><?php

					if(function_exists(gd_info)) {

						$gd_info = @gd_info();

						echo $gd_info["GD Version"];

					}else{echo NO;}

					?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
    </tr>
			<!-- tr>
                <td>MongoDb</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr -->
            
		</table>


<!-- 版本 -->



<table>

			<tr>
			  <th colspan="4">版本</th></tr>
			<tr>
				<td width="13%">PHP</td>
				<td width="37%"><?php echo PHP_VERSION;?></td>
				<td width="13%">Apc</td>
				<td width="37%"><?php if((phpversion('APC'))!=''){echo phpversion('APC');}else{ echo NO;} ?></td>
			</tr>
			<tr>
				<td>Mysql</td>
				<td><?php echo $Version['mysql']?></td>
				<td>Zend</td>
				<td><?php $zend_version = zend_version();if(empty($zend_version)){echo NO;}else{echo $zend_version;}?></td>
			</tr>
	

			<tr>
				<td>MemCache</td>
				<td><?php echo $Version['memcache']?></td>
				<td>Apache</td>
				<td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
			</tr>

            <!-- tr>
                <td>MongoDb</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr -->
            
		</table>

<!-- 服务器配置 -->

<table align="center" width="98%" cellpadding="4" cellspacing="1" border="0" class="td_style">
	<tr>
		<th colspan="2" class="tit">PHP环境配置：</th>
	</tr>
	<tr>
		<td width="30%">MySQL数据库</td>
		<td>&nbsp;</td>
	</tr>
	<tbody id="mysql_form" style="display:none">
	<form action="<?php echo $phpself?>#a2" method="post" onsubmit="dosubmit(this);">
	<input type="hidden" name="action" value="mysql_test" />
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	</form>
	</tbody>
	<tr>
		<td>图形处理库 GD Library</td>
		<td><?php echo is_func('gd_info')?> (<?php echo get_gd_info()?>)</td>
	</tr>
		<tr>
		<td>用户访问文件的活动范围限制 open_basedir</td>
		<td><?php echo ini_get("open_basedir") ? ini_get("open_basedir") : '无'?></td>
	</tr>	
	<tr>
		<td>字符转换函数支持</td>
		<td>iconv <?php echo is_func('iconv')?> 或 mbstring <?php echo is_func('mb_convert_encoding')?> <span class="txtgray">(针对中文字符编码进行转换，没有安装文字将会出现乱码。)</span></td>
	</tr>
	<tr>
		<td>&lt;?=?&gt;短标签支持(short_open_tag)：</td>
		<td><?php echo ini_get("short_open_tag") ? YES : NO ?></td>
	</tr>
	<tr>
		<td>PHP安全模式运行</td>
		<td><?php echo ini_get("safe_mode") ? YES : NO ?>&nbsp;&nbsp;<span class="red">(为了服务器安全，建议关闭)</span></td>
	</tr>
	<tr>
		<td>压缩文件支持(Zlib)</td>
		<td><?php echo is_func("gzopen")?></td>
	</tr>
	<tr>
		<td>fsockopen函数支持</td>
		<td><?php echo is_func("fsockopen")?>&nbsp;&nbsp;<span class="red">(若不支持，发送邮件功能将不能使用)</span></td>
	</tr>
	<tr>
		<td>FTP函数支持</td>
		<td><?php echo is_func("ftp_connect")?></td>
	</tr>
	<tr>
		<td>OpenSSL支持</td>
		<td><?php echo is_func("openssl_open")?></td>
	</tr>
	<tr>
		<td>CURL函数支持</td>
		<td><?php echo is_func("curl_init")?></td>
	</tr>
	<tr>
		<td>is_dir函数支持</td>
		<td><?php echo is_func("is_dir")?></td>
	</tr>
	<tr>
		<td>目录搜索scandir函数支持</td>
		<td><?php echo is_func("scandir")?></td>
	</tr>
	<tr>
		<td>文件遍历glob函数支持</td>
		<td><?php echo is_func("glob")?></td>
	</tr>
	<tr>
		<td>允许使用URL打开文件 allow_url_fopen</td>
		<td><?php echo get_cfg("allow_url_fopen")?>&nbsp;&nbsp;<span class="red">(为了服务器安全，建议关闭)</span></td>
	</tr>
	<tr>
		<td>程序最多允许使用内存量 memory_limit</td>
		<td><?php echo ini_get("memory_limit")?>&nbsp;&nbsp;<span class="txtgray">(如果出现文件上传后没有显示的问题，请适当将此值改大。)</span></td>
	</tr>
	<tr>
		<td>POST表单最大字节数 post_max_size</td>
		<td><?php echo ini_get("post_max_size")?>
		<?php if(!@ini_get("post_max_size") || get_byte_value('999M')<get_byte_value(@ini_get("post_max_size"))){?>
		<span class="red">(理论上，php.ini 只允许设置最大值为 999M ，设置过大时会产生运行异常！！！)</span>
		<?php }?>
		</td>
	</tr>
	<tr>
		<td>允许最大上传文件 upload_max_filesize</td>
		<td><?php echo ini_get("upload_max_filesize")?>
		<?php if(!@ini_get("upload_max_filesize") || get_byte_value('999M')<get_byte_value(@ini_get("upload_max_filesize"))){?>
		<span class="red">(理论上，php.ini 只允许设置最大值为 999M ，设置过大时会产生运行异常！！！)</span>
		<?php }?><br />
		<span class="blue">(当前环境PHPDISK可上传单个文件的最大值为<u class="red"><?php echo $phpdisk_max_filesize?></u>，推荐单个文件的大小在50MB以内)</span></td>
	</tr>
	<tr>
		<td colspan="2" style="background:#555555;border:1px solid #FFE3A0">&nbsp;</td>
	</tr>	
	<tr>
		<td>程序运行超时时间 max_execution_time</td>
		<td><?php echo ini_get("max_execution_time")?> 秒</td>
	</tr>
	<tr>
		<td>上传临时目录 upload_tmp_dir</td>
		<td><?php echo ini_get("upload_tmp_dir") ? ini_get("upload_tmp_dir") : '默认(建议手动指定目录)'?>&nbsp;&nbsp;<span class="txtgray">(请确认此目录拥有读写权限。)</span></td>
	</tr>
	<tr>
		<td>Session支持</td>
		<td><?php echo is_func('session_start')?></td>
	</tr>
	<tr>
		<td>Session临时目录 session.save_path</td>
		<td><?php echo ini_get('session.save_path') ? ini_get('session.save_path') : '默认(建议手动指定目录)'?>&nbsp;&nbsp;<span class="txtgray">(请确认此目录拥有读写权限。)</span></td>
	</tr>
	<tr>
		<td>自定义全局变量 register_globals</td>
		<td><?php echo get_cfg("register_globals")?>&nbsp;&nbsp;<span class="txtgray">(PHP5 以上默认关闭。)</span></td>
	</tr>
	<tr>
		<td>显示错误信息 display_errors</td>
		<td><?php echo get_cfg("display_errors")?></td>
	</tr>
	<tr>
		<td>PHP错误信息 error_reporting</td>
		<td><?php echo ini_get("error_reporting")?></td>
	</tr>
	<tr>
		<td>禁用的函数 disable_functions</td>
		<td style="word-break:break-all"><?php echo ini_get("disable_functions") ? ini_get("disable_functions") : '无'?>&nbsp;&nbsp;<br><span class="txtgray">(如果禁用了scandir目录遍历函数，请修改php.ini开启。)</span></td>
	</tr>
	<tr>
		<td>输出缓冲 output_buffering</td>
		<td><?php echo ini_get("output_buffering") ? ini_get("output_buffering") : '无'?></td>
	</tr>
	<tr>
		<td>服务PHP内存占用</td>
		<td><?php echo get_size(memory_get_usage())?></td>
	</tr>
	</table>

<!--服务器相关参数-->

		<table>

			<tr><th colspan="4">服务器参数</th></tr>

			<tr>

				<td>服务器域名/IP地址</td>

				<td colspan="3"><?php echo @get_current_user();?> - <?php echo $_SERVER['SERVER_NAME'];?>(<?php if('/'==DIRECTORY_SEPARATOR){echo $_SERVER['SERVER_ADDR'];}else{echo @gethostbyname($_SERVER['SERVER_NAME']);} ?>)&nbsp;&nbsp;你的IP地址是：<?php echo @$_SERVER['REMOTE_ADDR'];?></td>

			</tr>

			<tr>

				<td>服务器标识</td>

				<td colspan="3"><?php if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo @php_uname();};?></td>

			</tr>

			<tr>
			  <td>服务器时区/时间</td>
			  <td colspan="3"><?php echo @date_default_timezone_get()?> / <?php echo date("Y年n月j日 H:i:s")?> <span class="txtgray">(北京时间: <?php echo gmdate("Y年n月j日 H:i:s",time()+8*3600)?>)</td>
		  </tr>
			<tr>
			  <td><span class="red">php.ini 位置</span></td>
			  <td><?php echo function_exists('php_ini_loaded_file') ? php_ini_loaded_file() : '请查看 phpinfo';?></td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
		  </tr>
			<tr>

				<td width="13%">服务器操作系统</td>

				<td width="37%"><?php $os = explode(" ", php_uname()); echo $os[0];?> &nbsp;内核版本：<?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?></td>

				<td width="13%">服务器解译引擎</td>

				<td width="37%"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>

			</tr>

			<tr>

				<td>服务器语言</td>

				<td><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>

				<td>服务器端口</td>

				<td><?php echo $_SERVER['SERVER_PORT'];?></td>

			</tr>

			<tr>

				<td>服务器主机名</td>

				<td><?php if('/'==DIRECTORY_SEPARATOR ){echo $os[1];}else{echo $os[2];} ?></td>

				<td>绝对路径</td>

				<td><?php echo $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));?></td>

			</tr>

			<tr>

				<td>管理员邮箱</td>

				<td><?php echo $_SERVER['SERVER_ADMIN'];?></td>

				<td>探针路径</td>

				<td><?php echo str_replace('\\','/',__FILE__)?str_replace('\\','/',__FILE__):$_SERVER['SCRIPT_FILENAME'];?></td>

			</tr>

		</table>

		<table width="100%" cellpadding="3" cellspacing="0" align="center">

			<tr>

				<th colspan="4">PHP已编译模块检测</th>

			</tr>

			<tr>

				<td colspan="4"><span class="w_small">

<?php
$able=get_loaded_extensions();
foreach ($able as $key=>$value) {
	echo "<div style='width: 100px;float: left;'>$value</div>";
}
?></span>

				</td>

			</tr>

		</table>

		<a name="w_php"></a>

		<table>

			<tr><th colspan="4">PHP相关参数</th></tr>

			<tr>

				<td width="32%">PHP信息（phpinfo）：</td>

				<td width="18%">

					<?php

					$phpSelf = $_SERVER[PHP_SELF] ? $_SERVER[PHP_SELF] : $_SERVER[SCRIPT_NAME];
					$disFuns=get_cfg_var("disable_functions");
					?>

					<?php //echo (false!==eregi("phpinfo",$disFuns))? NO :"<a href='$phpSelf?act=phpinfo' target='_blank'>PHPINFO</a>";?>
                    <?php echo (false!==eregi("phpinfo",$disFuns))? NO :"PHPINFO";?>

			  </td>

				<td width="32%">PHP版本（php_version）：</td>

				<td width="18%"><?php echo PHP_VERSION;?></td>

			</tr>

			<tr>

				<td>PHP运行方式：</td>

				<td><?php echo strtoupper(php_sapi_name());?></td>

				<td>脚本占用最大内存（memory_limit）：</td>

				<td><?php echo show("memory_limit");?></td>

			</tr>

			<tr>

				<td>PHP安全模式（safe_mode）：</td>

				<td><?php echo show("safe_mode");?></td>

				<td>POST方法提交最大限制（post_max_size）：</td>

				<td><?php echo show("post_max_size");?></td>

			</tr>

			<tr>

				<td>上传文件最大限制（upload_max_filesize）：</td>

				<td><?php echo show("upload_max_filesize");?></td>

				<td>浮点型数据显示的有效位数（precision）：</td>

				<td><?php echo show("precision");?></td>

			</tr>

			<tr>

				<td>脚本超时时间（max_execution_time）：</td>

				<td><?php echo show("max_execution_time");?>秒</td>

				<td>socket超时时间（default_socket_timeout）：</td>

				<td><?php echo show("default_socket_timeout");?>秒</td>

			</tr>

			<tr>

				<td>PHP页面根目录（doc_root）：</td>

				<td><?php echo show("doc_root");?></td>

				<td>用户根目录（user_dir）：</td>

				<td><?php echo show("user_dir");?></td>

			</tr>

			<tr>

				<td>dl()函数（enable_dl）：</td>

				<td><?php echo show("enable_dl");?></td>

				<td>指定包含文件目录（include_path）：</td>

				<td><?php echo show("include_path");?></td>

			</tr>

			<tr>

				<td>显示错误信息（display_errors）：</td>

				<td><?php echo show("display_errors");?></td>

				<td>自定义全局变量（register_globals）：</td>

				<td><?php echo show("register_globals");?></td>

			</tr>

			<tr>

				<td>数据反斜杠转义（magic_quotes_gpc）：</td>

				<td><?php echo show("magic_quotes_gpc");?></td>

				<td>"&lt;?...?&gt;"短标签（short_open_tag）：</td>

				<td><?php echo show("short_open_tag");?></td>

			</tr>

			<tr>

				<td>"&lt;% %&gt;"ASP风格标记（asp_tags）：</td>

				<td><?php echo show("asp_tags");?></td>

				<td>忽略重复错误信息（ignore_repeated_errors）：</td>

				<td><?php echo show("ignore_repeated_errors");?></td>

			</tr>

			<tr>

				<td>忽略重复的错误源（ignore_repeated_source）：</td>

				<td><?php echo show("ignore_repeated_source");?></td>

				<td>报告内存泄漏（report_memleaks）：</td>

				<td><?php echo show("report_memleaks");?></td>

			</tr>

			<tr>

				<td>自动字符串转义（magic_quotes_gpc）：</td>

				<td><?php echo show("magic_quotes_gpc");?></td>

				<td>外部字符串自动转义（magic_quotes_runtime）：</td>

				<td><?php echo show("magic_quotes_runtime");?></td>

			</tr>

			<tr>

				<td>打开远程文件（allow_url_fopen）：</td>

				<td><?php echo show("allow_url_fopen");?></td>

				<td>声明argv和argc变量（register_argc_argv）：</td>

				<td><?php echo show("register_argc_argv");?></td>

			</tr>
			<tr>
				<td>Cookie 支持：</td>
				<td><?php echo isset($_COOKIE)?YES : NO;?></td>
				<td>拼写检查（ASpell Library）：</td>
				<td><?php echo is_func("aspell_check_raw");?></td>
			</tr>
			<tr>
				<td>高精度数学运算（BCMath）：</td>
				<td><?php echo is_func("bcadd");?></td>
				<td>PREL相容语法（PCRE）：</td>
				<td><?php echo is_func("preg_match");?></td>
			<tr>
				<td>PDF文档支持：</td>
				<td><?php echo is_func("pdf_close");?></td>
				<td>SNMP网络管理协议：</td>
				<td><?php echo is_func("snmpget");?></td>
			</tr>
			<tr>
				<td>VMailMgr邮件处理：</td>
				<td><?php echo is_func("vm_adduser");?></td>
				<td>Curl支持：</td>
				<td><?php echo is_func("curl_init");?></td>
			</tr>
			<tr>
				<td>SMTP支持：</td>
				<td><?php echo get_cfg_var("SMTP")?YES : NO;?></td>
				<td>SMTP地址：</td>
				<td><?php echo get_cfg_var("SMTP")?get_cfg_var("SMTP"):NO;?></td>
			</tr>

			<tr>
				<td>默认支持函数（enable_functions）：</td>
				<td colspan="3"><!-- a href='<?php echo $phpSelf;?>?act=Function' target='_blank' class='static'>请点这里查看详细！</a --></td>
			</tr>
			<tr>
				<td>被禁用的函数（disable_functions）：</td>
				<td colspan="3" class="word">
					<?php
					$disFuns=get_cfg_var("disable_functions");
					if(empty($disFuns))
					{
						echo NO;
					}
					else
					{
						//echo $disFuns;
						$disFuns_array =  explode(',',$disFuns);
						foreach ($disFuns_array as $key=>$value)
						{
							if ($key!=0 && $key%5==0) {
								echo '<br />';
							}
							echo "$value&nbsp;&nbsp;";
						}
					}

					?>
				</td>
			</tr>

		</table>

		<a name="w_module"></a>

		<!--组件信息-->

		<table>

			<tr><th colspan="4" >组件支持</th></tr>

			<tr>

				<td width="32%">FTP支持：</td>

				<td width="18%"><?php echo is_func("ftp_login");?></td>

				<td width="32%">XML解析支持：</td>

				<td width="18%"><?php echo is_func("xml_set_object");?></td>

			</tr>

			<tr>

				<td>Session支持：</td>

				<td><?php echo is_func("session_start");?></td>

				<td>Socket支持：</td>

				<td><?php echo is_func("socket_accept");?></td>

			</tr>

			<tr>

				<td>Calendar支持</td>

				<td><?php echo is_func('cal_days_in_month');?>
				</td>

				<td>允许URL打开文件：</td>

				<td><?php echo show("allow_url_fopen");?></td>

			</tr>

			<tr>

				<td>GD库支持：</td>

				<td>

					<?php

					if(function_exists(gd_info)) {

						$gd_info = @gd_info();

						echo $gd_info["GD Version"];

					}else{echo NO;}

					?></td>

				<td>压缩文件支持(Zlib)：</td>

				<td><?php echo is_func("gzclose");?></td>

			</tr>

			<tr>

				<td>IMAP电子邮件系统函数库：</td>

				<td><?php echo is_func("imap_close");?></td>

				<td>历法运算函数库：</td>

				<td><?php echo is_func("JDToGregorian");?></td>

			</tr>

			<tr>

				<td>正则表达式函数库：</td>

				<td><?php echo is_func("preg_match");?></td>

				<td>WDDX支持：</td>

				<td><?php echo is_func("wddx_add_vars");?></td>

			</tr>

			<tr>

				<td>Iconv编码转换：</td>

				<td><?php echo is_func("iconv");?></td>

				<td>mbstring：</td>

				<td><?php echo is_func("mb_eregi");?></td>

			</tr>

			<tr>

				<td>高精度数学运算：</td>

				<td><?php echo is_func("bcadd");?></td>

				<td>LDAP目录协议：</td>

				<td><?php echo is_func("ldap_close");?></td>

			</tr>

			<tr>

				<td>MCrypt加密处理：</td>

				<td><?php echo is_func("mcrypt_cbc");?></td>

				<td>哈稀计算：</td>

				<td><?php echo is_func("mhash_count");?></td>

			</tr>

		</table>

		<a name="w_module_other"></a>
		<!--第三方组件信息-->
		<table>
			<tr><th colspan="4" >第三方组件</th></tr>
			<tr>
				<td width="32%">Zend版本</td>
				<td width="18%"><?php $zend_version = zend_version();if(empty($zend_version)){echo NO;}else{echo $zend_version;}?></td>
				<td width="32%">
					<?php
					$PHP_VERSION = PHP_VERSION;
					$PHP_VERSION = substr($PHP_VERSION,2,1);
					if($PHP_VERSION > 2)
					{
						echo "ZendGuardLoader[启用]";
					}
					else
					{
						echo "Zend Optimizer";
					}
					?>
				</td>
				<td width="18%"><?php if($PHP_VERSION > 2){echo (get_cfg_var("zend_loader.enable"))?'<font color=green>√</font>':NO;} else{if(function_exists('zend_optimizer_version')){	echo zend_optimizer_version();}else{	echo (get_cfg_var("zend_optimizer.optimization_level")||get_cfg_var("zend_extension_manager.optimizer_ts")||get_cfg_var("zend.ze1_compatibility_mode")||get_cfg_var("zend_extension_ts"))?'<font color=green>√</font>':NO;}}?></td>
			</tr>
			<tr>
				<td>eAccelerator</td>
				<td><?php if((phpversion('eAccelerator'))!=''){echo phpversion('eAccelerator');}else{ echo NO;} ?></td>
				<td>ioncube</td>
				<td><?php if(extension_loaded('ionCube Loader')){   $ys = ioncube_loader_iversion();   $gm = ".".(int)substr($ys,3,2);   echo ionCube_Loader_version().$gm;}else{echo NO;}?></td>
			</tr>
			<tr>
				<td>XCache</td>
				<td><?php if((phpversion('XCache'))!=''){echo phpversion('XCache');}else{ echo NO;} ?></td>
				<td>APC</td>
				<td><?php if((phpversion('APC'))!=''){echo phpversion('APC');}else{ echo NO;} ?></td>
			</tr>
		</table>

		<a name="w_db"></a>

		<!--数据库支持-->

		<table>

			<tr><th colspan="4">数据库支持</th></tr>

			<tr>

				<td width="32%">MySQL 数据库：</td>

				<td width="18%"><?php echo is_func("mysql_close");?>

					<?php
					if(function_exists("mysql_get_server_info")) {
//$s = @mysql_get_server_info();
//$s = $s ? '&nbsp; mysql_server 版本：'.$s : '';
//$c = '&nbsp; mysql_client 版本：'.@mysql_get_client_info();
//echo $s;
					}
					?>

				</td>

				<td width="32%">ODBC 数据库：</td>

				<td width="18%"><?php echo is_func("odbc_close");?></td>

			</tr>

			<tr>

				<td>Oracle 数据库：</td>

				<td><?php echo is_func("ora_close");?></td>

				<td>SQL Server 数据库：</td>

				<td><?php echo is_func("mssql_close");?></td>

			</tr>

			<tr>

				<td>dBASE 数据库：</td>

				<td><?php echo is_func("dbase_close");?></td>

				<td>mSQL 数据库：</td>

				<td><?php echo is_func("msql_close");?></td>

			</tr>

			<tr>

				<td>SQLite 数据库：</td>

				<td><?php if(extension_loaded('sqlite3')) {$sqliteVer = SQLite3::version();echo '<font color=green>√</font>　';echo "SQLite3　Ver ";echo $sqliteVer[versionString];}else {echo is_func("sqlite_close");if(is_func("sqlite_close") == '<font color="green">√</font>') {echo "&nbsp; 版本： ".@sqlite_libversion();}}?></td>

				<td>Hyperwave 数据库：</td>

				<td><?php echo is_func("hw_close");?></td>

			</tr>

			<tr>

				<td>Postgre SQL 数据库：</td>

				<td><?php echo is_func("pg_close"); ?></td>

				<td>Informix 数据库：</td>

				<td><?php echo is_func("ifx_close");?></td>

			</tr>
			<tr>
				<td>DBA 数据库：</td>
				<td><?php echo is_func("dba_close");?></td>
				<td>DBM 数据库：</td>
				<td><?php echo is_func("dbmclose");?></td>
			</tr>
			<tr>
				<td>FilePro 数据库：</td>
				<td><?php echo is_func("filepro_fieldcount");?></td>
				<td>SyBase 数据库：</td>
				<td><?php echo is_func("sybase_close");?></td>
			</tr>

		</table>

		<a name="w_performance"></a><a name="bottom"></a>

		<form action="T_.php#bottom" method="post">


			<a name="w_networkspeed"></a>
			<!--网络速度测试--><a name="w_MySQL"></a>

			<!--MySQL数据库连接检测-->

			<table>

				<tr><th colspan="3">MySQL数据库连接检测</th></tr>

				<tr>

					<td width="15%"></td>

					<td width="60%">

						地址：<input type="text" name="host" value="localhost" size="10" />

						端口：<input type="text" name="port" value="3306" size="10" />

						用户名：<input name="login" type="text" value="root" size="10" />


						密码：<input name="password" type="password" value="123" size="10" />

					</td>

					<td width="25%">

						<input class="btn mysqlcheck" type="submit" name="act" value="MySQL检测" />

					</td>

				</tr>

			</table>


			<a name="w_function"></a>

			<!--函数检测-->

			<table>
				<tr><th colspan="3">函数检测</th></tr>
				<tr>
					<td width="15%"></td>
					<td width="60%">
						请输入您要检测的函数：
						<input type="text" name="funName" size="50" />
					</td>
					<td width="25%">
						<input class="btn" type="submit" name="act" align="right" value="函数检测" />
					</td>
				</tr>
			</table>
		</form>
		<table>
			<tr>
				<td class="w_foot"><?php echo $title." ".$version;?></td>
				<td class="w_foot"><?php $run_time = sprintf('%0.4f', microtime_float() - $time_start);?> Processed in <?php echo $run_time?> seconds. <?php echo memory_usage();?> memory usage.</td>
				<td class="w_foot"><a href="#w_top">返回顶部</a></td>
			</tr>
		</table>
	</div>
	</body>
	</html>

