<?php
    require_once($_SERVER['DOCUMENT_ROOT']. '/wp-load.php'); 
    $url = $_GET[url];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    $title_un = preg_match('!<title>(.*?)</title>!i', $result, $matches) ? $matches[1] : '网站预览｜小众网站';
    $description_un = preg_match('!<meta name="description" content="(.*?)" />!i', $result, $matches) ? $matches[1] : '小众网站｜精品网站推荐分享平台';
    $keywords_un = preg_match('!<meta name="keywords" content="(.*?)" />!i', $result, $matches) ? $matches[1] : '小众网站｜精品网站推荐分享平台';
    $icon_un = preg_match('!<link rel="icon" href="(.*?)" />!i', $result, $matches) ? $matches[1] : 'http://no16street.com/wp-content/themes/Loostrive/images/X_24px_1067642_easyicon.net.ico';
    function get_encoding($data,$to){
       $encode_arr = array('UTF-8','ASCII','GBK','GB2312','BIG5','JIS','eucjp-win','sjis-win','EUC-JP');
       $encoded = mb_detect_encoding($data, $encode_arr);
       $data = mb_convert_encoding($data,$to,$encoded);
       return $data;
    }
    $title = get_encoding($title_un,'UTF-8');
    $description = get_encoding($description_un,'UTF-8');
    $keywords = get_encoding($keywords_un,'UTF-8');  
    $icon = get_encoding($icon_un,'UTF-8');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <link href="<?php echo $icon; ?>" rel="icon" type="image/x-icon">
    <style type="text/css">
    *{margin:0;padding:0;}
    html{height:99%;}
    body{height:100%;}
    </style>
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
</head>
<body>
    <iframe src="<?php echo $url; ?>" width="100%" height="100%" scrolling="auto" style="border:0;"></iframe>
</body>
</html>