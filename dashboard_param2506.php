<!--header-->
<?php include "header.php";
include 'classes/toys.php';

$objtoy = new toys();

$countrow = $objtoy->GetToysCount();
	
 ?>
<!--//header-->
	<!--banner-->
	<div class="banner">
		<div class="container" style="width:90%">
			<div class="" style="color:#fff; height:auto; text-align:center">			
				<h3 class="title wow zoomIn animated" data-wow-delay=".5s" style="border-bottom:3px solid;padding-bottom: 10px; color:#c6178d;">JuniorJ <span style="color:#fff;">Dashboard</span></h3>
				<!--- Dashboard option ---->
				<style>
				.td_count{background:#fff;color:#c6178d;text-align: center;font-size: 35px;font-weight: bold;border-radius: 5px 5px 0 0;}
				.td_text{background:#c6178d;color:#fff;text-align: center;font-size: 20px;font-weight: bold;border-radius: 0 0 5px 5px;}
				.a_link{ text-decoration:none; color:#fff;}
				</style>
				<table style="width:100%; height:auto; margin-top:5px; opacity:0.95;" border="0" class="table">
					<tr>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count"><?php echo $countrow['total'];?></td>
								</tr>
								<tr>
									<td class="td_text"><a href="view_toy.php" class="a_link"> Total Toys Available</a></td>
								</tr>
							</table>
						</td>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count">80</td>
								</tr>
								<tr>
									<td class="td_text">Total Toys on Rent</td>
								</tr>
							</table>
						</td>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count">36</td>
								</tr>
								<tr>
									<td class="td_text">Total Orders Close in 2 Days</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count">25</td>
								</tr>
								<tr>
									<td class="td_text">Outstanding Order to be Close</td>
								</tr>
							</table>
						</td>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count"><i class="fa fa-inr"></i>28,000</td>
								</tr>
								<tr>
									<td class="td_text">Total Petty Cash Amount</td>
								</tr>
							</table>
						</td>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count"><i class="fa fa-inr"></i>8,000</td>
								</tr>
								<tr>
									<td class="td_text">Today's Expense Amount</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count"><i class="fa fa-inr"></i>20,000</td>
								</tr>
								<tr>
									<td class="td_text">Today's Rent Amount</td>
								</tr>
							</table>
						</td>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count"><i class="fa fa-inr"></i>16,000</td>
								</tr>
								<tr>
									<td class="td_text">Today's Selling Amount</td>
								</tr>
							</table>
						</td>
						<td width="33%">
							<table style="width:100%" class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".5s">
								<tr>
									<td class="td_count"><i class="fa fa-inr"></i>22,000</td>
								</tr>
								<tr>
									<td class="td_text">Today's Party Supplier Rent Amount</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<!--<table class="table">
				  <thead>
					<tr>
					  <th>#</th>
					  <th>First Name</th>
					  <th>Last Name</th>
					  <th>Username</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <th scope="row">1</th>
					  <td>Mark</td>
					  <td>Otto</td>
					  <td>@mdo</td>
					</tr>
					<tr>
					  <th scope="row">2</th>
					  <td>Jacob</td>
					  <td>Thornton</td>
					  <td>@fat</td>
					</tr>
					<tr>
					  <th scope="row">3</th>
					  <td>Larry</td>
					  <td>the Bird</td>
					  <td>@twitter</td>
					</tr>
				  </tbody>
				</table>-->
				<!--- // Dashboard option ---->
			</div>
			
			
			
		</div>
	</div>			
	<!--//banner-->
	<!--new-->
			
	<!--//new-->
	<!--gallery-->
	
	<!--//gallery-->
	<!--trend-->
	
	<!--//trend-->
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
    <script src="js/bootstrap.js"></script>
</body>
</php>