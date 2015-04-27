<div id="selectbm"><table width="750" border="0" cellspacing="1">
  <tr>
    <td>
    
    <div style="width:150px;float:left;">
    <input type="radio" name="___groupname" id="radio" value="0" onclick="setcookie('___groupname','0')" <?php if(get_cookie('___groupname') ==0) : ?>checked="checked"<?php endif;?>/> 根
    </div>
    
    <?php foreach($mc as $key=>$value){?>
    <div style="width:150px;float:left;">
    <input type="radio" name="___groupname" id="radio" value="<?=$value['id']?>" onclick="setcookie('___groupname','<?=$value['id']?>')" <?php if(get_cookie('___groupname') ==$value['id']) : ?>checked="checked"<?php endif;?>/> <?=$value['title']?>
    </div>
    <?php }?>
    <br />
 <br />
 <br />

    </td>
  </tr>
  <tr>
    <td><a relid="0" rel="根">-> 根</a> <div style="float:right;"> 
<!--
<input name="_selfroot" type="checkbox" id="_selfroot" value="1" < ?php if(get_cookie('_msort') ==1) : ? >checked="checked"< ?php endif;? >/> 开始屏
-->
<button class="button primary _select_refresh">刷新</button></div></td>
  </tr>
  <?php foreach($list as $key=>$value){ ?>
  <tr>
    <td><?php echo $value['_vchr']; ?>
    
    <a relid="<?php echo $value['id']; ?>" rel="<?php echo $value['title'] ?>"><?php echo $value['title']; ?></a>
    
    </td>
  </tr>
  <?php	  }?>    
</table>
</a>
<script type="text/dialog">

ob = this;

$('#selectbm a').click(function(){					//关闭
	//=====================================================		//重写确定按钮方法
	//thisobjselect.attr('result',$(this).attr("rel"));
	$(_option.rel).val($(this).attr("rel"));
	$(_option.rel).attr("rel",$(this).attr("relid"));
	ob.close();
});

$('._select_refresh').click(function(){					//关闭
	Wr.dorefresh(_option);
});


</script>