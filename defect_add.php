<?
	include("function.php");

	// if(!is_null($_POST)){
	$check =  add_defect($_POST);
	
	if($check){
		header("Location: defect1.html");
	}
	else {?>
		<p>insert 안됨<p> 
	<?}

	// }
?>

