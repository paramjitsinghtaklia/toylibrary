<?php 
include "header.php"; 
include 'classes/toys.php';

$objtoy = new toys();
$result_data = $objtoy->getToys(); 




?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.jquery-az.com/boots/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="https://www.jquery-az.com/boots/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="js/footable-0.1.js" type="text/javascript"></script>
<script src="js/footable.sortable.js" type="text/javascript"></script>
<link href="css/footable-0.1.css" rel="stylesheet" type="text/css" /> 

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
	<div class="login-page" style="width: 100%! important;">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Brands</span></h3>
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
					background:#c6178d;
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
<table id='tableContainerFiltered1' name='tableContainerFiltered1' class='footable' data-filtering='true' >
     <thead> <tr ><th data-class='expand'>Toy Name</th>
      <th>Code</th>
	  <th data-hide='all'>Desc</th>
	  <th data-hide='phone,tablet'>MRP Amount</th>
	  <th data-hide='phone,tablet'>Rent Amount</th>
	    <th data-hide='all'>Selling Amount</th>
	  <th data-hide='phone,tablet'>Points</th>
	  <th data-hide='phone,tablet'>Quantity</th>
	    <th data-hide='all'>Damaged</th>
	   <th>Current Quantity</th>
	   <th data-hide='all'>Date</th>
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
				echo '<tr><td>'.$value->toy_name.'</td>';
				echo '<td>'.$value->toy_code.'</td>';
				echo '<td>'.$value->toy_desc.'</td>';
				echo '<td>'.$value->mrp_amount.'</td>';
				echo '<td>'.$value->rent_amount.'</td>';
				echo '<td>'.$value->selling_amount.'</td>';
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
				echo '<td>'.$value->modified_date.'</td><td><button >Edit</button>&nbsp;<button >Delete</button></td></tr>';
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