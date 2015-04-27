<?php

//支持函数
$com['mysql'] = array(
	'hostname' => '127.0.0.1',
	'username' => 'root',
	'password' => '123',
	'database' => 'test',
	'charset'  => 'utf8'
);

$com['mongodb'] = array(
	'host' => '127.0.0.1',
	'port' => '27017',
	'database' => 'test'
);

$com['memcache'] = array(
	'host' => '127.0.0.1',
	'port' => '11211'
);

define('YES','<span class="f12 blue">支持</span>');
define('NO','<span class="f12 red">不支持</span>');

function is_func($func){
	return function_exists($func) ? YES : NO;
}

function memory_usage()
{
	$memory	 = ( ! function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2).'MB';
	return $memory;
}

function get_cfg($val){
	return ini_get($val) ? YES : NO;
}

function get_byte_value($v){
	$v = trim($v);
	$l = strtolower($v[strlen($v) - 1]);
	switch($l){
	  case 'g':
		$v *= 1024;
	
	  case 'm':
		$v *= 1024;
	
	  case 'k':
		$v *= 1024;
	}
	return $v;
}
function get_size($s,$u='B',$p=1){
	$us = array('B'=>'K','K'=>'M','M'=>'G','G'=>'T');
	return (($u!=='B')&&(!isset($us[$u]))||($s<1024))?(number_format($s,$p)." $u"):(get_size($s/1024,$us[$u],$p));
}

// 计时
function microtime_float()
{
	$mtime = microtime();
	$mtime = explode(' ', $mtime);
	return $mtime[1] + $mtime[0];
}

function get_gd_info(){
	if(function_exists('gd_info')){
		$gd_info_arr = gd_info();
		return $gd_info_arr['GD Version'];
	}else{
		return '<span class="txtred">请开启PHP GD库支持</span>';
	}
}

//检测PHP设置参数
function show($varName)
{
	switch($result = get_cfg_var($varName))
	{
		case 0:
			return NO;
			break;
		case 1:
			return YES;
			break;
		default:
			return $result;
			break;
	}
}





