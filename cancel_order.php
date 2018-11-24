<?php 
include 'classes/order.php';

$orderid = '';
$customer_id = '';

	if (isset($_REQUEST['orderid']))
		$orderid = $_REQUEST['orderid'];

	if (isset($_REQUEST['customer_id']))
		$customer_id = $_REQUEST['customer_id'];


$objOrder = new order();
$result_status = $objOrder->cancel_order($customer_id,$orderid);

		if($result_status)
		{
			$status = "{status:".$result_status.",msg:'Order Cancelled successfully'}";
		}
		else
		{
			$status = "{status:".$result_status.",msg:'Error while Cancelled the order'}";
		}

echo json_encode($status);
?>