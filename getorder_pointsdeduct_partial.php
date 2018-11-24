<?php 
include 'classes/order.php';

$orderno =  $ordertype = $custid ='';

if (isset($_REQUEST['orderid']))
	$orderno = $_REQUEST['orderid'];

if (isset($_REQUEST['days']))
	$days = $_REQUEST['days'];

 
$objOrder = new order();
$result_order = $objOrder->getordertoy_deductpoints($orderno,$days); 
$result_order_toylist = $objOrder->getorder_toylist($orderno); 


$response['points'] = $result_order;
$response['toylist'] = $result_order_toylist;
//print_r($response);

 echo json_encode($response);

?>