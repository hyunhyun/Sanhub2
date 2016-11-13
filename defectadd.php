<?
	include("function.php");
	if(insert_defect($_POST))
	{
		header("Location: defect.html");
	}
	else
	{
		header("Location: defectadd.html");	
	}
?>