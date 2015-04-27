<table class="table striped hovered">

  <tr>
    <td width="120" align="right">分组 : </td>
    <td width="300" align="left"><span class="input-control text info-state">
      <input class="edgroupid" type="text" placeholder="type text" value="<?=$rc['groupid']?>"/> 
    </span></td>
    <td>docid : <?=$rc['docid']?>
    
<input class="edid" type="hidden" placeholder="type text" value="<?=$rc['id']?>"/> 
    
    </td>
  </tr>
  <tr>
    <td align="right">title : </td>
    <td><span class="input-control text info-state"> 
        <input class="edtitle" type="text" placeholder="type text" value="<?=$rc['title']?>" />
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">外观[S H W] : </td>
    <td>
    
<span class="input-control text info-state">
<input class="edwg" type="text" placeholder="type text"  value="<?=$rc['wg']?>">
</span>
      
    </td>
    <td><p>S 范围 : </p>
     <p> S 
       <button class="button danger">Selected</button></p>
     <p> W 
       <button class="button default">half[0.5]</button>
      <button class="button primary">_[1]</button>
      <button class="button info">double[2]</button>
      <button class="button success">triple[3]</button>
      <button class="button warning">quadro[4]</button></p>

     <p> H 
       <button class="button inverse">double-vertical[2]</button>
     <button class="button default">triple-vertical[3]</button>
     <button class="button primary">quadro-vertical[4]</button>
     
     </p></td>
  </tr>
  <tr>
    <td align="right">颜色 : </td>
    <td>
    
<span class="input-control text info-state">
<i id="tempyanshi" class="icon-stop fg-lightBlue"></i>
<input type="text" placeholder="type text" class="edcolor selectcolor" value="<?=$rc['color']?>">
</span>

    </td>
    <td></td>
  </tr>
  <tr>
    <td align="right">图标 : </td>
    <td>
<span class="input-control text info-state">
<input type="text" placeholder="type text" class="edicon selecticon"  value="<?=$rc['icon']?>">
</span>

    
    </td>
    <td><code>资源引用</code></td>
  </tr>
  <tr>
    <td align="right">图片 : </td>
    <td>
    
<!-- 
//=======================================================
//无刷新上传
-->
<style>
.fileInputContainer{
background:url('<?=$rc['img']?>');
height:150px;
position:relative;
width: 200px;
}
.fileInput{
height:150px;
overflow: hidden;
font-size: 10px;
position:absolute;
right:0;
top:0;
left:0;
opacity: 0;
filter:alpha(opacity=0);
cursor:pointer;
}
</style>
<div class="fileInputContainer">
<form  id="bootImg1" action="/upload/do_file_upload.php" method="post"  enctype="multipart/form-data"  target="form-target"> 
<input class="edpic fileInput" type="file" name="file" id="editpic" relvalue="<?=$rc['img']?>" />
</form>
</div> 
<!-- 
//=======================================================
//无刷新上传
-->
    </td>
    <td><code>资源引用</code></td>
  </tr>

  <tr>
    <td align="right">url</td>
    <td><span class="input-control text info-state">
      <input class="edurl" type="text" placeholder="type text" value="<?=$rc['url']?>"/> 
    </span></td>
    <td>会自动组织</td>
  </tr>
  <tr>
    <td align="right">brand : </td>
    <td>
    <div class="input-control textarea">
    <textarea name="textarea" class="edbrand"><?=$rc['brand']?></textarea>
    </div>
    </td>
    <td><a class="showbrand">brand 参考</a></td>
  </tr>
  <tr>
    <td align="right">content : </td>
    <td><div class="input-control textarea">
      <textarea name="textarea" class="edcontent"><?=$rc['content']?></textarea>
    </div></td>
    <td><a class="showcontent">content 参考</a></td>
  </tr>
  </table>
  <script type="text/dialog">

this.opt = {				//确定按钮的点击
	ok:function(){
			var res = $.ajax({
			url : '/M/setup_group_edit_exc',
			type: 'post',
			data: {
				edid 		: $('.edid').val(),
				edgroupid 	: $('.edgroupid').val(),
				edtitle 	: $('.edtitle').val(),
				edwg 		: $('.edwg').val(),
				edcolor 	: $('.edcolor').val(),
				edicon 		: $('.edicon').val(),
				edpic 		: $('.edpic').attr("relvalue"),
				edbrand 	: $('.edbrand').val(),
				edurl		: $('.edurl').val(),
				edcontent 	: $('.edcontent').val()
			
				},
			dataType: "json",
			async:false,
			cache:false
		}).responseJSON;
		//console.log(res);
		//==========================1
		if(res.code<0){
			alert(res.msg);
			return false;
		}else{
			location.reload();
			return true;
		}	
		return true;
	},
	cancel:function(){},						//点击cancel按钮
	close:function(){},							//关闭对话框 不是回调
}

	$('.selectcolor').click(function(){
		$.CK({
			rel:'.selectcolor',
			url:'/A/M/selectcolor.html',
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});

	$('.selecticon').click(function(){
		$.CK({
			rel:'.selecticon',
			url:'/A/M/selecticon.html',
			_this:$(this),

			buttonok	: true,
			buttoncancel: true,
			});
	});
	$('.showbrand').click(function(){
		$.CK({
			rel:'.showbrand',
			url:'/A/M/showbrand.html',
			_this:$(this),

			buttonok	: true,
			buttoncancel: true,
			});
	});

	$('.showcontent').click(function(){
		$.CK({
			rel:'.showcontent',
			url:'/A/M/showcontent.html',
			_this:$(this),

			buttonok	: true,
			buttoncancel: true,
			});
	});





//=======================================================
//无刷新上传
stopUpload = function (res){
	if(res.code<0){
		alert(res.msg);
	}else{
		$('.fileInput').attr("relvalue",res.img),
		$(".fileInputContainer").css("background","url("+res.img+")"); 	
		//预览图片
		//console.log(res.img);
	}	
}

$('#editpic').change(function(){
	$('iframe[name=form-target]').remove();
	$("body").append("<iframe style='width:0; height:0; border:0;' name='form-target'></iframe>");
	$('#bootImg1').submit();
});
//=======================================================

</script>


