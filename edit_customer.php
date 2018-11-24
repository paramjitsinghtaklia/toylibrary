<!--header-->
<?php 
//error_reporting(0);
include "header.php"; 
include 'classes/toys.php';
include 'classes/customer.php';
$customer_edit_id = $_GET['customer_id'];

$objtoy = new toys();
$objCust = new customer();
$arr_SelectedAgeGroup = array();
$arr_SelectedPlan = array();

$result_activeAgegroup= $objtoy->getAgegroup("active"); 
$result_activePlans= $objCust->get_Plans("active"); 

$row = $objCust->getSelectedCustomer($customer_edit_id); 


if ($_SERVER['REQUEST_METHOD']=="POST")
{
 	$objUpdate = new customer();
	if($objUpdate->UpdateCustomer($_POST))
	{
		echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:white;'> Customer Updated Successfully </div>";
	}
	else
	{
		echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> Error Occured ! While Updating Customer. Try Again! </div>";
	}
} 

?>
<!------------------------- Age count script ------------------------->
<script>
$(document).ready(function () {
  handleDOBChanged();
});

//listener on date of birth field
function handleDOBChanged() {
    $('#txt_dob').on('change', function () {
      if (isDate($('#txt_dob').val())) {
        var age = calculateAge(parseDate($('#txt_dob').val()), new Date());
      	$("#txt_age").val(age);   
      } else {
        $("#txt_age").val('');   
      }      
    });
}

//convert the date string in the format of dd/mm/yyyy into a JS date object
function parseDate(dateStr) {
  var dateParts = dateStr.split("/");
  return new Date(dateParts[2], (dateParts[1] - 1), dateParts[0]);
}

//is valid date format
function calculateAge (dateOfBirth, dateToCalculate) {
    var calculateYear = dateToCalculate.getFullYear();
    var calculateMonth = dateToCalculate.getMonth();
    var calculateDay = dateToCalculate.getDate();

    var birthYear = dateOfBirth.getFullYear();
    var birthMonth = dateOfBirth.getMonth();
    var birthDay = dateOfBirth.getDate();

    var age = calculateYear - birthYear;
    var ageMonth = calculateMonth - birthMonth;
    var ageDay = calculateDay - birthDay;

    if (ageMonth < 0 || (ageMonth == 0 && ageDay < 0)) {
        age = parseInt(age) - 1;
    }
    return age;
}

function isDate(txtDate) {
  var currVal = txtDate;
  if (currVal == '')
    return true;

  //Declare Regex
  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
  var dtArray = currVal.match(rxDatePattern); // is format OK?

  if (dtArray == null)
    return false;

  //Checks for dd/mm/yyyy format.
  var dtDay = dtArray[1];
  var dtMonth = dtArray[3];
  var dtYear = dtArray[5];

  if (dtMonth < 1 || dtMonth > 12)
    return false;
  else if (dtDay < 1 || dtDay > 31)
    return false;
  else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31)
    return false;
  else if (dtMonth == 2) {
    var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
    if (dtDay > 29 || (dtDay == 29 && !isleap))
      return false;
  }

  return true;
}
</script>
<!------------------------- // Age count script ---------------------->
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
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Edit<span> Customer</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_customer.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">View Customers</button></a></div></h3>
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
							<?php 
										$parties = $normal = '';
										if($row['customer_type']=='normal')
										{ 
											$normal = 'selected'; 
										}
										else if($row['customer_type']=='parties')
										{
											$parties = 'selected';
										}
									?>
									<option value="">--Select--</option>
									<option value="parties" <?php echo $parties; ?>>Parties</option>
									<option value="normal" <?php echo $normal; ?>>Normal Customer</option>
								</select>
								</td>
								</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Child Name :</h3><input type="text" name="txt_childname" id="txt_childname" required="true" style="margin-bottom:0;" value="<?php echo $row['child_name']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Parent Name :</h3><input type="text" name="txt_parentname" id="txt_parentname" required="true" style="margin-bottom:0;" value="<?php echo $row['parent_name']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Child Age Group :</h3>
							<select name="ddl_age" id="ddl_age" required="true" class="select_brand">
								<?php
									foreach ($result_activeAgegroup as $value )
									{
										if (in_array($value->age_groupid, $arr_SelectedAgeGroup, TRUE))
												{
													$select = 'selected';
												}
												else
												{
													$select = '';	
												}
										echo '<option '.$select.' value="'.$value->age_groupid.'">'.$value->age_group_name.'</option>';
									}
								?>
								</select>
								<?php /*?><select name="ddl_age" id="ddl_age" required="true" class="select_brand" >
								<option value="">--Select--</option>
									<?php 
										foreach ($result_activeAgegroup as  $value )
										{
											echo '<option value="'.$value->age_groupid.'" selected>'.$value->age_group_name.'</option>';
										}
									?>
								</select><?php */?>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Child DOB :</h3><input type="text" name="txt_dob"   id="txt_dob" required="true" style="margin-bottom:0;" value="<?php echo $row['child_dob']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Child Age :</h3><input type="text" name="txt_age"   id="txt_age" required="true" style="margin-bottom:0;" value="<?php echo $row['child_age']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Gender :</h3>
								<select name="ddl_gender" required="true" id="ddl_gender" class="select_brand">
									<?php 
									$female_selected = $male_selected  = '';
										$active_selected = $inactive_selected = '';
										if($row['gender']=='M')
										{ 
											$male_selected = 'selected'; 
										}
										else if($row['gender']=='F')
										{
											$female_selected = 'selected';
										}
									?>
									<option value="M" <?php echo $male_selected; ?>>Boy</option>
									<option value="F" <?php echo $female_selected; ?>>Girl</option>
								</select>
								</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Address :</h3><textarea  name="txt_address" id="txt_address" required="true" style="margin-bottom:0;width: 100%;height: 100px;"><?php echo $row['address']; ?> </textarea> </td>
						</tr>
						 
						
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Pincode :</h3><input type="text" name="txt_pincode" id="txt_pincode" required="true" style="margin-bottom:0;" value="<?php echo $row['pincode']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Mobile Number :</h3><input type="text" name="txt_mobile_number" id="txt_mobile_number" required="true" style="margin-bottom:0;" value="<?php echo $row['mobile_number']; ?>"></td>
						</tr>
						
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Tel. Number :</h3><input type="text" name="txt_tel_number" id="txt_tel_number" required="true" style="margin-bottom:0;" value="<?php echo $row['tel_number']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Email. Id :</h3><input type="text" name="txt_email_id" id="txt_email_id" required="true" style="margin-bottom:0;" value="<?php echo $row['email_id']; ?>"></td>
						</tr>

						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Plan :</h3>
								<select name="ddl_plan_id" id="ddl_plan_id" required="true" class="select_brand">
								<?php
									foreach ($result_activePlans as  $value )
									{
										if (in_array($value->plan_id, $arr_SelectedPlan, TRUE))
											{
													$select = 'selected';
											}
											else
											{
													$select = '';	
											}
										echo '<option '.$select.' value="'.$value->plan_id.'">'.$value->plan_name.'</option>';
									}
								?>
								<?php /*?><option value="">--Select Plan--</option>
									<?php 
										foreach ($result_activePlans as  $value )
										{
											echo '<option value="'.$value->plan_id.'" selected>'.$value->plan_name.'</option>';
										}
								?><?php */?>
								</select>
							</td>
						</tr>
							<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Active :</h3>
								<select name="ddlstatus" id="ddlstatus" class="select_brand">
									<?php 
										$active_selected = $inactive_selected = '';
										if($row['active']==0)
										{ 
											$active_selected = 'selected'; 
										}
										else
										{
											$inactive_selected = 'selected';
										}
									?>
									<option value="0" <?php echo $active_selected; ?>>Active</option>
									<option value="1" <?php echo $inactive_selected; ?>>In-Active</option>
								</select>
								
								</td>
						</tr>
			<tr>
								<input type="hidden" value="<?php echo $row['customer_id']; ?>" name="txt_custid" id="txt_custid" />
								<td><input type="submit" name="submit" value="Update Customer"></td>
							</tr>
						</table>
					
					 
				</form>
			</div>
		</div>
	</div>
	<!--//login-->
	<!--footer-->
	<?php include 'footer.php'; ?>


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
	</script>
	<!--//footer-->

	<!--search jQuery-->
	<!--<script src="js/main.js"></script>-->
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<!--<script type="text/javascript">
	
		/*$(document).ready(function() {
	
		$('#ddl_agegroup').multiselect();
		$('#ddl_category').multiselect();*/

			/*var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});*/
	</script>-->
 
</body>
</html>