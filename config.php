<?
$connect = mysql_connect("localhost","root","apmsetup");
$mysql = mysql_select_db("db_member",$connect);

mysql_query("set names utf8");

function is_passwd_correct($id, $passwd, &$name){
    	global $db;
    
        $id = $db->quote($id);
        $passwd = $db->quote($passwd);
    	$query = "SELECT name FROM friend WHERE id = $id and passwd = $passwd;";
    	$rows= $db->query($query);
    	if($rows->rowCount()) {
    		$row = $rows->fetch();
    		$name = $row[0];
    		return TRUE;
    	} else {
    		return FALSE; #user not found
    	}
}
function ensure_logged_in(){
	if(!isset($_SESSION['id'])){ //$_SESSION['id']값이 존재 하지 않을때, isset은 값이 존재하는지 체크하는 함수 
		?>
		<script language="JavaScript">
		window.alert("로그인하셔야 이용 가능합니다.")
		location.href="mainpage.html";
		</script>
	<?
	$_SESSION['flash'] = "테스트는 로그인후 이용가능합니다."; //header("Location: mainpage.html"); -->isset은 변수가 존재하면 TRUE 존재하지 않으면 FALSE.

	}
}
?>


