<!--header-->
<?php include "header.php";  ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="js/jquery.validate.min.js"></script>

<style type="text/css">
	
#searchResult{
  list-style: none;
  padding: 0px;
  width: 250px;
  position: absolute;
  margin: 0;
}

#searchResult li{
  background: lavender;
  padding: 4px;
  margin-bottom: 1px;
}

#searchResult li:nth-child(even){
  background: cadetblue;
  color: white;
}

#searchResult li:hover{
  cursor: pointer;
}

input[type=text]{
  padding: 5px;
  width: 600px;
  letter-spacing: 1px;
}
</style>

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
				
			?>
		   <form class="wow fadeInUp animated" data-wow-delay=".5s" name="assigntoy" id="assigntoy" action="" method="POST">
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Select Customer :</h3>
								<div class="wrapper">
									<input type="text" name="sel_cust" id="sel_cust"  style="margin-bottom:0;" />
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
								<input type="text"  name="cust_name" id="cust_name" required="true" style="margin-bottom:0; background:#f1f1f1"  disabled="disabled"/>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">E-mail ID :</h3>
								<input type="text" name="email_id" id="email_id" required="true" style="margin-bottom:0; background:#f1f1f1"   disabled="disabled"/>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Balance Points :</h3>
								<input type="text" name="bal_points" id="bal_points" required="true" style="margin-bottom:0; background:#f1f1f1"  disabled="disabled" />
							</td>
						</tr>
						<tr><td colspan="3"><hr /></td></tr>
						<tr style="background:none;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Select Toy :</h3>
								<div class="wrapper">
									<input type="text" type="text" name="sel_toy" id="sel_toy"   style="margin-bottom:0;"/>	<a  ng-click="show()" class="btn_user"  >
									 <img src="images/toy.png"  style="margin-top: 10px; margin-left: 11px; cursor:pointer;" /> </a>
								</div>
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Order Start Date :</h3>
								<div class="wrapper">
									<input type="text" value="<?php echo $today;?>"  type="text" name="s_date" id="s_date" required="true" style="margin-bottom:0;"/>
									<button class="btn_user" onclick="return false;"><img src="images/calendar_1.png" /></button>
								</div>
							</td>
							<td align="left">
								<h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Order End Data :</h3>
								<div class="wrapper">
									<input type="text" type="text" value="<?php echo $end_date;?>"  name="e_date" id="e_date" required="true" style="margin-bottom:0;"/>
									<button class="btn_user"  onclick="return false;"><img src="images/calendar_1.png" /></button>
								</div>
							</td>
						</tr>
					</table>
					 <table width="98%">
						<thead>
							<tr style="background:#c6178d; color:#fff;">
								<th style="padding:10px">Sr.No.</th>
								<th>Toy Name</th>
								<th>Toy Code</th>
								<th>Toy Points</th>
							</tr>
						</thead>
						<tbody> 
					 		<tr ng-repeat="x in toylist">
								<td style="padding:13px;">{{x.toy_code}}</td>
								<td>{{x.toy_name}}</td>
								<td>{{x.toy_code}}</td>
								<td>{{x.points}}</td>
							</tr>
							 <input type="hidden" name="hdn_toysid" id="hdn_toysid"  value="{{toyids}}">
						</tbody>
					</table> 
					<table class="" width="20%" border="0" align="center">
						<tr style="background:none">
							<td>
								<input type="hidden" name="hdn_custid" id="hdn_custid">
								<input type="hidden" name="hdn_toyid" id="hdn_toyid">
								<input type="hidden" name="hdn_bal_points" id="hdn_bal_points">
								<input type="hidden" name="hdn_activeplan_id" id="hdn_activeplan_id">
								<input type="submit" name="submit" value="Add Order" style="width:100%;font-size: 18px;font-weight: 500;">
							</td>
						</tr>
					</table>

				
			
				<div >
					<table style="width:100%; margin-top:20px;">
						<tr style="background:none;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Code :</h3>
							 <div class='container'  ng-app='toysearch' ng-controller="toylisting" ng-click='containerClicked();' >
 
							    <input type='text' 
							          ng-keyup='gettoyslist()' 
							          ng-click='searchboxClicked($event);' 
							          ng-model='searchText' 
							          placeholder='Enter text'><br>

							        
							 
							  </div>


							<!-- <input type="text" name="toycode" id="toycode" required="true" style="margin-bottom:0; "> -->

							<div class="ui-widget">
  <label for="toycode">Birds: </label>
  <input id="toycode">
</div>
 
<div class="ui-widget" style="margin-top:2em; font-family:Arial">
  Result:
  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>
 
								
							</td>
						</tr>
					</table>
				</div>
				<table width="">
					<tr>
						<input type="hidden" name="hdn_custid" id="hdn_custid">
						<input type="hidden" name="hdn_toyid" id="hdn_toyid">
						<td colspan="4"><input type="submit" name="submit" value="Assign Toy for Next Order"></td>
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
		$("#assigntoy").validate(
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
	

  $( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#toycode" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "gettoys_code.php",
          dataType: "json",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      minLength: 1,
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    } );
  } );
	
 

</script>
<script src="js/angular/angular.min.js"></script>
<script src="js/angular-route/angular-route.min.js"></script> 
<script src="js/angular-ui-router/release/angular-ui-router.min.js"></script>    
<script src="js/angular-local-storage/dist/angular-local-storage.min.js"></script>
<script src="js/angular/ui-bootstrap-2.5.0.min.js"></script>
<script src="js/angular/ui-bootstrap-tpls-2.5.0.min.js"></script>
<script src="js/app/searchtoy.js?v=2.2"></script>

 
</body>
</html>