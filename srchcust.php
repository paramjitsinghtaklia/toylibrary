<?php 
include 'classes/customer.php';

$name =  $email = $childname ='';

if (isset($_REQUEST['name']))
	$name = $_REQUEST['name'];

if (isset($_REQUEST['email']))
	$email = $_REQUEST['email'];

if (isset($_REQUEST['cname']))
	$childname = $_REQUEST['cname'];
 
$objCust = new customer();
$result_customer = $objCust->getCustomer($name,$email,$childname); 

$rows = array();

if($result_customer)
{
 foreach($result_customer as $row){
          $rows[] = $row;
    }
}

echo json_encode($rows);
?>