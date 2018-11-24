<!--header-->
<?php include "header.php"; 
include 'classes/toys.php';
$toy_edit_id = $_GET['toy_edit_id'];

$objtoy = new toys();
$rows_selectedAgeGroup='';
$rows_selectedCategory='';
$arr_SelectedAgeGroup = array();
$arr_SelectedCategory = array();
$arr_selectedbenefits = array();



$row = $objtoy->getSelectedToy($toy_edit_id); 

	$rows_selectedAgeGroup = $objtoy->getToy_Agegroup($toy_edit_id); 
	if ($rows_selectedAgeGroup!='')
	{
	foreach ($rows_selectedAgeGroup  as $value) {
	 		array_push($arr_SelectedAgeGroup,$value->age_group_id);
		}
	}

	$rows_selectedCategory = $objtoy->getToy_category($toy_edit_id); 
	if ($rows_selectedCategory!='')
	{
		foreach ($rows_selectedCategory  as $value) {	 
			 array_push($arr_SelectedCategory,$value->category_id);
		}
	}

$rows_selectedbenefits = $objtoy->getToy_benefits($toy_edit_id); 
	if ($rows_selectedbenefits!='')
	{
		foreach ($rows_selectedbenefits  as $value) {	 
			 array_push($arr_selectedbenefits,$value->benefits_id);
		}
	}



$result_activeAgegroup= $objtoy->getAgegroup("active"); 
$result_activeBrand = $objtoy->getBrands("active"); 
$result_activeCategory = $objtoy->getcategory("active");
$result_activebenefits = $objtoy->getBenefits("active");

if ($_SERVER['REQUEST_METHOD']=="POST")
{

$objtoysave = new toys();
if($objtoysave->UpdateToys($_POST))
	{
		echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:white;'> Toy Updated Successfully </div>";
	}
	else
	{
		echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> Error Occured ! While Updating Toy. Try Again! </div>";
	}
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
 
	<div class="login-page" style="">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Update<span> Toy</span></h3>
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Code :</h3><input type="text" name="txt_toyCode" id="txt_toyCode" required="true" style="margin-bottom:0;" value="<?php echo $row['toy_code']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Name :</h3><input type="text" name="txt_toyname" id="txt_toyname" required="true" style="margin-bottom:0;" value="<?php echo $row['toy_name']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Instructions :</h3><input type="text" name="txt_toydesc"   id="txt_toydesc" required="true" style="margin-bottom:0;" value="<?php echo $row['toy_desc']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Image :</h3><input type="file" name="file_toyimage" id="file_toyimage" style="margin-bottom:0;"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Category :</h3>
								<script type="text/javascript">
									$(document).ready(function() {
									$('#ddl_category').multiselect();
									});
								</script>
								<select id="ddl_category" name="ddl_category[]"  multiple="multiple" class="multi">
								<?php 
								
								 
									foreach ($result_activeCategory as  $value )
										{
													if (in_array($value->category_id, $arr_SelectedCategory, TRUE))
													{
															$select = 'selected';
													}
													else
													{
															$select = '';	
													}

											echo '<option '.$select.' value="'.$value->category_id.'">'.$value->category_name.'</option>';
										}
										?>

									 
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Age Group :</h3>
								<script type="text/javascript">
									$(document).ready(function() {
									$('#ddl_agegroup').multiselect();
									});
								</script>
								<select id="ddl_agegroup" name="ddl_agegroup[]" multiple="multiple">
								<?php 

								foreach ($result_activeAgegroup as  $value )
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
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Brand :</h3>
								<select name="ddl_brand" id="ddl_brand[]" required="true" class="select_brand">
								<option value="">--Select--</option>
									<?php 
										foreach ($result_activeBrand as  $value )
										{

											if ( $value->brand_id ==$row['brand_id'])
													{
															$select = 'selected';
													}
													else
													{
															$select = '';	
													}
											echo '<option '.$select.' value="'.$value->brand_id.'">'.$value->brand_name.'</option>';
										}
									 
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Benefits :</h3>
								<script type="text/javascript">
									$(document).ready(function() {
									$('#ddl_benefits').multiselect();
									});
								</script>
								<select id="ddl_benefits" name="ddl_benefits[]"  multiple="multiple" class="multi">
								<?php 
								
								 
									foreach ($result_activebenefits as  $value )
										{
													if (in_array($value->benefitsid, $arr_selectedbenefits, TRUE))
													{
															$select = 'selected';
													}
													else
													{
															$select = '';	
													}

											echo '<option '.$select.' value="'.$value->benefitsid.'">'.$value->benefits_name.'</option>';
										}
										?>

									 
								</select>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy MRP :</h3><input type="text" name="txt_toymrp" id="txt_toymrp" required="true" style="margin-bottom:0;" value="<?php echo $row['mrp_amount']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Selling Price :</h3><input type="text" name="txt_toy_sellingprice" id="txt_toy_sellingprice" required="true" style="margin-bottom:0;" value="<?php echo $row['selling_amount']; ?>"></td>
						</tr>
						
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Points :</h3><input type="text" name="txt_toypoints" id="txt_toypoints" required="true" style="margin-bottom:0;" value="<?php echo $row['points']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Rent Amount :</h3><input type="text" name="txt_toyrentamt" id="txt_toyrentamt" required="true" style="margin-bottom:0;" value="<?php echo $row['rent_amount']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Quantity :</h3><input type="text" name="txt_toyquantity" id="txt_toyquantity" required="true" style="margin-bottom:0;"value="<?php echo $row['quantity']; ?>"></td>
						</tr>
						<input type="hidden" value="<?php echo $row['toy_id']; ?>" name="txt_id" id="txt_id" />
							<tr>
								<td><input type="submit" name="submit" value="Update Toy"></td>
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