<?
	include("function.php");

	if(insert_testcase($_POST))
	{
		header("Location: defect1.html");
	}
	else
	{
		header("Location: defect2.html");	
	}

?>

