<table width="750" border="0" cellspacing="1">
  <tr>
    <td>归属 : 
    <input name="textfield3" type="text" id="selectguishu" value="<?php echo $_rc[$rc['preid']]['title']?>" size="45" rel=<?php echo $rc['preid']?> />
    
<input name="textfield3" type="hidden" id="ssid" value="<?php echo $rc['id']?>" />
    
    
 <input name="titleonly" type="checkbox" id="titleonly" value="1" <?php if($rc['titleonly'] ==1){?>checked="checked"<?php }?>/> 仅标题
     
<input name="startscreen" type="checkbox" id="startscreen" value="1" <?php if($rc['startscreen'] ==1){?>checked="checked"<?php }?>/> 开始屏
    
   <input name="test" type="checkbox" id="test" value="1" <?php if($rc['test'] ==1){?>checked="checked"<?php }?>/> 
   测试内容
    
    
    
    <button class="button info small _yufa" style="float:right;">参考</button> 
    
    </td>
  </tr>
  <tr>
    <td>
    </td>
  </tr>
  <tr>
    <td>
    标题 : 
      <input name="textfield" type="text" id="addnew_articletitle" value="<?php echo $rc['title']?>" size="70" />
     
     </td>
  </tr>
<?php if($rc['titleonly'] !=1){?>
  
  <tr>
    <td>内容 :<br /><textarea id="editor_id" name="content" style="width:650px;height:300px;"><?php echo $rc['content']?></textarea></td>
  </tr>
<?php if($rc['test'] ==1){?>
  <tr>
    <td>
<textarea id="editor_id_hidden" name="content_hidden" style="width:650px;height:150px;"><?php echo $rc['content_hidden']?></textarea>
    </td>
  </tr>
<?php }?>
  <tr>
    <td>URL :
      <br />      <textarea name="textfield2" cols="70" rows="5" id="addnew_url"><?php echo $rc['url']?></textarea></td>
  </tr>
<?php }?>    
  
</table>
<script type="text/dialog">

<?php if($rc['titleonly'] !=1){?>
var editor2;
$.getScript('/A/kindeditor-4.1.10/kindeditor-min.js', function() {
	KindEditor.basePath = '/A/kindeditor-4.1.10/';
	editor = KindEditor.create('#editor_id',{
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		allowFileManager : true,
		items : [
 'source', '|', 'undo', 'redo', '|', 'preview',  'template', 'code', 'cut', 'copy', 'paste',
'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
'anchor', 'link', 'unlink', '|'	
		
		]
	});
<?php if($rc['test'] ==1){?>

	editor2 = KindEditor.create('#editor_id_hidden',{
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		allowFileManager : true,
		items : [
 'source', '|', 'undo', 'redo', '|', 'preview',  'template', 'code', 'cut', 'copy', 'paste',
'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen', '/',
'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
'flash', 'media', 'insertfile', 'table', 'hr', 'emoticons', 'baidumap', 'pagebreak',
'anchor', 'link', 'unlink', '|'	
		
		]
	});
<?php }?>  
	
	
	
});
<?php }?>    
	
			//bz_nr: editor.html(),
			
	 
        $('#selectguishu').click(function(){
			 $.CK({
                rel:'#selectguishu',
                //url:'/Doc/vset_select',
                url:'/M/vselect',
				width:'500px',
                _this:$(this),
                buttonok	: true,
                buttoncancel: true,
                });
        });   			
			
this.opt = {				//确定按钮的点击
		ok:function(){
				var res = $.ajax({
				url : '/M/vedit_exc',
				type: 'post',
				data: {
					
					id 		: $('#ssid').val(),
					bguishu : $('#selectguishu').attr("rel"),
					btiaoti : $('#addnew_articletitle').val(),
					
					<?php if($rc['titleonly'] !=1){?>
					bnr 	: editor.html(),
					
						<?php if($rc['test'] ==1){?>
						content_hidden 	: editor2.html(),
						<?php }?>   					
					
					<?php }?>    
					 
					burl 	: $('#addnew_url').val(),
					titleonly 	: $("input[name='titleonly']:checked").val(),
					startscreen	: $("input[name='startscreen']:checked").val(),
					test 	: $("input[name='test']:checked").val(),
					
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


	$('._yufa').click(function(){
		$.CK({
			rel:'添加数据',
			url:'/A/M/sview.html',
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});
	
</script>
