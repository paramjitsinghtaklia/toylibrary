<?php 
include "header.php"; 
include 'classes/toys.php';

$objtoy = new toys();
$result_data = $objtoy->getAgegroup(""); 


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
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Age-group</span><div style="float:right;margin-left: -13%;margin-right: 2%;">
				<?php
		 	if ($_SESSION["user_role"]=="admin")
				{	
				?>	
			<a href="add_agegroup.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">Add Age Group</button></a>
			<?php
				}
			?>
			</div></h3>
		</div>
			
			
			<div class="">
			<div class="login-body" style="margin-top: -5%;">
			<table id='tableContainerFiltered1' name='tableContainerFiltered1' data-filtering="true" style="margin-top:42px;">
				 <thead> <tr ><th >Age-group Name</th>
				 
				  <th data-breakpoints="xs sm">Min Age</th>
				  <th data-breakpoints="xs sm">Max Age</th>
				  <th data-breakpoints="xs sm">Modified Date</th>
				   <th>Status</th>	
				  <th >Actions</th>
				</tr>
				</thead>
			<tbody>
	<?php 

		if ($result_data===false)
		{
			echo 'No Age-group Available Yet';
		} 
		else
		{
			foreach ($result_data as  $value )
			{
				$age_id = $value->age_groupid;
				echo '<tr><td>'.$value->age_group_name.'</td>';
				echo '<td>'.$value->min_age.'</td><td>'.$value->max_age.'</td><td>'.$value->modified_date.'</td>';
				if ($value->active=='0')
				{
					$status_text = 'Active';
				}
				else
				{
					$status_text = 'In-Active';
				}
				
				echo '<td>'.$status_text.'</td>';
				echo '<td><a href="edit_agegroup.php?age_groupid='.$age_id.'"><button class="btn_edit">Edit</button></a></td></tr>';

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
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->

</body>
</html>