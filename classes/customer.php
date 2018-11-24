<?php

require_once 'dbconfig.php';

// this class is for customer related modules/pages
class customer
{

	function AddCustomer ($input_customer)
	{
		//var_dump($input_customer);
			$sql="INSERT INTO  customer(child_name,parent_name,child_dob,child_age,gender,address,pincode,mobile_number,tel_number,email_id,registration_date,created_by,modified_date,active,insert_date,customer_type)
		VALUES(:child_name,:parent_name,:child_dob,:child_age,:gender,:address,:pincode,:mobile_number,:tel_number,:email_id,:registration_date,:created_by,:modified_date,:active,:insert_date,:customer_type)";
		
			$today_datetime= date('Y/m/d H:i:s');
			$today_date = date('Y/m/d');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':child_name',$input_customer['txt_childname'],PDO::PARAM_STR);
			$query->bindParam(':parent_name',$input_customer['txt_parentname'],PDO::PARAM_STR);
			$query->bindParam(':child_dob',$today_date,PDO::PARAM_STR);
			$query->bindParam(':child_age',$input_customer['ddl_age'],PDO::PARAM_INT);
			$query->bindParam(':gender',$input_customer['ddl_gender'],PDO::PARAM_STR);
			$query->bindParam(':address',$input_customer['txt_address'],PDO::PARAM_STR);
			$query->bindParam(':pincode',$input_customer['txt_pincode'],PDO::PARAM_INT);
			$query->bindParam(':mobile_number',$input_customer['txt_mobile_number'],PDO::PARAM_INT);
			$query->bindParam(':tel_number',$input_customer['txt_tel_number'],PDO::PARAM_STR);
			$query->bindParam(':email_id',$input_customer['txt_email_id'],PDO::PARAM_STR);
			$query->bindParam(':registration_date',$today_datetime,PDO::PARAM_STR);
			$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
			$query->bindParam(':modified_date',$today_datetime,PDO::PARAM_STR);
			$query->bindParam(':insert_date',$today_datetime,PDO::PARAM_STR);
			$query->bindParam(':active',$input_customer['ddlstatus'],PDO::PARAM_INT);
			$query->bindParam(':customer_type',$input_customer['ddl_customertype'],PDO::PARAM_STR);

			
			//$query->debugDumpParams();
			$query->execute();


			 $customer_id = DB::lastInsertId(); 

			if($query->rowCount() > 0)
			{
				$plan_id = $input_customer['ddl_plan_id'];
				$sql = "SELECT * FROM plan_master WHERE plan_id=".$plan_id;		
				$query = DB::prepare($sql);
				$query->execute();
				$results_plan = $query->fetch(PDO::FETCH_ASSOC);

				$today_date= date('Y/m/d H:i:s');
				$value = 0;
				if($query->rowCount() > 0)
					{
						$points = $results_plan['plan_points'];
						$sql = 'INSERT INTO customer_plans(customer_id,plan_id,actual_points,current_points,expired,insert_date,modified_date,active)
									VALUES (:customer_id,:plan_id,:actual_points,:current_points,:expired,:insert_date,:modified_date,:active)';
						$query = DB::prepare($sql);
						$query->bindParam(':customer_id',$customer_id,PDO::PARAM_INT);
						$query->bindParam(':plan_id',$plan_id,PDO::PARAM_INT);
						$query->bindParam(':actual_points',$points,PDO::PARAM_INT);
						$query->bindParam(':current_points',$points,PDO::PARAM_INT);
						$query->bindParam(':expired',$value,PDO::PARAM_INT);
						$query->bindParam(':insert_date',$value,PDO::PARAM_STR);
						$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
						$query->bindParam(':active',$value,PDO::PARAM_INT);
						$query->execute();
					}
				return true;
			}
			else
			{
				return false;
			}
	}




function get_allCustomer()
	{	
		try
		{
			
				$sql = "Select a.customer_id,child_name,parent_name,child_dob,gender,address,pincode,mobile_number,tel_number,email_id,registration_date, a.active, plan_name,current_points from customer a
 				inner join customer_plans b on  a.customer_id  = b.customer_id inner join plan_master c  on c.plan_id = b.plan_id  where b.expired=0";
			
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


function getCustomer($name,$email,$childname)
	{	
		$sqlwhereclause  = '';
		//echo "email vlaue".$email;
		try
		{
			
		 // $sql = "Select a.customer_id,child_name,parent_name,child_dob,gender,address,pincode,mobile_number,tel_number,email_id,registration_date, a.active, plan_name,current_points,b.id as plan_id from customer a
 		// 		inner join customer_plans b on  a.customer_id  = b.customer_id inner join plan_master c  on c.plan_id = b.plan_id where b.active=0";

			$sql = "Select a.customer_id,child_name,parent_name,child_dob,gender,address,pincode,mobile_number,tel_number,email_id,registration_date, 
a.active, plan_name,sum(current_points) current_points,b.id as plan_id from customer a inner join customer_plans b on 
 a.customer_id  = b.customer_id inner join plan_master c  on c.plan_id = b.plan_id where b.expired in (0,3)";


 				if ($name <> "")
 				{
 					 $sqlwhereclause = "parent_name  like '%".$name."%'";
 				}

 				if ($email <> "")
 				{
 					 if($sqlwhereclause =='')
 					 {
 					 	 $sqlwhereclause =  "  email_id  like '%".$email."%'";
 					 }
 					 else
 					 {
 					 		$sqlwhereclause = $sqlwhereclause. " or  email_id  like '%".$email."%'";
 					 }
 					
 				}

 				if ($childname <> "")
 				{
 					if($sqlwhereclause =='')
 					 {
 					 	 $sqlwhereclause =  "   child_name  like '%".$childname."%'";
 					 }
 					 else
 					 {
 					 		$sqlwhereclause = $sqlwhereclause. " or child_name  like '%".$childname."%'";
 					 }
 				}

 				if ($sqlwhereclause <> '')
 				{
 					$sql = $sql . " and ".$sqlwhereclause;
 				}
 				 

 			// echo $sql;
 				
/*
 			

 				if ($name <> "" && $email <> "" && $childname <> "")
 				{
					$sql = $sql . " parent_name  like '".$name."%' or email_id like '".$email."%' or child_name like '".$childname."%') ";
 				}
 				else if ($name <> "" && $email <> "" && $childname == "")
 				{
 					$sql = $sql . " parent_name  like '".$name."%' or email_id like '".$email."%') ";
 				}
				else if ($name <> "" && $email == "" && $childname == "")
 				{
 					$sql = $sql . " parent_name  like '".$name."%' ) ";
 				}
 				*/
 			//	echo $sql;
 		$sql = $sql . " group by a.customer_id";
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



function getCustomer_history($cust_id)
	{	
		 
		try
		{
			
		$sql = "Select a.customer_id,child_name,parent_name,child_dob,gender,address,pincode,mobile_number,tel_number,email_id,registration_date, a.active, plan_name,current_points,b.plan_id from customer a
 				inner join customer_plans b on  a.customer_id  = b.customer_id inner join plan_master c  on c.plan_id = b.plan_id where a.customer_id= ".$cust_id;

 		$query = DB::prepare($sql);
		$query->execute();
			$results = $query->fetch(PDO::FETCH_ASSOC);
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





	function AddPlans ($input_plans)
	{
		$sql="INSERT INTO plan_master(plan_name,plan_amount,plan_points,modified_date,active,created_by) VALUES (:plan_name,:plan_amount,:plan_points,:modified_date,:active,:created_by)";

			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':plan_name',$input_plans['txt_planname'],PDO::PARAM_STR);
			$query->bindParam(':plan_amount',$input_plans['txt_planamount'],PDO::PARAM_INT);
			$query->bindParam(':plan_points',$input_plans['txt_planpoints'],PDO::PARAM_INT);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$input_plans['ddlstatus'],PDO::PARAM_INT);
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

	function get_Plans($value)
	{	
		try
		{
			if($value=='active')
			{
				$sql = "Select plan_id,plan_name from plan_master where active=0";
			}
			else
			{
				$sql = "Select * from plan_master";
			}
		
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


	function getSelected_plans($planid)
	{	
		try
		{
			
		$sql = "SELECT * FROM plan_master WHERE plan_id=".$planid;		
		$query = DB::prepare($sql);
		$query->execute();
		$results = $query->fetch(PDO::FETCH_ASSOC);
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

	function getAll_Customerplans($customer_id)
	{	
		try
		{
			
		$sql = "SELECT plan_name,a.actual_points,current_points,expired,b.modified_date FROM customer_plans  
a inner join plan_master b on a.plan_id = b.plan_id where customer_id=".$customer_id;		
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

	function UpdatePlans($update_Plan)
	{
		 
		$sql="UPDATE plan_master SET
				plan_name =:plan_name,
				plan_amount =:plan_amount,
				active =:active,
				plan_points =:plan_points,
				modified_date =:modified_date,
				created_by =:created_by
				WHERE plan_id =:plan_id";

			$today_date= date('Y/m/d H:i:s');
			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':plan_id',$update_Plan['hdn_planid'],PDO::PARAM_INT);
			$query->bindParam(':plan_name',$update_Plan['txt_planname'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$update_Plan['ddlstatus'],PDO::PARAM_INT);
			$query->bindParam(':plan_amount',$update_Plan['txt_planamount'],PDO::PARAM_STR);
			$query->bindParam(':plan_points',$update_Plan['txt_planpoints'],PDO::PARAM_STR);
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

	/*********************** Select Customer to data to update ***********************/

	function getSelectedCustomer($id)
	{	
		try
		{
			$sql = "SELECT * FROM customer WHERE customer_id=".$id;		
			$query = DB::prepare($sql);
			$query->execute();
			$results = $query->fetch(PDO::FETCH_ASSOC);
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

	/************************** Update Customer ***********************/
	
	function UpdateCustomer($update_Customer)
	{
 		$sql = "UPDATE customer SET
				child_name=:child_name, 
				parent_name=:parent_name, 
				child_dob=:child_dob, 
				child_age=:child_age, 
				gender=:gender, 
				address=:address,
				pincode=:pincode, 
				mobile_number=:mobile_number, 
				tel_number=:tel_number,
				active=:active,
				email_id=:email_id, 
				registration_date=:registration_date, 
				created_by=:created_by,
				modified_date=:modified_date,
				customer_type=:customer_type,
				insert_date=:insert_date WHERE customer_id = :customer_id";
 		
 		$today_datetime= date('Y/m/d H:i:s');
		$today_date = date('Y/m/d');
		$u_id = $_SESSION["user_id"];
		
		//$stmt = $pdo->prepare($sql); 
		
		$query = DB::prepare($sql);
		$query->bindParam(':customer_id',$update_Customer['txt_custid'],PDO::PARAM_INT);
		$query->bindParam(':child_name',$update_Customer['txt_childname'],PDO::PARAM_STR);
		$query->bindParam(':parent_name',$update_Customer['txt_parentname'],PDO::PARAM_STR);
		$query->bindParam(':child_dob',$update_Customer['txt_dob'],PDO::PARAM_STR);
		$query->bindParam(':child_age',$update_Customer['ddl_age'],PDO::PARAM_INT);
		$query->bindParam(':gender',$update_Customer['ddl_gender'],PDO::PARAM_STR);
		$query->bindParam(':address',$update_Customer['txt_address'],PDO::PARAM_STR);
		$query->bindParam(':pincode',$update_Customer['txt_pincode'],PDO::PARAM_INT);
		$query->bindParam(':mobile_number',$update_Customer['txt_mobile_number'],PDO::PARAM_INT);
		$query->bindParam(':tel_number',$update_Customer['txt_tel_number'],PDO::PARAM_INT);
		$query->bindParam(':email_id',$update_Customer['txt_email_id'],PDO::PARAM_STR);
		$query->bindParam(':active',$update_Customer['ddlstatus'],PDO::PARAM_INT);
		$query->bindParam(':registration_date',$today_date,PDO::PARAM_STR);
		$query->bindParam(':created_by',$u_id,PDO::PARAM_INT);
		$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
		$query->bindParam(':insert_date',$today_date,PDO::PARAM_STR);
		$query->bindParam(':customer_type',$update_Customer['ddl_customertype'],PDO::PARAM_STR);
		/*echo $query;
		exit;*/
		$query->execute();
		//var_dump($query);

		if($query->rowCount() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/************************** // Update Customer ***********************/

	/************************** Renew Plan ************************/
	
	function RenewPlan($renewPlan)
	{
		$sql_points = "SELECT plan_points FROM plan_master where plan_id =".$renewPlan['ddl_plan_id'];		
		$query_points = DB::prepare($sql_points);
		$query_points->execute();
		$results_points = $query_points->fetch(PDO::FETCH_ASSOC);

		$plan_id = $renewPlan['ddl_plan_id'];
		$plan_points = $results_points['plan_points'];
		$customer_id = $renewPlan['hdn_custid'];
		$expired = 3;
		$active = 1; 
		
		$today_datetime= date('Y/m/d H:i:s');
		$today_date = date('Y/m/d');
		
		$sql = "INSERT INTO customer_plans(customer_id, plan_id, actual_points, current_points, expired, insert_date, modified_date, active) 
				VALUES(:customer_id,:plan_id,:plan_points,:current_points,:expired,:today_date,:modified_date,:active)";
				
		$query = DB::prepare($sql);
		$query->bindParam(':customer_id',$customer_id,PDO::PARAM_INT);
		$query->bindParam(':plan_id',$plan_id,PDO::PARAM_INT);
		$query->bindParam(':plan_points',$plan_points,PDO::PARAM_STR);
		$query->bindParam(':current_points',$plan_points,PDO::PARAM_STR);
		$query->bindParam(':expired',$expired,PDO::PARAM_INT);
		$query->bindParam(':today_date',$today_datetime,PDO::PARAM_STR);
		$query->bindParam(':modified_date',$today_datetime,PDO::PARAM_STR);
		$query->bindParam(':active',$active,PDO::PARAM_INT);
		$query->execute();
		//$query->debugDumpParams();
		//print_r($query->errorInfo());

		if($query->rowCount() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	
	/********************** // Renew Plan ********************/

}

?>