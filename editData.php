<?php
require_once './common/db_connect.php';
require_once './lib/getkeyword.php';

$oper = $_POST['oper'];
$id = $_POST['id'];
// $oper = 'del';
// $id = '140';

//$JOB_NO = $_GET['JOB_NO'];
$title = $_POST['title'];
$lp_url = $_POST['lp_url'];
$img_name = $_POST['img_name'];
$img_name2 = $_POST['img_name2'];

// $TITLE = '하이';
// $KEYWORD = '서울';
// $DOCU_URL = 'http:///';


switch ($oper) {
	case 'add' :
		$SQL = "insert into hidden_board (title, lp_url, img_name, img_name2, write_date) values ('$title','$lp_url','$img_name','$img_name2',now())";
		@mysql_query('set names utf8');
		@mysql_query($SQL,$conn);
		break;

	case 'edit' :
		if(strpos( $img_name , './upload' ) !== false){
			$SQL = "update hidden_board set title = '$title', lp_url = '$lp_url', img_name2 = '$img_name2', write_date = now() where no = '$id'";
		}else if(strpos( $img_name2 , './upload' ) !== false){
			$SQL = "update hidden_board set title = '$title', lp_url = '$lp_url', img_name = '$img_name', write_date = now() where no = '$id'";
		}else{
			$SQL = "update hidden_board set title = '$title', lp_url = '$lp_url', img_name = '$img_name', img_name2 = '$img_name2', write_date = now() where no = '$id'";
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