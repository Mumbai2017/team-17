<?php
session_start();
$id=$_GET['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maw";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT p.id as caseno,d.hospital,p.age,p.name,p.gender,p.mother_tongue, p.education,p.parent_name,p.phone,p.temp_address,p.permanent_address from patients p,doctors d,users u,wish w 
where p.doc_id=d.id && w.isgranted=0 && u.id=d.users_id && w.patient_id=p.id && p.id=".$id;
$followingdata = $conn->query($sql);
$result = $followingdata->fetch_array(MYSQLI_ASSOC);

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>MakeAWish</title>

	<!-- css -->
	<link href="../css/base.min.css" rel="stylesheet">

	<!-- css for doc -->
	<link href="../css/project.min.css" rel="stylesheet">
	
	<!-- favicon -->
	<!-- ... -->
</head>
<body class="page-brand">
	<header class="header header-transparent header-waterfall">
		<ul class="nav nav-list pull-left">
			<li>
				<a data-toggle="menu" href="#doc_menu">
					<span class="icon icon-lg">menu</span>
				</a>
			</li>
		</ul>
		<a class="header-logo header-affix-hide margin-left-no margin-right-no" data-offset-top="213" data-spy="affix" href="index.html">Make A Wish</a>
		<span class="header-logo header-affix margin-left-no margin-right-no" data-offset-top="213" data-spy="affix">Cards</span>
		<ul class="nav nav-list pull-right">
			<li class="dropdown margin-right">
				<a class="dropdown-toggle padding-left-no padding-right-no" data-toggle="dropdown">
					<span class="access-hide">John Smith</span>
					<span class="avatar avatar-sm"><img alt="alt text for John Smith avatar" src="../images/users/avatar-001.jpg"></span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="padding-right-lg waves-attach" href="javascript:void(0)"><span class="icon icon-lg margin-right">account_box</span>Profile Settings</a>
					</li>
					<li>
						<a class="padding-right-lg waves-attach" href="javascript:void(0)"><span class="icon icon-lg margin-right">add_to_photos</span>Upload Photo</a>
					</li>
					<li>
						<a class="padding-right-lg waves-attach" href="login.php"><span class="icon icon-lg margin-right">exit_to_app</span>Logout</a>
					</li>
				</ul>
			</li>
		</ul>
	</header>
	<nav aria-hidden="true" class="menu" id="doc_menu" tabindex="-1">
		<div class="menu-scroll">
			<div class="menu-content">
				<a class="menu-logo" href="index.html">Make A Wish</a>
				<ul class="nav">
					<li>
						<a class="waves-attach"  href="dashboard.php">Dashboard</a>
						</li>
					<li>
						<a class="collapsed waves-attach"  href="index.php">ChildReferences</a>
						
					</li>
					<li>
						<a class="collapsed waves-attach"  href="wishes.php">Wishes</a>
						
					</li>
					<li>
						<a class="collapsed waves-attach"  href="refdoc.php">Refered Doctors</a>
						
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<main class="content">
		<div class="content-heading">
			<div class="container">
				<h1 class="heading">Reference Details</h1>
			</div>
		</div>
		<div class="container">
			<section class="content-inner margin-top-no">
				
				
				<div class="card-wrap">
					<div class="row">
						
						<div class="col-md-12 col-sm-6">
							<div class="card card-white">
								<div class="card-main">
									<div class="card-inner">
										<p class="card-heading">Child Name: Someone</p>
										 <div class="container">

											 <div class="col-sm-6">
												<b>Case no:</b><?php echo $result["caseno"] ?><br>
												<b>Name of Hospital: </b><?php echo  $result["hospital"] ?><br>
												<b>Name:</b><?php echo  $result["name"] ?><br>
												<b>Age: </b><?php echo  $result["age"] ?><br>
												<b>Gender: </b><?php  echo $result["gender"] ?><br>
												<b>Mother Tounge: </b><?php  echo $result["mother_tongue"] ?><br>
												<b>Education: </b><?php echo  $result["education"] ?><br>
											 
											 </div>
											 <div class="col-sm-6">
											<b> Parent:</b> <?php  echo $result["parent_name"] ?><br>
											 <b>Contact No:</b> <?php  echo $result["phone"] ?><br>
											<b> Temp Address: </b><?php  echo $result["temp_address"] ?><br>
										    <b> Permanent Address: </b><?php echo  $result["permanent_address"] ?><br>
											 </div>
											 <br>
											<p >Please select a volunteer</p>
											<select id="vol">
											<?php 
												$sql = "SELECT users.name as name ,v1.id as id from v1 join users on v1.id=users.id";
												$followingdata = $conn->query($sql);
												//$result = $followingdata->fetch_array(MYSQLI_ASSOC);
												
												while($row = $followingdata->fetch_assoc()) {
											
											
											?>
												
												
														<option value=<?php echo $row["id"]; ?>  ><?php echo $row["name"]; ?></option>
														
												 
												
													
											<?php
											
												}
												
												$id=$row["id"];
												$wid=$result["caseno"];
												$_SESSION["id"]=1;
												$_SESSION["wid"]=$wid;
												
												
											?>
											
											</select>&nbsp &nbsp 
											<a class="btn" id="assign"  href="dashboard.php"> Assign </a>
											
											
										</div>
	 	
									</div>
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</section>
		</div>
	</main>
	<footer class="footer">
		<div class="container">
			<p>Make A Wish</p>
		</div>
	</footer>
	

	<!-- js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/base.min.js"></script>

	<!-- js for doc -->
	<script src="../js/project.min.js"></script>
</body>
</html>