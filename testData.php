<?
require_once("./lib/util.php");
include './common/db_connect.php';


@mysql_query($conn);
@mysql_query('set names utf8');

$SQL = "select no, img_name, write_date from hidden_board order by no desc";
$result = @mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());

$i=0;
while($row = @mysql_fetch_array($result,MYSQL_ASSOC)) {
	$responce->rows[$i]['id']=$row['no'];
	$responce->rows[$i]['cell']=array($row['no'],$row['img_name'],$row['write_date']);
	$i++;
}


echo urldecode(json_encode($responce));

// 한번 출력한 데이터는 IS_RANK_CHK값을 모두 1로 바꾼다.
// $SQL = "update C_VERY_JOB_RANK set IS_RANK_CHK = '1'";
// @mysql_query($SQL,$conn);

@mysql_close($conn);
?>