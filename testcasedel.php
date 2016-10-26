<?
	include("function.php");
	if(delete_testcase($_REQUEST['title']))
	{
		header("Location: testcase.html");
	}
	else
	{
		header("Location: testcasemod.html");	
	}
?>