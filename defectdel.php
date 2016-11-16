<?
	include("function.php");
	if(delete_defect($_REQUEST['title']))
	{
		header("Location: defect.html");
	}
	else
	{
		header("Location: defectmod.html");	
	}
?>