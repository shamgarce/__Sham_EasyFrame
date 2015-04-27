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
    <script src="/A/Metro/js/start-screen.js"></script>

    <title>Metro UI CSS : Metro Bootstrap CSS Library</title>
</head>
<body class="metro">
    <div class="tile-area tile-area-dark">
        <h1 class="tile-area-title fg-white">开始</h1>
        <div class="user-id">
            <div class="user-id-image">
                <a href="/M/setup"><span class="icon-user no-display1"></span></a>
            </div>
            <div class="user-id-name">
                <span class="first-name">System</span>
                <span class="last-name">setup</span>
            </div>
        </div>

		<!-- 瓷片开始 -->
        <?php foreach($group as $key=>$value):?>
		<div class="tile-group <?=$value['group_num']?>">
            <div class="tile-group-title"><?=$value['group_title']?></div>
			<?php foreach($rc[$value['groupid']] as $key2=>$value2):?>
                <?=$value2['cpcode']?>
			<?php endforeach;?>
        </div> <!-- End group -->
        <?php endforeach;?>
		<!-- /瓷片结束 -->
</div>
    

</body>
</html>