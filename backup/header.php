<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start(); 
 ob_start();
if ( $_SESSION["user_id"]=="")
{

header('Location: index.php');
}


  ?>
<!DOCTYPE php>
<php>
<head>
<title>JuniorJ Library</title>
<!-- for-mobile-apps -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<meta name="keywords" content="Modern Shoppe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps -->
<!--Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<!--//Custom Theme files -->
<!--js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--//js-->
<!--cart-->
<script src="js/simpleCart.min.js"></script>
<!--cart-->
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!--web-fonts-->
<!--animation-effect-->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
<!--//animation-effect-->
<!--start-smooth-scrolling-->

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('php,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--
<link href="5/ninja-slider.css" rel="stylesheet" type="text/css" />
<script src="5/ninjaVideoPlugin.js"></script>
<script src="5/ninja-slider.js" type="text/javascript"></script>-->
<!--//end-smooth-scrolling-->
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="top-header navbar navbar-default"><!--header-one-->
			<div class="container">
				<div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
					<p>Welcome to JuniorJ Library, <a href="register.php"><strong>
					<?php echo $_SESSION["user_name"];?></strong></a></p>
				</div>
				<div class="nav navbar-nav navbar-right social-icons"><a href="index.php" style="cursor:pointer !important; color:#c6178d;"><strong>Logout</strong></a></div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-two navbar navbar-default" style="text-align:center"><!--header-two-->
			<div class="container">
				
				<div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
					<h1><a href="index.php"><img src="images/logo.png" width="60%"><!--Modern <b>Shoppe</b><span class="tag">Everything for Kids world </span> --></a></h1>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="top-nav navbar navbar-default"><!--header-three-->
			<div class="container">
				<nav class="navbar" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav top-nav-info">
							<li><a href="dashboard.php" class="active">Dashboard</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Toy Management<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column multi-column1">
									<div class="row">
										<div class="col-sm-3 menu-grids"> 
											<h4>Toys Add Action</h4>
											<ul class="multi-column-dropdown ">
												<li><a class="list" href="add_toy.php">Add Toy</a></li>
												<li><a class="list" href="add_agegroup.php">Add Age Group</a></li>
												<li><a class="list" href="add_classification.php">Add Classification</a></li>
												<li><a class="list" href="add_brands.php">Add Toy Brand</a></li>
											</ul>
										</div>
										<div class="col-sm-3 menu-grids">
											<h4>Toys Update Actions</h4>
											<ul class="multi-column-dropdown">
												<li><a class="list" href="view_toy.php">View/Update Toy</a></li>
												<li><a class="list" href="view_agegroup.php">View/Update Age Group</a></li>
												<li><a class="list" href="view_classification.php">View/Update Classification</a></li>
												<li><a class="list" href="view_brands.php">View/Update Toy Brand</a></li>
											</ul>
										</div>																
										<div class="clearfix"> </div>
									</div>
								</ul>
							</li>
							<li class="dropdown grid">
								<a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Customer Management<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column multi-column2">
									<div class="row">
										<div class="col-sm-3 menu-grids">
											<h4>Customers Add Actions</h4>
											<ul class="multi-column-dropdown">
												<li><a class="list" href="add_customer.php">Add Customer</a></li>
												<li><a class="list" href="add_plan.php">Add Plan</a></li>
												<li><a class="list" href="#">Add Plan</a></li>
											</ul>
										</div>																		
										<div class="col-sm-3 menu-grids">
											<h4>Customers Update Actions</h4>
											<ul class="multi-column-dropdown">
												<li><a class="list" href="view_customer.php">View/Update Customer</a></li>
												<li><a class="list" href="view_plans.php">View/Update Plan</a></li>
												<li><a class="list" href="renew_plan.php">Renew Plan</a></li>
											</ul>
										</div>
										<div class="clearfix"> </div>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Order Management<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column multi-column1">
									<div class="row">
										<div class="col-sm-3 menu-grids"> 
											<h4>Order Add Action</h4>
											<ul class="multi-column-dropdown ">
												<li><a class="list" href="add_order.php">Add Order (Renting)</a></li>
												<li><a class="list" href="add_order.php">Add Order (Party Seller)</a></li>
												<li><a class="list" href="add_order.php">Add Order (Selling)</a></li>
												
											</ul>
										</div>
										<div class="col-sm-3 menu-grids">
											<h4>Order Update Actions</h4>
											<ul class="multi-column-dropdown">
												<li><a class="list" href="view_order.php">View Order List</a></li>
												
											</ul>
										</div>																
										<div class="clearfix"> </div>
									</div>
								</ul>
							</li>
							<li class="dropdown grid">
								<a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Income Management<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column menu-two multi-column3">
									<div class="row">
										<div class="col-sm-3 menu-grids">
											<h4>Income Reports</h4>
											<ul class="multi-column-dropdown">
												<li><a class="list" href="#">Daily Sales Report</a></li>
												<li><a class="list" href="#">Monthly Sales Report</a></li>
												<li><a class="list" href="#">Yearly Sales Report</a></li>
											</ul>
										</div>																		
										<div class="col-sm-3 menu-grids">
											<h4>Today's Income Reports</h4>
											<ul class="multi-column-dropdown">
												<li><a class="list" href="#">Today's Expense Report</a></li>
												<li><a class="list" href="#">Today's Rent Report</a></li>
												<li><a class="list" href="#">Today's Selling Report</a></li>
												<li><a class="list" href="#">Today's Party Supplier Rent Report</a></li>
											</ul>
										</div>
										<div class="clearfix"> </div>
									</div>	
								</ul>
							</li>				
						</ul> 
						<div class="clearfix"> </div>
						<!--//navbar-collapse-->
					</div>
					<!--//navbar-header-->
				</nav>
				<!--<div id="cd-search" class="cd-search">
					<form>
						<input type="search" placeholder="Search...">
					</form>
				</div>-->
			</div>
		</div>
	</div>
	<!--//header-->