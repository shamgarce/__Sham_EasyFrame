<?php

/*
 * 加载配置文件
 * */
include "Seter/Config.php";
/*
 * 对象实例化
 * */
$Seter = new Seter();

//============================================================
//对象赋值
$Seter->reawd = 123;
$Seter['reawd'] = 1234;

//调用apc
//$Seter->apc->set_cache("vid",19999999);
//$Seter->apc->get_cache("vid");

//调用Mysql
//$sql = "select * from dy_user";
//$rc = $Seter->db->getall($sql);

//调用 mongodb
//$ar = $Seter->mdb->find("dy_user", array());

//调用memcache

//print_r($ar);
exit;

//* $mongo->ensureIndex("test_table", array("id"=>1), array('unique'=>true));
//* 获取表的记录
//* $mongo->count("test_table");
//*




print_r($rc);

//$this->S->apc->clear();
//$this->S->apc->clear_all($key);
//$this->S->apc->exists($key);
//$this->S->apc->inc("vidd",1);
//$this->S->apc->dec("vidd",1);
//$mr =  $this->S->apc->info();


echo $Seter->reawd;


$t = Seter::T();



echo '<hr>';
echo Seter::T()-$t;






