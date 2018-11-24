<!--header-->
<?php
include "header.php"; 
include 'classes/order.php';
include 'classes/customer.php';

$objCust = new customer();
$arr_SelectedPlan = array();
$result_activePlans= $objCust->get_Plans("active"); 

$today = date('d/m/Y');
$end_date = date('d/m/Y', strtotime(' + 9 days')); 

if ($_SERVER['REQUEST_METHOD']=="POST")
{
	$objCust = new customer();
	
	 
	if($objCust->RenewPlan($_POST))
	{
		echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:white;'> Plan Renewed Successfully... </div>";
	}
	else
	{
		echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> ".asdsadsad." </div>";
	}
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="js/jquery.validate.min.js"></script>
 
	<div class="login-page" style="width:95%;" ng-app='toysearch' ng-controller='toylisting' >
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Renew<span> Plan</span><!--<div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_order.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">View Orders</button></a></div>--></h3>
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
						
						/*input {
							padding-right:30px;
						}*/
					</style>
					<table class="table" width="100%" border="0">
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Select Customer :</h3>
								<div class="wrapper">
									<input type="text" type="text" name="sel_cust" id="sel_cust"  style="margin-bottom:0;" />
									<a class="search_popup" href="search_customer.php"> 
									<button class="btn_user"><img src="images/user_1.png" /></button></a>
								</div>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Order type :</h3>
								<select name="order_type" id="order_type" required="true" class="select_brand">
								 	<option selected value="rent">Rent</option>
								</select>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Client Type :</h3>
								<select name="client_type" id="client_type" required="true" class="select_brand">
									<option selected value="Customer">Customer</option>
								</select>
							</td>
						</tr>
						<tr style="background:none;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Customer Name :</h3>
								<input type="text" type="text" name="cust_name" id="cust_name" required="true" style="margin-bottom:0; background:#f1f1f1"  disabled="disabled"/>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">E-mail ID :</h3>
								<input type="text" type="text" name="email_id" id="email_id" required="true" style="margin-bottom:0; background:#f1f1f1"   disabled="disabled"/>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Balance Points :</h3>
								<input type="text" type="text" name="bal_points" id="bal_points" required="true" style="margin-bottom:0; background:#f1f1f1"  disabled="disabled" />
							</td>
						</tr>
					</table>
					<table width="50%" align="center">
						<tr style="background:none">
							<td align="right" width="25%"><h3 style="font-weight:bold;">Select plan to renew :</h3>
							<td align="left">
								<select name="ddl_plan_id" id="ddl_plan_id" required="true" class="select_brand" style="margin:0; width:70% ">
									<option value="" selected="selected">----- Select Plan -----</option>
									<?php
										foreach ($result_activePlans as  $value )
										{
											echo '<option '.$select.' value="'.$value->plan_id.'">'.$value->plan_name.'</option>';
										}
									?>
								</select>
							</td>
						</tr>
					</table>
					<table class="" width="20%" border="0" align="center">
						<tr style="background:none">
							<td>
								<input type="hidden" name="hdn_custid" id="hdn_custid">
								<input type="submit" name="submit" value="Renew Plan" style="width:100%;font-size: 18px;font-weight: 500;">
							</td>
						</tr>
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

			$( "#s_date" ).datepicker({
				dateFormat: "dd/mm/yy",
				 minDate: 0,
				  onSelect: function() {
						   var  minDate = $( "#s_date" ).datepicker("getDate");
						    var mDate = new Date(minDate.setDate(minDate.getDate()));
						    maxDate = new Date(minDate.setDate(minDate.getDate() + 9));
						$("#e_date").datepicker("setDate", maxDate);

					}
			});
			$( "#e_date" ).datepicker({
				dateFormat: "dd/mm/yy"
			});

			$("#addtoy").validate(
			{
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",
			rules:{
				sel_cust: {required: true},
				txt_toyname: {required: true},				
				client_type: {required: true}
				},			 
			messages:{
				 sel_cust :{required: "Please Select Customer"},
				 txt_toyname :{required: "Please Enter Toy Name" },
				 client_type:{required: "Please Select Client Type."} 
				},
			highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
			unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
			errorPlacement: function(error, element) {
								error.insertAfter(element);
						}
		}			
	); 

		 $('.search_popup').click(function() {
		     var NWin = window.open($(this).prop('href'), '', 'height=600,width=1000');
			 if (window.focus)
				 {
				   NWin.focus();
				 }
		     return false;
   	 		});

 
		});
	</script>
<script src="js/angular/angular.min.js"></script>
<script src="js/angular-route/angular-route.min.js"></script> 
<script src="js/angular-ui-router/release/angular-ui-router.min.js"></script>    
<script src="js/angular-local-storage/dist/angular-local-storage.min.js"></script>
<script src="js/angular/ui-bootstrap-2.5.0.min.js"></script>
<script src="js/angular/ui-bootstrap-tpls-2.5.0.min.js"></script>
<script src="js/app/searchtoy.js"></script>
</body>
</html>