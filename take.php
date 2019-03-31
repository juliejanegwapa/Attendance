<?php
	$code = $_GET['class'];
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		// search in all table columns
		// using concat mysql function

		$query = "SELECT * FROM `student` WHERE CONCAT(`Student_ID`, `First_Name`, `Last_Name`, `Middle_Initial`, `Name_Extension`,) LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM class,student_class,student WHERE class.Class_ID = '$code' AND student_class.Class_ID = '$code' AND student_class.Student_ID = student.Student_ID";
		$search_result = filterTable($query);
	}

	// function to connect and execute the query
	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "attendance");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
?>

<!DOCTYPE html>
<html>

<style>
body	{
	background-image: url("picture/web.jpg");
	background-size: cover
}
</style>

<head>
	<title>Take Attendance</title>
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
					<img src="picture/qq1.png" />
				</li>
				<br>
				<li>
					<a href="home.php" title="Home"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
				</li>
<li>
					<a href="student.php" title="Student"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add Student</a>
				</li>
				<li>
					<a href="subject.php" title="Subject"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Subject</a>
				</li>
				<li>
					<a href="class.php" title="Class"><span class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Add Class</a>
				</li>
				<li>
					<a href="take_attendance.php" title="Take Attendance"><span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Take Attendance</a>
				</li>
				<li>
					<a href="studentclass.php" title="Student Class"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Class</a>
				</li>
				<li>
					<a href="genreport.php" title="General Report"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;General Report</a>
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
		</br></br></br>
	  <tr bgcolor='gray'>
		  <th>Student ID</th>
		  <th>First Name</th>
		  <th>Last Name</th>
		  <th>Middle Initial</th>
		  <th>Name Extension</th>
		  <th>Status</th>
		  <th></th>
	</tr>
  </thead>
 <?php while($row = mysqli_fetch_array($search_result)):?>
  <tbody>
    <tr>
		<td><?php echo $row['Student_ID'];?></td>
		<td><?php echo $row['First_Name'];?></td>
		<td><?php echo $row['Last_Name'];?></td>
		<td><?php echo $row['Middle_Initial'];?></td>
		<td><?php echo $row['Name_Extension'];?></td>
		
	 <td>
		<form action="take.php">
			<input type="radio" name="status" value="Present"> Present 
			<input type="radio" name="status" value="Absent"> Absent 
			<input type="radio" name="status" value="Late"> Late 
			<input type="radio" name="status" value="Excuse"> Excuse 
		</form>
	 </td>
	<!--td><a href="takeview.php"  class="btn btn-primary" role="button">Take</a><br></td-->
    </tr>
  </tbody>
  <?php endwhile;?>
  <a href="takeview.php"  class="btn btn-primary" role="button">Take</a></br></br>
		 <div class="form-group row">
			 <label for="colFormLabel" class="col-sm-2 col-form-label">Academic Year</label>
				<div class="col-sm-5">
		<input type="text" name="Academic_Year" class="form-control" id="colFormLabel" required>
				</div>
		</div>
  	</div>
</body>

</html>


<!--INSERT INTO `take_attendance` (`Student_ID`, `Class_ID`, `Time_Stamp`, `Remarks`) VALUES ('0909', '7', '12312', 'Absent');
-->