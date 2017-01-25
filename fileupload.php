<?php

// 랜덤으로 숫자/문자/대소문자 섞어서 리턴한다.
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}


// 설정
$uploads_dir = '/list_view/upload_file';
$allowed_ext = array('jpg','jpeg','png','gif');

// 변수 정리
$error = $_FILES['imgFile']['error'];
$name = $_FILES['imgFile']['name'];
$ext = array_pop(explode('.', $name));

// 오류 확인
/*
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}
*/

// 확장자 확인
//if( !in_array($ext, $allowed_ext) ) {
//	echo "허용되지 않는 확장자입니다.";
//	exit;
//}

// 날짜_랜덤이름+.확장자를 파일명으로 설정한다.
$new_filename = date("YmdHis")."_".generateRandomString();
$Full_File_Name = $new_filename.".".$ext;

// 파일을 해당경로에 위에서 설정한 파일명으로 업로드한다.
move_uploaded_file( $_FILES['imgFile']['tmp_name'], "./upload_file/".$Full_File_Name);
echo $Full_File_Name;
?>