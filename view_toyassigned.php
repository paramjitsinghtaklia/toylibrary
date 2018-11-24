<?php 
include "header.php"; 
include 'classes/order.php';

$objorder = new order();

$result_data = $objorder->gettoys_assigned(); 

?>
<link href="css/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/footable.core.js" type="text/javascript"></script>
<script src="js/footable.sorting.js" type="text/javascript"></script>
<script src="js/footable.filtering.js" type="text/javascript"></script>

 
	<div class="login-page" style="width: 100%! important;" ng-app='order_status' ng-controller='orderlisting'>
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View<span> Toy Assigned to Customer</span> <div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="assigntoy_customer.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">Assigned Toy To Customer</button></a></div></h3>
		</div>
			
			
			<div class="">
			<div class="login-body" style="margin-top: -5%;">
	<table id='tableContainerFiltered1'  name='tableContainerFiltered1'  data-filtering="true" style="margin-top:42px;">
		<thead> 
			<tr>
				<th data-breakpoints="xs sm">Child Name </th>
				<th data-breakpoints="xs sm">Parent Name </th>
				<th data-breakpoints="xs sm">Toy Name </th>
				<th data-breakpoints="xs sm md">Toy Code</th>
				<th data-breakpoints="xs sm">Assigned Date</th>
				
			</tr>
		</thead>
	<tbody>
	<?php 
		if ($result_data===false)
		{
			echo 'No Toy Assigned  Yet';
		} 
		else
		{
			foreach ($result_data as  $value )
			{
				//$customer_id = $value->customer_id;
				
				echo '<tr><td>'.$value[0].'</td>';
				echo '<td>'.$value[1].'</td>';
				echo '<td>'.$value[2].'</td>';
				echo '<td>'.$value[3].'</td>';
				echo '<td>'.$value[4].'</td></tr>';
				

			}
		}

?>
 
 
  </tbody>
 </table>
  </div></div></div>

		 
	<!--footer-->
	<?php include 'footer.php'; ?>
	<!--//footer-->

	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
	

		$(document).ready(function() {


		 $('#tableContainerFiltered1').footable();

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};

			$('.zoom').mouseover(function()
						{
						   $(this).css("cursor","pointer");
						   $(this).animate({width: "500px",height:"500px"}, 'slow');
						});

			$('.zoom').mouseout(function()
						{
						 
						   $(this).animate({width: "200px",height:"200px"}, 'slow');
						});



			
			//$().UItoTop({ easingType: 'easeOutQuart' });
			


		});
	</script>

	<script src="js/angular/angular.min.js"></script>
    <script src="js/angular-route/angular-route.min.js"></script> 
    <script src="js/angular-ui-router/release/angular-ui-router.min.js"></script>    
    <script src="js/angular-local-storage/dist/angular-local-storage.min.js"></script>
    <script src="js/angular/ui-bootstrap-2.5.0.min.js"></script>
    <script src="js/angular/ui-bootstrap-tpls-2.5.0.min.js"></script>
     
    
     <script src="js/app/order_status.js?v=1"></script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->

</body>

</html>