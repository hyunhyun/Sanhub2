<?
	$connect = mysql_connect("localhost","root","apmsetup");
	$mysql = mysql_select_db("db_member",$connect);

	mysql_query("set names utf8");

	if(!isset($_SESSION)){session_start();}
	include("config.php");//db php 필요 
	$id = $_POST['id'];
	$passwd = $_POST['passwd'];	
	$name = NULL;
	if(is2_passwd_correct($id,$passwd))
	{
		//$_SESSION['id'] = $id; 
		//$_SESSION['name'] = $name;
		//$_SESSION['flash'] = $name;
		//header("Location: main_board.html");
		?>
		<script language="JavaScript">
		window.alert(" 로그인에 성공 하셨습니다.");
		location.href="layout.html";/*html 추*/
		</script>
<?
		//True일 경우 세션 id,name 값 입력
	}
	else
	{
		//$_SESSION['flash'] = "로그인에 실패 하였습니다. 다시 입력하세요.";
		?><script>
		window.alert("로그인에 실패 하였습니다. 다시 입력하세요.");
		location.href="mainpage.html";
		</script><?
	}



	function is2_passwd_correct($id, $passwd) {

		$passwd_check = "SELECT * FROM friend WHERE id = '$id' AND passwd = '$passwd'";

		$result = mysql_query($passwd_check);

		if(@mysql_fetch_array($result)==0){
			return false;
		}

			return true;
	}
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