<!--header-->
<?php 

include "header_index.php";
include 'classes/login.php';

 ?>
<!--//header-->
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs" style="background:#e7e7e7">
		<img src="images/logo.png" width="15%">
		<!--<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow fadeInUp" data-wow-delay=".5s">
				<li class="active">Sign In</li>
			</ol>
		</div>-->
	</div>
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s" style="margin-bottom: 30px; margin-top: -45px;">
			<h3 class="title">SignIn<span> Form</span></h3>
		</div>
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Welcome back to JuniorJ Library ! </h4>
			</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<form method="post" name="signin" action="">
					<input type="text" class="user" name="email" id="email" placeholder="Enter your username" value="" required>
					<input type="password" name="password" class="lock" placeholder="Enter your password" value="" required>
					<input type="submit" name="submit" value="Sign In">
					<!--<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>-->
				</form>
				<?php
				if(isset($_POST['submit']))
				{
						$obj_login = new login();
						if($obj_login->check_login($_POST['email'],$_POST['password']))
						{
								 header('location: dashboard.php');
						}
						else
						{
								echo "<div style='border:1px solid #FF0000;background:#fed6d6;padding: 5px;font-size: 13px;font-weight: 400; width:95%;border-radius:5px;text-align:center;margin-left: 15px; color:#FF0000;'> Invalid Username or Password </div>";
						}
				}
			?>
			</div>
		</div>
		
		<!--<div class="login-page-bottom">
			<h5> - OR -</h5>
			<div class="social-btn"><a href="#"><i>Sign In with Facebook</i></a></div>
			<div class="social-btn sb-two"><a href="#"><i>Sign In with Twitter</i></a></div>
		</div>-->
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
    <script src="js/bootstrap.js"></script>
</body>
</php>