<?php 
include 'classes/toys.php';

//$toyname =  $toycode = $category ='';

$query = "";

/*
if (isset($_REQUEST['toy_name']))
	$toyname = $_REQUEST['toy_name'];

if (isset($_REQUEST['toy_code']))
	$toycode = $_REQUEST['toy_code'];

if (isset($_REQUEST['toy_category']))
	$category = $_REQUEST['toy_category'];
 */


	if (isset($_REQUEST['query']))
		$query = $_REQUEST['query'];

	if (isset($_POST['query']))
		$query = $_POST['query'];


try
{
$postdata = file_get_contents("php://input");
if($postdata<>'')
{
$request = json_decode($postdata);
$params = $request->params;
$query = $params->query;
}
}
catch(Exception $e) {
$query = '';
}



$objToy = new toys();
$result_customer = $objToy->gettoy($query); 

$rows = array();

if($result_customer)
{
 foreach($result_customer as $row){
          $rows[] = $row;
    }
}

echo json_encode($rows);
?>