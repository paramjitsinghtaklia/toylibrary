<?php 
include "header.php"; 
include 'classes/toys.php';

$objtoy = new toys();
$result_data = $objtoy->getAgegroup(""); 


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/footable-0.1.js" type="text/javascript"></script>
<script src="js/footable.sortable.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/0.1/js/footable.filter.js" type="text/javascript"></script>
<link href="css/footable-0.1.css" rel="stylesheet" type="text/css" /> 


 
	<div class="login-page" style="width: 100%! important;">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Age-group</span></h3>
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
					background:#c6178d !important;
					color:#fff;
				}
				
				 td {
					text-align: left;
					padding: 8px;
					font-size:13px;
				}
				tr:nth-child(even){background-color: #f2f2f2}
				</style>
			
			
			<div class="widget-shadow">
			<div class="login-body">
<table id='tableContainerFiltered1' name='tableContainerFiltered1' class='footable'  data-filtering="true" >
     <thead> <tr ><th data-class='expand'>Age-group Name</th>
      <th>Status</th>
      <th>Min Age</th>
      <th>Max Age</th>
	  <th data-hide='phone,tablet'>Modified Date</th>
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
				echo '<td><button >Edit</button>&nbsp;<button >Delete</button></td></tr>';
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