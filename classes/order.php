<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
require_once 'dbconfig.php';

//this class is for order related modules

class order
{


	//function to add order
	function Assignedtoy_customer ($input_order)
	{
		$arr_toyid  = explode(',', $input_order['hdn_toysid']);
		$customer_balancepoints = $input_order['hdn_bal_points'] ;
		$custid = $input_order['hdn_custid'];
		$activeplan_id = $input_order['hdn_activeplan_id'] ;
		
		$balance_points = 0;

		 $sql = "INSERT INTO customer_toy_temp( customer_id,toy_id,insert_date,created_by)  VALUES(:customer_id,:toy_id,:created_date,:created_by);";

 		$input_order['default_zero'] = '0';
 		$today_date= date('Y/m/d H:i:s');

 		

		$user_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':customer_id',$input_order['hdn_custid'],PDO::PARAM_STR);
		$query->bindParam(':toy_id',$arr_toyid[0],PDO::PARAM_STR);
		$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
		$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
		$query->execute();

			if($query->rowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		
	}


	//function to add order
	function AddOrder ($input_order)
	{
		$arr_toyid  = explode(',', $input_order['hdn_toysid']);
		$customer_balancepoints = $input_order['hdn_bal_points'] ;
		$custid = $input_order['hdn_custid'];
		$activeplan_id = $input_order['hdn_activeplan_id'] ;
		
		$balance_points = 0;

		 $sql_points = "SELECT sum(points) totalpoint FROM toy where toy_id in (".rtrim($input_order['hdn_toysid'],',').")";		
		$query_points = DB::prepare($sql_points);
		$query_points->execute();
		$results_points = $query_points->fetch(PDO::FETCH_ASSOC);

		$total_toysSelectedpoints = $results_points['totalpoint'];

		if ($total_toysSelectedpoints<= $customer_balancepoints)
		{

		$balance_points = $customer_balancepoints - $total_toysSelectedpoints;

		 
		 $sql = "INSERT INTO orders( order_type, customer_id,order_startdate,order_enddate, created_date,status,created_by)  VALUES(:order_type,:customer_id,:order_startdate,:order_enddate,:created_date,:status,:created_by);";

 		$input_order['default_zero'] = '0';
 		$today_date= date('Y/m/d H:i:s');

 		$start_date = date('Y-m-d H:i:s', strtotime($input_order['s_date']));  
 		$end_date = date('Y-m-d H:i:s', strtotime($input_order['e_date'])); 
 		
 		$start_date = DateTime::createFromFormat('d/m/Y', $input_order['s_date']);
 		$end_date = DateTime::createFromFormat('d/m/Y', $input_order['e_date']);


		$user_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':order_type',$input_order['order_type'],PDO::PARAM_STR);
		$query->bindParam(':customer_id',$input_order['hdn_custid'],PDO::PARAM_STR);
		$query->bindParam(':order_startdate',$start_date->format('Y-m-d'),PDO::PARAM_STR);
		$query->bindParam(':order_enddate',$end_date->format('Y-m-d'),PDO::PARAM_STR);
		$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
		$query->bindParam(':status',$input_order['default_zero'],PDO::PARAM_INT);
		$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
		$query->execute();

			 $order_id = DB::lastInsertId(); 

			if($query->rowCount() > 0)
			{
				
				foreach ($arr_toyid as $toy_id_key ) 
				{
					if($toy_id_key<>'')
					{
						$today_date= date('Y/m/d H:i:s');
						/*$sql = "INSERT INTO order_details (order_id,toy_id,created_date)
							VALUES (:order_id,:toy_id,:created_date);";
						$query = DB::prepare($sql);
						$query->bindParam(':order_id',$order_id,PDO::PARAM_INT);
						$query->bindParam(':toy_id',$toy_id_key,PDO::PARAM_STR);
						$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
						$query->execute();*/


						$sql_update = "call addorder_details(?,?,?)";
			 			$query_update = DB::prepare($sql_update);
						$query_update->bindParam(1,$order_id,PDO::PARAM_INT);
						$query_update->bindParam(2,$toy_id_key,PDO::PARAM_INT);
					 	$query_update->bindParam(3,$today_date,PDO::PARAM_STR);
						$result = $query_update->execute();

					}
				}

				// $sql_update = "UPDATE customer_plans SET 
				//	current_points =:balance_points WHERE customer_id = :customer_id and id=:activeplan_id";
				$sql_update = "call update_customerpoints(?,?,?,?)";
	 			$query_update_new = DB::prepare($sql_update);
				$query_update_new->bindParam('1',$custid,PDO::PARAM_INT);
				$query_update_new->bindParam('2',$activeplan_id,PDO::PARAM_INT);
				$query_update_new->bindParam('3',$total_toysSelectedpoints,PDO::PARAM_INT);
				$query_update_new->bindParam('4',$order_id,PDO::PARAM_INT);
				
				$query_update_new->execute();
				//$query_update->debugDumpParams();
				//print_r($query_update->errorInfo());
				if($query_update_new->rowCount())
				{			
					$output =  array('success'=>true,
	                 'msg'=>'Order Successfully placed');
				}
				else
				{
					$output =  array('success'=>false,
	                 'msg'=>'Error Occured while creating order');
				}
			return 	$output ;	
			}
			else
			{
				$output =  array('success'=>false,
                 'msg'=>'Error Occured while creating Order! Try Again');
				 return 	$output ;
			}
		}
		else
		{
			$output =  array('success'=>false,
                 'msg'=>'Customer Balance Point is less then selected toys total points');
				 return 	$output ;
		}
	}

	function AddPartyOrder ($input_order)
	{
		$arr_toyid  = explode(',', $input_order['hdn_toysid']);
		$customer_balancepoints = $input_order['hdn_bal_points'] ;
		$custid = $input_order['hdn_custid'];
		$activeplan_id = $input_order['hdn_activeplan_id'] ;
		
		$sql = "INSERT INTO orders( order_type, customer_id,order_startdate,order_enddate, created_date,status,created_by,order_amount)  VALUES(:order_type,:customer_id,:order_startdate,:order_enddate,:created_date,:status,:created_by,:order_amount);";

 		$input_order['default_zero'] = '0';
 		$today_date= date('Y/m/d H:i:s');

 		$start_date = date('Y-m-d H:i:s', strtotime($input_order['s_date']));  
 		$end_date = date('Y-m-d H:i:s', strtotime($input_order['e_date'])); 
 		
 		$start_date = DateTime::createFromFormat('d/m/Y', $input_order['s_date']);
 		$end_date = DateTime::createFromFormat('d/m/Y', $input_order['e_date']);


		$user_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':order_type',$input_order['order_type'],PDO::PARAM_STR);
		$query->bindParam(':customer_id',$input_order['hdn_custid'],PDO::PARAM_STR);
		$query->bindParam(':order_startdate',$start_date->format('Y-m-d'),PDO::PARAM_STR);
		$query->bindParam(':order_enddate',$end_date->format('Y-m-d'),PDO::PARAM_STR);
		$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
		$query->bindParam(':status',$input_order['default_zero'],PDO::PARAM_INT);
		$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
		$query->bindParam(':order_amount',$input_order['order_amount'],PDO::PARAM_INT);
		
		$query->execute();

			 $order_id = DB::lastInsertId(); 

			if($query->rowCount() > 0)
			{
				
				foreach ($arr_toyid as $toy_id_key ) 
				{
					if($toy_id_key<>'')
					{
						$today_date= date('Y/m/d H:i:s');
						$sql = "INSERT INTO order_details (order_id,toy_id,created_date)
							VALUES (:order_id,:toy_id,:created_date);";
						$query = DB::prepare($sql);
						$query->bindParam(':order_id',$order_id,PDO::PARAM_INT);
						$query->bindParam(':toy_id',$toy_id_key,PDO::PARAM_STR);
						$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
						$query->execute();
					}
				}

				
				//$query_update->debugDumpParams();
				//print_r($query_update->errorInfo());
				if($query->rowCount())
				{			
					$output =  array('success'=>true,
	                 'msg'=>'Order Successfully placed');
				}
				else
				{
					$output =  array('success'=>false,
	                 'msg'=>'Error Occured while creating order');
				}
			return 	$output ;	
			}
			else
			{
				$output =  array('success'=>false,
                 'msg'=>'Error Occured while creating Order! Try Again');
				 return 	$output ;
			}
	}

function AddSellOrder ($input_order)
	{
		$arr_toyid  = explode(',', $input_order['hdn_toysid']);
		$customer_balancepoints = $input_order['hdn_bal_points'] ;
		$custid = $input_order['hdn_custid'];
		$activeplan_id = $input_order['hdn_activeplan_id'] ;
		
		$sql = "INSERT INTO orders( order_type, customer_id,order_startdate,order_enddate, created_date,status,created_by,order_amount)  VALUES(:order_type,:customer_id,:order_startdate,:order_enddate,:created_date,:status,:created_by,:order_amount);";

 		$input_order['default_zero'] = '0';
 		$today_date= date('Y/m/d H:i:s');

 		$start_date = date('Y-m-d H:i:s', strtotime($input_order['s_date']));  
 		$end_date = date('Y-m-d H:i:s', strtotime($input_order['e_date'])); 
 		
 		$start_date = DateTime::createFromFormat('d/m/Y', $input_order['s_date']);
 		$end_date = DateTime::createFromFormat('d/m/Y', $input_order['e_date']);


		$user_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':order_type',$input_order['order_type'],PDO::PARAM_STR);
		$query->bindParam(':customer_id',$input_order['hdn_custid'],PDO::PARAM_STR);
		$query->bindParam(':order_startdate',$start_date->format('Y-m-d'),PDO::PARAM_STR);
		$query->bindParam(':order_enddate',$end_date->format('Y-m-d'),PDO::PARAM_STR);
		$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
		$query->bindParam(':status',$input_order['default_zero'],PDO::PARAM_INT);
		$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
		$query->bindParam(':order_amount',$input_order['sell_amount'],PDO::PARAM_INT);
		
		$query->execute();

			 $order_id = DB::lastInsertId(); 

			if($query->rowCount() > 0)
			{
				
				foreach ($arr_toyid as $toy_id_key ) 
				{
					if($toy_id_key<>'')
					{
						$today_date= date('Y/m/d H:i:s');
						$sql = "INSERT INTO order_details (order_id,toy_id,created_date)
							VALUES (:order_id,:toy_id,:created_date);";
						$query = DB::prepare($sql);
						$query->bindParam(':order_id',$order_id,PDO::PARAM_INT);
						$query->bindParam(':toy_id',$toy_id_key,PDO::PARAM_STR);
						$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
						$query->execute();
					}
				}

				
				//$query_update->debugDumpParams();
				//print_r($query_update->errorInfo());
				if($query->rowCount())
				{			
					$output =  array('success'=>true,
	                 'msg'=>'Order Successfully placed');
				}
				else
				{
					$output =  array('success'=>false,
	                 'msg'=>'Error Occured while creating order');
				}
			return 	$output ;	
			}
			else
			{
				$output =  array('success'=>false,
                 'msg'=>'Error Occured while creating Order! Try Again');
				 return 	$output ;
			}
	}


	function get_orders()
	{	
			try
			{
				$sql = "SELECT order_id,b.customer_id,order_startdate,order_enddate,created_date,status,child_name, parent_name,mobile_number,email_id,DATEDIFF(now(),order_enddate) extradays  FROM orders a inner join customer b on a.customer_id = b.customer_id where status=0 and order_type='rent' order by 1 desc";

				$query = DB::prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
			} 
			catch (PDOException $e) 
			{
	   			echo 'Error!: ' . $e->getMessage() . '<br />';
			} 
		 
				if($query->rowCount() > 0)
				{
					return $results;
				}
				else
				{
					return false;
				}
	}

	function get_orders_party()
	{	
			try
			{
				$sql = "SELECT order_id,b.customer_id,order_startdate,order_enddate,created_date,status,child_name, parent_name,mobile_number,email_id,order_amount FROM orders a inner join customer b on a.customer_id = b.customer_id where status=0 and order_type='party' order by 1 desc";

				$query = DB::prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
			} 
			catch (PDOException $e) 
			{
	   			echo 'Error!: ' . $e->getMessage() . '<br />';
			} 
		 
				if($query->rowCount() > 0)
				{
					return $results;
				}
				else
				{
					return false;
				}
	}

	
	function get_orders_sell()
	{	
			try
			{
				$sql = "SELECT order_id,b.customer_id,order_startdate,order_enddate,created_date,status,child_name, parent_name,mobile_number,email_id,order_amount FROM orders a inner join customer b on a.customer_id = b.customer_id where status=0 and order_type='sell' order by 1 desc";

				$query = DB::prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
			} 
			catch (PDOException $e) 
			{
	   			echo 'Error!: ' . $e->getMessage() . '<br />';
			} 
		 
				if($query->rowCount() > 0)
				{
					return $results;
				}
				else
				{
					return false;
				}
	}

function get_orders4customer($customer_id)
	{	
			try
			{
				$sql = "SELECT order_id,customer_id,order_startdate,order_enddate,created_date,status, sum(total_points) total_points
from 
(SELECT order_id,b.customer_id,order_startdate,order_enddate,created_date,status,0 total_points FROM orders a 
inner join customer b on a.customer_id = b.customer_id where status = 0 and b.customer_id = $customer_id
union 
(Select a.order_id,' 'customer_id,'' order_startdate,'' order_enddate,''created_date,''status,sum(points) total_points from orders a inner join order_details b on a.order_id=b.order_id inner join  toy c on c.toy_id=b.toy_id
where customer_id=$customer_id group by a.order_id)) as t
group by order_id ";

				$query = DB::prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
			} 
			catch (PDOException $e) 
			{
	   			echo 'Error!: ' . $e->getMessage() . '<br />';
			} 
		 
				if($query->rowCount() > 0)
				{
					return $results;
				}
				else
				{
					return false;
				}
	}


function updateorder_status($customer_id,$order_id,$days,$deductpointsbool,$defectamount,$pointstobededucted)
	{
	$status= false;

		try
		{
			$status= false;
			$deductpointsbool = true;
			$today_date= date('Y/m/d H:i:s');


			$sql_update = "call update_order(?,?,?,?,?,?)";
		 	$query_update = DB::prepare($sql_update);
			$query_update->bindParam(1,$order_id,PDO::PARAM_STR);
			$query_update->bindParam(2,$customer_id,PDO::PARAM_STR);
			$query_update->bindParam(3,$days,PDO::PARAM_STR);
			$query_update->bindParam(4,$deductpointsbool,PDO::PARAM_STR);
			$query_update->bindParam(5,$defectamount,PDO::PARAM_STR);
			$query_update->bindParam(6,$pointstobededucted,PDO::PARAM_STR);
					
				
				$result = $query_update->execute();
					if ($result)
						{		
								$status= true;
						}
						else
						{
							$status= false;
						}
		}
		catch (PDOException $e) 
		{
			echo 'Error!: ' . $e->getMessage() . '<br />';
			$status= false;
		} 
		
		return $status;
	}

function cancel_order($customer_id,$order_id)
	{
	$status= false;

	/*
	status 1 = active order
	status 2 = cancel order
	*/

		try
		{
			$status= false;
			$deductpointsbool = true;
			$today_date= date('Y/m/d H:i:s');

			$sql_update = "call cancel_order(?,?)";
		 	$query_update = DB::prepare($sql_update);
			$query_update->bindParam(1,$order_id,PDO::PARAM_STR);
			$query_update->bindParam(2,$customer_id,PDO::PARAM_STR);
					
			$result = $query_update->execute();
				if ($result)
					{		
							$status= true;
					}
					else
					{
						$status= false;
					}
		}
		catch (PDOException $e) 
		{
			echo 'Error!: ' . $e->getMessage() . '<br />';
			$status= false;
		} 
		return $status;
	}
	
function getOrder($orderno,$ordertype,$custid)
	{	
		$sqlwhereclause  = '';
		//echo "email vlaue".$email;
		try
		{
			
			$sql = "SELECT a.customer_id, a.parent_name, a.child_name, b.order_id,  b.customer_id, b.order_type, b.order_amount from customer a INNER JOIN orders b on a.customer_id=b.customer_id";
			//echo $sql;
			
			if ($orderno <> "")
			{
				$sqlwhereclause = " order_id  like '%".$orderno."%'";
			}
			
			if ($ordertype <> "")
			{
				if($sqlwhereclause =='')
				{
			 		$sqlwhereclause =  "  order_type  like '%".$ordertype."%'";
				}
				else
				{
					$sqlwhereclause = $sqlwhereclause. " or  order_type  like '%".$ordertype."%'";
				}
			}
			
			if ($custid <> "")
			{
				if($sqlwhereclause =='')
				{
				 $sqlwhereclause =  "   customer_id  like '%".$custid."%'";
				}
				else
				{
					$sqlwhereclause = $sqlwhereclause. " or customer_id  like '%".$custid."%'";
				}
			}
			
			if ($sqlwhereclause <> '')
			{
				$sql = $sql . " where ".$sqlwhereclause;
			}
			$query = DB::prepare($sql);
			$query->execute();
			$results =  $query->fetchAll(PDO::FETCH_OBJ);
			//$query->fetchAll();
		} 
		catch (PDOException $e) 
		{
			echo 'Error!: ' . $e->getMessage() . '<br />';
		} 
			
		if($query->rowCount() > 0)
		{
			return $results;
		}
		else
		{
			return false;
		}
	}


function gettoys_assigned()
	{	
		$results = "";
		try
		{
			
			$sql = "SELECT child_name,parent_name,toy_name,toy_code,a.insert_date FROM toy_latest.customer_toy_temp a inner join customer b on a.customer_id = b.customer_id inner join toy  c on a.toy_id = c.toy_id";
			//echo $sql;
			
			
			$query = DB::prepare($sql);
			$query->execute();
			$results = $query->fetchAll();
		} 
		catch (PDOException $e) 
		{
			echo 'Error!: ' . $e->getMessage() . '<br />';
		} 
			
		if($query->rowCount() > 0)
		{
			return $results;
		} 
		else
		{
			return false;
		}
	}

	//used while closing
	function getordertoy_deductpoints($order_id,$latedays)
	{	
		$deduct_points = 0 ;
			try
			{
				
				if ((int)$latedays >0 ) 
				{
					$sql = "SELECT sum(toy_points) as totalpoints FROM order_details where order_id =".$order_id;

				$query = DB::prepare($sql);
				$query->execute();
				$results_points = $query->fetch(PDO::FETCH_ASSOC);
				$total_toypoint = $results_points['totalpoints'];


					if ($latedays <=5 ) 
					{
							$deduct_points = (int)($total_toypoint/2);
					}
					else
					{
							$deduct_points = (int)$total_toypoint;
					}
				}
				else
				{
					$deduct_points = 0 ;
				}
			} 
			catch (PDOException $e) 
			{
	   			//echo 'Error!: ' . $e->getMessage() . '<br />';
			} 
			return $deduct_points;
	}


	


function getorder_toylist($orderId)
	{	
			try
			{
				$sql = "Select a.toy_id,toy_name,toy_code,points,'' as comments, '0' as selected from order_details a inner join toy b on a.toy_id = b.toy_id where order_id=".$orderId;

				$query = DB::prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);
			} 
			catch (PDOException $e) 
			{
	   			echo 'Error!: ' . $e->getMessage() . '<br />';
			} 
		 
				if($query->rowCount() > 0)
				{
					return $results;
				}
				else
				{
					return false;
				}
	}


function updateorder_partialtoys($orderid,$toyid,$comments)
	{
			$output = false;
			try
			{
				$today_date= date('Y/m/d H:i:s');				
				$sql_update = "Call partialorder_return(?,?,?,?)";
	 			$query_update = DB::prepare($sql_update);
			 	$query_update->bindParam(1,$orderid,PDO::PARAM_STR);
				$query_update->bindParam(2,$toyid,PDO::PARAM_STR);
				$query_update->bindParam(3,$comments,PDO::PARAM_STR);
				$query_update->bindParam(4,$today_date,PDO::PARAM_STR);
				
				$result = $query_update->execute();				
					if($query_update->rowCount())
					{			
						$output = true;
					}
					else
					{
						$output = false;
					}
				} 
			catch (PDOException $e) 
			{
	   			echo 'Error!: ' . $e->getMessage() . '<br />';
			}
	}

}