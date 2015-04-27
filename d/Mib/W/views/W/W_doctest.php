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
                <a class="brand" href="/W/">记忆内容</a>
                <ul class="nav pull-right visible-tablet visible-desktop">
                    <li><a href="#">访问<i class="icon-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
        
        <div class="container-fluid pts">
            <div class="row-fluid">
                <div class="span12">
                    <div class="well well-small">
                    
                    
                    <article id="book216" class="page-article">
                        <header>
                            <h2 class="page-article-header to_hide" onClick="show_form(<?=$rc['id']?>)"><?=$rc['title']?></h2>
                        </header>
                        <?php echo $rc['content'];?>
                        <blockquote id="v101" style="display:none;"><div style="background:#cfcfcf"><?php echo $rc['content_hidden'];?></div></blockquote>
                        <div class="page-article-footer">
                            <a class="btn" href="#top">
                                Back to Top
                                <i class="icon-arrow-up"></i>
                            </a>
                        </div>
					</article>         
                    </div>
                </div>
                
            </div>
        </div>
                
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shCore.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="/A/syntaxhighlighter_3.0.83/scripts/shBrushPhp.js"></script>
<link type="text/css" rel="stylesheet" href="/A/syntaxhighlighter_3.0.83/styles/shCoreDefault.css"/>
<script type="text/javascript">SyntaxHighlighter.all();</script>      


<script type="text/javascript" src="/A/jquery-1.8.2.min.js"></script>\

<script language="javascript">
function g(id){
	return document.getElementById(id);	
}
function show_form(vd){
	console.log(vd);
	return (g(vd).style.display == '') ? g(vd).style.display = 'none' : g(vd).style.display = '';
}
</script>  

    </body>
</html>
