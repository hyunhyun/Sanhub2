<?
	include("function.php");

	if(add_defect($_POST))
	{
		header("Location: defect.html");
	}
	else
	{
		header("Location: defect.html");	
	}

?>

