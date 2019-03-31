<?php
$con = mysqli_connect('localhost', 'root', '', 'attendance');
$class_id = isset($_GET['class_id']) ?  $_GET['class_id'] : null;
?>

<!DOCTYPE html>

<html>
	<head>
	<title>Class View</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="picture/qq1.png" /> <link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/attendance.css" rel="stylesheet">
	
	<style>
		body	
		{
			background-image: url("picture/web.jpg");
			background-size: cover
		}
	</style>
</head>
<body>
   <div id="wrapper">
		
       <!-- Sidebar -->
				<div id="sidebar-wrapper">
			<ul class="sidebar-nav">
				<li class="sidebar-brand">
					<img src="picture/attendance.jpg" />
				</li>
				<br>
				<li>
					<a href="home.php" title="Home"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
				</li>
				<li>
					<a href="classview.php" title="Class"><span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Class</a>
				</li>
				<li>
					<a href="subview.php" title="Subject"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject</a>
				</li>
				<li>
					<a href="cview.php" title="Student"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student</a>
				</li>
				<li>
					<a href="scview.php" title="Student Class"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Class</a>
				</li>
				<li>
					<a href="take_attendance.php" title="Take Attendance"><span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;take Attendance</a>
				</li>
				<li>
					<a href="general.php" title="General Reports"><span class="glyphicon glyphicon-folder-close"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;General Reports</a>
				</li>
				<li>
					<a href="about.php" title="About"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About</a>
				</li>
				
			</ul>
		</div>
		

		
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
				<!-- Menu -->
				<nav class="navbar navbar-green">
					<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="glyphicon glyphicon-menu-hamburger"></span>
							<span class="icon-bar"></span>                       
							</button>
							<a class="navbar-brand" onclick="openNav()"><span  class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;Mobile Attendance</a>
							
							
					</div>
					
					</div>
				</nav>

				
			</div>
        </div>
	<div class="container">
	
		<button type="button" class="btn btn-primary" id="save_attendance">Save Attendance</button> 
		<input type="hidden" id="class_id" value="<?php echo isset($_GET['class_id']) ? $_GET['class_id'] : null?>">
		<div class="form-group">
			<label for="time">Time</label>
			<input type="text" class="form-control" id="time">
		</div>
		<table  class="table">
			<tr>
			  <th>Student ID</th>
			  <th>Last Name</th>
			  <th>First Name</th>
			  <th>Middle Initial</th>
			  <th>Name Extension</th> 
			  <th>Status</th>
			</tr>
			<?php
			$code = $_GET['class_id'];
			$query = "
				SELECT
					student.Student_ID, 
					student.Last_Name, 
					student.First_Name,
					student.Middle_Initial , 
					student.Name_Extension 
				FROM 
					class,
					student_class, 
					student 
			WHERE
				class.Class_ID = student_class.Class_ID and 
				student_class.Student_ID = student.Student_ID AND
				class.Class_ID = " . $class_id;
			$result = mysqli_query ($con,$query);
			while($row = mysqli_fetch_array($result))
			{
			?>
			<tr>
				<td><?php echo $row['Student_ID'];?></td>
				<td><?php echo $row['First_Name'];?></td>
				<td><?php echo $row['Last_Name'];?></td>
				<td><?php echo $row['Middle_Initial'];?></td>
				<td><?php echo $row['Name_Extension'];?></td>
				<td>
					<label class="radio-inline">
						<input class="fornm-control" type="radio" id="Present" value="<?php echo $row['Student_ID'];  ?>" name="<?php echo $row['Student_ID'];  ?>" /> Present 
					</label>
					<label class="radio-inline">
						<input class="fornm-control" type="radio" id="Absent"  value="<?php echo $row['Student_ID'];  ?>" name="<?php echo $row['Student_ID'];  ?>" />Absent 
					</label>
					<label class="radio-inline">
						<input class="fornm-control" type="radio" id="Late"  value="<?php echo $row['Student_ID'];  ?>" name="<?php echo $row['Student_ID'];  ?>" />Late 
					</label>
					<label class="radio-inline">
						<input class="fornm-control" type="radio" id="Excuse"  value="<?php echo $row['Student_ID'];  ?>" name="<?php echo $row['Student_ID'];  ?>" />Excuse 
					</label> 
				</td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
	<script src="bootstrap-3.3.7/js/jquery.min.js"></script>
	<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src="js/attendance.js"></script>
	<script  src="jquery-3.3.1.min.js"></script>

	<script>
	
	$( 'document' ).ready(function() { 

		$('#save_attendance').click(function(){ 
			var selected=[];
			var current= 0;
			$('input[type="radio"]:checked').each(function(){
				selected[current]=[$(this).attr('id'), $(this).val() ];
				current++;
			});  

			var class_id = $('#class_id').val();
			var time = $('#time').val();   
			
			$.ajax({
			  url: 'attendance_process.php',
			  type: 'POST',
			  data:{
				'save_attendance':1,
				'studID_and_Status':selected,
				'class_id':class_id,
				'time':time
			  },
			  async: true,
			  dataType: 'JSON',
			  success: function(response,data){
					window.location.replace('takeview.php?class_id=' + class_id)
			  }, 
			  error: function(xhr, textStatus, error){
					console.info(xhr.responseText);
			  }

			});
		});
	});
	</script>
</body>
</html>