<?php

require_once 'dbconfig.php';

//this class is for toy related modules

class toys_old
{

	function AddToys($input_toy,$FILES)
	{
		
 		$sql = "INSERT INTO toy(toy_name,toy_code,toy_desc,brand_id,mrp_amount,rent_amount,points,active,quantity,damaged,current_quantity,modified_date,created_by,selling_amount,image_path) VALUES(:toy_name,:toy_code,:toy_desc,:brand_id,:mrp_amount,:rent_amount,:points,:active,:quantity,:damaged,:current_quantity,:modified_date,:created_by,:selling_amount,:image_path)";

 		$input_toy['default_zero'] = '0';
 		$today_date= date('Y/m/d H:i:s');

 		$array_category = $input_toy['ddl_category'];
 		$array_agegroup = $input_toy['ddl_agegroup'];

 		$target_dir="./toy_images/";
				$fileupload_1=$FILES['file_toyimage']['name'];
		        $path= pathinfo($fileupload_1);
		        $filename=$path['filename'];
		        $ext=$path['extension'];
		        $temp_name= $FILES['file_toyimage']['tmp_name'];
		        $path_filename_ext= $target_dir.$input_toy['txt_toyCode'].".".$ext;


			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':toy_name',$input_toy['txt_toyname'],PDO::PARAM_STR);
			$query->bindParam(':toy_code',$input_toy['txt_toyCode'],PDO::PARAM_STR);
			$query->bindParam(':toy_desc',$input_toy['txt_toydesc'],PDO::PARAM_STR);
			$query->bindParam(':selling_amount',$input_toy['txt_toy_sellingprice'],PDO::PARAM_STR);
			$query->bindParam(':brand_id',$input_toy['ddl_brand'],PDO::PARAM_INT);
			$query->bindParam(':mrp_amount',$input_toy['txt_toymrp'],PDO::PARAM_STR);
			$query->bindParam(':rent_amount',$input_toy['txt_toyrentamt'],PDO::PARAM_STR);
			$query->bindParam(':points',$input_toy['txt_toypoints'],PDO::PARAM_STR);
			$query->bindParam(':quantity',$input_toy['txt_toyquantity'],PDO::PARAM_STR);
			$query->bindParam(':damaged',$input_toy['default_zero'],PDO::PARAM_STR);
			$query->bindParam(':current_quantity',$input_toy['txt_toyquantity'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$input_toy['ddlstatus'],PDO::PARAM_INT);
			$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
			$query->bindParam(':image_path',$input_toy['txt_toyCode'].".".$ext,PDO::PARAM_STR);
			$query->execute();

			 $toy_id = DB::lastInsertId(); 

			if($query->rowCount() > 0)
			{

				foreach ($array_category as  $value) {

					$today_date= date('Y/m/d H:i:s');
					$sql = 'INSERT INTO toy_category(toy_id,category_id,modified_date)
								VALUES (:toy_id,:category_id,:modified_date)';
					$query = DB::prepare($sql);
					$query->bindParam(':toy_id',$toy_id,PDO::PARAM_INT);
					$query->bindParam(':category_id',$value,PDO::PARAM_STR);
					$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
					$query->execute();
				}

				foreach ($array_agegroup as  $value_agegroup) {

					$today_date= date('Y/m/d H:i:s');
					$sql = 'INSERT INTO toy_age_group(toy_id,age_group_id,modified_date)
								VALUES (:toy_id,:age_group_id,:modified_date)';
					$query = DB::prepare($sql);
					$query->bindParam(':toy_id',$toy_id,PDO::PARAM_INT);
					$query->bindParam(':age_group_id',$value_agegroup,PDO::PARAM_STR);
					$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
					$query->execute();
				}

				
		        move_uploaded_file($temp_name, $path_filename_ext);

				return true;
			}
			else
			{
				return false;
			}

	}


function getSelectedToy($id)
	{	
		try
		{
			
		$sql = "SELECT * FROM toy WHERE toy_id=".$id;		
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


	function AddBrands ($input_brands)
	{

		$sql="INSERT INTO toy_brands(brand_name,modified_date,active,created_by) VALUES (:brand_name,:modified_date,:active,:created_by)";

			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':brand_name',$input_brands['txt_brandname'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$input_brands['ddlstatus'],PDO::PARAM_INT);
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

	function AddAgeGroup($input_Agegroup)
	{
		 
		$sql="INSERT INTO toy_age_group_master(age_group_name,min_age,max_age,active,modified_date,created_by)VALUES(:age_group_name,:min_age,:max_age,:active,:modified_date,:created_by);";

			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':age_group_name',$input_Agegroup['txt_groupname'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$input_Agegroup['ddlstatus'],PDO::PARAM_INT);
			$query->bindParam(':min_age',$input_Agegroup['txt_minage'],PDO::PARAM_INT);
			$query->bindParam(':max_age',$input_Agegroup['txt_maxage'],PDO::PARAM_INT);
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

	function AddClassification($input_Agegroup)
	{
		 
		$sql="INSERT INTO toy_category_master(category_name,modified_date,active,created_by) VALUES(:category_name,:modified_date,:active,:created_by)";

			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':category_name',$input_Agegroup['txt_categoryname'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$input_Agegroup['ddlstatus'],PDO::PARAM_INT);
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



	function getBrands($value)
	{	
		try
		{
			if($value=='active')
			{
				$sql = "Select brand_id,brand_name from toy_brands where active=0";
			}
			else
			{
				$sql = "Select * from toy_brands";
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

	function getAgegroup($value)
	{	
		try
		{
			if($value=='active')
			{
				$sql = "Select age_groupid,age_group_name from toy_age_group_master where active=0";
			}
			else
			{
				$sql = "Select * from toy_age_group_master";
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

	function getcategory($value)
		{	
			try
			{
				if($value=='active')
				{
					$sql = "Select category_id,category_name from toy_category_master where active=0";
				}
				else
				{
					$sql = "Select * from toy_category_master";
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

	function getToys()
	{	
		try
		{
		$sql = "SELECT * FROM  toy a inner join toy_brands b on a.brand_id = b.brand_id";
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


	function getToy_Agegroup($id)
	{	
		try
		{
			
				$sql = "Select * from toy_age_group where toy_id=".$id;
			 
		
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

	function getToy_category($id)
	{	
		try
		{
			 
		$sql = "Select * from toy_category where toy_id=".$id;
			 
		
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

}

?>