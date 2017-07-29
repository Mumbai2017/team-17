<?php
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
$sql = "SELECT p.id as caseno,d.hospital,p.age,p.name,p.gender,p.mother_tongue,
p.education,p.father_name,p.mother_name,p.contactno,p.temp_address,p.permanent_address
from patients p,doctors d,users u
where p.docid=d.id && p.status='pending' && u.id=d.users_id && p.id= ".$id;
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
		<a class="header-logo header-affix-hide margin-left-no margin-right-no" data-offset-top="213" data-spy="affix" href="index.html">Material</a>
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
						<a class="padding-right-lg waves-attach" href="page-login.html"><span class="icon icon-lg margin-right">exit_to_app</span>Logout</a>
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
						<a class="waves-attach" data-toggle="collapse" href="#doc_menu_components">Components</a>
						<ul class="menu-collapse collapse in" id="doc_menu_components">
							<li>
								<a class="waves-attach" href="ui-button.html">Buttons</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-button-fab.html">Buttons <small>(Floating Action Button)</small></a>
							</li>
							<li class="active">
								<a class="waves-attach" href="ui-card.html">Cards</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-data-table.html">Data Tables</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-dialog.html">Dialogs</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-dropdown-menu.html">Menus</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-nav-drawer.html">Navigation Drawers</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-picker.html">Pickers</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-progress.html">Progress</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-selection-control.html">Selection Controls</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-snackbar.html">Snackbars</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-tab.html">Tabs</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-text-field.html">Text Fields</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-toolbar.html">Toolbars</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="collapsed waves-attach" data-toggle="collapse" href="#doc_menu_extras">Extras</a>
						<ul class="menu-collapse collapse" id="doc_menu_extras">
							<li>
								<a class="waves-attach" href="ui-avatar.html">Avatars</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-icon.html">Icons</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-label.html">Labels</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-nav.html">Navs</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-tile.html">Tiles</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="collapsed waves-attach" data-toggle="collapse" href="#doc_menu_javascript">Javascript</a>
						<ul class="menu-collapse collapse" id="doc_menu_javascript">
							<li>
								<a class="waves-attach" href="ui-affix.html">Affix</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-collapse.html">Collapse</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-dropdown-menu.html">Dropdown</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-modal.html">Modals</a>
							</li>
							<li>
								<a class="waves-attach" href="ui-tab.html">Togglable Tabs</a>
							</li>
						</ul>
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
												<b>Name of Hospital: </br><?php echo  $result["hospital"] ?><br>
												<b>Name:</b><?php echo  $result["name"] ?><br>
												<b>Age: </b><?php echo  $result["age"] ?><br>
												<b>Gender: </b><?php  echo $result["gender"] ?><br>
												<b>Mother Tounge: </b><?php  echo $result["mother_tongue"] ?><br>
												<b>Education: </b><?php echo  $result["education"] ?><br>
											 
											 </div>
											 <div class="col-sm-6">
											<b> Father:</b> <?php  echo $result["father_name"] ?><br>
											 <b>Mother: </b><?php  echo $result["mother_name"] ?><br>
											 <b>Contact No:</b> <?php  echo $result["contactno"] ?><br>
											<b> Temp Address: </b><?php  echo $result["temp_address"] ?><br>
										    <b> Permanent Address: </b><?php echo  $result["permanent_address"] ?><br>
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
	<footer class="footer">
		<div class="container">
			<p>Material</p>
		</div>
	</footer>
	<div class="fbtn-container">
		<div class="fbtn-inner">
			<a class="fbtn fbtn-lg fbtn-brand-accent waves-attach waves-circle waves-light" data-toggle="dropdown"><span class="fbtn-text">Links</span><span class="fbtn-ori icon">apps</span><span class="fbtn-sub icon">close</span></a>
			<div class="fbtn-dropdown">
				<a class="fbtn waves-attach waves-circle" href="https://github.com/Daemonite/material" target="_blank"><span class="fbtn-text">Fork me on GitHub</span><span class="icon">code</span></a>
				<a class="fbtn fbtn-brand waves-attach waves-circle waves-light" href="https://twitter.com/daemonites" target="_blank"><span class="fbtn-text">Follow Daemon on Twitter</span><span class="icon">share</span></a>
				<a class="fbtn fbtn-green waves-attach waves-circle" href="http://www.daemon.com.au/" target="_blank"><span class="fbtn-text">Visit Daemon Website</span><span class="icon">link</span></a>
			</div>
		</div>
	</div>

	<!-- js -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/base.min.js"></script>

	<!-- js for doc -->
	<script src="../js/project.min.js"></script>
</body>
</html>