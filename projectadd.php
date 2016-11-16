<?
	include("function.php");
	if(insert_project($_POST))
	{
		header("Location: projectdash1.html");
	}
	else
	{
		header("Location: projectdash1.html");	
	}
?>