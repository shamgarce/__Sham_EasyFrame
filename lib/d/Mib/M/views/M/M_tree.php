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
<?php if(get_cookie('_madd') ==1){?>
    <a class="button info listadd">添加</a>
<?php }?>
<?php if(get_cookie('_msort') ==1){ ?>
    <a class="button success listsort" relid="<?=$mcmain['id']?>">排序</a>
<?php }?>


   <h1 class="fg-white  text-right">TREE</h1>
   <hr>



    </div>
    </div> 
    <div class="right bg-darkRed"> 
        <div class="content">
            <div class="right-head bg-darker  fg-white" style="padding-left:5pt;">
                <h1 class="fg-white">
                    <a href="/M/" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 返回<small class="on-right">首页
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
    <i class="icon-home"></i>
    </a>
    </li>
    <li class="active">
    <a href="/M/tree">Tree</a>
    </li>
    </ul>
    </nav>
    
</div>            
<!-- /隐藏的路径 -->                
			</div> 




            
             <div class="right-body" style="padding:10pt;height:auto;">

<!-- /tree -->
<div class="example">

<?=$html?>


   
  

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
            url:'/M/sort/0',
            _this:$(this),
            buttonok	: true,
            buttoncancel: true,
        });
    });

    $('.listadd').click(function(){
        $.CK({
        rel:'节点添加',
        url:'/M/add/0',
        _this:$(this),
        buttonok	: true,
        buttoncancel: true,
    });
});

	$(".treeview a").click(function(){
		window.location.href=$(this).attr('href');
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
