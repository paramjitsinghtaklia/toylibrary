<?php 
include 'classes/toys.php';

// $toycode = '';
// $data = json_decode(file_get_contents("php://input"));
// $search = $data->term;

var_dump($_REQUEST);
if (isset($_REQUEST['term']))
	$search = $_REQUEST['term'];
 
 echo $search;
$objtoys = new toys();
$result_toys = $objtoys->gettoy_fromcode($search); 
// echo json_encode($result_toys);

$rows = array();

if($result_toys)
{
 foreach($result_toys as $row){
          $rows[] = $row;
    }
}

echo json_encode($rows);


?>