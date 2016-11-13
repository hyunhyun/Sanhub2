<?
	include("function.php");
	if(insert_project($_POST))
	{
		header("Location: prorjectdash1.html");
	}
	else
	{
		header("Location: prorjectdash1.html");	
	}
?>