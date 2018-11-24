<!--header-->
<?php include "header.php"; 

include 'classes/toys.php';

$objtoy = new toys();

$result_activeAgegroup= $objtoy->getAgegroup("active"); 
$result_activeBrand = $objtoy->getBrands("active"); 
$result_activeCategory = $objtoy->getcategory("active");
$result_activeddl_benefits = $objtoy->getbenefits("active");



if ($_SERVER['REQUEST_METHOD']=="POST")
{

$objtoy = new toys();

if($objtoy->AddToys($_POST,$_FILES))
	{
		echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:white;'> Toy Added Successfully </div>";
	}
	else
	{
		echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> Error Occured ! While Adding Toys. Try Again! </div>";
	}
} 

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
	<div class="login-page" style="" >
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Add<span> Toy</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_toy.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">View Toys</button></a></div></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-body">
			   <form class="wow fadeInUp animated" data-wow-delay=".5s" name="addtoy" id="addtoy" action="" method="POST" enctype="multipart/form-data">
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Code :</h3><input type="text" name="txt_toyCode" id="txt_toyCode" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Name :</h3><input type="text" name="txt_toyname" id="txt_toyname" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Instructions :</h3>
							<textarea rows="5" name="txt_toy_accesories"   id="txt_toy_accesories" required="true" style="margin-bottom:0;"></textarea>
							
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Accessories (values should be comma(,) seperated) :</h3>
							<textarea rows="5" name="txt_toydesc"   id="txt_toydesc" required="true" style="margin-bottom:0;"></textarea>
							
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Image :</h3><input type="file" name="file_toyimage" id="file_toyimage" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Category :</h3>
								 
								<select name="ddl_category[]" id="ddl_category"  multiple="multiple" class="multi">
								<?php 
									foreach ($result_activeCategory as  $value )
										{
											echo '<option value="'.$value->category_id.'">'.$value->category_name.'</option>';
										}
										?>

									 
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Age Group :</h3>
								<select id="ddl_agegroup" name="ddl_agegroup[]" multiple="multiple"   class="multi">
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Brand :</h3>
								<select name="ddl_brand" id="ddl_brand" required="true" class="select_brand">
								<option value="">--Select--</option>
									<?php 
								foreach ($result_activeBrand as  $value )
										{
											echo '	<option value="'.$value->brand_id.'">'.$value->brand_name.'</option>';
										}
									 
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Benefits :</h3>
								 
								<select name="ddl_benefits[]" id="ddl_benefits"  multiple="multiple" class="multi">
								<?php 
									foreach ($result_activeddl_benefits as  $value )
										{
											echo '<option value="'.$value->benefitsid.'">'.$value->benefits_name.'</option>';
										}
										?>

									 
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Type :</h3>
								<select name="ddl_toytype" id="ddl_toytype" required="true" class="select_brand">
								<option value="">--Select--</option>
								<option value="R">Rent</option>
								<option value="S">Sale</option>
								<option value="P">Party Seller</option>
							 
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy MRP :</h3><input type="text" name="txt_toymrp" id="txt_toymrp" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Selling Price :</h3><input type="text" name="txt_toy_sellingprice" id="txt_toy_sellingprice" required="true" style="margin-bottom:0;"></td>
						</tr>
						
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Points :</h3><input type="text" name="txt_toypoints" id="txt_toypoints" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Rent Amount :</h3><input type="text" name="txt_toyrentamt" id="txt_toyrentamt" required="true" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Quantity :</h3><input type="text" name="txt_toyquantity" id="txt_toyquantity" required="true" style="margin-bottom:0;"></td>
						</tr>
							<tr>
								<td><input type="submit" name="submit" value="Add Toy"></td>
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

	
	
		$('#ddl_agegroup').multiselect();
		$('#ddl_category').multiselect();
		$('#ddl_benefits').multiselect();
		

		$("#ddl_toytype").change(function() {
			console.log('asd');
    var selected = $(this).val();
    console.log(selected);
    if (selected == 'R') { 
    	   $("#txt_toy_sellingprice").attr("disabled", "disabled"); 
    	    $("#txt_toy_sellingprice").val(0);
    	     $("#txt_toy_sellingprice").css("background","#FFFFCC");
    	       $("#txt_toypoints").css("background","#0000");
    	       	  $("#txt_toyrentamt").css("background","#0000");
    	}
    else if (selected == 'S') { 

    	 $("#txt_toy_sellingprice").removeAttr("disabled");
    	  $("#txt_toy_sellingprice").val("");
		 $("#txt_toy_sellingprice").css("background","#0000");
    	
   		  $("#txt_toypoints").attr("disabled", "disabled"); 
   		  $("#txt_toypoints").val("0");
    	  $("#txt_toyrentamt").attr("disabled", "disabled"); 
    	  $("#txt_toyrentamt").val("0");
    	  $("#txt_toypoints").css("background","#FFFFCC");
    	  $("#txt_toyrentamt").css("background","#FFFFCC");
    	 // $("#txt_toypoints").css("background","#FFFFCC");

    	}
    
});

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