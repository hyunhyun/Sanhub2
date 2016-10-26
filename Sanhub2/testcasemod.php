<?
	include("function.php");
	if(modify_testcase($_POST))
	{
		header("Location: testcase.html");
	}
	else
	{
		header("Location: testcasemod.html");	
	}
?>