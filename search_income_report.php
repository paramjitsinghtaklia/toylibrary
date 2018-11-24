<!--header-->
<?php include "header.php";  ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/table.css" rel="stylesheet" type="text/css" /> 

<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/datepicker.js"></script>
<link rel="stylesheet" href="css/datepicker.css" type="text/css" />
<div class="login-page" style="width:90%" >
	<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="">
		<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;width: 100%;margin-left: 0;">Income <span> Report</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><!--<a href="#" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 0;padding-top: 11px;padding-bottom: 11px;">View Income</button></a>--></div></h3>
	</div>
	<div class="widget-shadow">
		<div class="login-body">
			<?php 
				include 'classes/income.php';
				
				if ($_SERVER['REQUEST_METHOD']=="POST")
				{
					$objIncome = new income();
					$result_data = $objIncome->getincome_report($_POST['income_type'],$_POST['from_date'],$_POST['to_date']); 
				}
				
			?>
		   <form class="wow fadeInUp animated" data-wow-delay=".5s" name="addincome" id="addincome" action="" method="POST" autocomplete="off">
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
					/*.wrapper 
					{
						border:1px solid #000;
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
						height: 40px;
						width: 12%;
					}*/
				</style>
				
				<link href = "css/datepicker.css" rel = "stylesheet">
				<style>
					.ui-datepicker-trigger
					{
						margin-bottom: -8px !important;
						width: 41px;
						margin-left: 4px;
						cursor: pointer !important;
						margin-top: -10px;
						height: 41px;
					}
				</style>
				<div style="display:block;" id="hidden_cust">
					<table style="width:100%;">
						<tr style="background:none; margin-top:20px;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Income Source Type :</h3>
								<select name="income_type" required="true" id="income_type" class="select_brand" >
									<option value="">--- Select Source Type---</option>
									<option value="0">All</option>
									<option value="1">Plan Amount</option>
									<option value="2">Registration Amount</option>
									<option value="3">Deposit Amount</option>
									<option value="4">Selling Amount</option>
									<option value="5">Party Seller Amount</option>
								</select>
							</td>
							<td align="left"><h3 style="margin-top: -31px;font-weight:bold;margin-bottom: 13px;">From Date:</h3>
								<!--<div class="wrapper">-->
									<input type="text" name="from_date" id="from_date" style="margin-bottom:0; width:85%;" />
									
								<!--</div>-->
							</td>
							<td align="left"><h3 style="margin-top: -31px;font-weight:bold;margin-bottom: 13px;">To Date:</h3>
								<!--<div class="wrapper">-->
									<input type="text"  name="to_date" id="to_date" style="margin-bottom:0;width:85%;" />
									<!--<a class="search_customer" href="search_customer.php"> <button class="btn_user"><img src="images/calendar_1.png" /></button></a>
								</div>-->
							</td>
							<td></td>
						</tr>
					</table>
				</div>
				
				<table width="100%" align="center">
					<tr>
						<input type="hidden" name="hdn_custid" id="hdn_custid">
						<input type="hidden" name="hdn_orderid" id="hdn_orderid">
						<td colspan="4" align="center"><input type="submit" name="submit" value="Search" style=""></td>
					</tr>
				</table>

<div>
				<table  id='tableContainerFiltered1' data-expand-first="true" name='tableContainerFiltered1'  data-filtering="true" style="margin-top:42px;width: 100%">
		<thead> 
			<tr>
				<th>Sr.No.</th>
				<th>Income Type </th>
				<th>Income Amount</th>
				<th>Description</th>
				<th>Created Date</th>
				
			</tr>
		</thead>
	<tbody>
	<?php 
	$total_amount = 0 ;
if ($_SERVER['REQUEST_METHOD']=="POST")
				{

		if ($result_data===false)
		{
			echo 'No Income Available Yet';
		} 
		else
		{
			$x=1;
			
			foreach ($result_data as  $value )
			{
				
				$income_id = $value->income_id;
				echo '<tr><td>'.$x.'</td>';
				echo '<td>';
				if ($value->income_source_type=="1")
					echo 'Plan Amount';
				else if ($value->income_source_type=="2")
					echo 'Registration Amount';
				else if ($value->income_source_type=="3")
					echo 'Deposit Amount';
				else if ($value->income_source_type=="4")
					echo 'Selling Amount';
				else if ($value->income_source_type=="5")
					echo 'Party Seller Amount';
					echo '</td>';			


				//echo '<td>'.$value->income_source_type.'</td>';
				echo '<td>'.$value->income_amount.'</td>';
					echo '<td>'.$value->description.'</td>';
				echo '<td>'.$value->created_date.'</td>';
			
				if ($value->income_amount<>'')
					$total_amount = $total_amount + $value->income_amount;
				$x++;
				echo "</tr>";
			}
			
		}
	}
echo "<tr><td></td><td><b>Total Amount</b></td><td><b>".$total_amount."</td><td></td><td></td></tr>"
?>
 
	</tbody>
	</table>
	
	</div>		</form>
		</div>
	</div>
</div>
	<!--//login-->
	<!--footer-->
	<?php include 'footer.php'; ?>
	<!--//footer-->

<script src="js/main.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/angular/angular.min.js"></script>
<script src="js/angular-route/angular-route.min.js"></script> 
<script src="js/angular-ui-router/release/angular-ui-router.min.js"></script>    
<script src="js/angular-local-storage/dist/angular-local-storage.min.js"></script>
<script src="js/angular/ui-bootstrap-2.5.0.min.js"></script>
<script src="js/angular/ui-bootstrap-tpls-2.5.0.min.js"></script>
<script src="js/app/searchtoy.js"></script>

				<script>
				 $(function() {
					$( "#from_date" ).datepicker({
						showOn:"button",
					   	buttonImage: "images/cal.png",
					   	buttonImageOnly: true,
						dateFormat:'dd-mm-yy'
					});
					$( "#to_date" ).datepicker({
					   	showOn:"button",
					   	buttonImage: "images/cal.png",
					   	buttonImageOnly: true,
					  	dateFormat:'dd-mm-yy'
					  /*formatDate:'Y-m-d'*/
					});
				 });
			  </script>

 
</body>
</html>