<?php 
include "header.php"; 
include 'classes/expenses.php';

$objExpense = new expenses();
$result_data = $objExpense->getExpenseamount(); 

?>
<link href="css/footable.core.bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="css/table.css" rel="stylesheet" type="text/css" /> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/footable.core.js" type="text/javascript"></script>
<script src="js/footable.sorting.js" type="text/javascript"></script>
<script src="js/footable.filtering.js" type="text/javascript"></script>

 
	<div class="login-page" style="width: 100%! important;">
		<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
			<h3 class="title" style="border-bottom: 3px solid;padding-bottom: 10px;margin-top: -26px;margin-bottom: -30px;">View/Update<span> Expenses</span> <div style="float:right;margin-left: -13%;margin-right: 2%;"><a href="add_expense.php" style="text-decoration:none; color:#fff;"><button class="btn_add" style="font-size: 23px;margin-top: 10px;padding-top: 11px;padding-bottom: 11px;">Add Expense</button></a></div></h3>
		</div>
			
			
			<div class="">
			<div class="login-body" style="margin-top: -5%;">
	<table id='tableContainerFiltered1' data-expand-first="true" name='tableContainerFiltered1'  data-filtering="true" style="margin-top:42px;">
		<thead> 
			<tr>
				<th>Sr.No.</th>
				<th>Expense Type</th>
				<th>Expense Amount</th>
				<th>Expense Description</th>
				<th>Expense Date</th>
				<th>Created Date</th>
				<th>Actions</th>
			</tr>
		</thead>
	<tbody>
	<?php 

		if ($result_data===false)
		{
			echo 'No Toys Available Yet';
		} 
		else
		{
			$x=1;
			foreach ($result_data as  $value )
			{
				$expense_id = $value->expense_id;
				echo '<tr><td>'.$x.'</td><td>';
				// echo '<td>'.$value->expense_type.'</td>';
								if ($value->expense_type =="1")
									echo 'Food Allowance';
								else if ($value->expense_type =="2")
									echo 'Electrical Expense';
								else if ($value->expense_type =="3")
									echo 'Non-Electrical Expenses';
								else if ($value->expense_type =="4")
									echo 'New toys Buying Expenses';
								else if ($value->expense_type =="5")
									echo 'Marketing';
								else if ($value->expense_type =="6")
									echo 'Personal Expenses';
								else if ($value->expense_type =="7")
									echo 'Shop Rent';
								else if ($value->expense_type =="8")
									echo 'Travelling Allowance';
								else if ($value->expense_type =="9")
									echo 'Other';
				echo "</td>";
				echo '<td>'.$value->amount.'</td>';
				echo '<td>'.$value->desc.'</td>';
				echo '<td>'.$value->expense_date.'</td>';
				echo '<td>'.$value->created_date.'</td>';
				echo '<td><a href="edit_expense.php?expense_edit_id='.$expense_id.'"><button class="btn_edit">Edit</button></a>&nbsp;<button class="btn_delete">Delete</button></td></tr>';
				$x++;
			}
			
		}

?>
 
  </tbody>
 </table>
  </div></div></div>

		 
	<!--footer-->
	<?php include 'footer.php'; ?>
	<!--//footer-->

	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
	
		$(document).ready(function() {
		 
		 $('#tableContainerFiltered1').footable();

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};

			$('.zoom').mouseover(function()
						{
						   $(this).css("cursor","pointer");
						   $(this).animate({width: "500px",height:"500px"}, 'slow');
						});

			$('.zoom').mouseout(function()
						{
						 
						   $(this).animate({width: "200px",height:"200px"}, 'slow');
						});



			
			$().UItoTop({ easingType: 'easeOutQuart' });
			


		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->

</body>
</html>