<?
include("./lib/JSON.php");	//유틸리티 로드

// Future-friendly json_encode
if( !function_exists('json_encode') ) {
    function json_encode($data) {
        $json = new Services_JSON();
        return( $json->encode($data) );
    }
}
// Future-friendly json_decode
if( !function_exists('json_decode') ) {
    function json_decode($data) {
        $json = new Services_JSON();
        return( $json->decode($data) );
    }
}



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


// 랜덤으로 문자를 리턴한다
function getRandomString($lenth = 10){
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


// 랜덤으로 숫사를 리턴한다.
function getRandomNumber($length = 10)
{
    $characters = '0123456789a';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
}


?>