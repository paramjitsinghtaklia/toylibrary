<!--header-->
<?php include "header.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.jquery-az.com/boots/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="https://www.jquery-az.com/boots/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<!--//header-->
	<!--breadcrumbs-->
	<!--<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Dashboard</a></li>
				<li style="color:#fff;">Toy Management</li>
				<li class="active">Add Toy</li>
			</ol>
		</div>
	</div>-->
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page" style="">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Toy</span></h3>
		</div>
			<style>
				.table_list {
					border-collapse: collapse;
					border-spacing: 0;
					width: 90%;
					border: 1px solid #ddd;
					margin-top: -80px;
					margin-bottom: 85px;
				}
				
				th {
					text-align: left;
					padding: 8px;
					font-size:13px;
				}
				
				 td {
					text-align: left;
					padding: 8px;
					font-size:13px;
				}
				tr:nth-child(even){background-color: #f2f2f2}
				</style>
			</div>
				<table class="table_list title-info wow fadeInUp animated" data-wow-delay=".5s" align="center">
					<tr>
					  <th>Toy Code</th>
					  <th>Toy Name</th>
					  <th>Toy Description</th>
					  <th>Toy Image</th>
					  <th>Toy Classification</th>
					  <th>Age Group</th>
					  <th>Toy Brand</th>
					  <th>Toy MRP</th>
					  <th>Toy Points</th>
					  <th>Toy Rent Amount</th>
					  <th>Toy Quantity</th>
					</tr>
					<tr>
					  <td width="2%">001</td>
					  <td width="2%">Car</td>
					  <td width="5%">Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.</td>
					  <td width="3%">Image goes here</td>
					  <td width="4%">Image callsification goes here</td>
					  <td width="3%">3-6 Years</td>
					  <td width="5%">Hot Wheels</td>
					  <td width="3%">1500</td>
					  <td width="3%">500</td>
					  <td width="3%">600</td>
					  <td width="3%">5</td>
					</tr>
					<tr>
					  <td width="2%">001</td>
					  <td width="2%">Car</td>
					  <td width="5%">Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.</td>
					  <td width="3%">Image goes here</td>
					  <td width="4%">Image callsification goes here</td>
					  <td width="3%">3-6 Years</td>
					  <td width="5%">Hot Wheels</td>
					  <td width="3%">1500</td>
					  <td width="3%">500</td>
					  <td width="3%">600</td>
					  <td width="3%">5</td>
					</tr>
					<tr>
					  <td width="2%">001</td>
					  <td width="2%">Car</td>
					  <td width="5%">Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.</td>
					  <td width="3%">Image goes here</td>
					  <td width="4%">Image callsification goes here</td>
					  <td width="3%">3-6 Years</td>
					  <td width="5%">Hot Wheels</td>
					  <td width="3%">1500</td>
					  <td width="3%">500</td>
					  <td width="3%">600</td>
					  <td width="3%">5</td>
					</tr>
					<tr>
					  <td width="2%">001</td>
					  <td width="2%">Car</td>
					  <td width="5%">Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.Your description goes here.</td>
					  <td width="3%">Image goes here</td>
					  <td width="4%">Image callsification goes here</td>
					  <td width="3%">3-6 Years</td>
					  <td width="5%">Hot Wheels</td>
					  <td width="3%">1500</td>
					  <td width="3%">500</td>
					  <td width="3%">600</td>
					  <td width="3%">5</td>
					</tr>
				</table>
	<!--//login-->
	<!--footer-->
	<?php include 'footer.php'; ?>
	<!--//footer-->

	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->

</body>
</html>