<?php 
include 'classes/order.php';

$orderno =  $ordertype = $custid ='';

if (isset($_REQUEST['orderid']))
	$orderno = $_REQUEST['orderid'];

if (isset($_REQUEST['days']))
	$days = $_REQUEST['days'];

 
$objOrder = new order();
$result_order = $objOrder->getordertoy_deductpoints($orderno,$days); 
echo json_encode($result_order);
?>