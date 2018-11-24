<!--header-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
 
	<div  ng-app='toysearch' ng-controller="toylisting"  class="login-page" style="width:95%;">
		 
		<div class="widget-shadow" data-dismiss="modal" >
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
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Name :</h3>
								<input type="text" ng-model="toy_name" type="text" name="toy_name" id="toy_name" required="true" style="margin-bottom:0; background:#FFFFCC"    />
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Toy Code :</h3>
								<input type="text" ng-model="toy_code" type="text" name="toy_code" id="toy_code" required="true" style="margin-bottom:0; background:#FFFFCC"   />
							</td>
							<td align="left"><h3 style="margin-top: -18px;font-weight:bold;margin-bottom: 13px;">Category :</h3>
								<input type="text" ng-model="toy_category" type="text" name="toy_category" id="toy_category" required="true" style="margin-bottom:0; background:#FFFFCC" value="" />
							</td>
						</tr>
							<tr style="background:none;">
							<td align="left">
							</td>
							<td align="left">
							</td>
							<td align="left">
							<button ng-click="toyList()" class="btn_user">Search</button>
							</td>
						</tr>
					</table>
					<table width="98%">
						<thead>
							<tr style="background:#c6178d; color:#fff;">
								<th style="padding:10px"></th>
								<th>Toy Code</th>
								<th>Toy Name</th>
								<th>Image</th>
								<th>Toy Points</th>
								<th>Toy Category</th>
								<th>Toy Age-Group</th>
								<th>Toy Brands</th>
								
							</tr>
						</thead>
						<tbody>

						<tr ng-show="x.length!=0" ng-repeat="x in data">
								<td><button ng-click="select(x,x.toy_id)" class="btn_add">Select</button></td>
			   					<td>{{x.toy_code}}</td>
								<td>{{x.toy_name}}</td>
								<td><img ng-src="{{x.image_path}}" /></td>
								<td>{{x.points}}</td>
								<td>{{x.current_points}}</td>
								<td>{{x.email_id}}</td>
								<td>{{x.brand_name}}</td>

								 
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
     <script src="js/app/searchtoy.js"></script>

	<script type="text/javascript">
	
		 
	</script>
 
</body>
</html>