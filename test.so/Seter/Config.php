<?php
//类文件自动加载
function __Sham__loader($class)
{
    $file = __DIR__."/library/$class.php";
    if (is_file($file)) {
        require_once($file);
    }
}
spl_autoload_register('__Sham__loader');

define(SHAM_PATH,__DIR__);  //定义标识常量
require(__DIR__.'/Seter.php');                        //加载s类文件

