<?php
$db = new pdo("mysql:host=localhost;dbname=db","root","1234");
$db->query("INSERT INTO table2 (id,pas,name)
			VALUES ('admin', md5('himitunopass'), 'nisizawa')");
$db->query("INSERT INTO table2 (id,pas,name)
			VALUES ('admin', md5('inupass'), 'dog')");
$db->query("INSERT INTO table2 (id,pas,name)
			VALUES ('admin', md5('nekopass'), 'cat')");
$db->query("INSERT INTO table2 (id,pas,name)
			VALUES ('admin', md5('usagipass'), 'rabbit')");
print "<P>table2にユーザーを作成</P>";
?>
			
			