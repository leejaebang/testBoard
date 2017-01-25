<?
require_once("./lib/util.php");
include './common/db_connect.php';

$page = $_GET['page']; // 페이지 번호
$limit = $_GET['rows']; // 한페이지 출력 row 수
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort // null
$sord = $_GET['sord']; // 정렬속성

if(!$sidx) $sidx =1;

//  $page = 1;
//  $limit = 15;
//  $sidx = 1;
//  $sord = asc;
//  $uniq_url = 'bao';

@mysql_query($conn);
@mysql_query('set names utf8');

// 전체 데이터 개수 구하기(삭제데이터 제외)
$result = mysql_query("select count(*) as count from hidden_board where delete_yn = 'N'");
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count']; // 487
//die("$count");
if( $count >0 ) {
	$total_pages = ceil($count/$limit);  // 487/15
} else { $total_pages = 0; }
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)  // 15*1-15 = 0

$SQL = "select *, '' as view from hidden_board where delete_yn = 'N' order by no desc LIMIT $start , $limit";
$result = @mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());

$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;

$i=0;
while($row = @mysql_fetch_array($result,MYSQL_ASSOC)) {
	$responce->rows[$i]['id']=$row['no'];
	$responce->rows[$i]['cell']=array($row['no'],$row['title'],$row['lp_url'],$row['img_name'],$row['img_name2'],$row['hits'],$row['write_date'],$row['no']);
	$i++;
}


echo urldecode(json_encode($responce));

// 한번 출력한 데이터는 IS_RANK_CHK값을 모두 1로 바꾼다.
// $SQL = "update C_VERY_JOB_RANK set IS_RANK_CHK = '1'";
// @mysql_query($SQL,$conn);

@mysql_close($conn);
?>