<?php 
include "header.php"; 
include 'classes/customer.php';

$objcust = new customer();
$result_data = $objcust->get_Plans(""); 


?>
<link href="css/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 <script src="js/footable.core.js" type="text/javascript"></script>
<script src="js/footable.sorting.js" type="text/javascript"></script>
<script src="js/footable.filtering.js" type="text/javascript"></script>
 

	<!--login-->
	<div class="login-page" style="width: 100%! important;">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Brands</span></h3>
		</div>
			
			
			<div class="">
			<div class="login-body" style="margin-top: -5%;">
<table id='tableContainerFiltered1' name='tableContainerFiltered1'  data-filtering="true" style="margin-top:42px;" >
     <thead> <tr ><th data-class='expand'>Plan Name</th>
            	<th>Plan Amount</th>
     			<th data-breakpoints="xs sm">Plan Points</th>
      			<th data-breakpoints="xs sm">Status</th>
	  			<th data-breakpoints="xs sm">Created Date</th>
	  			<th >Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php 

		if ($result_data===false)
		{
			echo 'No Plans Available Yet';
		} 
		else
		{
			foreach ($result_data as  $value )
			{
				echo '<tr><td>'.$value->plan_name.'</td>
				<td>'.$value->plan_amount.'</td>
				<td>'.$value->plan_points.'</td>';
				if ($value->active=='0')
				{
					$status_text = 'Active';
				}
				else
				{
					$status_text = 'In-Active';
				}
				
				echo '<td>'.$status_text.'</td>';
				echo '<td>'.$value->modified_date.'</td> 
				<td><a href="edit_plan.php?plan_id='.$value->plan_id.'"><button class="btn_edit">Edit</button></a>&nbsp;<button class="btn_delete">Delete</button></td></tr>';
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
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->

</body>
</html>