<?
	$db = new PDO("mysql:dbname=db_ftm;host=localhost", "root", "apmsetup");

	function show_testcase_contents()
	{
		global $db;
		$query = "select * from testcase";

		$rows = $db->query($query);
		if($rows->rowCount())
		{
			for($i = 0; $i < $rows->rowCount(); $i++)
			{
				$row = $rows->fetch();
				?>
				<div class="contents">
					<ul>
						<li class="contents-item"><input type="radio" name="title" value=<?=$row['title']?>></li>
						<li class="contents-item"><a href=testcaseshow.html?title=<?=$row['title']?>><?=$row['title']?></a></li>
						<li class="contents-item"><?=$row['id']?></li>
						<li class="contents-item"><?=$row['writer']?></li>
						<li class="contents-item"><?=$row['due']?></li>
						<li class="contents-item"><?=$row['result']?></li>
						<li class="contents-item"><?=$row['date']?></li>
					</ul>
				</div>
			<?
			}
		}
	}

	function show_testcase($title)
	{
		global $db;
		$title = $db->quote($title);

		$query = "select * from testcase where title = $title";
		$rows = $db->query($query);
		
		if($rows->rowCount())
		{
			$row = $rows->fetch();
			?>
			<div class="right-wrapper">
				테스트케이스 제목 : <?=$row['title']?> 
				<br><br>
				아이디 : <?=$row['id']?>
				<br><br>
				담당자 : <?=$row['writer']?>
				<br><br>
				기&nbsp;&nbsp;&nbsp;한 : <?=$row['due']?>
				<br><br>
				실행결과 : <?=$row['result']?>
				<br><br>
				사전조건 : <textarea rows=5 cols=50><?=$row['antecedentcondition']?></textarea>
				<br><br>
				테스트데이터 : <textarea rows=5 cols=50><?=$row['testdata']?></textarea>
				<br><br>
				실행절차 : <textarea rows=5 cols=50><?=$row['executionprocedure']?></textarea>
				<br><br>
				예상결과 : <textarea rows=5 cols=50><?=$row['expectedresult']?></textarea>
				<br><br>
				비&nbsp;&nbsp;&nbsp;고 : <textarea rows=5 cols=50><?=$row['note']?></textarea>
				<br><br>
				<a href="testcase.html"><input type="button" value="닫기" style="width : 70px; height : 25px"></a>
			</div>
		<?
		}	
	}

	function insert_testcase($POST)
	{
		global $db;
		$title = $db->quote($POST['title']);
		$id = $db->quote($POST['id']);
		$writer = $db->quote($POST['writer']);
		$due = $db->quote($POST['due']);
		$result = $db->quote($POST['result']);
		$date = $db->quote($POST['date']);
		$antecedentcondition = $db->quote($POST['antecedentcondition']);
		$testdata = $db->quote($POST['testdata']);
		$executionprocedure = $db->quote($POST['executionprocedure']);
		$expectedresult = $db->quote($POST['expectedresult']);
		$note = $db->quote($POST['note']);
		
		$query = "insert into testcase (title, id, writer, due, result, date, antecedentcondition, testdata, executionprocedure, expectedresult, note)";
		$query.= "values ($title, $id, $writer, $due, $result, $date, $antecedentcondition, $testdata, $executionprocedure, $expectedresult, $note)";
		$result = $db->exec($query);

		if(!$result)
		{
			return false;
		}
		else
		{	
			return true;
		}
	}

	function modify_testcase($POST)
	{
		global $db;
		$otitle = $db->quote($POST['otitle']);
		$title = $db->quote($POST['title']);
		$id = $db->quote($POST['id']);
		$writer = $db->quote($POST['writer']);
		$due = $db->quote($POST['due']);
		$result = $db->quote($POST['result']);
		$date = $db->quote($POST['date']);
		$antecedentcondition = $db->quote($POST['antecedentcondition']);
		$testdata = $db->quote($POST['testdata']);
		$executionprocedure = $db->quote($POST['executionprocedure']);
		$expectedresult = $db->quote($POST['expectedresult']);
		$note = $db->quote($POST['note']);

		$query = "update testcase set title = $title, id = $id, writer = $writer, due = $due, result = $result, date = $date, antecedentcondition = $antecedentcondition, testdata = $testdata, executionprocedure = $executionprocedure, expectedresult = $expectedresult, note = $note where title = $otitle";
		$result = $db->exec($query);

		if(!$result)
		{
			return false;
		}
		else
		{	
			return ture;
		}	
	}

	function delete_testcase($title)
	{
		global $db;
		$title = $db->quote($title);

		$query = "delete from testcase where title = $title";
		$result = $db->query($query);
		
		if(!$result)
		{
			return false;
		}
		else
		{	
			return ture;
		}	
	}

	function show_defect_contents()
	{
		global $db;
		$query = "select * from defect";

		$rows = $db->query($query);
		if($rows->rowCount())
		{
			for($i = 0; $i < $rows->rowCount(); $i++)
			{
				$row = $rows->fetch();
				?>
				<div class="contents">
					<ul>
						<li class="contents-item"><input type="radio" name="title" value=<?=$row['title']?>></li>
						<li class="contents-item"><a href=defectshow.html?title=<?=$row['title']?>><?=$row['title']?></a></li>
						<li class="contents-item"><?=$row['id']?></li>
						<li class="contents-item"><?=$row['tc']?></li>
						<li class="contents-item"><?=$row['writer']?></li>
					</ul>
				</div>
			<?
			}
		}
	}

	function show_defect($title)
	{
		global $db;
		$title = $db->quote($title);

		$query = "select * from defect where title = $title";
		$rows = $db->query($query);
		
		if($rows->rowCount())
		{
			$row = $rows->fetch();
			?>
			<div class="right-wrapper">
				결함 제목 : <?=$row['title']?> 
				<br><br>
				아이디 : <?=$row['id']?>
				<br><br>
				테스트케이스 : <?=$row['tc']?>
				<br><br>
				담당자 : <?=$row['writer']?>
				<br><br>
				<a href="defect.html"><input type="button" value="닫기" style="width : 70px; height : 25px"></a>
			</div>
		<?
		}	
	}

	function insert_defect($POST)
	{
		global $db;
		$title = $db->quote($POST['title']);
		$id = $db->quote($POST['id']);
		$tc = $db->quote($POST['tc']);
		$writer = $db->quote($POST['writer']);
				
		$query = "insert into defect (title, id, tc, writer)";
		$query.= "values ($title, $id, $tc, $writer)";
		$result = $db->exec($query);

		if(!$result)
		{
			return false;
		}
		else
		{	
			return true;
		}
	}

	
?>