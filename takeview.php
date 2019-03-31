<?php
	$con = mysqli_connect('localhost', 'root', '', 'attendance');
	$class_id = isset($_GET['class_id'])? $_GET['class_id']:null;
	$query = '
	Select 
		student.Student_ID,  
		class.Class_ID, 
		CONCAT(student.Last_Name, " ", student.First_Name," ",student.Middle_Initial, " ", student.Name_Extension ) as Name, 
		take_attendance.Time_Stamp, 
		take_attendance.Remarks
	FROM
		student, take_attendance , class
	WHERE
		student.Student_ID = take_attendance.Student_ID AND
			take_attendance.Class_ID = class.Class_ID AND
			class.Class_ID ='. $class_id; 
	$result = mysqli_query($con, $query);



?>

<!DOCTYPE html>
<html>

<style>
body	{
	background-image: url("picture/ground.jpg");
	background-size: cover
}
</style>

<head>
	<title>Take View</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="picture/qq1.png" />
	<link href="bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/attendance.css" rel="stylesheet">
	<script src="bootstrap-3.3.7/js/jquery.min.js"></script>
	<script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src="js/attendance.js"></script>
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

    </div>
	<div class ="container">
	<table class="table">
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Class ID</th>
				<th>Name</th>
				<th>Timestamp</th> 
				<th>Remarks</th>
				
			</tr>
		</thead>
		<tbody>
			<?php
				while($row = mysqli_fetch_assoc($result)){
			?>
				<tr>
					<td><?php echo $row["Student_ID"] ?></td>
					<td><?php echo $row["Class_ID"] ?></td>
					<td><?php echo $row["Name"] ?></td>
					<td><?php echo $row["Time_Stamp"] ?></td>
					<td><?php echo $row["Remarks"] ?></td>

				</tr>

			<?php
				}
			?>
		</tbody>
	</table> 
</body>

</html>
