<?php

	session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'attendance') or die(mysqli($mysqli));
	
	$Student_ID= 0;
	$update = false;
	$Student_ID= '';
	$Class_ID = '';
	$Last_Name = '';
	$Middle_Initial = '';
	
	
	if (isset($_POST['take_attendance'])) {
		$Student_ID = $_POST['Student_ID'];
		$Class_ID = $_POST['Class_ID'];
		$Last_Name= $_POST['Last_Name'];
		$Middle_Initial = $_POST['Middle_Initial'];
		$mysqli->query("INSERT INTO take_attendance (Student_ID, Class_ID, Last_Name, Middle_Initial) VALUES('$Student_ID', '$Class_ID', '$Last_Name', '$Middle_Initial')") or die($mysqli->error);
		header("location: takeview.php");
	}
	if (isset($_GET['delete'])) {
		$Student_ID = $_GET['delete'];
		$mysqli->query("DELETE FROM take_attendance WHERE Student_ID=$Student_ID") or die($mysqli->error());
		header("location: takeview.php");
	}
	
	if (isset($_GET['edit'])) {
		$Student_ID = $_GET['edit'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM take_attendance WHERE Student_ID=$Student_ID") or die($mysqli->error());
		if (@count($result)==1) {
		$row = $result->fetch_array();
		$Student_ID = $row['Student_ID'];
		$Class_ID = $row['Class_ID'];
		$Last_Name=  $row['Last_Name'];
		$Middle_Initial =  $row['Middle_Initial'];
		}
	}
	
	if (isset($_POST['update'])) {
		$Student_ID = $_POST['Student_ID'];
		$Class_ID = $_POST['Class_ID'];
		$Last_Name= $_POST['Last_Name'];
		$Middle_Initial = $_POST['Middle_Initial'];
		$Name_Extension = $_POST['Name_Extension'];
		$mysqli->query("UPDATE take_attendance SET Student_ID='$Student_ID', Class_ID='$Class_ID', Last_Name='$Last_Name', Middle_Initial='$Middle_Initial' WHERE Student_ID=$Student_ID") or die($mysqli->error);
		header("location: takeview.php");
	}



?>