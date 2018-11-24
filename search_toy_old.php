<!--header-->
<?php include "header.php"; ?>
<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">About us</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--about-->
	<div class="about">
		<div class="container">
			<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
				<h3 class="title">About<span> JuniorJ</span></h3>
				<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur </p>-->
			</div>
			<div class="about-info" style="margin-top:-3%;">
				<p>JUNIOR J is a young, energetic and a dynamic toy library specializing in toys and books. We have a wide range of distinctive, conceptual, learning and developmental toys for your little ones. As you browse through Junior J, you may find a number of toys that are not available in any of the regular toy stores in India. We have hand picked the best toys around the world for age group of 0-6 yrs. These toys will inculcate learning within your child at an early age when they are at their brightest and also help them to enhance multiple intelligence. Do come and experience it yourself.</p>
				 
			</div>
		</div>
	</div>
	<!--//about-->
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