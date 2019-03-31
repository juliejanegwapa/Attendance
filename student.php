<!DOCTYPE html>
<html>
<style>
body  {
    background-image: url("picture/ground.jpg");
	background-size: cover;
   
}
</style>
<head>
	<title>Student</title>
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
							<a class="navbar-brand" onclick="openNav()"><span  class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;Student</a>
					</div>
					
					</div>
				</nav>

				
			</div>
        </div>

    </div>
    
	
	
	<div class="container" style="width:300px">
	 <tr>
	 <center>
			<?php require_once 'stprocess.php'; ?>
			<form method="post" action="stprocess.php">
					<input type="Hidden" name="Student_ID" value="<?php echo $Student_ID; ?>">
					<label>Student_ID:</label>
					<input type="text" class="form-control" name="Student_ID" placeholder="Student ID" value="<?php echo $Student_ID; ?>" required></td><br/>
					<label>First Name:</label>
					<input type="text" class="form-control" name="First_Name" placeholder="First Name" value="<?php echo $First_Name; ?>" required></td><br/>
					<label>Last Name:</label>
					<input type="text" class="form-control" name="Last_Name" placeholder="Last Name" value="<?php echo $Last_Name; ?>" required></td><br/>
					<label>Middle Initial</label>
					<input type="text" class="form-control" name="Middle_Initial" placeholder="Middle Initial" value="<?php echo $Middle_Initial; ?>" required></td><br/>
					<label>Name Extension:</label>
					<input type="text" class="form-control" name="Name_Extension" placeholder="Name Extension" value="<?php echo $Name_Extension; ?>" ></td><br/>
					
				</tr>
<br>
<br>
				<?php
					if ($update == true):
				?>
					<button class="btn btn-success" type="submit" name="update">update</button>&nbsp;&nbsp;
				<?php else: ?>
					<button class="btn btn-info" type="submit" name="student">Save</button>&nbsp;&nbsp;
				<?php endif; ?>
				<a href="cview.php"><button type="submit"class="btn btn-info" >View</a></button>
	
</div>





    <!-- Bootstrap core JavaScript -->
        <script src="attendance/jquery/jquery.min.js"></script>
    <script src="attendance/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	


</body>

</html>
