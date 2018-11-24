<?php 
include 'classes/order.php';

$orderno =  $ordertype = $custid ='';

if (isset($_REQUEST['order_no']))
	$orderno = $_REQUEST['order_no'];

if (isset($_REQUEST['order_type']))
	$ordertype = $_REQUEST['order_type'];

if (isset($_REQUEST['cust_id']))
	$custid = $_REQUEST['cust_id'];
 
$objOrder = new order();
$result_order = $objOrder->getOrder($orderno,$ordertype,$custid); 

$rows = array();

if($result_order)
{
 foreach($result_order as $row){
          $rows[] = $row;
    }
}

echo json_encode($rows);
?>