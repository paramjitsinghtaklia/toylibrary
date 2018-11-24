<!--header-->
<?php 
	include "header.php"; 
	include 'classes/expenses.php';
	$expense_edit_id = $_GET['expense_edit_id'];
	$objExpense = new expenses();
	$row = $objExpense->getSelectedExpense($expense_edit_id); 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
 
	<div class="login-page" style="">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<!--<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">Update<span> Pettycash</span></h3>-->
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;width: 100%;margin-left: 0;">Update<span> Expense</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_expense_amount.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 0;padding-top: 11px;padding-bottom: 11px;">View Expenses</button></a></div></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-body">
				<?php 
					if ($_SERVER['REQUEST_METHOD']=="POST")
					{
						$objExpenseUpdate = new expenses();
						if($objExpenseUpdate->UpdateExpense($_POST))
						{
							echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400;width:95%;border-radius:5px;text-align:center;margin-left: 15px;color:white;margin-top: -15px;margin-bottom: 21px;' class='wow fadeInUp animated' data-wow-delay='.5s'> Expense Updated Successfully</div>";
						}
						else
						{
							echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;margin-top: -15px;margin-bottom: 21px;'> Error Occured ! While Updating Expnese. Try Again! </div>";
						}
					} 
				?>
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Expense Type :</h3>
							<select name="txt_expense_type" id="txt_expense_type" class="select_brand">
								<option value="">--- Select ---</option>
								<option <?php if ($row['expense_type'] == "1") ? echo "selected" : ""; ?> value="1">Food Allowance</option>
								<option <?php if ($row['expense_type'] == "2") ? echo "selected" : ""; ?> value="2">Electrical Expense</option>
								<option <?php if ($row['expense_type'] == "3") ? echo "selected" : ""; ?> value="3">Non-Electrical Expenses</option>
								<option <?php if ($row['expense_type'] == "4") ? echo "selected" : ""; ?> value="4">New toys Buying Expenses</option>
								<option <?php if ($row['expense_type'] == "5") ? echo "selected" : ""; ?> value="5">Marketing</option>
								<option <?php if ($row['expense_type'] == "6") ? echo "selected" : ""; ?> value="6">Personal Expenses</option>
								<option <?php if ($row['expense_type'] == "7") ? echo "selected" : ""; ?> value="7">Shop Rent</option>
								<option <?php if ($row['expense_type'] == "8") ? echo "selected" : ""; ?> value="8">Travelling Allowance</option>
								<option <?php if ($row['expense_type'] == "9") ? echo "selected" : ""; ?> value="9">Other</option>
							</select>
								<?php
									$selection=array('Travelling Allowance','Food Allowance','Electrical Expense','Non-Electrical Expenses','Other');
									echo '<select name="txt_expense_type" id="txt_expense_type" class="select_brand">
										  <option value="0">Please Select Option</option>';
									
									foreach($selection as $selection){
										$selected=($row['expense_type'] == $selection)? "selected" : "";
									echo '<option '.$selected.' value="'.$selection.'">'.$selection.'</option>';
										}
									
									echo '</select>';
								?>
							</td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Expense Amount :</h3>
								<input type="text" name="txt_expense_amt" id="txt_expense_amt" style="margin-bottom:0;" value="<?php echo $row['amount']; ?>"></td>
						</tr>
						<tr>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Description :</h3>
							<textarea class="" id="txt_expense_desc" name="txt_expense_desc" style="width:100%; height:120px; border:1px solid #E2DCDC;"><?php echo $row['description']; ?></textarea></td>
						</tr>
						<tr>
							<input type="hidden" value="<?php echo $row['expense_id']; ?>" name="txt_id" id="txt_id" />
							<td><input type="submit" name="submit" value="Update Expense"></td>
						</tr>
						<!------------------------------------------------->
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