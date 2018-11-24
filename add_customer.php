<!--header-->
<?php include "header.php"; 

include 'classes/toys.php';
include 'classes/customer.php';

$objtoy = new toys();
$objCust = new customer();
$result_activeAgegroup= $objtoy->getAgegroup("active"); 
$result_activePlans= $objCust->get_Plans("active"); 



if ($_SERVER['REQUEST_METHOD']=="POST")
{
 

if($objCust->AddCustomer($_POST))
	{
		echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:white;'> Customer Added Successfully </div>";
	}
	else
	{
		echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> Error Occured ! While Adding Customer. Try Again! </div>";
	}
} 

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
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
	<div class="login-page" style="">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Add<span> Customer</span></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-body">
				<form class="wow fadeInUp animated" data-wow-delay=".5s" action="" method="POST">
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
					</style>
					<table class="table" width="100%" border="0">
					<tr>
					<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Customer Type :</h3>
							<select name="ddl_customertype" required="true" id="ddl_customertype" class="select_brand">
									<option value="">--Select--</option>
									<option value="parties">Parties</option>
									<option value="normal">Normal Customer</option>
								</select>
								</td>
								</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Child Name :</h3><input type="text" name="txt_childname" id="txt_childname" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Parent Name :</h3><input type="text" name="txt_parentname" id="txt_parentname" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Child DOB :</h3><input type="text" name="txt_dob"   id="txt_dob" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Child Age Group :</h3>
								<select name="ddl_age" id="ddl_age" required="true" class="select_brand">
								<option value="">--Select--</option>
									<?php 
										foreach ($result_activeAgegroup as  $value )
										{
											echo '<option value="'.$value->age_groupid.'">'.$value->age_group_name.'</option>';
										}
								?>
								</select>
							</td>
						</tr>
						
							<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Gender :</h3>
							<select name="ddl_gender" required="true" id="ddl_gender" class="select_brand">
									<option value="">--Select--</option>
									<option value="M">Boy</option>
									<option value="F">Girl</option>
								</select>
								</td>
						</tr>
						<tr>	
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Address :</h3><textarea  name="txt_address" id="txt_address" required="true" style="margin-bottom:0;width: 100%;height: 100px;"> </textarea> </td>
						</tr>
						 
						
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Pincode :</h3><input type="text" name="txt_pincode" id="txt_pincode" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Mobile Number :</h3><input type="text" name="txt_mobile_number" id="txt_mobile_number" required="true" style="margin-bottom:0;"></td>
						</tr>
						
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Tel. Number :</h3><input type="text" name="txt_tel_number" id="txt_tel_number" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Email. Id :</h3><input type="text" name="txt_email_id" id="txt_email_id"  style="margin-bottom:0;"></td>
						</tr>

						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Plan :</h3>
								<select name="ddl_plan_id" id="ddl_plan_id" required="true" class="select_brand">
								<option value="">--Select Plan--</option>
									<?php 
										foreach ($result_activePlans as  $value )
										{
											echo '<option value="'.$value->plan_id.'">'.$value->plan_name.'</option>';
										}
								?>
								</select>
							</td>
						</tr>
							<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Active :</h3>
							<select name="ddlstatus" id="ddlstatus" class="select_brand">
									<option value="0">Active</option>
									<option value="1">In-Active</option>
								</select>
								</td>
						</tr>
			<tr>
								<td><input type="submit" name="submit" value="Add Customer"></td>
							</tr>
						</table>
					
					 
				</form>
			</div>
		</div>
	</div>
	<!--//login-->
	<!--footer-->
	<?php include 'footer.php'; ?>
	<!--//footer-->

	<!--search jQuery-->
	<script src="js/main.js"></script>
	<script src="js/jquery-ui.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
	
		$(document).ready(function() {

			$( "#txt_dob" ).datepicker({
				dateFormat: "dd/mm/yy",
				changeMonth: true,
				changeYear: true,
				yearRange: "-20:+0",
			});
	
		$('#ddl_agegroup').multiselect();
		$('#ddl_category').multiselect();

			/*var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			*/
		});
	</script>
 
</body>
</html>