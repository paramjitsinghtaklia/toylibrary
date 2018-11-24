<?php 
include 'classes/order.php';

$latedays = "";
$orderid = "";
$deduct = false;
$defectamount = 0;
var_dump($_REQUEST);
	if (isset($_REQUEST['latedays']))
		$latedays = $_REQUEST['latedays'];



	if (isset($_REQUEST['orderid']))
		$orderid = $_REQUEST['orderid'];


	if (isset($_REQUEST['customer_id']))
		$customer_id = $_REQUEST['customer_id'];


	if (isset($_REQUEST['deductamount']))
	{
		if ($_REQUEST['deductamount']=="true")
		{
			$deduct = true;
		}
		else
		{
			$deduct = false;
		}
	}

	if (isset($_REQUEST['defectamount']))
	{
		if ($_REQUEST['defectamount']=="0")
		{
			$defectamount = 0;
		}
		else
		{
			$defectamount = $_REQUEST['defectamount'];
		}
	}

	if (isset($_REQUEST['pointstobededucted']))
	{
		if ($_REQUEST['pointstobededucted']=="0")
		{
			$pointstobededucted = 0;
		}
		else
		{
			$pointstobededucted = $_REQUEST['pointstobededucted'];
		}
	}




$objOrder = new order();
$result_status = $objOrder->updateorder_status($customer_id,$orderid,$latedays,$deduct,$defectamount,$pointstobededucted);

		if($result_status)
		{
			$status = "{status:".$result_status.",msg:'Order Close successfully'}";
		}
		else
		{
			$status = "{status:".$result_status.",msg:'Error while closing the order'}";
		}

echo json_encode($status);
?>