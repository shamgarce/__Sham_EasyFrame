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
    <script src="/A/CommonIni.js"></script>

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
 <?php if(get_cookie('_madd') ==1) : ?><a class="button info listadd" relid="<?=$leaf['id']?>">添加</a><?php endif;?>
 <?php if(get_cookie('_msort') ==1) : ?><a class="button success listsort" relid="<?=$leaf['id']?>">排序</a><?php endif;?>





        
   <h2 class="fg-white  text-right"><?=$leaf['title']?></h2>
   <hr>

<ul class="unstyled fg-white">
<?php foreach($leaf['child'] as $key=>$value):?>
	<?php
	if($value['_leaf']==1 || $value['_pure']==1){
		$__color="fg-lightGreen";
	}else{
		$__color="fg-white";
	}
	if($value['_leaf']==1){
		$__url = "/M/view/".$value['preid'].'#'.$value['id'];
	}elseif($value['_pure']==1){
		$__url = "/M/view/".$value['id'];
	}else{
		$__url = "/M/tnode/".$value['id'];
	}
	?>
    <li><i class="icon-record on-right <?=$__color?>"></i>
    <a href="<?=$__url?>" class="fg-white fg-hover-cyan"><?=$value['title']?></a>
    <?php if(!empty($value['child'])):?>
    <ul class="fg-white">
		<?php foreach($value['child'] as $key2=>$value2):?>
            <li>
                <?php
                if($value2['_leaf']==1 || $value2['_pure']==1){
                    $__color2="fg-lightGreen";
                }else{
                    $__color2="fg-white";
                }
                if($value2['_leaf']==1){
                    $__url2 = "/M/view/".$value2['preid'].'#'.$value2['id'];
                }elseif($value2['_pure']==1){
                    $__url2 = "/M/view/".$value2['id'];
                }else{
                    $__url2 = "/M/tnode/".$value2['id'];
                }
                ?>
                <i class="icon-arrow-right on-right <?=$__color2?>"></i>
                <a href="<?=$__url2?>" class="fg-white fg-hover-cyan"><?=$value2['title']?></a>
            </li>
        <?php endforeach;?>
	</ul>
    <?php endif?>
	</li>
<?php endforeach;?>
</ul>  






    </div>
    </div> 
    <div class="right bg-darkRed"> 
        <div class="content">
            
            
            <div class="right-head bg-darker  fg-white" style="padding-left:5pt;">
                <h1 class="fg-white">
                    <?php if($leaf['preid']==0):?>
                    <a href="/M/tnode/0" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 
                    <?php else:?>
                    <a href="<?=$leaf['preid']?>" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 
                    <?php endif;?>
                    返回<small class="on-right">上一页
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

            
<H2 class="padding15"><strong><?=$leaf['title']?></strong> <button class="button info small _editcontent" relid="<?=$leaf['id']?>">编辑</button>
<?php if($mcmain['startscreen']):?>
<a href="javascript:void(0);" class="editsc" relid="<?=$leaf['id']?>"><small>
<i class="icon-tag"
style="background: red;
color: white;
padding: 5px;
border-radius: 50%"></i>
</small></a>
<?php endif;?>

</H2>
         
           <div class="right-body" style="padding-left:10pt;padding-right:10pt;height:auto;">


<!-- 图片 -->
<div class="example">
    
    
    
<?php foreach($leaf['child'] as $key=>$value):?>


	<?php 
	if($value['_leaf']==1){
		$__url = "/M/view/".$value['preid'].'#'.$value['id'];
	}elseif($value['_pure']==1){
		$__url = "/M/view/".$value['id'];
	}else{
		$__url = "/M/tnode/".$value['id'];
	}
	?>



	<?php if($value['_leaf']!=1):?>
        <!-- 列表的 -->
        <a href="<?=$__url?>" class="tile bg-violet double double-vertical" data-click="transform">
            <div class="tile-content">
                <div class="padding10">
                    <h2 class="fg-white no-margin"><?=$value['title']?></h2>
					<?php foreach($value['child'] as $key2=>$value2):?>
                    <h5 class="fg-white "><?=$value2['title']?></h5>
                    <?php endforeach?>
                </div>
            </div>
            <div class="tile-status">


            <?php if($value['_pure']==1):?>
            <div class="badge bg-darkGreen"><?=count($value['child'])?></div>
            <?php else:?>
            <div class="badge bg-red"><?=count($value['child'])?></div>
            <?php endif;?>


            </div>
        </a>
        <!-- 列表的 end -->
	<?php else:?>
        <!-- 文章的 -->
        <a href="<?=$__url?>" class="tile bg-cyan double double-vertical" data-click="transform">
            <div class="tile-content">
                <div class="padding10">
                    <h2 class="fg-white no-margin"><?=$value['title']?></h2>
                    <p class="fg-white padding5">
                    </p>
                </div>
            </div>
            <div class="brand">
            <div class="badge newMessage"></div>
            </div>
        </a>
        <!-- 文章的end -->
    
    
    <?php endif;?>
<?php endforeach?>
    
    
    
    

    


</div> 
<!-- /图片 -->





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
            url:'/M/sort/'+ $(this).attr('relid'),
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