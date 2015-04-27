<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="product" content="Metro UI CSS Framework">

    <link href="/A/Metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="/A/Metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="/A/Metro/css/iconFont.css" rel="stylesheet">
    <link href="/A/Metro/css/docs.css" rel="stylesheet">
    <link href="/A/Metro/js/prettify/prettify.css" rel="stylesheet">

    <link href="/A/CSS/color.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="/A/Metro/js/jquery/jquery.min.js"></script>
    <script src="/A/Metro/js/jquery/jquery.widget.min.js"></script>
    <script src="/A/Metro/js/jquery/jquery.mousewheel.js"></script>
    <script src="/A/Metro/js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="/A/Metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="/A/Metro/js/docs.js"></script>
    <!-- script src="/A/Metro/js/github.info.js"></script -->
   
    <title>Metro UI CSS : Metro Bootstrap CSS Library</title>

<style type="text/css"> 
.wrapper {width: 100%; } 
.left {width:300px;  position:absolute; left:0 ;z-index:1 } 
.right {width:100%;; background:#000;position:absolute; left:0} 
.content {margin-left:300px; background:#ffc; left:0;top:0px;width:auto;;} 
</style> 

</head>
<body class="metro">
 
<div class="wrapper"> 
   
    <div class="left bg-darkRed" style="height:100%">
    <div class="menu ">
      
      
<a href="/M/" class="button primary">首页</a>




        
   <h1 class="fg-white  text-right">设置</h1>
   <hr>
  <p class="fg-white" style="padding:3px;">

编辑瓷片
</p>  


    </div>
    </div> 
    <div class="right bg-darkRed"> 
        <div class="content">
            <div class="right-head bg-darker  fg-white" style="padding-left:5pt;">
                <h1 class="fg-white">
                    <a href="/M/setup" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 返回<small class="on-right">设置
                    <a href="#" class="fg-hover-darkOrange vpath_show"><i class="icon-arrow-down-5 smaller fg-white"></i></a>
                    <a href="#" class="fg-hover-darkOrange vpath_hide" style="display:none;"><i class="icon-arrow-up-5 smaller fg-white"></i></a>
                    </small>
                </h1>
                
<!-- 隐藏的路径 -->                
<div class="notice bg-orange fg-white notice_path" style="padding:10px;display:none;">
    <nav class="breadcrumbs small">
        <ul>
            <li>
                <a href="/M/">
                    <i class= "icon-home" style="line-height:20px"></i>
                </a>
            </li>
            
            <li>
            	<a href="/M/setup">设置</a>
            </li>
            <li class="active">
            	<a>设置分组</a>
            </li>
        </ul>
    </nav>
    
</div>            
<!-- /隐藏的路径 -->              
                
                
            </div> 
            <hr>
            
           
            
             <div class="right-body" style="padding-left:15pt;padding-right:20pt;height:auto;">


 
<h2 id="_switch">
<i class="icon-accessibility on-left"></i>
分组参数 
</h2>
<div class="example">
  <table class="table striped hovered">

  <tr>
    <td width="60">编号</td>
    <td width="500"><?=$row['groupid']?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>名称</td>
    <td><?=$row['group_title']?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Num</td>
    <td><?=$row['group_num']?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>说明</td>
    <td><?=$row['group_dis']?></td>
    <td>&nbsp;</td>
  </tr>
  </table>
</div>
<br>


<h2 id="_switch">
<i class="icon-accessibility on-left"></i>
内容设置
</h2>
<div class="example">
<form id="__sort">

<table class="table striped hovered">
    <thead>
    <tr>
      <td width="60">&nbsp;</td>
      <td width="100">排序</td>
      <td>名称(tile)</td>
      <td width="150">操作[band/content]</td>
      <td width="450">&nbsp;</td>
    </tr>
    </thead>
    
    
    
<?php foreach($rc as $key=>$value):?>    
    <tr>
        <td><?=$value['groupid']?> : <?=$value['id']?></td>
        <td>
        <span class="input-control text info-state">
        <input type="text" placeholder="type text" name="setgroup_sort[<?=$value['id']?>][sort]" value="<?=$value['sort']?>">
        </span>
        </td>
        <td><?=$value['title']?></td>
        <td><a class="editstart" relid="<?=$value['id']?>">编辑</a></td>
        <td>
        <?=$value['cpcode']?>     
        </td>
    </tr>
<?php endforeach;?>    
    
    <tr>
        <td colspan="5">
        <hr class="bg-darkBlue">
        <a class="button bg-darkBlue fg-white _sortsubmit">排序提交</a></td>
    </tr>    
</table>
</form>
</div>

<br>



<h2 id="_switch">
<i class="icon-accessibility on-left"></i>
内容图示
</h2>
<div class="example bg-black">




<div class="tile-group <?=$row['group_num']?>">
<div class="tile-group-title"><?=$row['group_title']?></div>
<?php foreach($rc as $key=>$value):?> 
<?=$value['cpcode']?>
<?php endforeach;?>
</div> <!-- End group -->
</div>





<br>

            </div> 
             
        </div>  
    </div> 
</div>     
    
    
    
    
    
<script src="/A/artDialog4.1.7/artDialog.js?skin=default"></script>
<script src="/A/CK.js"></script>
<script language="javascript">
$(document).ready(function(e) {	 
    if ($('.menu').length > 0) {
        var side_menu = $('.menu');
        var fixblock_pos = side_menu.position().top;
        $(window).scroll(function(){
            if ($(window).scrollTop() > fixblock_pos){
                side_menu.css({'position': 'fixed','width':'300' ,'top':'0px', 'z-index':'1000'});
            } else {
                side_menu.css({'position': 'static'});
            }
        })
    }
	
	$(".vpath_show").click(function(){

		$(".notice_path").show();
		$(".vpath_hide").show();
		$(".vpath_show").hide();
	});
	
	$(".vpath_hide").click(function(){
		$(".notice_path").hide();
		$(".vpath_show").show();
		$(".vpath_hide").hide();
	});
	
	$('.listsort').click(function(){
		$.CK({
			rel:'节点排序',
			url:'',
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});

	$('.listadd').click(function(){
		$.CK({
			rel:'添加数据',
			url:'',
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});
	
	//edit start
	$('.editstart').click(function(){
		$.CK({
			rel:'编辑瓷片',
			url:'/M/setup_group_edit/'+$(this).attr('relid'),
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});
	
	$('._sortsubmit').click(function(){
		var res = $.ajax({
            url : '/M/setup_group_sort_exc',
            type: 'post',
            data : $('#__sort').serialize(),			//重要偷懒的方法
            dataType: "json",
            async:false,
            cache:false
        }).responseJSON;
        //console.log(res);
        //==========================1
        if(res.code<0){
            alert(res.msg);
            //return false;
        }else{
            //alert(res.msg);
            location.reload();
            // return true;
        }
	});
	
	
	
	
<?php if(get_cookie('_mpath') ==1) : ?>
	$(".notice_path").show();
	$(".vpath_hide").show();
	$(".vpath_show").hide();
<?php endif;?>
	
});
</script>
    

</body>
</html>