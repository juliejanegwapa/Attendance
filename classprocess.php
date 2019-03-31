<?php

	session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'attendance') or die(mysqli($mysqli));
	
	$Class_ID= 0;
	$update = false;
	$Class_ID = '';
	$Section= '';
	$Subject_Code = '';
	$Semester = '';
	$Academic_Year = '';
	$Schedule_Day = '';
	$Schedule_Time = '';
	
	
	if (isset($_POST['class'])) {
		$Section = $_POST['Section'];
		$Subject_Code = $_POST['Subject_Code'];
		$Semester= $_POST['Semester'];
		$Academic_Year = $_POST['Academic_Year'];
		$Schedule_Day = $_POST['Schedule_Day'];
		$Schedule_Time = $_POST['Schedule_Time'];

		
		$mysqli->query("INSERT INTO class (Section, Subject_Code, Semester, Academic_Year, Schedule_Day, Schedule_Time) VALUES('$Section', '$Subject_Code', '$Semester', '$Academic_Year', '$Schedule_Day', '$Schedule_Time')") or die($mysqli->error);
		header("location: classview.php");
	}
	if (isset($_GET['delete'])) {
		$Class_ID = $_GET['delete'];
		$mysqli->query("DELETE FROM class WHERE Class_ID=$Class_ID") or die($mysqli->error);
		header("location: classview.php");
	}
	
	if (isset($_GET['edit'])) {
		$Class_ID = $_GET['edit'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM class WHERE Class_ID=$Class_ID") or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$Class_ID = $row['Class_ID'];
			$Section = $row['Section'];
			$Subject_Code = $row['Subject_Code'];
			$Semester = $row['Semester'];
			$Academic_Year = $row['Academic_Year'];
			$Schedule_Day = $row['Schedule_Day'];
			$Schedule_Time = $row['Schedule_Time'];
			
		}
	}
	
	if (isset($_POST['update'])) {
		$Class_ID = $_POST['Class_ID'];
		$Section = $_POST['Section'];
		$Subject_Code = $_POST['Subject_Code'];
		$Semester= $_POST['Semester'];
		$Academic_Year = $_POST['Academic_Year'];
		$Schedule_Day = $_POST['Schedule_Day'];
		$Schedule_Time = $_POST['Schedule_Time'];
		
		$mysqli->query("UPDATE class SET Class_ID='$Class_ID', Section='$Section', Subject_Code='$Subject_Code', Academic_Year='$Academic_Year', Schedule_Day='$Schedule_Day', Schedule_Time='$Schedule_Time' WHERE Class_ID='$Class_ID'") or die($mysqli->error);
		header("location: classview.php");
	}



?>