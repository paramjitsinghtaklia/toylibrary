<!--header-->
<?php include "header.php";  ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
function showDiv(select)
{
	if(select.value==1 || select.value==2 || select.value==3 )
	{
		document.getElementById('hidden_cust').style.display = "block";
		document.getElementById('hidden_desc').style.display = "block";
		document.getElementById('hidden_order').style.display = "none";
	} 
	else if(select.value==4 || select.value==5 )
	{
		document.getElementById('hidden_order').style.display = "block";
		document.getElementById('hidden_desc').style.display = "block";
		document.getElementById('hidden_cust').style.display = "none";
	}
} 
function showChequeDiv(select)
{
	if(select.value==2)
	{

		document.getElementById('hidden_cheque').style.display = "block";
		$('#h3header').text('Cheque No. :');
	}
	else if(select.value==4)
	{
		$('#h3header').text('Mobile No. :');
		document.getElementById('hidden_cheque').style.display = "block";
	}
	else
	{
		document.getElementById('hidden_cheque').style.display = "none";
	}
} 

</script>
<div class="login-page" style="width:90%" >
	<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="">
		<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;width: 100%;margin-left: 0;">Add <span> Income</span><div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="view_income.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 0;padding-top: 11px;padding-bottom: 11px;">View Income</button></a></div></h3>
	</div>
	<div class="widget-shadow">
		<div class="login-body">
			<?php 
				include 'classes/income.php';
				
				if ($_SERVER['REQUEST_METHOD']=="POST")
				{
					$objIncome = new income();
					if($objIncome->AddIncome($_POST))
					{
						echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400;width:95%;border-radius:5px;text-align:center;margin-left: 15px;color:white;margin-top: -15px;margin-bottom: 21px;' class='wow fadeInUp animated' data-wow-delay='.5s'> Income Amount Added Successfully </div>";
					}
					else
					{
						echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;margin-top: -15px;margin-bottom: 21px;'> Error Occured ! While Adding Income Amount. Try Again! </div>";
					}
				}
				
				/*if ($_SERVER['REQUEST_METHOD']=="POST")
				{
					$objIncome = new income();
					$arr_result = $objIncome->AddIncome($_POST);
					if($arr_result['status'])
					{
						echo "<div style='border:1px solid #skyblue;background:skyblue;padding: 5px;font-size: 13px;font-weight: 400;width:95%;border-radius:5px;text-align:center;margin-left: 15px;color:white;margin-top: -15px;margin-bottom: 21px;' class='wow fadeInUp animated' data-wow-delay='.5s'>".$arr_result['msg']." </div>";
					}
					else
					{
						echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;margin-top: -15px;margin-bottom: 21px;'>".$arr_result['msg']."</div>";
					}
				} */
			?>
		   <form class="wow fadeInUp animated" data-wow-delay=".5s" name="addincome" id="addincome" action="" method="POST">
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
						height: 40px;
						width: 12%;
					}
				</style>
				
				<table class="table" width="100%" border="0">
					<tr>
						<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Income Source Type :</h3>
							<select name="txt_income_type" id="txt_income_type" class="select_brand" onchange="showDiv(this)" required>
								<option value="">--- Select Source Type---</option>
								<option value="1">Plan Amount</option>
								<option value="2">Registration Amount</option>
								<option value="3">Deposit Amount</option>
								<option value="4">Selling Amount</option>
								<option value="5">Party Seller Amount</option>
							</select>
						</td>
						<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Payment Mode :</h3>
							<select name="txt_payment_mode" id="txt_payment_mode" class="select_brand" onchange="showChequeDiv(this)" required>
								<option value="">--- Select Payment Mode ---</option>
								<option value="1">Cash</option>
								<option value="2">Cheque</option>
								<option value="3">Credit/Debit Card</option>
								<option value="4">Paytm</option>
								<option value="5">Online Transfer</option>
							</select>
						</td>
						<td align="left">
							<div style="display:none;" id="hidden_cheque">
								<h3 id='h3header' name='h3header' style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Cheque No. :</h3>
								<input type="text"  name="cheque_no" id="cheque_no" required="true" style="margin-bottom:0; "/>
							</div>
						</td>
					</tr>
				</table>
				<div style="display:none;" id="hidden_cust">
					<table style="width:100%;">
						<tr style="background:none; margin-top:20px;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Select Customer :</h3>
								<div class="wrapper">
									<input type="text" name="sel_cust" id="sel_cust"  style="margin-bottom:0;" />
									<a class="search_customer" href="search_customer.php"> 
									<button class="btn_user"><img src="images/user_1.png" /></button></a>
								</div>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Customer Name :</h3>
								<input type="text"  name="cust_name" id="cust_name" required="true" style="margin-bottom:0; background:#f1f1f1"  readonly />
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">E-mail ID :</h3>
								<input type="text" name="email_id" id="email_id" required="true" style="margin-bottom:0; background:#f1f1f1"   readonly />
							</td>
						</tr>
					</table>
				</div>
				<div style="display:none;" id="hidden_order">
					<table style="width:100%;">
						<tr style="background:none; margin-top:20px;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Select Order :</h3>
								<div class="wrapper">
									<input type="text" name="sel_order" id="sel_order"  style="margin-bottom:0;" />
									<a class="search_order" href="search_order.php"> 
									<button class="btn_user"><img src="images/toy.png" /></button></a>
								</div>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Order No. :</h3>
								<input type="text"  name="ord_id" id="ord_id" required="true" style="margin-bottom:0; background:#f1f1f1"  readonly/>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Order Amount :</h3>
								<input type="text" name="ord_amnt" id="ord_amnt" required="true" style="margin-bottom:0; background:#f1f1f1"   readonly />
							</td>
						</tr>
					</table>
				</div>
				<div style="display:none;" id="hidden_desc">
					<table style="width:100%; margin-top:20px;">
						<tr style="background:none;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Description :</h3>
								<textarea name="desc" id="desc" style="width:100%; border:1px solid #E2DCDC; height:80px;" required></textarea>
							</td>
						</tr>
					</table>
				</div>
				<div >
					<table style="width:100%; margin-top:20px;">
						<tr style="background:none;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Amount :</h3>
							<input type="text" name="income_amount" id="income_amount" required="true" style="margin-bottom:0; ">
								
							</td>
						</tr>
					</table>
				</div>
				<table width="">
					<tr>
						<input type="hidden" name="hdn_custid" id="hdn_custid">
						<input type="hidden" name="hdn_orderid" id="hdn_orderid">
						<td colspan="4"><input type="submit" name="submit" value="Add Income"></td>
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

<script src="js/main.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
	$(document).ready(function() 
	{
		$("#addincome").validate(
		{
			errorClass: "state-error",
			validClass: "state-success",
			errorElement: "em",
			rules:
			{
				txt_income_type: {required: true},
				txt_payment_mode: {required: true},
				cheque_no:  {required: true},
				cust_name:  {required: true},
				email_id:  {required: true},
				ord_id:  {required: true},
				ord_amnt:  {required: true},
				desc: {required: true}	,
				income_amount: {required: true}			
			},			 
			messages:
			{
				 txt_income_type:{required: "Please select income source type"},
				 txt_payment_mode:{required: "Please select payment mode"},
				 cheque_no:{required: "Please enter cheque number"},
				 cust_name:{required: "Please select customer"},
				 email_id:{required: "Please select customer"},
				 ord_id:{required: "Please select order"},
				 ord_amnt:{required: "Please select order"},
				 desc:{required: "Please enter income description"},
				 income_amount:{required: "Please enter income amount"}
			},
			highlight: function(element, errorClass, validClass) 
			{
				$(element).closest('.field').addClass(errorClass).removeClass(validClass);
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).closest('.field').removeClass(errorClass).addClass(validClass);
			},
			errorPlacement: function(error, element) 
			{
				error.insertAfter(element);
			}
		}); 
		
		$('.search_customer').click(function() {
		     var NWin = window.open($(this).prop('href'), '', 'height=600,width=1000');
			 if (window.focus)
				 {
				   NWin.focus();
				 }
		     return false;
   	 		});
			
		$('.search_order').click(function() {
		 var sorder = window.open($(this).prop('href'), '', 'height=600,width=1000');
		 if (window.focus)
			 {
			   sorder.focus();
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