<?php 
include 'classes/order.php';


if (isset($_REQUEST['orderid']))
	$orderno = $_REQUEST['orderid'];

if (isset($_REQUEST['toy_list']))
	$toylist = json_decode($_REQUEST['toy_list']);
$objOrder = new order();

foreach ($toylist as $toy)
{
	if($toy->selected)
	{
			$result_order = $objOrder->updateorder_partialtoys($orderno,$toy->toy_id,$toy->comments);
	}	
}
echo 'true';
?>