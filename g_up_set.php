<?php
session_start();
?>

<HTML>
<HEAD>
<META HTTP EQUIV='Content-Type' CONTENT='text/html;charset=UTF-8'>
<TITLE>Program Portfolio</TITLE>
<BODY>

<?php
if (isset($_SESSION['us']) && $_SESSION['us'] !=null){
	$file = $_FILES['myf'];
	
	if ($_POST['myn'] <> "" && $_POST['mym'] <> "" && $file['size'] > 0
		&& ($file['type'] == 'image/jpeg' ||
			$file['type'] == 'image/pjpeg')
		&& (strtolower(mb_strrchr($file['name'], '.', FALSE)) == ".jpg")){
		
		if ($file['size'] > 1024*1024){
			unlink($file['tmp_name']);
?>
<P></P>
<p></P>

<?php
		}else{
			// 
			$ima = date('YmdHis');
			$fn = $ima . $file['name'];
			move_uploaded_file($file['tmp_name'], './gz_img/'.$fn);
			
			$my_nam = htmlspecialchars($_POST['myn'],ENT_QUOTES);
			$my_mes = htmlspecialchars($_POST['mym'],ENT_QUOTES);
			
			// 
			$motogazo = imagecreatefromjpeg("./gz_img/$fn");
			list($w, $h) = getimagesize("./gz_img/$fn");
			$new_h = 200;
			$new_w = $w * 200 / $h;
			$mythumb = imagecreatetruecolor($new_w, $new_h);
			imagecopyresized($mythumb, $motogazo, 0, 0, 0, 0, $new_w,$new_h,$w,$h);
			imagejpeg($mythumb, "./gz_img/thumb_$fn");
			
			// 
			print "<P>" . $file['name'] . "のアップロードに成功!<BR>
					<IMG SRC='./gz_img/thumb_$fn'></P>";
			
			// 
			require_once("db_init.php");
			
			$ps = $db->prepare("INSERT INTO table1 (nam,mes,ope,gaz,dat) VALUES (:v_n,:v_m,1,:v_g,:v_d)");
			$ps->bindParam(':v_n', $my_nam);
			$ps->bindParam(':v_m', $my_mes);
			$ps->bindParam(':v_g', $fn);
			$ps->bindParam(':v_d', $ima);
			$ps->execute();
			print "<A HREF=g.php>一覧表示へ</A>";
		}
		}else{
?>
<P><BR>
<A HREF='g_up.php'>再度アップロード</A></P>
<?php
	}
}else{
	session_destroy();
	print "<P>ちゃんとログオフしてね!<BR>
			<A HREF='g_logon.html'>ログオン</A></P>";
}
?>
</BODY>
</HTML>