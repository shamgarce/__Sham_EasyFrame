<?php
/*
 * 服务器基本信息监测
 *
 * */
error_reporting(1); //抑制所有错误信息
@header("content-Type: text/html; charset=utf-8"); //语言强制
ob_start();
date_default_timezone_set('Asia/Shanghai');//此句用于消除时间差
$title = '雅黑PHP探针[简体版]';
$version = "v0.4.7"; //版本号
define('HTTP_HOST', preg_replace('~^www\.~i', '', $_SERVER['HTTP_HOST']));
$time_start = microtime_float();


echo $time_start;




















	//获取内存占用
	function memory_usage()
	{
		$memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
		return $memory;
	}


	// 计时
	function microtime_float()
	{
		$mtime = microtime();
		$mtime = explode(' ', $mtime);
		return $mtime[1] + $mtime[0];
	}