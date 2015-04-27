<?php
@header("content-Type: text/html; charset=utf-8"); //语言强制


$arr = get_defined_functions();

echo "<pre>";
Echo "这里显示系统所支持的所有函数,和自定义函数\n";
$user   = $arr['user'];
$fun    = $arr['internal'];

foreach($fun as $key=>$value){
    $key            = substr($value,0,3);
    $fun_[$key][]   = $value;
}

//重组
foreach($fun_ as $key=>$value){
    if(count($value)>9){
        $fun__[] = $value;
        $fun = array_diff($fun,$value);
    }
}
$fun= array_values($fun);
$fun__[] = $fun;
print_r($fun__);
echo "</pre>";
exit();
//phpinfo();
exit;







$requirements = array(
    "num"=>123
);



$viewFile=dirname(__FILE__)."/views/N_function.php";


//========================================================
renderFile($viewFile,array(
    'requirements'=>$requirements,
    'result'=>1,
    'serverInfo'=>1));


//========================================================
function renderFile($_file_,$_params_=array())
{
    extract($_params_);
    require($_file_);
}