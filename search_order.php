<!--header-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
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
	<div ng-app='ordersearch' ng-controller="orderlisting"  class="login-page" style="width:95%;">
		 
		<div class="widget-shadow">
			<div class="login-body">
			 <!--  <form class="wow fadeInUp animated" data-wow-delay=".5s" name="addtoy" id="addtoy" action="" method="POST" enctype="multipart/form-data">-->
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
							/*position: absolute;*/
							right: 0;
							top: 0;
							background:#c6178d;
							height: 47px;
							width: 12%;
						}
						
						/*input {
							padding-right:30px;
						}*/
					</style>
					<table class="table" width="100%" border="0">
						<tr  style="background:none;">
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Order Number:</h3>
								<input type="text" ng-model="order_no" type="text" name="order_no" id="order_no" required="true" style="margin-bottom:0; background:#f1f1f1" value="Test"  />
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Order Type :</h3>
								<select class="select_brand" ng-model="order_type" name="order_type" id="order_type" required="true" style="background:#f1f1f1">
									<option value="">--- Select Order Type ---</option>
									<option value="Sell">Sell</option>
									<option value="Rent">Rent</option>
								</select>
								<!--<input type="text" ng-model="order_type" type="text" name="order_type" id="email_id" required="true" style="margin-bottom:0; background:#f1f1f1" value="test@gmail.com"  />-->
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Customer ID :</h3>
								<input type="text" ng-model="cust_id" type="text" name="cust_id" id="cust_id" required="true" style="margin-bottom:0; background:#f1f1f1" value="" />
							</td>
						</tr>
							<tr style="background:none;">
							<td align="left">
							</td>
							<td align="left">
							</td>
							<td align="left">
							<button ng-click="orderList()" class="btn_user" style=" width: 50%; float: right; color: #fff; font-size: 20px;">Search</button>
							</td>
						</tr>
					</table>
					<table width="98%">
						<thead>
							<tr style="background:#c6178d; color:#fff;">
								<th style="padding:10px"></th>
								<th>Order Number</th>
								<th>Order Type</th>
								<th>Order Amount</th>
								<th>Customer ID</th>
								<th>Parent Name</th>
								<th>Child Name</th>
								<!--<th ng-hide="true">plan_id</th>-->
							</tr>
						</thead>
						<tbody>

						<tr ng-show="x.length!=0" ng-repeat="x in data">
								<td><button ng-click="foo(x,x.order_id)" class="btn_add">Select</button></td>
								<td>{{x.order_id}}</td>
								<td>{{x.order_type}}</td>
								<td>{{x.order_amount}}</td>
								<td>{{x.customer_id}}</td>
								<td>{{x.parent_name}}</td>
								<td>{{x.child_name}}</td>
								<!--<td ng-hide="true">{{x.plan_id}}</td>-->
						</tr>
						    <tr >
				            <td ng-show="x.length==0">
				                No data.                
				            </td>
				        </tr>
						</tbody>
					</table>
						
				<!--</form>-->
			</div>
		</div>
	</div>
	<!--//login-->
	<!--footer-->
	 
	<!--//footer-->

	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->


    <script src="js/angular/angular.min.js"></script>

    <script src="js/angular-route/angular-route.min.js"></script> 

    <script src="js/angular-ui-router/release/angular-ui-router.min.js"></script>    

    <script src="js/angular-local-storage/dist/angular-local-storage.min.js"></script>
     <script src="js/app/searchOrder.js"></script>

	<script type="text/javascript">
	
		 
	</script>
 
</body>
</html>