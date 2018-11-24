<?php

require_once 'dbconfig.php';

class expenses
{
	// Inserting expense amount
	function AddIncome($input_income)
	{
		// Getting pettycase amount 
		$currently_active = 1;
		$sql = "SELECT * FROM cashmaster WHERE currently_active=".$currently_active;		
		$query = DB::prepare($sql);
		$query->execute();
		$results_amount = $query->fetch(PDO::FETCH_ASSOC);
		$current_amount = $results_amount['current_amount'];
		$cashmaster_id = $results_amount['cashmaster_id'];
		$expense_amount = $input_expense['txt_expense_amt'];
		
		if(intval($expense_amount) > intval($current_amount))
		{
			$arr_return['status'] = false;
			$arr_return['msg'] = 'Expense amount should be lessthen current pettycash amount';
		}
		else
		{
			$sql_expense = "INSERT INTO expense(
						expense_type,
						amount,
						description,
						expense_date,
						created_date,
						created_by,
						cashmaster_id) 
					VALUES(
						:expense_type,
						:amount,
						:description,
						:expense_date,
						:created_date,
						:created_by,
						:cashmaster_id)";
						
			$today_date= date('Y/m/d H:i:s');
	
			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql_expense);
			$query->bindParam(':expense_type',$input_expense['txt_expense_type'],PDO::PARAM_STR);
			$query->bindParam(':amount',$input_expense['txt_expense_amt'],PDO::PARAM_STR);
			$query->bindParam(':description',$input_expense['txt_expense_desc'],PDO::PARAM_STR);
			$query->bindParam(':expense_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':created_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
			$query->bindParam(':cashmaster_id',$cashmaster_id,PDO::PARAM_INT);
			$query->execute();
			
			$expense_id = DB::lastInsertId();
			
			if($query->rowCount() > 0)
			{
				// Updating cashmaster table
				$update_cash_amount = "UPDATE cashmaster SET current_amount = current_amount - ".$expense_amount." WHERE cashmaster_id=".$cashmaster_id;
				$query = DB::prepare($update_cash_amount);
				$query->execute();
				
				if($query->rowCount() > 0)
				{
					$arr_return['status'] = true;
					$arr_return['msg'] = 'Expense Amount Added Successfully';
				}
				else
				{
					$delete = "DELETE FROM expense WHERE expense_id =".$expense_id;
					$query = DB::prepare($delete);
					$query->execute();
					
					$arr_return['status'] = false;
					$arr_return['msg'] = 'Error Occured ! While Adding Expense. Try Again!';
				}
			}
			else
			{
				$arr_return['status'] = false;
				$arr_return['msg'] = 'Error Occured ! While Adding Expense. Try Again!';
			}
		}
		return $arr_return;
	}
	
	// View expense amount
	function getExpenseamount()
	{	
		try
		{
			$sql = "SELECT * FROM expense";
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