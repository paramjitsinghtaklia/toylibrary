<!--header-->
<?php include "header.php"; ?>
<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Check Out page</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--cart-items-->
	<div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart(3)</h3>
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<div class="alert-close"> </div>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="single.php"><img src="images/g1.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="single.php"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
						<ul class="qty">
							<li><p>Min. order value :</p></li>
							<li><p>FREE delivery</p></li>
						</ul>
						<div class="delivery">
							<p>Service Charges : $10.00</p>
							<span>Delivered in 1-1:30 hours</span>
							<div class="clearfix"></div>
						</div>	
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="cart-header1 wow fadeInUp animated" data-wow-delay=".7s">
				<div class="alert-close1"> </div>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="single.php"><img src="images/g5.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="single.php"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
						<ul class="qty">
							<li><p>Min. order value :</p></li>
							<li><p>FREE delivery</p></li>
						</ul>
						<div class="delivery">
						<p>Service Charges : $10.00</p>
						<span>Delivered in 1-1:30 hours</span>
						<div class="clearfix"></div>
					</div>	
				   </div>
				   <div class="clearfix"></div>
				</div>
			</div>
			<div class="cart-header2 wow fadeInUp animated" data-wow-delay=".9s">
				<div class="alert-close2"> </div>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="single.php"><img src="images/g9.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="single.php"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
						<ul class="qty">
							<li><p>Min. order value :</p></li>
							<li><p>FREE delivery</p></li>
						</ul>
						<div class="delivery">
							<p>Service Charges : $10.00</p>
							<span>Delivered in 1-1:30 hours</span>
							<div class="clearfix"></div>
						</div>	
					</div>
					<div class="clearfix"></div>
				</div>
			</div>		
		</div>
	</div>
	<!--//cart-items-->	
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