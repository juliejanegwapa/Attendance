<?php

	session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'attendance') or die(mysqli($mysqli));
	
	$Student_ID= 0;
	$update = false;
	$Class_ID = '';
	
	
	if (isset($_POST['studentclass'])) {
		$Student_ID = $_POST['Student_ID'];
		$Class_ID = $_POST['Class_ID'];
		
		$mysqli->query("INSERT INTO student_class (Student_ID, Class_ID) VALUES('$Student_ID', '$Class_ID')") or die($mysqli->error);
		header("location:scview.php");
	}
	if (isset($_GET['delete'])) {
		$number = $_GET['delete'];
		$mysqli->query("DELETE FROM student_class WHERE number=$number") or die($mysqli->error());
		header("location: scview.php");
	}
	if (isset($_POST['add'])) {
		$Student_ID = $_POST['Student_ID'];
		$Class_ID = $_POST['Class_ID'];
		$mysqli->query("INSERT INTO student_class (Student_ID, Class_ID) VALUES('$Student_ID', '$Class_ID')") or die($mysqli->error);
		header("location: scview.php");
	}
	if (isset($_GET['edit'])) {
		$Student_ID = $_GET['edit'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM student_class WHERE Student_ID=$Student_ID") or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$Student_ID = $row['Student_ID'];
			$Class_ID = $row['Class_ID'];
			
		}
	}
	if (isset($_POST['update'])) {
		$Student_ID = $_POST['Student_ID'];
		$Class_ID= $_POST['Class_ID'];

		
		$mysqli->query("UPDATE student_class SET Student_ID='$Student_ID', Class_ID='$Class_ID' WHERE Student_ID=$Student_ID") or die($mysqli->error);
		header("location: scview.php");
	}
?>