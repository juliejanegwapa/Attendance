<?php

	session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'attendance') or die(mysqli($mysqli));
	
	$Student_ID= 0;
	$update = false;
	$Student_ID= '';
	$First_Name = '';
	$Last_Name = '';
	$Middle_Initial = '';
	$Name_Extension = '';
	
	
	if (isset($_POST['student'])) {
		$Student_ID = $_POST['Student_ID'];
		$First_Name = $_POST['First_Name'];
		$Last_Name= $_POST['Last_Name'];
		$Middle_Initial = $_POST['Middle_Initial'];
		$Name_Extension = $_POST['Name_Extension'];

		
		$mysqli->query("INSERT INTO student (Student_ID, First_Name, Last_Name, Middle_Initial, Name_Extension) VALUES('$Student_ID', '$First_Name', '$Last_Name', '$Middle_Initial', '$Name_Extention')") or die($mysqli->error);
		header("location: cview.php");
	}
	if (isset($_GET['delete'])) {
		$Student_ID = $_GET['delete'];
		$mysqli->query("DELETE FROM student WHERE Student_ID=$Student_ID") or die($mysqli->error());
		header("location: cview.php");
	}
	
	if (isset($_GET['edit'])) {
		$Student_ID = $_GET['edit'];
		$update = true;
		$result = $mysqli->query("SELECT * FROM student WHERE Student_ID=$Student_ID") or die($mysqli->error());
		if (@count($result)==1) {
		$row = $result->fetch_array();
		$Student_ID = $row['Student_ID'];
		$First_Name = $row['First_Name'];
		$Last_Name=  $row['Last_Name'];
		$Middle_Initial =  $row['Middle_Initial'];
		$Name_Extension =  $row['Name_Extension'];
		}
	}
	
	if (isset($_POST['update'])) {
		$Student_ID = $_POST['Student_ID'];
		$First_Name = $_POST['First_Name'];
		$Last_Name= $_POST['Last_Name'];
		$Middle_Initial = $_POST['Middle_Initial'];
		$Name_Extension = $_POST['Name_Extension'];
		
		$mysqli->query("UPDATE student SET Student_ID='$Student_ID', First_Name='$First_Name', Last_Name='$Last_Name', Middle_Initial='$Middle_Initial', Name_Extension='$Name_Extension' WHERE Student_ID=$Student_ID") or die($mysqli->error);
		header("location: cview.php");
	}



?>