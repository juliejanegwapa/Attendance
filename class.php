<?php

$host = "localhost";
$dbusername = "root";
$dbpassword ="";
$dbname ="attendance";

//Create Connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

$sql = "SELECT * FROM subject";
$query1 = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<style>
body  {
    background-image: url("picture/ground.jpg");
	background-size: cover;
   
}
</style>
<head>
	<title>Class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" type="image/x-icon" href="picture/attendance.jpg" />

	
	
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
					<a href="tae_attendace.php" title="Take Attendance"><span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;take Attendance</a>
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
							<a class="navbar-brand" onclick="openNav()"><span  class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;Class</a>
							
							
					</div>
					
					</div>
				</nav>

				
			</div>
        </div>
		
		
		<div class="container" style="width:300px">
		<?php require_once 'classprocess.php'; ?>
		 <form method="POST" action="classprocess.php">
		     <center>
					<input type="hidden" name="Class_ID" value="<?php echo $Class_ID?>">
					<label>Section</label>
					<input type="text" class="form-control" name="Section" placeholder="Section" value="<?php echo $Section; ?>" required ></td><br/>
					<label>Subject Code</label>
					<select name="Subject_Code" class="form-control" required>
							<?php while ($row = mysqli_fetch_array($query1)): ?>
						<option value="<?php echo $row['Subject_Code'] ?>"><?php echo $row['Subject_Title'] ?></option>
							<?php endwhile;?>
							<option value='' selected>Select Subject</option>
							</select>
					<label>Semester</label>
					<select name="Semester" class="form-control" value="" required>
							<option value="First Semester">First Semester</option>
							<option value="Second Semester">Second Semester</option>
							<option value="Summer">Summer</option>
							</select>
					<label>Academic Year</label>
					<input type="text" class="form-control"  name="Academic Year" placeholder="Academic Year" value="<?php echo $Academic_Year; ?>" required ></td><br/>
					<label>Schedule Day</label>
					<input type="text" class="form-control" name="Schedule Day" placeholder="Schedule Day" value="<?php echo $Schedule_Day; ?>" required ></td><br/>
					<label>Schedule Time</label>
					<input type="text" class="form-control" name="Schedule Time" placeholder="Schedule Time" value="<?php echo $Schedule_Time; ?>" required ></td><br/>
<br>		
				<?php
					if ($update == true):
				?>
					<button class="btn btn-success" type="submit" name="update">update</button>&nbsp;&nbsp;
				<?php else: ?>
					<button class="btn btn-info" type="submit" name="class">Save</button>&nbsp;&nbsp;
				<?php endif; ?>
				<a href="classview.php"><button type="submit"class="btn btn-info" >View</a></button>			

</center>
</form>
         
    <!-- Bootstrap core JavaScript -->
    <script src="attendance/jquery/jquery.min.js"></script>
    <script src="attendance/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	</div>
<br>
</center>
</form>



</body>

</html>
