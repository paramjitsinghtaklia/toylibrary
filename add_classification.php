<!--header-->
<?php

include "header.php";
include 'classes/toys.php';

if ($_SERVER['REQUEST_METHOD']=="POST")
{
   
$objtoy = new toys();


if($objtoy->AddClassification($_POST))
	{
		echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:white;'>Toy Classifications Added Successfully </div>";
	}
	else
	{
		echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> Error Occured ! While Adding Toy Classifications. Try Again! </div>";
	}
}
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.jquery-az.com/boots/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="https://www.jquery-az.com/boots/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>
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
	<div class="login-page" style="width:60%;">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Add<span> Toy Classifications/Category</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_classification.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">View Classifications</button></a></div></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-body">
				<form class="wow fadeInUp animated" data-wow-delay=".5s" action="" method="POST" id="frm_category">
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Classification/Category Name :</h3>
							<input type="text" name="txt_categoryname"  id="txt_categoryname" style="margin-bottom:0;"></td>
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
								<td><input type="submit" name="submit" value="Add Category"></td>
							</tr>
						</table>
					
					<!--<input type="text" placeholder="Toy Code" name="toy_code" required="">
					<input type="text" placeholder="Toy Description" name="toy_description" required="">
					<input type="file" placeholder="Toy Image" name="toy_image" required="">
					<input type="text" placeholder="Toy MRP" name="toy_mrp" required="">
					<input type="text" placeholder="Toy Points" name="toy_points" required="">
					<input type="text" placeholder="Toy Rent Amount(Single Rent Amount)" name="toy_rent_amnt" required="">
					<input type="text" placeholder="Toy Qunitity" name="toy_qty" required="">
					<input type="submit" name="submit" value="Add Toy">-->
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
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
			
			$("#frm_category").validate(
			{
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",
			rules:{
				txt_categoryname: {required: true},
				ddlstatus: {required: true }
			 },			 
		messages:
			{
				txt_categoryname :{required: "Please Enter Classification Name"},
				 ddlstatus:{required: "Please Select Status."}
				
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