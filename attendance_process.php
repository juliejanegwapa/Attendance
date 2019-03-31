

<?php 
	
	$con = mysqli_connect('localhost', 'root', '', 'attendance');


	if(isset($_POST['save_attendance']))
	{
		
		$studID_and_Status = $_POST['studID_and_Status']; 
		$class_id = $_POST['class_id'];
		$time = $_POST['time']; 
		$query = "INSERT INTO `take_attendance` (`Student_ID`, `Class_ID`, `Time_Stamp`, `Remarks`) VALUES ('0909', '6', '1412', 'dfadfad')";

		for($i=0; $i< sizeof($studID_and_Status); $i++)
		{  
			if(mysqli_query($con,"INSERT INTO `take_attendance` (`Student_ID`, `Class_ID`, `Time_Stamp`, `Remarks`) VALUES ('" . $studID_and_Status[$i][1] . "'  , '". $class_id  ."', '$time', '". $studID_and_Status[$i][0]."')"))
			{
				$message = "Successfully Added";
			}
			else
			{
				$message = "Error when adding record";
				break;
			}
		}

		echo json_encode($message);
	} 