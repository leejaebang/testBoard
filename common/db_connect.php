<?php
include 'db_config.php';

$conn = @mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die("Connection Error: " . @mysql_error());
@mysql_select_db(DB_NAME) or die("Error connecting to db.");
//echo $conn;
?>