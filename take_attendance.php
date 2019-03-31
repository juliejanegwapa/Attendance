<?php
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM `class` WHERE CONCAT(`Class_ID`, `Section`, `Subject_Code`, `Semester`, `Academic_Year`, `Schedule_Day`, `Schedule_Time`,) LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `class`";
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
	background-image: url("picture/ground.jpg");
	background-size: cover
}
</style>

<head>
	<title>Class View</title>
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
	  
      <th>Class ID</th>
	  <th>Section & Year</th>
      <th>Subject Code</th>
	  <th>Semester</th>
	  <th>Academic Year</th>
	  <th>Schedule Day</th>
	  <th>Schedule Time</th>
	  <th>Action</th>
	  
    </tr>
  </thead>
  <?php while($row = mysqli_fetch_array($search_result)):?>
  <tbody>
    <tr>
		<td><?php echo $row['Class_ID'];?></td>
		<td><?php echo $row['Section'];?></td>
		<td><?php echo $row['Subject_Code'];?></td>
		<td><?php echo $row['Semester'];?></td>
		<td><?php echo $row['Academic_Year'];?></td>
		<td><?php echo $row['Schedule_Day'];?></td>
		<td><?php echo $row['Schedule_Time'];?></td>
		
		
	 <td>
	 <a href ="save_attendance.php?class_id=<?php echo $row['Class_ID'];?>"><button type="button" class="btn btn-danger">Take</button></a></td>

</td>

</tr>
			
  </tbody>
  <?php endwhile;?>
</div>

</body>

</html>
