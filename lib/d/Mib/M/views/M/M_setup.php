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

    <script src="/A/CommonIni.js"></script>

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
系统信息设置 : 显示界面等
</p>  



    </div>
    </div> 
    <div class="right bg-darkRed"> 
        <div class="content">
            <div class="right-head bg-darker  fg-white" style="padding-left:5pt;">
                <h1 class="fg-white">
                    <a href="/M/tnode/0" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 返回<small class="on-right">首页
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
    <li class="active">
    <a>设置</a>
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
功能设置
</h2>
<div class="example">
  <table class="table">
<thead>
  <tr>
    <th width="70">&nbsp;</th>
    <th width="150">&nbsp;</th>
    <th>&nbsp;</th>
  </tr></thead>
  <tr>
    <td><label>路径 :</label> </td>
    <td>    <div class="input-control switch" data-role="input-control" style="margin-bottom::0px">
        <label>
        <input type="checkbox" <?php if(get_cookie('_mpath') ==1) : ?>checked<?php endif;?> onclick="setc('_mpath')">
        <span class="check"></span>
        </label>
    </div></td>
    <td><li>选中则默认显示路径</td>
  </tr>

  <tr>
    <td><label>添加 :</label> </td>
    <td>
    <div class="input-control switch" data-role="input-control" style="margin-bottom::0px">
        <label>
        <input type="checkbox" <?php if(get_cookie('_madd') ==1) : ?>checked<?php endif;?> onclick="setc('_madd')">
        <span class="check"></span>
        </label>
    </div>
    </td>
    <td><li>是否显示添加按钮</td>
  </tr>


  <tr>
    <td><label>排序 : </label></td>
    <td>
    <div class="input-control switch" data-role="input-control" style="margin-bottom::0px">
        <label>
        <input type="checkbox" <?php if(get_cookie('_msort') ==1) : ?>checked<?php endif;?> onclick="setc('_msort')">
        <span class="check"></span>
        </label>
    </div>
    </td>
    <td><li>是否显示排序按钮</td>
  </tr>
  
  
  <tr>
  <td><label>编辑 : </label></td>
  <td>
    <div class="input-control switch" data-role="input-control" style="margin-bottom::0px">
        <label>
        <input type="checkbox" <?php if(get_cookie('_medit') ==1) : ?>checked<?php endif;?> onclick="setc('_medit')">
        <span class="check"></span>
        </label>
    </div>
  
  </td>
  <td><li>是否显示编辑按钮</td>
  </tr>


  </table>
</div>




<h2 id="_switch">
<i class="icon-accessibility on-left"></i>
开始页设置
</h2>
<div class="example">
<table class="table">
<form id="__sort">
<thead>
    <tr>
      <td width="45">编号</td>
      <td width="200">分组名称</td>
      <td width="120">Group Number</td>
      <td>说明</td>
      <td>操作</td>
    </tr>
</thead>

<?php foreach($rc as $key=>$value){ ?>
    <tr>
      <td><?=$value['groupid']?></td>
      <td><span class="input-control text info-state">
        <input name="groupvar[<?=$value['groupid']?>][group_title]" type="text" placeholder="type text" value="<?php echo $value['group_title'] ?>">
      </span>
        </td>
      <td><span class="input-control text info-state">
        <input name="groupvar[<?=$value['groupid']?>][group_num]" type="text" placeholder="type text" class="a" value="<?php echo $value['group_num'] ?>">
      </span></td>
      <td><span class="input-control text info-state">
        <input name="groupvar[<?=$value['groupid']?>][group_dis]" type="text" placeholder="type text" class="c" value="<?php echo $value['group_dis'] ?>">
      </span></td>
      <td><a href="/M/setup_group/<?=$value['groupid']?>" class="primary">设置</a></td>
    </tr>
<?php }?>


    <tr>
      <td colspan="5">
<a class="button bg-darkRed fg-white _groupset">提交</a></td>
      </tr>
    <tr>
      <td colspan="5">数量填写
      
      <code> one  </code>
      <code> double    </code>
      <code> three   </code>
      <code> four  </code>
      <code> five </code>
      <code> six</code> 19默认 20其他
      </td>
      </tr>

</form>
</table>
</div>

    




<h2 id="_switch">
<i class="icon-accessibility on-left"></i>
开始页分组数量
</h2>
<div class="example">
<table class="table">
    <tr>
      <td width="70"><label>分组</label>
        </td>
      <td width="300">
        
        <div class="input-control text warning-state" data-role="input-control">
          <input class="groupnumsubmit_var"" type="text" placeholder="type text" value="<?=$num?>">
          <button class="btn-clear" tabindex="-1" type="button"></button>
          </div>      
        
        </td>
      <td><a class="button bg-darkRed fg-white groupnumsubmit">提交</a></td>
    </tr>
</table>
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
	


	$('.listadd').click(function(){
		$.CK({
			rel:'添加数据',
			url:'',
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});

    $('.groupnumsubmit').click(function(){
        var res = $.ajax({
            url : '/M/setup_setgroupnum/'+$('.groupnumsubmit_var').val(),
            type: 'post',
            data: {
                groupnumsubmit_var : $('.groupnumsubmit_var').val()
            },
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

	$('._groupset').click(function(){
		var res = $.ajax({
            url : '/M/setup_groupinfo_exc',
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