<?php
require_once './common/db_connect.php';
require_once './lib/getkeyword.php';

$oper = $_POST['oper'];	
$id = $_POST['id'];	
// $oper = 'del';	
// $id = '140';	

//$JOB_NO = $_GET['JOB_NO'];
$title = $_POST['title'];
$lp_url = strip_tags ($_POST['lp_url']);
$img_name = strip_tags ($_POST['img_name']);

// $TITLE = '하이';
// $KEYWORD = '서울';
// $DOCU_URL = 'http:///';


switch ($oper) {
	case 'add' : 
		$SQL = "insert into hidden_board (title, lp_url, img_name, write_date) values ('$title','$lp_url','$img_name',now())";
		@mysql_query('set names utf8');
		@mysql_query($SQL,$conn);
		break;
		
	case 'edit' : 
		if($lp_url == null){
			$SQL = "update hidden_board set title = '$title', img_name = '$img_name', write_date = now() where no = '$id'";
			echo "aa".$lp_url.$img_name;
		}if($img_name == null){
			$SQL = "update hidden_board set title = '$title', lp_url = '$lp_url', write_date = now() where no = '$id'";
			echo "bb".$lp_url.$img_name;
		}else{
			$SQL = "update hidden_board set title = '$title', lp_url = '$lp_url', img_name = '$img_name', write_date = now() where no = '$id'";
			echo "cc".$lp_url.$img_name;
		}
		@mysql_query('set names utf8');
		@mysql_query($SQL,$conn);
		break;
		
	case 'del' :
		$SQL = "update hidden_board set DELETE_YN = 'Y' where no = '$id'";
		@mysql_query($SQL,$conn);
		break;
}
@mysql_close($conn);
?>