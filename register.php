<?
	include("config.php"); 
	$id = $_POST["id"];
	$passwd = $_POST["passwd"];
	$name = $_POST["name"];
	
	echo "test";

	echo $id;
	echo $passwd;
	echo $name;
	?>
	<?
	
	
	$check = "SELECT id from friend where id = '$id';";	
	$result = mysql_query($check);
	mysql_set_charset('utf8');

	
	
	if(@mysql_fetch_array($result)==0){
		$sql = "insert into friend( id, passwd, name)";
		$sql.=" values ('$id','$passwd','$name')";

		$result = mysql_query($sql); 
		if(!$result)
		{?>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			</head>
			<script>
		    alert("회원가입 실패하였습니다");	
		    document.location.href="register.html";
		</script>	
			<?
		}
		else
		{
?>
	  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  </head>
      <script>
      alert("회원가입 되었습니다.");
      document.location.href="mainpage.html";
      </script>
      <?      
   }
   }
   else{?>
	  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  </head>
      <script>
      alert("중복 아이디가 있습니다.");
      document.location.href="register.html";
   </script>
   <?}


   
   
?>