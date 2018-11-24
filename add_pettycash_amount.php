<!--header-->
<?php include "header.php";  ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<div class="login-page" style="" >
	<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="">
		<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;width: 100%;margin-left: 0;">Add <span> Pettycash</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_pettycash_amount.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 0;padding-top: 11px;padding-bottom: 11px;">View Pettycash</button></a></div></h3>
	</div>
	<div class="widget-shadow">
		<div class="login-body">
			<?php 
				include 'classes/pettycash.php';
				
				if ($_SERVER['REQUEST_METHOD']=="POST")
				{
					$objPettycash = new pettycash();
					if($objPettycash->AddPettycash($_POST))
					{
						echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400;width:95%;border-radius:5px;text-align:center;margin-left: 15px;color:white;margin-top: -15px;margin-bottom: 21px;' class='wow fadeInUp animated' data-wow-delay='.5s'> Pettycash Amount Added Successfully </div>";
					}
					else
					{
						echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;margin-top: -15px;margin-bottom: 21px;'> Error Occured ! While Adding Pettycash. Try Again! </div>";
					}
				} 
			?>
		   <form class="wow fadeInUp animated" data-wow-delay=".5s" name="addpettycash" id="addpettycash" action="" method="POST" enctype="multipart/form-data">
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
						<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Pettycash Amount :</h3>
						<input type="text" name="txt_pettycash_amt" id="txt_pettycash_amt" style="margin-bottom:0;"></td>
					</tr>
					<tr>
						<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Description :</h3>
						<textarea class="" id="txt_pettycase_desc" name="txt_pettycase_desc" style="width:100%; height:120px; border:1px solid #E2DCDC;"></textarea></td>
					</tr>
					<tr>
						<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;"> Amount given to Cashier :</h3>
							<div><input type="radio" name="gender" checked value="yes"> Yes
  <input type="radio" name="gender" value="no"> No<br></td></div>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="Add Amount"></td>
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
			$("#addpettycash").validate(
			{
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",
			rules:{
				txt_pettycash_amt: {required: true, digits: true},
				txt_pettycase_desc: {required: true}			
			 },			 
		messages:
			{
				 txt_pettycash_amt:{required: "Please enter pettycash amount.",digits:"Please Enter Numbers only"}, 
				 txt_pettycase_desc:{required: "Please enter pettycase description"}
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

	
	
});

	</script>
 
</body>
</html>