<?php
session_start();
?>

<HTML>
<HEAD>
<META HTTP EQUIV='Content-Type' CONTENT='text/html;charset=UTF-8'>
<TITLE>Program Portfolio</TITLE>
<BODY>
<P STYLE='color: red'> Program Portfolio　</P>

<?php
if (isset($_SESSION['us']) && $_SESSION['us'] !=null){
?>

<P>投稿よろしくお願いします!</P>
<FORM ENCTYPE = 'multipart/form-data' ACTION = 'g_up_set.php' METHOD = 'post'>
	名前<BR>
	<INPUT TYPE='text' NAME='myn'><BR>
	メッセージ<BR>
	<TEXTAREA NAME='mym' ROWS='10' COLS=70'></TEXTAREA><BR>
	<INPUT TYPE = 'file' NAME='myf'>
	<P>>送信できるのは1MBまでのJPEG画像だけです!<BR>
	また展開後のメモリ消費が多い場合アップロードできます。</P>
	<INPUT TYPE='submit' VALUE='送信'>
</FORM>
<P><A HREF=g.php>一覧表示へ</A></P>

<?php
}else{
	session_destroy();
	print "<P>ログオンしてください!<BR>
			<A HREF='g_logon.html'>ログオン</A></P>";
}
?>
</BODY>
</HTML>