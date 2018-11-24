<!--header-->
<?php 
include "header.php";
include 'classes/toys.php';


if ($_SERVER['REQUEST_METHOD']=="POST")
{

$objtoy = new toys();

if($objtoy->AddPlans($_POST))
	{
		echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:white;'> Plan Added Successfully </div>";
	}
	else
	{
		echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> Error Occured ! While Adding Plan. Try Again! </div>";
	}
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.jquery-az.com/boots/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="https://www.jquery-az.com/boots/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>

	<div class="login-page" style="">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Add<span> Plans</span></h3>
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Plan Name :</h3><input type="text" name="txt_planname"  id="txt_planname" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Plan Amount :</h3><input type="text" name="txt_planamount"  id="plan_amount"  required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Plan Points :</h3><input type="text" min="0"  name="txt_planpoints"  id="txt_planpoints" required="true" style="margin-bottom:0;"></td>
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
								<td><input type="submit" name="submit" value="Add Plans"></td>
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
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {


			$("#addtoy").validate(
			{
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",
			rules:{
				txt_toyCode: {required: true},
				txt_toyname: {required: true},				
				txt_toydesc: {required: true},				
				file_toyimage: {required: true},				
				ddl_category: {required: true},				
				ddl_agegroup: {required: true},				
				ddl_brand: {required: true},				
				txt_toymrp: {required: true,digits: true },
				txt_toy_sellingprice: {required: true,digits: true },
				txt_toypoints: {required: true,digits: true },
				txt_toyrentamt: {required: true,digits: true },
				txt_toyquantity: {required: true,digits: true }
				
				//idv_value: {required: true,minlength: 1,maxlength: 6,digits : true}	 
				//~ ,	party_email: {required: true,email: true }	 
			 },			 
		messages:
			{
				txt_toyCode :{required: "Please Enter Toy Code"},
				 txt_toyname :{required: "Please Enter Toy Name" },
				 txt_toydesc:{required: "Please Enter Toy Description."} ,	
				 file_toyimage:{required: "Please Select Toy Image"} ,	
				 ddl_category:{required: "Please Select Toy Classification."} ,	
				 ddl_agegroup:{required: "Please Select Age Group."} ,	
				 ddl_brand:{required: "Please select Brand"} ,	
				 txt_toymrp:{required: "Please Enter Toy MRP.",digits:"Please Enter Numbers only"}, 
				 txt_toy_sellingprice:{required: "Please Enter Selling Price",digits:"Please Enter Numbers only"}, 
				 txt_toypoints:{required: "Please Enter Toy Points.",digits:"Please Enter Numbers only"}, 
				 txt_toyrentamt:{required: "Please Enter Toy Rent Amount.",digits:"Please Enter Numbers only"}, 
				 txt_toyquantity:{required: "Please Enter Toy Quantity.",digits:"Please Enter Numbers only"}
	
				//idv_value:{required: "Please enter IDV value "}
				//~ ,party_email:{required: "Please enter Valid E-mail Id."}
				
	 		},
			highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
							
							error.insertAfter(element);
							
						 /*  if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }*/
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