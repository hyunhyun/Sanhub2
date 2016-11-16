<?
	include("function.php");
	if(modify_defect($_POST))
	{
		header("Location: defect.html");
	}
	else
	{
		header("Location: defectmod.html");	
	}
?>