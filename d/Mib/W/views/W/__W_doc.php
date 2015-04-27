<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Study Framework Documentation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.css"/>
        <link rel="stylesheet" href="/css/responsive.css"/>
        <link rel="stylesheet" href="/css/all.css"/>
        
    </head>
    <body>
    
  
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="navbar-inner">
               <a class="brand" href="/W/">记忆内容</a> <a class="brand" href="/W/doc">内容单页</a>
                <ul class="nav pull-right visible-tablet visible-desktop">
                    <li><a href="#">访问<i class="icon-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
        
        <div class="container-fluid pts">
            <div class="row-fluid">
                <div class="span4">
                    <div class="well well-small">
                    
						<?php foreach($mast as $key=>$value){?>  
	                    <h4><?=$value['title']?></h4>
                        <ul>
							<?php foreach($mc as $key2=>$value2){?>  
                        	<?php if($value['id'] == $value2['preid']){?>
                        	<li><a href="docview/<?=$value2['id']?>"><?=$value2['title']?></a></li>
	                        <?php }?>                    
    	                    <?php }?>                    
                        </ul>
                        <?php }?>                    
                    </div>
                </div>
                <div class="span4">
                    <div class="well well-small"></div>
                </div>
                <div class="span4">
                    <div class="well well-small"></div>
                </div>
            </div>
        </div>
                
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushPhp.js"></script>
<link type="text/css" rel="stylesheet" href="/A/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
<script type="text/javascript">SyntaxHighlighter.all();</script>      

    </body>
</html>
