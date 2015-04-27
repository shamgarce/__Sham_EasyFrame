<?php
//支持函数
@header("content-Type: text/html; charset=utf-8"); //语言强制

if ($_GET['act'] == "phpinfo")
{
	phpinfo();
	exit;
}

if ($_GET['act'] == "disable_functions")
{

	$disFuns=get_cfg_var("disable_functions");
	if(empty($disFuns))
	{
		$arr = '<font color=red>×</font>';
	}
	else
	{
		$arr = $disFuns;
	}
	Function php()
	{
	}
	echo "<pre>";
	Echo "这里显示系统被禁用的函数\n";
	print_r($arr);
	echo "</pre>";
	exit();
}

if ($_GET['act'] == "ser")
{

	echo '<pre>';
echo "常量
__DIR__ : ".__DIR__."
__FILE__ : ".__FILE__."
__LINE__ : ".__LINE__." 当前PHP文件中所在的行数
__FUNCTION__ : ".__FUNCTION__." 当前所执行的函数
__CLASS__ : ".__CLASS__." 当前所执行的类
PHP_VERSION : ".PHP_VERSION." PHP的版本
PHP_OS : ".PHP_OS." 当前服务器的操作系统
DIRECTORY_SEPARATOR : ".DIRECTORY_SEPARATOR." 目录分隔符
PATH_SEPARATOR : ".PATH_SEPARATOR." 路径分隔符

<hr>";
	print_r($_SERVER);


	exit;
}
