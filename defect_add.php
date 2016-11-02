<?
	include("function.php");

	if(insert_testcase($_POST))
	{
		header("Location: defect.html");
	}
	else
	{
		header("Location: defect.html");	
	}

?>

