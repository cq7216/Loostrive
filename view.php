<?php
    require_once($_SERVER['DOCUMENT_ROOT']. '/wp-load.php'); 
    $url = $_GET[url];
    $name=$_GET[name];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $name; ?></title>
    <style type="text/css">
    *{margin:0;padding:0;}
    html{height:99%;}
    body{height:100%;position:relative;}
    .guanggao{position:fixed;right:0;bottom:0;}
    .windowBar {position: fixed; top: 100px; right: 25px; z-index: 99; }
    .windowBar a {color: #fff; font-style: normal; text-decoration: none; display: block; text-align: center; font: 12px/1.5 tahoma,"microsoft yahei","\5FAE\8F6F\96C5\9ED1"; margin: 15px; padding: 0px; opacity: 0.7; }
    .windowBar a img {border-radius: 50px; background-color: #fff; padding: 0; margin: 0; }
    .wvTipArea {position: absolute; background-color: #6d6d6d; opacity: 0.9; padding: 9px; z-index: 9998; border-radius: 7px; color: #fff; font-size: 12px; line-height: 18px; text-align: center;  overflow: visible; white-space: normal; margin-top: -42px; width: 55px; cursor: default; right: 70px; }
    .windowBar a:hover {opacity: 1; }
    </style>
    <script type="text/javascript" src="http://no16street.qiniudn.com/wp-content/themes/Loostrive/js/jquery.min.js?ver=1453799417"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // alert("test");
            $(".wvTipArea").hide();
            $(".wvTip").hover(
                function(){
            var hdw_index=$(".wvTip").index(this);
            $(".wvTipArea").eq(hdw_index).show();},
                function(){
            $(".wvTipArea").hide();}
            );
        });
    </script>
</head>
<body>
    <div class="windowBar">
        <a class="wvTip" wvtip="淘小众" href="../" title="淘小众">
            <img src="http://www.zm1z.com/img/siteWindow/star.png" width="50px" height="50px">
        <div class="wvTipArea">淘小众</div></a>
        <a class="wvTip" wvtip="点评网站" href="../" title="点评网站">
            <img src="http://www.zm1z.com/img/siteWindow/chat.png" width="50px" height="50px">
        <div class="wvTipArea">点评网站</div></a>
        <a class="wvTip" wvtip="直接访问<?php echo $name; ?>" href="<?php echo $url; ?>" title="直接访问" id="infoShow">
            <img src="http://www.zm1z.com/img/siteWindow/mouse.png" width="50px" height="50px">
        <div class="wvTipArea">直接访问<?php echo $name; ?></div></a>
    </div>
    <iframe src="<?php echo $url; ?>" width="100%" height="100%" scrolling="auto" style="border:0;"></iframe>
    <!-- 百度统计开始 -->
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?4da2697ab4e29bf55eeaad87ba5ecbc5";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
    <!-- 百度统计结束 -->
    <div class="guanggao">
        <!-- 百度广告开始 -->
        <script type="text/javascript">
        /*view页面右下角图片广告*/
        var cpro_id = "u2501104";
        </script>
        <script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
        <!-- 百度广告结束 -->
    </div>
</body>
</html>