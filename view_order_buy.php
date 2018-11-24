<?php 
include "header.php"; 
include 'classes/order.php';

$objorder = new order();
$result_data = $objorder->get_orders_sell(); 

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
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Order(Toy Selling)</span> <div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="add_order.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">Add Order</button></a></div></h3>
		</div>
			
			
			<div class="">
			<div class="login-body" style="margin-top: -5%;">
	<table id='tableContainerFiltered1'  name='tableContainerFiltered1'  data-filtering="true" style="margin-top:42px;">
		<thead> 
			<tr>
				<th >Order No.</th>
				<th>Order Amount.</th>
			
				<th data-breakpoints="xs sm md">Create date</th>
				<th data-breakpoints="all">Child Name</th>
				<th data-breakpoints="xs sm">Parent Name</th>
				<th data-breakpoints="xs sm">Mobile No.</th>
				<th data-breakpoints="all">Email</th>
				<th data-breakpoints="xs sm">Status</th>
				<th>Actions</th>
			</tr>
		</thead>
	<tbody>
	<?php 
		if ($result_data===false)
		{
			echo 'No Order Available Yet';
		} 
		else
		{
			foreach ($result_data as  $value )
			{
				$customer_id = $value->customer_id;
				echo '<tr><td>'.$value->order_id.'</td>';
				echo '<td>'.$value->order_amount.'</td>';
				echo '<td>'.$value->created_date.'</td>';
				echo '<td>'.$value->child_name.'</td>';
				echo '<td>'.$value->parent_name.'</td>';
				echo '<td>'.$value->mobile_number.'</td>';
				echo '<td>'.$value->email_id.'</td>';
				

				if ($value->status=='0')
				{
					$status_text = 'New Order';
				}
				elseif ($value->status=='1')
				{
					$status_text = 'Closed';
				}
				elseif ($value->status=='2')
				{
					$status_text = 'Cancel';
				}
				
				echo '<td>'.$status_text.'</td>';
				
				//echo '<td><a href="edit_customer.php?customer_id='.$customer_id.'"><button class="btn_edit">Close</button></a>&nbsp;<button class="btn_delete">Cancel</button></td></tr>';

				echo "<td><select><option>--Select--</option><option>Close</option> <option>Toy Lost/Damaged</option>  <option>Extra Days</option>  </select></td>";


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