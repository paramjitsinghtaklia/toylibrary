<?php 
include "header.php"; 
include 'classes/customer.php';

$objcust = new customer();
$result_data = $objcust->get_allCustomer(); 

?>
<link href="css/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/footable.core.js" type="text/javascript"></script>
<script src="js/footable.sorting.js" type="text/javascript"></script>
<script src="js/footable.filtering.js" type="text/javascript"></script>

 
	<div class="login-page" style="width: 100%! important;">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Toy</span> <div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="add_customer.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">Add Customer</button></a></div></h3>
		</div>
			
			
			<div class="">
			<div class="login-body" style="margin-top: -5%;">
			<!-- data-expand-first="true" -->
	<table id='tableContainerFiltered1'  name='tableContainerFiltered1'  data-filtering="true" style="margin-top:42px;">
		<thead> 
			<tr>
				<th >Child Name</th>
				<th data-breakpoints="xs sm">parent_name</th>
				<th data-breakpoints="xs sm">plan_name</th>
				<th data-breakpoints="xs sm">current_points</th>
				<th data-breakpoints="xs sm md">email_id</th>
				<th data-breakpoints="all">child_dob</th>
				<th data-breakpoints="xs sm">mobile_number</th>
				<th data-breakpoints="all">gender</th>
				<th data-breakpoints="all">address</th>
				<th data-breakpoints="all">pincode</th>
				<th data-breakpoints="all">tel_number</th>
				<th data-breakpoints="all">registration_date</th>
				<th data-breakpoints="all">active</th>

				<th>Actions</th>
			</tr>
		</thead>
	<tbody>
	<?php 
		if ($result_data===false)
		{
			echo 'No Toys Available Yet';
		} 
		else
		{
			foreach ($result_data as  $value )
			{
				$customer_id = $value->customer_id;
				echo '<tr><td>'.$value->child_name.'</td>';
				echo '<td>'.$value->parent_name.'</td>';
				echo '<td>'.$value->plan_name.'</td>';
				echo '<td>'.$value->current_points.'</td>';
				 

				echo '<td>'.$value->email_id.'</td>';
				echo '<td>'.$value->child_dob.'</td>';
				echo '<td>'.$value->mobile_number.'</td>';
				echo '<td>'.$value->gender.'</td>';

				echo '<td>'.$value->address.'</td>';
				echo '<td>'.$value->pincode.'</td>';
				echo '<td>'.$value->tel_number.'</td>';
				echo '<td>'.$value->registration_date.'</td>';

			

				if ($value->active=='0')
				{
					$status_text = 'Active';
				}
				else
				{
					$status_text = 'In-Active';
				}
				echo '<td>'.$status_text.'</td>';
				
				echo '<td><a href="edit_customer.php?customer_id='.$customer_id.'"><button class="btn_edit">Edit</button></a>&nbsp;<button class="btn_delete">Delete</button><a href="customer_history.php?customer_id='.$customer_id.'"><button class="btn_edit">View History</button></a></td></tr>';
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



			
			$().UItoTop({ easingType: 'easeOutQuart' });
			


		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->

</body>
</html>