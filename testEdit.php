<?php
require_once './common/db_connect.php';

$oper = $_POST['oper'];	
$id = $_POST['id'];	
// $oper = 'del';	
// $id = '140';	

// $title = $_POST['title'];
// $lp_url = $_POST['lp_url'];
$img_name = $_POST['img_name'];
// $TITLE = '하이';
// $KEYWORD = '서울';
// $DOCU_URL = 'http:///';


switch ($oper) {
	case 'add' : 
		$SQL = "insert into hidden_board (img_name, write_date) values ('$img_name',now())";
		@mysql_query('set names utf8');
		@mysql_query($SQL,$conn);
		break;
		
	case 'edit' : 
		$SQL = "update hidden_board set img_name = '$img_name', write_date = now() where no = '$id'"; 
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