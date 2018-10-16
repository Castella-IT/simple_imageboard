<?php
require_once("./gz_data/gz_db_info.php");
$dsn = "mysql:host = $SERV; dbname = $DBNM";
$db = new PDO($dsn, $USER, $PASS);
?>