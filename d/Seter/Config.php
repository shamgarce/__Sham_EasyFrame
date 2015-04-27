<?php

define(SHAM_PATH,__DIR__);  //定义标识常量
require(SHAM_PATH.'/Seter.php');                        //加载s类文件
spl_autoload_register(array("Seter","__Sham__loader"));

