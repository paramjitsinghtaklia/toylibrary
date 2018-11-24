<!--header-->
<?php
include "header.php"; 
include 'classes/order.php';
include 'classes/customer.php';
$customer_id = $_GET['customer_id'];

$objCust = new customer();
$row = $objCust->getCustomer_history($customer_id); 
$row_plans = $objCust->getAll_Customerplans($customer_id); 

$objOrder = new order();
$row_orders = $objOrder->get_orders4customer($customer_id); 


$totalallpoints =  0 ;
foreach ($row_plans as  $value )
	{
		if ($value->expired=='0' || $value->expired=='3')
		{
			$totalallpoints = $totalallpoints +	$value->current_points;
		}
	}



?>
<link href="css/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="js/footable.core.js" type="text/javascript"></script>
 
	<div class="login-page" style="width:95%;" ng-app='toysearch' ng-controller='toylisting' >
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View<span> Customer History</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_customer.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">View Customers</button></a></div></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-body">
			  <form class="wow fadeInUp animated" data-wow-delay=".5s" name="addorder" id="addorder" action="" method="POST" enctype="multipart/form-data">
					<style>
						.td_text{ padding-top: 13px; padding-bottom: 0px;}
						.multiselect-container>li>a>label>input[type=checkbox]{margin-left:20px; }
						.dropdown-menu
						{
							padding-top: 10px;
							padding-left: 15px;
							padding-right: 15px;
							padding-bottom: 15px;
						}
						.multiselect-container>li {
							padding-bottom: 35px;
						}
						.btn-group, .btn-group-vertical {
							position: relative;
							display: inline-block;
							vertical-align: middle;
							margin-top: 3px;
						}
						.select_brand{
							font-size: 1em;
							padding: 0.9em 1em;
							width: 100%;
							color: #000;
							outline: none;
							border: 1px solid #E2DCDC;
							background: #FFFFFF;
							margin: 0em 0em 1em 0em;
						}
						.wrapper 
						{
							/*border:1px solid #000;*/
							display:inline-block;
							position:relative;
							width:100%;
						}
						button 
						{
							background:none transparent;
							border:0;
						}
						
						.btn_user 
						{
							position: absolute;
							right: 0;
							top: 0;
							background:#c6178d;
							height: 47px;
							width: 12%;
						}
						.text_area
						{
							font-size: 1em;
							padding: 0.9em 1em;
							width: 100%;
							color: #000;
							outline: none;
							border: 1px solid #E2DCDC;
							background: #FFFFFF;
							margin: 0em 0em 1em 0em;
							height:48px;
						}	
					</style>
					<table class="table" width="100%" border="0">
						<tr style="background:none;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Parent Name :</h3>
								<input type="text" style="margin-bottom:0; background:#f1f1f1" value="<?php echo $row['parent_name']; ?>" class="text_area" readonly=""/>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px; background:">Child Name :</h3>
								<input type="text" style="margin-bottom:0; background:#f1f1f1" value="<?php echo $row['child_name']; ?>" class="text_area" readonly=""/>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">E-mail ID :</h3>
								<input type="text" style="margin-bottom:0; background:#f1f1f1" value="<?php echo $row['email_id']; ?>" class="text_area" readonly=""/>
							</td>
							<td align="left"><b><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Balance Points :</h3>
								<input type="text" style="margin-bottom:0; background:#f1f1f1" value="<?php echo $totalallpoints?>" class="text_area" readonly=""/>
							</td> 
						</tr>
					</table>
					<table id='tableContainerFiltered1'  name='tableContainerFiltered1'  data-filtering="true"  width="100%" style="display: table;margin-bottom: 30px;">
						<thead> <h3 class="title" align="center" style="font-size:26px;border-bottom: 2px solid #0195da;padding-bottom: 4px;margin-bottom: 8px;">Customer Plans</h3>
							<tr>
								<th style="padding-top: 9px;padding-bottom: 10px;">Plan Name</th>
								<th data-breakpoints="xs sm">Plan Points</th>
								<th data-breakpoints="xs sm">Current Points</th>
								<th data-breakpoints="xs sm md">Status </th>
								<th data-breakpoints="all">Plan Assigned Date</th>
							</tr>
						</thead>
					<tbody>
						<tr>
							<?php 
								if ($row_plans===false)
								{
									echo 'No Plans Available Yet';
								} 
								else
								{
									foreach ($row_plans as  $value )
									{
										 
										echo '<tr><td>'.$value->plan_name.'</td>';
										echo '<td>'.$value->actual_points.'</td>';
										echo '<td>'.$value->current_points.'</td>';
										
										 
						
										if ($value->expired=='0')
										{
											$status_text = 'Active';
										}
										else if ($value->expired=='3')
										{
											$status_text = 'Future Plans';
										}
										else
										{
											$status_text = 'Expired';
										}
										
										echo '<td>'.$status_text.'</td>';
										echo '<td>'.$value->modified_date.'</td></tr>';
									}
								}
							?>
						</tr>
 				  </tbody>
			 </table>
			<table id='tableContainerFiltered1'  name='tableContainerFiltered1'  data-filtering="true"  width="100%">
				<thead> <h3 class="title" align="center" style="font-size:26px;border-bottom: 2px solid #0195da;padding-bottom: 4px;margin-bottom: 8px;">Order History</h3>
					<tr>
						<th style="padding-top: 9px;padding-bottom: 10px;">Order No.</th>
						<th data-breakpoints="xs sm">Start Date</th>
						<th data-breakpoints="xs sm">End Date</th>
						<th data-breakpoints="xs sm md">Create date</th>
						<th data-breakpoints="all">Total Points</th>
						<th data-breakpoints="xs sm">Status</th>
					</tr>
				</thead>
			<tbody>
				<tr>
					<?php 
						if ($row_orders===false)
						{
							echo 'No Order Available Yet';
						} 
						else
						{
							foreach ($row_orders as  $value )
							{
								$customer_id = $value->customer_id;
								echo '<tr><td>'.$value->order_id.'</td>';
								echo '<td>'.$value->order_startdate.'</td>';
								echo '<td>'.$value->order_enddate.'</td>';
								echo '<td>'.$value->created_date.'</td>';
								
								
								echo '<td>'.$value->total_points.'</td>';
								
				
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
								
								echo '<td>'.$status_text.'</td></tr>';
							}
						}
					?>
				</tr>
			</tbody>
		</table>
		</form>
	</div>
</div>
	</div>
	<!--//login-->
	<!--footer-->
	<?php include 'footer.php'; ?>
	<script src="js/main.js"></script>
	<script src="js/jquery-ui.js"></script>
	 <script type="text/javascript">
	
		$(document).ready(function() {
		 
		 $('#tableContainerFiltered1').footable();

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
				});
	</script>
</html>