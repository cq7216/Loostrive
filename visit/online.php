<?php
include_once('connect.php');

$ip = get_client_ip();
$time = time();
$query = mysql_query("select id from online where ip='$ip'");
if(!mysql_num_rows($query)){
	if($_COOKIE['geoData']){
		$province = $_COOKIE['geoData'];
	}else{
		$api = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=$ip";
		$json = file_get_contents($api);
		$arr = json_decode($json,true);
		$province = $arr['province'];
		setcookie('geoData',$province,$time+600);
	}
	mysql_query("insert into online (ip,province,addtime) values ('$ip','$province','$time')");
}else{
	mysql_query("update online set addtime='$time' where ip='$ip'");
}

$outtime = $time-600;
mysql_query("delete from online where addtime<$outtime");
list($totalOnline) = mysql_fetch_array(mysql_query("select count(*) from online")); 
echo $totalOnline;
mysql_close();

//获取用户真实IP
function get_client_ip() {
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else
		if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		else
			if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
				$ip = getenv("REMOTE_ADDR");
			else
				if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
					$ip = $_SERVER['REMOTE_ADDR'];
				else
					$ip = "unknown";
	return ($ip);
}
?>