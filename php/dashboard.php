<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
	<title>Tabs - Make A Wish</title>
	
	<!-- css -->
	<link href="../css/base.min.css" rel="stylesheet">

	<!-- css for doc -->
	<link href="../css/project.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
		$(document).ready(function(){
			
			
			
			
		    $.ajax({
		    	url: "http://localhost/charts.php",
		    	dataType:"JSON",
		    	type: "GET",

		     success: function(results){
		     	
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

         function drawChart() {


//        var data = new google.visualization.DataTable();
// data.addColumn('string', 'Topping');
//         data.addColumn('number', 'Slices');     
//           for(var i=0;i<results.length;i++)
//       {  
//       	console.log(results);
//        data.addRows([["state",2]]);
// }
//       }

//console.log(typeof(results[0])+results[1]['state']+results[1]['count']);

var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        for(var i=0;i<results.length;i++)
        {
        	data.addRows([[results[i]['state'],parseInt(results[i]['count'])]]);
        }




          var options = {
          title: 'Wishes in India',
          is3D:'true'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);


  }}});


$.ajax({
		    	url: "http://localhost/charts2.php",
		    	dataType:"JSON",
		    	type: "GET",

		     success: function(results){
		     	
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

         function drawChart() {



var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        for(var i=0;i<results.length;i++)
        {
        	data.addRows([[results[i]['year'],parseInt(results[i]['count'])]]);
        }




          var options = {
          title: 'Wishes in India',
          curveType:'function',
          legend :{position:'bottom'},
		  width:600,
		  height:400
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);


  }}});



		});
		</script>
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
		<span class="header-logo header-affix margin-left-no margin-right-no" data-offset-top="213" data-spy="affix">Tabs</span>
		<ul class="nav nav-list pull-right visible-xx-block">
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
						<a class="waves-attach"  href="dashboard.php">Dashboard</a>
						</li>
					<li>
						<a class="collapsed waves-attach"  href="index.php">ChildReferences</a>
						
					</li>
					<li>
						<a class="collapsed waves-attach"  href="wishes.php">Wishes</a>
						
					</li>
				</ul>
			</div>
		</div>
	</nav>
		<div class="menu-scroll">
			<div class="menu-content">
				<a class="menu-logo" href="index.html">Material</a>
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
							<li>
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
							<li class="active">
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
						<a class="waves-attach" data-toggle="collapse" href="#doc_menu_javascript">Javascript</a>
						<ul class="menu-collapse collapse in" id="doc_menu_javascript">
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
							<li class="active">
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
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-0">
						<h1 class="heading">Dashboard</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-12 col-md-offset-0">
					<section class="content-inner margin-top-no">
						
						<div class="card">
							<div class="card-main">
								<nav class="tab-nav tab-nav-brand margin-top-no">
									<ul class="nav nav-justified">
										<li class="active">
											<a class="waves-attach" data-toggle="tab" href="#doc_tab_example_1_brand">Statewise Wishes</a>
										</li>
										<li>
											<a class="waves-attach" data-toggle="tab" href="#doc_tab_example_2_brand">Yearwise Wish Granted</a>
										</li>
										<li>
											<a class="waves-attach" data-toggle="tab" href="#doc_tab_example_3_brand">Top 5 volunteers</a>
										</li>
									</ul>
								</nav>
								<div class="card-inner">
									<div class="tab-content">
										<div class="tab-pane fade active in" id="doc_tab_example_1_brand">
											<div> 
											<div id="piechart" style="margin-left:100px;width: 900px; height: 450px;"></div>
											
											
											</div>
										</div>
										<div class="tab-pane fade" id="doc_tab_example_2_brand">
											<div id="curve_chart" style="margin-left:100px;"></div>
										</div>
										<div class="tab-pane fade" id="doc_tab_example_3_brand">
										<ol>
											<?php
												include("db_connect.php");

												

												$sql = "SELECT name FROM v2  ORDER BY frequency DESC LIMIT 5";
												$result = mysqli_query($db,$sql);
												

												$output = array();
												while($row = mysqli_fetch_assoc($result)) {
												
												
												?>
												
												<li> <?php echo $row["name"] ?></li>
												
												<?php
												}
												?>
												
											</ol>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</main>
	<footer class="footer">
		<div class="container">
			<p>Make A Wish</p>
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