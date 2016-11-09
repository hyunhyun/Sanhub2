<? 
	if(!isset($SESSION))session_start();
	session_destroy();
	session_regenerate_id(TRUE);
	session_start();
	$_SESSION['flash'] = "성공적으로 로그아웃 되었습니다.";
	header("Location: mainpage.html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
</head>
<body>
</body>
</html>