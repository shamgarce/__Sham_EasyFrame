<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Study Framework Documentation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/bootstrap.css"/>
        <link rel="stylesheet" href="/css/responsive.css"/>
        <link rel="stylesheet" href="/css/all.css"/>
<script language="javascript">
	function g(id){
		return document.getElementById(id);	
	}
	function show_form(vd){
		return (g(vd).style.display == '') ? g(vd).style.display = 'none' : g(vd).style.display = '';
	}				
</script>
    </head>
    <body>
    
     <?php 
	 //echo '<pre>';
	 //print_r($leaf);
	 ?>
    
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="navbar-inner">
                <a class="brand" href="/W/">记忆内容</a>
                <ul class="nav pull-right visible-tablet visible-desktop">
                    <li><a href="#">Visit Website <i class="icon-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="container-fluid pts">
    <div class="row-fluid">
     


<!-- -->
        <div class="span12">
        <h1><?=$leaf['title']?></h1>
       <div class="alert alert-info"><?=$leafcontent['content']?></div>
        
<?php foreach($leaf['child'] as $key=>$value){?>  

          <section class="page-section" id="book<?=$value['id']?>">
            <h1 class="page-header"><?=$value['title']?> <a class="bookmark"><i class="icon-bookmark"></i></a></h1>
            <?php if(!empty($mc[$value['id']]['content'])){?>
            <div class="alert alert-info">
                <?=$mc[$value['id']]['content']?>
            </div>
            <?php }?>
            
            <?php foreach($mc as $key2=>$value2){?>  
                <?php if($value2['preid'] == $value['id']){?>
                <article class="page-article" id="book<?=$value2['id']?>">
                    <header>
                    <h2 class="page-article-header"><?=$value2['title']?></h2>
                    </header>
                    <div><?=$mc[$value2['id']]['content']?></div>
                    <!-- hidden -->
                        <div style="padding:20px;"><button class="btn btn-primary" onClick="javasctipt:show_form(<?=$value2['id']?>)">查看</button></div>
                        <div id="<?=$value2['id']?>" style="display:none;"><?=$mc[$value2['id']]['content_hidden']?></div>
                    <!-- hidden -->
                    <div class="page-article-footer">
                    <a class="btn" href="#top">Back to Top <i class="icon-arrow-up"></i></a>
                    </div>
                </article>
	 			<?php }?>
 			<?php }?>
            </section>
<?php }?>
      </div>
  
    </div>
</div>
        
                
                
                
<!-- -->                
             <!-- article class="page-article" id="Cookie-Session-Store">
                    <header>
                        <h2 class="page-article-header">Cookie Session Store</h2>
                    </header>
                    <p>You may also use the <code>\Slim\Middleware\SessionCookie</code> middleware are to your
                        Slim application:</p>
                        <pre><code>&lt;?php
                        $app = new Slim();
                        $app-&gt;add(new \Slim\Middleware\SessionCookie(array(
                        )));
                        </code></pre>
                        
                        <p>The second argument is optional; it is shown here so you can see the default middleware with zero changes to your application code.alternate session store.</p>
                        
                        <div class="alert">
                          <strong>PLEASE NOTE:</strong> Client-side storagssion information
                          on your server.
                        </div>
                    <div class="page-article-footer">
                        <a class="btn" href="#top">Back to Top <i class="icon-arrow-up"></i></a>
                    </div>
                </article -->
<!--/-->                
<!-- /rec -->


		<!-- debug -->
        <!--link rel="stylesheet" href="/A/bootstrap-3.2.0/css/bootstrap.css"/>
		<script src="/A/jquery-1.9.0.min.js"></script>
        <script src="/A/artDialog4.1.7/artDialog.js?skin=default"></script>
        <script src="/A/bootstrap-3.2.0/js/bootstrap.js"></script>
        <script src="/A/debug.js"></script -->
            <!-- Load JavaScript Libraries -->
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushPhp.js"></script>
<link type="text/css" rel="stylesheet" href="/A/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
<script type="text/javascript">SyntaxHighlighter.all();</script>      
   
   
    </body>
</html>
