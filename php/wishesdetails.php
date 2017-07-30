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
				<h1 class="heading">Wishes Details</h1>
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
												<b><u>Case no:</b></u><?php echo $result["caseno"] ?><br>
												<b><u>Name of Hospital: </b></u>	<?php echo  $result["hospital"] ?><br>
												<b><u>Name:</u></b><?php echo  $result["name"] ?><br>
												<b><u>Age: </u></b><?php echo  $result["age"] ?><br>
												<b><u>Gender: </u></b><?php  echo $result["gender"] ?><br>
												<b><u>Mother Tounge: </u></b><?php  echo $result["mother_tongue"] ?><br>
												<b><u>Education: </u></b><?php echo  $result["education"] ?><br>
											 
											 </div>
											 <div class="col-sm-6">
											<b><u> Parent:</b></u> <?php  echo $result["parent_name"] ?><br>
											 <b><u>Contact No:</b></u> <?php  echo $result["phone"] ?><br>
											<b><u> What woul u like to be when grown up: </b></u>I want to be so and so when I grow up<br>
										    <b><u> Permanent Address: </b></u><?php echo  $result["permanent_address"] ?><br>
											 </div>
											 <div class="col-sm-6">
											<b><u> About Famliy:</b></u> Financiallyly less stable<br>
											 <b><u>About Friend:</b></u> NO close friends<br>
											<b><u> Govt ID Parents: </b></u>Adhaar Card<br>
										    <b><u> Favourite: </b></u>Color-Red<br> 
											<b><u>Hobby</b></u>Drawing<br>
											 </div>
											 <br>
											<p >Please select a volunteer</p><br><br><br>
											<div id="border_css">
											<div class="checkbox checkbox-adv">
													&nbsp &nbsp <label for="doc_checkbox_example_1">
														<input class="access-hide" id="doc_checkbox_example_1" name="doc_checkbox_example" type="checkbox">To buy a bicycle
														<span class="checkbox-circle"></span><span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
													</label>
												</div>
											<div class="checkbox checkbox-adv">
													&nbsp &nbsp <label for="doc_checkbox_example_2">
														<input class="access-hide" id="doc_checkbox_example_2" name="doc_checkbox_exsample" type="checkbox">To go to disneyland
														<span class="checkbox-circle"></span><span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
													</label>
												</div>
											<div class="checkbox checkbox-adv">
													&nbsp &nbsp <label for="doc_checkbox_example_3">
														<input class="access-hide" id="doc_checkbox_example_3" name="doc_checkbox_exsamaple" type="checkbox">To meet somone
														<span class="checkbox-circle"></span><span class="checkbox-circle-check"></span><span class="checkbox-circle-icon icon">done</span>
													</label>
												</div>
												<br><br><br>
											&nbsp &nbsp 
											<a class="btn" id="assign"  href="dashboard.php"> Grant </a>
												</div>
											
											
											
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
	<style>
	#border_css{
		border-style: solid;
    border-width: 2px;
	padding:5px 5px 5px 15px;
	}
	</style>
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