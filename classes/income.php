<?php

require_once 'dbconfig.php';

class income
{
	// Inserting income amount
	function AddIncome($input_income)
	{
		$sql = "INSERT INTO income(
					income_source_type,
					payment_mode,
					customer_id,
					order_id,
					description,
					cheque_no,
					income_amount,
					created_by,
					created_date) 
				VALUES(
					:income_source_type,
					:payment_mode,
					:customer_id,
					:order_id,
					:description,
					:cheque_no,
					:income_amount,
					:created_by,
					:created_date)";

		$today_date= date('Y/m/d H:i:s');

		$user_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':income_source_type',$input_income['txt_income_type'],PDO::PARAM_INT);
		$query->bindParam(':payment_mode',$input_income['txt_payment_mode'],PDO::PARAM_INT);
		$query->bindParam(':customer_id',$input_income['hdn_custid'],PDO::PARAM_INT);
		$query->bindParam(':order_id',$input_income['hdn_orderid'],PDO::PARAM_INT);
		$query->bindParam(':description',$input_income['desc'],PDO::PARAM_STR);
		$query->bindParam(':cheque_no',$input_income['cheque_no'],PDO::PARAM_STR);
		$query->bindParam(':income_amount',$input_income['income_amount'],PDO::PARAM_STR);
		$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
		$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
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
	
	// View income amount
	function getIncomeamount()
	{	
		try
		{
			$sql = "SELECT * FROM income";
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
	
	//Get selected pettycash amount
	function getSelectedExpense($id)
	{	
		try
		{
			$sql = "SELECT * FROM expense WHERE expense_id=".$id;		
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

	//Get selected pettycash amount
	function getincome_report($income_source_type,$from_date, $end_date)
	{	
		try
		{
			
			if ($from_date==''&& $end_date=='')
				$sql = "SELECT * FROM income WHERE income_source_type=".$income_source_type;		
			else
			{
				$arr_fromdate = explode('-', $from_date);
				$arr_todate = explode('-', $end_date);
				$fromdate_new = new DateTime($arr_fromdate[2]."-".$arr_fromdate[1]."-".$arr_fromdate[0]);
				$enddate_new = new DateTime($arr_todate[2]."-".$arr_todate[1]."-".$arr_todate[0]);

				$sql = "SELECT * FROM income WHERE income_source_type=".$income_source_type." and date(created_date)>='".$fromdate_new->format('Y-m-d')."' and date(created_date)<='".$enddate_new->format('Y-m-d')."'";
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
	
	//Update expense amount
	function UpdateExpense($update_expense)
	{
 		$sql = "UPDATE expense SET expense_type=:expense_type, amount=:amount, description=:description, created_date=:created_date, created_by=:created_by WHERE expense_id=:expense_id";
				
 		$today_date= date('Y/m/d H:i:s');
		
		$u_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':expense_id', $update_expense['txt_id'], PDO::PARAM_INT);
		$query->bindParam(':expense_type', $update_expense['txt_expense_type'], PDO::PARAM_STR);
		$query->bindParam(':amount', $update_expense['txt_expense_amt'], PDO::PARAM_STR);
		$query->bindParam(':description', $update_expense['txt_expense_desc'], PDO::PARAM_STR);
		$query->bindParam(':created_date', $today_date, PDO::PARAM_STR);
		$query->bindParam(':created_by', $u_id, PDO::PARAM_INT);
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
}
?>