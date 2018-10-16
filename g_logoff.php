<?php
session_start();

$_SESSION = array();
if (isset($_COOKIE["PHPSESSID"])) {
	setcookie("PHPSESSID", '', time() - 3600, '/');
}
session_destroy();
?>
<HTML>
<HEAD>
<META HTTP EQUIV='Content-Type' CONTENT='text/html;charset=UTF-8'>
<TITLE>ご利用ありがとうございました</TITLE>
</HEAD>
<BODY>
<P STYLE = 'color: red'> 愛鳥獣写真館 </P>
<P>またのご来場をお待ちしています。<BR>
<A HREF = 'g_logon.html'>再度ログオンするときはここから</A></P>
</BODY>
</HTML>