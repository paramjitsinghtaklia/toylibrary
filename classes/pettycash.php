<?php

require_once 'dbconfig.php';

//this class is for toy related modules/pages

class pettycash
{
	// Inserting pettycash amount
	function AddPettycash($input_pettycash)
	{
		$sql = "INSERT INTO cashmaster(
					total_cash,
					peticash_date,
					created_date,
					description,
					created_by) 
				VALUES(
					:pettycash_amont,
					:modified_date,
					:created_date,
					:pettycash_desc,
					:created_by)";

		$input_toy['default_zero'] = '0';
		$today_date= date('Y/m/d H:i:s');

		$user_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':pettycash_amont',$input_pettycash['txt_pettycash_amt'],PDO::PARAM_STR);
		$query->bindParam(':pettycash_desc',$input_pettycash['txt_pettycase_desc'],PDO::PARAM_STR);
		$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
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
	
	// View pettycash amount
	function getPettycash()
	{	
		try
		{
			$sql = "SELECT * FROM cashmaster";
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
	function getSelectedPettycash($id)
	{	
		try
		{
			$sql = "SELECT * FROM cashmaster WHERE cashmaster_id=".$id;		
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
	
	//Update pettycash amount
	function UpdatePettycash($update_pettycash)
	{
 		$sql = "UPDATE cashmaster SET 
				total_cash =:total_cash, 
				description =:description, 
				modified_date=:modified_date WHERE cashmaster_id = :cashmaster_id";
 		$today_date= date('Y/m/d H:i:s');

		$u_id = $_SESSION["user_id"];
		$query = DB::prepare($sql);
		$query->bindParam(':cashmaster_id',$update_pettycash['txt_id'],PDO::PARAM_INT);
		$query->bindParam(':total_cash',$update_pettycash['txt_pettycash_amt'],PDO::PARAM_STR);
		$query->bindParam(':description',$update_pettycash['txt_pettycase_desc'],PDO::PARAM_STR);
		$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
		//$query->bindParam(':created_by',$u_id,PDO::PARAM_INT);
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