<?
$mydb = mysql_connect("localhost","root","apmsetup");
    if($mydb) {
        mysql_select_db('db_member', $mydb);   
        mysql_query("set names utf8"); 
        mysql_query("set session character_set_connection=utf8;");
        mysql_query("set session character_set_results=utf8;");
        mysql_query("set session character_set_client=utf8;");
    } else {
        printf("실패");
    }
$db = new PDO("mysql:host=localhost;dbname=db_member","root","apmsetup",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

function is_passwd_correct($id,$passwd,&$name){
	global $db;

	$query = "select passwd from friend where id = $id";	
	$id = $db ->query($query);
	if($rows->filepro_rowcount()){
		$row = $rows->fetch();
		$name = $row[0];
		return TRUE;
	}else {
		return FALSE; //user not found 
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
