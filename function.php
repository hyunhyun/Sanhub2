<?
	$db = new PDO("mysql:dbname=db_ftm;host=localhost", "root", "apmsetup");

	function layout_list(){
		global $db;
		$query = "select * from project";
		$rows = $db->query($query);
		if($rows->rowCount())
		{
			for($i = 0; $i < $rows->rowCount(); $i++)
			{
				$row = $rows->fetch();
				?>
		
		 <li class="project"><a href="#" onclick="openlist('left-inside-projects')"><?=$row['projectname']?></a></li>
          <ul id = "left-inside-projects" style="display: none;">
          <li a href="#" onclick="openlist('left-testcase')">testcase</a></li>
          <ul id="left-testcase" style="display: block;">
          <li>a test</li>
          <li>b test</li>
          </ul>
          <li a href="#" onclick="openlist('left-defect')">Defect</a></li>
          <ul id="left-defect">
          <li>defect1</li>
          </ul>
           <li a href="#" onclick="openlist('left-report')">Report</a></li>
          <ul id="left-report">
          <li>report1</li>
          </ul> </ul>
          </li>
          
  <?    
}
	}
}

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
	function modify_defect($POST)
	{
		global $db;
		$otitle = $db->quote($POST['otitle']);
		$title = $db->quote($POST['title']);
		$id = $db->quote($POST['id']);
		$tc = $db->quote($POST['tc']);
		$writer = $db->quote($POST['writer']);
				
		$query = "update defect set title = $title, id = $id, tc = $tc, writer = $writer where title = $otitle";
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
	function delete_defect($title)
	{
		global $db;
		$title = $db->quote($title);
		$query = "delete from defect where title = $title";
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

	function show_projects()
	{
		global $db;
		$query = "select * from project";

		$rows = $db->query($query);
		if($rows->rowCount())
		{
			for($i = 0; $i < $rows->rowCount(); $i++)
			{
				$row = $rows->fetch();
				?>
				<div class="contents">
					<ul>
						<li class="contents-item-project"><?=$row['projectname']?></li>
						<li class="contents-item-project"><?=$row['defectnumber']?></a></li>
						<li class="contents-item-project"><?=$row['finisheddefect']?></li>
						<li class="contents-item-project"><?=$row['contributors']?></li>
						<li class="contents-item-project"><?=$row['startdate']?></li>
						<li class="contents-item-project"><?=$row['enddate']?></li>
						<li class="contents-item-project"><?=$row['writer']?></li>
					</ul>
				</div>
			<?
			}
		}
	}


	function insert_project($POST)
	{
		global $db;
		$projectname = $db->quote($POST['projectname']);
		// $defectnumber = $db->quote($POST['defectnumber']);
		// $finisheddefect = $db->quote($POST['finisheddefect']);
		$contributors = $db->quote($POST['contributors']);
		$startdate = $db->quote($POST['startdate']);
		$enddate = $db->quote($POST['enddate']);
		$writer = $db->quote($POST['writer']);



		$query = "insert into project (projectname, defectnumber, finisheddefect, contributors, startdate, enddate, writer)";
		$query.= "values ($projectname, 0, 0, $contributors, $startdate, $enddate, $writer)";
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

	function modify_project($POST)
	{
		global $db;
	    
	   	$oprojectname = $db->quote($POST['oprojectname']);
	    $projectname = $db->quote($POST['projectname']);
		// $defectnumber = $db->quote($POST['defectnumber']);
		// $finisheddefect = $db->quote($POST['finisheddefect']);
		$contributors = $db->quote($POST['contributors']);
		$startdate = $db->quote($POST['startdate']);
		$enddate = $db->quote($POST['enddate']);
		$writer = $db->quote($POST['writer']);

		$query = "update project set projectname = $projectname, contributors = $contributors, startdate = $startdate, ";
		$query .= "enddate = $enddate, writer = $writer where projectname = $oprojectname";
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

	function delete_project($POST)
	{
		global $db;
		$projectname = $db->quote($POST['projectname']);

		$query = "delete from project where projectname = $projectname";
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

?>