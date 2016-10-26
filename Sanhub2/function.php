<?
	$db = new PDO("mysql:dbname=db_ftm;host=localhost", "root", "apmsetup");

	

		function show_contents()
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
				테스트케이스 이름 : <?=$row['title']?> 
				<br><br>
				아이디 : <?=$row['id']?>
				<br><br>
				작성자 : <?=$row['writer']?>
				<br><br>
				작성일 : <?=$row['date']?>
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
		$date = $db->quote($POST['date']);
		
		$query = "insert into testcase (title, id, writer, date)";
		$query.= "values ($title, $id, $writer, $date)";
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
		$date = $db->quote($POST['date']);

		$query = "update testcase set title = $title, id = $id, writer = $writer, date = $date where title = $otitle";
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


	function show_contents_defect()
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
						<li class="contents-item"><?=$row['project']?></a></li>
						<li class="contents-item"><?=$row['defectname']?></li>
						<li class="contents-item"><?=$row['content']?></li>
						<li class="contents-item"><?=$row['severity']?></li>
						<li class="contents-item"><?=$row['frequency']?></li>
						<li class="contents-item"><?=$row['date']?></li>
					</ul>
				</div>
			<?
			}
		}
	}

	function show_defect($project)
	{
		global $db;
		$title = $db->quote($project);

		$query = "select * from defect where project = $project";
		$rows = $db->query($query);
		$result[$db->rowCount($rows)][7];

		$i = 0;
		if($rows->rowCount())
		{
			$row = $rows->fetch();
			
			$result[i] = array('project'=>$row['project'] ,'defectname' =>$row['defectname'],'content'=>$row['content'],
				'severity'=>$row['severity'], 'frequency'=>$row['frequency'], 'testcaseid'=>$row['testcaseid'], 'status'=>$row['status']);

			?>	<div class="right-show-defect">
				결함 이름 : <?=$row['defectname']?> 
				<br><br>
				project : <?=$row['project']?>
				<br><br>
				content : <?=$row['content']?>
				<br><br>
				status : <?=$row['status']?>
				<br><br>
			</div>
			<?
		}	
	}


 function add_defect($POST){
	global $db;
	
		$project = $db->quote($POST['project']);
		$defectname = $db->quote($POST['defectname']);
		$content = $db->quote($POST['content']);
		$severity = $db->quote($POST['severity']);
		$frequency = $db->quote($POST['frequency']);
		$testcaseid = $db->quote($POST['testcaseid']);
		$status = $db->quote($POST['status']);

		$query ="insert into defect (project, defectname, content, severity, frequency, testcaseid, status)";
		$query.="values ($project, $defectname, $content, $severity, $frequency, $testcaseid, $status)";
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