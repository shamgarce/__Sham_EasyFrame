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
   
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushPhp.js"></script>
<link type="text/css" rel="stylesheet" href="/A/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
<script type="text/javascript">SyntaxHighlighter.all();</script>   

    <script src="/A/CommonIni.js"></script>

   
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
 <?php if(get_cookie('_madd') ==1) : ?><a class="button info listadd" relid="<?=$mcmain['id']?>">添加</a> <?php endif;?>
 <?php if(get_cookie('_msort') ==1) : ?><a class="button success listsort" relid="<?=$mcmain['id']?>">排序</a> <?php endif;?>



        
   <h2 class="fg-white  text-right"><?=$mcmain['title']?></h2>
   <hr>

        <ul class="unstyled fg-white">
            <li><i class="icon-record on-right fg-white"></i> <a href="" class="fg-white fg-hover-cyan"><?=$mcmain['title']?></a>
                <ul class="unstyled fg-white">
            <?php foreach($leaf['child'] as $key=>$value):?>
                    <li><i class="icon-arrow-right on-right fg-white"></i> <a href="#<?=$value['id']?>" class="fg-white fg-hover-cyan"><?=$value['title']?></a></li>
			<?php endforeach;?>
                </ul>
            </li>
        </ul>



    </div>
    </div> 
    <div class="right bg-darkRed"> 
        <div class="content">
            <div class="right-head bg-darker  fg-white" style="padding-left:5pt;">
                <h1 class="fg-white">

                    <a href="/M/tnode/<?=$mcmain['preid']?>" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 
                     返回<small class="on-right">上一级
                    <a href="#" class="fg-hover-darkOrange vpath_show"><i class="icon-arrow-down-5 smaller fg-white"></i></a>
                    <a href="#" class="fg-hover-darkOrange vpath_hide" style="display:none;"><i class="icon-arrow-up-5 smaller fg-white"></i></a>
                    </small>
                </h1>
                
<!-- 隐藏的路径 -->                
<div class="notice bg-orange fg-white notice_path" style="padding:10px;display:none;">
    <nav class="breadcrumbs small">
    <ul>
    <li>
     <a href="/M/tnode/0">
    <i class="icon-home"></i>
    </a>
    </li>
<?php foreach($nav as $key=>$value):?>
    <li>
    <a href="/M/tnode/<?=$value['id']?>"><?=$value['title']?></a>
    </li>
<?php endforeach;?>
    </ul>
    </nav>
    
</div>            
<!-- /隐藏的路径 -->              
                
                
            </div> 
            
<H2 class="padding15">




<strong><?=$mcmain['title']?></strong>  <button class="button info small _editcontent" relid="<?=$mcmain['id']?>">编辑</button> 
<?php if($mcmain['startscreen']):?>
<a href="javascript:void(0);" class="editsc" relid="<?=$mcmain['id']?>"><small>
<i class="icon-tag"
style="background: red;
color: white;
padding: 5px;
border-radius: 50%"></i>
</small></a>
<?php endif;?>
</H2>
            
<div class="right-body" style="padding-left:15pt;padding-right:20pt;height:auto;">
             
<?php if(!empty($mcmain['content'])):?>
<div class="panel bg-cyan">
<div class="panel-content">
<?=$mcmain['content']?>
</div>
</div>
<?php endif;?>


<?php foreach($mc as $key=>$value):?>
<h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;"><a name="<?=$value['id']?>"></a><?=$value['title']?> <button class="button info small _editcontent" relid="<?=$value['id']?>">编辑</button>
<?php if($value['startscreen']):?>
<a href="javascript:void(0);" class="editsc" relid="<?=$value['id']?>"><small>
<i class="icon-tag"
style="background: red;
color: white;
padding: 5px;
border-radius: 50%"></i>
</small></a>
<?php endif;?>
</h2>              
<p><?=$value['content']?></p>
<blockquote><?=$value['content_hidden']?></blockquote>

<?php endforeach;?>

<br>
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
            url:'/M/sort/'+$(this).attr("relid"),
            _this:$(this),
            buttonok	: true,
            buttoncancel: true,
        });
    });


	$('.listadd').click(function(){
        $.CK({
            rel:'节点添加',
            url:'/M/add/'+ $(this).attr('relid'),
            _this:$(this),
            buttonok	: true,
            buttoncancel: true,
        });
	});
	
<?php if(get_cookie('_mpath') ==1) : ?>
	$(".notice_path").show();
	$(".vpath_hide").show();
	$(".vpath_show").hide();
<?php endif;?>
	

	
	$('._editcontent').click(function(){
		$.CK({
			rel:'修改数据',
			url:'/M/vedit/'+$(this).attr('relid'),
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});
		
	$('.editsc').click(function(){
		$.CK({
			rel:'修改瓷片',
			url:'/M/setup_group_edit_docid/'+$(this).attr('relid'),
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});
		

	
});
</script>
    

</body>
</html>