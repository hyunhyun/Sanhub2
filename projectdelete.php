<?
	include("function.php");
	if(delete_project($_POST))
	{
		header("Location: projectdash1.html");
	}
	else
	{
		header("Location: projectdash1.html");	
	}
?>