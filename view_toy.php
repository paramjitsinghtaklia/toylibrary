<?php 
include "header.php"; 
include 'classes/toys.php';

$objtoy = new toys();
$result_data = $objtoy->getToys(); 

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
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Toy</span> 

			<div style="float:right;margin-left: -13%;margin-right: 2%;">
			<?php
		 	if ($_SESSION["user_role"]=="admin")
				{	
				?>	
			<a href="add_toy.php" style="text-decoration:none; color:#fff;">
			<button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">Add Toy</button></a>
			<?php
				}
			?>
			</div></h3>
		</div>
			
			
			<div class="">
			<div class="login-body" style="margin-top: -5%;">
	<table id='tableContainerFiltered1' data-expand-first="true" name='tableContainerFiltered1'  data-filtering="true" style="margin-top:42px;">
		<thead> 
			<tr>
				<th >Toy Name</th>
				<th data-breakpoints="xs sm">Code</th>
				<th data-breakpoints="all">Desc</th>
				<th data-breakpoints="xs sm md">Image</th>
				<?php
		 	if ($_SESSION["user_role"]=="admin")
				{	
				?><th data-breakpoints="xs sm">MRP Amount</th>
				<?php
			}
				?>
				<th data-breakpoints="xs sm">Rent Amount</th>
				<th data-breakpoints="all">Selling Amount</th>
				<th data-breakpoints="xs sm md">Points</th>
				<th data-breakpoints="xs sm md">Quantity</th>
				<th data-breakpoints="all">Damaged</th>
				<th data-breakpoints="xs sm md">Current Quantity</th>
				<th data-breakpoints="all">Date</th>
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
				$toy_id = $value->toy_id;
				echo '<tr><td>'.$value->toy_name.'</td>';
				echo '<td>'.$value->toy_code.'</td>';
				echo '<td>'.$value->toy_desc.'</td>';
				 
					if(trim($value->image_path)=='')
					{
						echo '<td>No Image Available</td>';
					}	
					else
					{
						echo '<td><img src="./toy_images/'.$value->image_path.'" alt="" height="200" width="200"></td>';
					}

				if ($_SESSION["user_role"]=="admin")
				{
					echo '<td>'.round($value->mrp_amount).'</td>';
				}
				echo '<td>'.round($value->rent_amount).'</td>';
				echo '<td>'.round($value->selling_amount).'</td>';
				echo '<td>'.$value->points.'</td>';
				if ($value->active=='0')
				{
					$status_text = 'Active';
				}
				else
				{
					$status_text = 'In-Active';
				}
				
				echo '<td>'.$value->quantity.'</td>';
				echo '<td>'.$value->damaged.'</td>';
				echo '<td>'.$value->current_quantity.'</td>';
				echo '<td>'.$value->modified_date.'</td><td><a href="edit_toy.php?toy_edit_id='.$toy_id.'"><button class="btn_edit">Edit</button></a></td></tr>';
				//&nbsp;<button class="btn_delete">Delete</button>
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