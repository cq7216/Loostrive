<?php
header("Content-type:text/html;charset=utf-8");
if(!isset($_POST["id"])||empty($_POST["id"])){
	echo "参数错误";
}else{
	$id=$_POST["id"];
	switch ($id) {
		case '1':
			$url='http://no16street.com/getnewlist.php';
			$html = file_get_contents($url);
			echo $html; 
			break;
		case '2':
			$url='http://no16street.com/gethotlist.php';
			$html = file_get_contents($url);
			echo $html; 
			break;
		case '3':
			$url='http://no16street.com/getrandomlist.php';
			$html = file_get_contents($url);
			echo $html; 
			break;
		default:
			# code...
			break;
	}
}
?>