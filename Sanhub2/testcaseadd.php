<?
	include("function.php");
	if(insert_testcase($_POST))
	{
		header("Location: testcase.html");
	}
	else
	{
		header("Location: testcaseadd.html");	
	}
?>