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
							<a class="navbar-brand" onclick="openNav()"><span  class="glyphicon glyphicon-menu-hamburger"></span>&nbsp;&nbsp;Subject</a>
							
							
					</div>
					
					</div>
				</nav>

				
			</div>
        </div>
		
		
 <div class="container" style="width:300px">
		<?php require_once 'process2.php'; ?>
		 <form method="POST" action="process2.php">
		     <center>
					<input type="hidden" name="Subject_Code" value="<?php echo $Subject_Code;?>">
					<label>Subject_Code</label>
					<input type="text" class="form-control" name="Subject_Code" placeholder="Subject Code" value="<?php echo $Subject_Code; ?>" required ></td><br/>
					<label>Subject_Title</label>
					<input type="text" class="form-control" name="Subject_Title" placeholder="Subject Title" value="<?php echo $Subject_Title; ?>" required ></td><br/>
<br>		
				<?php
					if ($update == true):
				?>
					<button class="btn btn-success" type="submit" name="update">update</button>&nbsp;&nbsp;
				<?php else: ?>
					<button class="btn btn-info" type="submit" name="subject">Save</button>&nbsp;&nbsp;
				<?php endif; ?>
				<a href="subview.php"><button type="submit"class="btn btn-info" >View</a></button>			

</center>
</form>
         
    <!-- Bootstrap core JavaScript -->
    <script src="attendance/jquery/jquery.min.js"></script>
    <script src="attendance/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	</div>
<br>


</body>

</html>
