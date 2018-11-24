<?php

require_once 'dbconfig.php';

//this class is for toy related modules/pages

class toys
{

	function GetToysCount()
	{
		try
		{
			
		$sql = "SELECT count(0) total FROM toy ";		
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

	function GetToysRentCount()
	{
		try
		{
			
		$sql = "SELECT count(0) total FROM toy WHERE rent_amount != 'NULL'";		
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
	function GetOrderCloseCount()
	{
		try
		{
			$today_date= date('Y-m-d');
			$date1 = strtotime($today_date."+ 1 day");
			$tomorrow_date = date("Y-m-d",$date1);
			
			$date2 = strtotime($today_date."+ 2 days");
			$day_after_tomorrow_date = date("Y-m-d",$date2);
			
			$sql = "SELECT count(0) total FROM orders WHERE order_enddate BETWEEN '".$tomorrow_date."' AND '".$day_after_tomorrow_date."'";		
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
	
	function GetPettyCaseAmnt()
	{
		try
		{
			/*$today_date= date('Y-m-d');*/
			
			$sql = "SELECT COALESCE(sum(current_amount),0) total FROM cashmaster WHERE currently_active=1";		
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
	
	function GetExpenseAmnt()
	{
		try
		{
			$today_date= date('Y-m-d');
			
			$sql = "SELECT COALESCE(sum(amount),0) total FROM expense WHERE DATE(`expense_date`) = CURDATE()";		
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
	function GetTodaysRentAmnt()
	{
		try
		{
			$today_date= date('Y-m-d');
			
			$sql = "SELECT COALESCE(SUM(order_amount),0) total FROM orders WHERE DATE(`created_date`) = CURDATE() AND order_type='party'";	
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
	
	function GetTodaysSellAmnt()
	{
		try
		{
			$today_date= date('Y-m-d');
			
			$sql = "SELECT COALESCE(SUM(order_amount),0) total FROM orders WHERE DATE(`created_date`) = CURDATE() AND order_type='Sell'";	
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
	
	function AddToys($input_toy,$FILES)
	{
		
 		$sql = "INSERT INTO toy(toy_name,toy_code,toy_desc,brand_id,mrp_amount,rent_amount,points,active,quantity,damaged,current_quantity,modified_date,created_by,selling_amount,image_path,toy_accesories) VALUES(:toy_name,:toy_code,:toy_desc,:brand_id,:mrp_amount,:rent_amount,:points,:active,:quantity,:damaged,:current_quantity,:modified_date,:created_by,:selling_amount,:image_path,:toy_accesories)";

 		$input_toy['default_zero'] = '0';
 		$today_date= date('Y/m/d H:i:s');

 		$array_category = $input_toy['ddl_category'];
 		$array_agegroup = $input_toy['ddl_agegroup'];
 		$array_benefits = $input_toy['ddl_benefits'];
		$target_dir="./toy_images/";
		
				$fileupload_1=$FILES['file_toyimage']['name'];
		        $path= pathinfo($fileupload_1);
		        $filename=$path['filename'];
		        $ext=$path['extension'];
		        $temp_name= $FILES['file_toyimage']['tmp_name'];
		        $path_filename_ext= $target_dir.$input_toy['txt_toyCode'].".".$ext;
				$newfilename = $input_toy['txt_toyCode'].".".$ext;
				$toy_accesories = $input_toy['txt_toy_accesories'];

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
			$query->bindParam(':image_path',$newfilename,PDO::PARAM_STR);
			$query->bindParam(':toy_accesories',$toy_accesories,PDO::PARAM_STR);
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

				foreach ($array_benefits as  $benefits) {

					$today_date= date('Y/m/d H:i:s');
					$sql = 'INSERT INTO toy_benefits(toy_id,benefits_id,modified_date)
								VALUES (:toy_id,:benefits_id,:modified_date)';
					$query = DB::prepare($sql);
					$query->bindParam(':toy_id',$toy_id,PDO::PARAM_INT);
					$query->bindParam(':benefits_id',$benefits,PDO::PARAM_STR);
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

	function gettoy_fromcode($toycode)
	{	
		try
		{
			
		$sql = "SELECT  concat(toy_name, '-' ,toy_id) name FROM toy WHERE toy_code like '".$toycode."%'";		
		$query = DB::prepare($sql);
		$query->execute();
		//$results = $query->fetch(PDO::FETCH_ASSOC);
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

	function AddBenefits ($input_benefits)
	{

		$sql="INSERT INTO toy_benefits_master(benefits_name,modified_date,active,created_by) VALUES (:benefits_name,:modified_date,:active,:created_by)";

			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':benefits_name',$input_benefits['txt_benefits'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$input_benefits['ddlstatus'],PDO::PARAM_INT);
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


	function getBenefits($value)
	{	
		try
		{
			if($value=='active')
			{
				$sql = "Select benefitsid,benefits_name from toy_benefits_master where active=0";
			}
			else
			{
				$sql = "Select * from toy_benefits_master";
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

	function getToy_benefits($id)
	{	
		try
		{
			 
		 $sql = "Select * from toy_benefits where toy_id=".$id;
			 
		
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



function UpdateToys($update_toy)
	{
 		//$sql = "INSERT INTO toy(toy_name,toy_code,toy_desc,brand_id,mrp_amount,rent_amount,points,active,quantity,damaged,current_quantity,modified_date,created_by,selling_amount) VALUES(:toy_name,:toy_code,:toy_desc,:brand_id,:mrp_amount,:rent_amount,:points,:active,:quantity,:damaged,:current_quantity,:modified_date,:created_by,:selling_amount)";
		
		$sql = "UPDATE toy SET 
					toy_name=:toy_name, 
					toy_code=:toy_code, 
					toy_desc=:toy_desc, 
					brand_id=:brand_id, 
					mrp_amount=:mrp_amount, 
					rent_amount=:rent_amount, 
					points=:points, 
					quantity=:quantity, 
					damaged=:damaged, 
					current_quantity=:current_quantity, 
					modified_date=:modified_date, 
					selling_amount=:selling_amount WHERE toy_id = :toy_id";
 		//$input_toy['default_zero'] = '0';
 		$today_date= date('Y/m/d H:i:s');

		$u_id = $_SESSION["user_id"];
		$array_category = $update_toy['ddl_category'];
 		$array_agegroup = $update_toy['ddl_agegroup'];
 		$array_benefits = $update_toy['ddl_benefits'];
 		print_r($array_category);
 		print_r($array_agegroup);
 		print_r($array_benefits);
		$query = DB::prepare($sql);
		//$stmt = $pdo->prepare($sql); 
		$query->bindParam(':toy_id',$update_toy['txt_id'],PDO::PARAM_INT);
		$query->bindParam(':toy_name',$update_toy['txt_toyname'],PDO::PARAM_STR);
		$query->bindParam(':toy_code',$update_toy['txt_toyCode'],PDO::PARAM_STR);
		$query->bindParam(':toy_desc',$update_toy['txt_toydesc'],PDO::PARAM_STR);
		$query->bindParam(':selling_amount',$update_toy['txt_toy_sellingprice'],PDO::PARAM_STR);
		$query->bindParam(':brand_id',$update_toy['ddl_brand'],PDO::PARAM_INT);
		$query->bindParam(':mrp_amount',$update_toy['txt_toymrp'],PDO::PARAM_STR);
		$query->bindParam(':rent_amount',$update_toy['txt_toyrentamt'],PDO::PARAM_STR);
		$query->bindParam(':points',$update_toy['txt_toypoints'],PDO::PARAM_STR);
		$query->bindParam(':quantity',$update_toy['txt_toyquantity'],PDO::PARAM_STR);
		$query->bindParam(':damaged',$update_toy['default_zero'],PDO::PARAM_STR);
		$query->bindParam(':current_quantity',$update_toy['txt_toyquantity'],PDO::PARAM_STR);
		$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
		//$query->bindParam(':active',$update_toy['ddlstatus'],PDO::PARAM_INT);
		//$query->bindParam(':created_by',$u_id,PDO::PARAM_INT);
		//echo $query;
		$query->execute();
		//var_dump($query);

		if($query->rowCount() > 0)
		{

		$toy_id = $update_toy['txt_id'];
		$sql = "delete  FROM toy_category WHERE toy_id=".$toy_id."; delete  FROM toy_age_group WHERE toy_id=".$toy_id."; delete  FROM toy_benefits WHERE toy_id=".$toy_id;		
		$query = DB::prepare($sql);
		$query->execute();
			

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

				foreach ($array_benefits as  $benefits) {

					$today_date= date('Y/m/d H:i:s');
					$sql = 'INSERT INTO toy_benefits(toy_id,benefits_id,modified_date)
								VALUES (:toy_id,:benefits_id,:modified_date)';
					$query = DB::prepare($sql);
					$query->bindParam(':toy_id',$toy_id,PDO::PARAM_INT);
					$query->bindParam(':benefits_id',$benefits,PDO::PARAM_STR);
					$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
					$query->execute();
				}
			return true;
		}
		else
		{
			return false;
		}
	}



	function UpdateBrands($update_brands)
	{

			//$sql="INSERT INTO toy_brands(brand_name,modified_date,active,created_by) VALUES (:brand_name,:modified_date,:active,:created_by)";

			$sql = "UPDATE toy_brands SET 
					brand_name=:brand_name, 
					modified_date=:modified_date, 
					active=:active, 
					created_by=:created_by WHERE brand_id=:brand_id";
					
			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':brand_id',$update_brands['txt_brand_id'],PDO::PARAM_INT);
			$query->bindParam(':brand_name',$update_brands['txt_brandname'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$update_brands['ddlstatus'],PDO::PARAM_INT);
			$query->bindParam(':created_by',$user_id,PDO::PARAM_INT);
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

function UpdateAgeGroup($update_Agegroup)
	{
		 
		$sql="UPDATE toy_age_group_master SET 
				age_group_name=:age_group_name,
				min_age=:min_age,
				max_age=:max_age,
				active=:active,
				modified_date=:modified_date,
				created_by=:created_by WHERE age_groupid=:age_groupid";

			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':age_groupid',$update_Agegroup['txt_age_id'],PDO::PARAM_INT);
																															
			$query->bindParam(':age_group_name',$update_Agegroup['txt_groupname'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$update_Agegroup['ddlstatus'],PDO::PARAM_INT);
			$query->bindParam(':min_age',$update_Agegroup['txt_minage'],PDO::PARAM_INT);
			$query->bindParam(':max_age',$update_Agegroup['txt_maxage'],PDO::PARAM_INT);
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


function UpdateClassification($update_Agegroup)
	{
		 
		$sql="UPDATE toy_category_master SET
				category_name=:category_name,
				modified_date=:modified_date,
				active=:active,
				created_by=:created_by WHERE category_id=:category_id";

			$today_date= date('Y/m/d H:i:s');

			$user_id = $_SESSION["user_id"];
			$query = DB::prepare($sql);
			$query->bindParam(':category_id',$update_Agegroup['txt_cat_id'],PDO::PARAM_INT);
			$query->bindParam(':category_name',$update_Agegroup['txt_categoryname'],PDO::PARAM_STR);
			$query->bindParam(':modified_date',$today_date,PDO::PARAM_STR);
			$query->bindParam(':active',$update_Agegroup['ddlstatus'],PDO::PARAM_INT);
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


	
	function getSelectedBrand($id)
	{	
		try
		{
			
		$sql = "SELECT * FROM toy_brands WHERE brand_id=".$id;		
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
	
	function getSelectedAgeGroup($id)
	{	
		try
		{
			
		$sql = "SELECT * FROM toy_age_group_master WHERE age_groupid=".$id;		
		$query = DB::prepare($sql);
		$query->execute();
		//var_dump($query);
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

	function getSelectedToyClassifications($id)
	{	
		try
		{
			
		$sql = "SELECT * FROM toy_category_master WHERE category_id=".$id;		
		$query = DB::prepare($sql);
		$query->execute();
		//var_dump($query);
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



//function gettoy($toy_name,$toy_code,$category_id)

function gettoy($query )
	{	
		$sqlwhereclause  = '';
		//echo "email vlaue".$email;
		try
		{
			
		 $sql = "SELECT toy_id, toy_name,toy_code,points, brand_name,concat( './toy_images/',image_path) as image_path,rent_amount,selling_amount  FROM toy a inner join toy_brands b  on a.brand_id = b.brand_id where current_quantity > 0  ";


 				/*if ($toy_name <> "")
 				{
 					 $sqlwhereclause = "toy_name  like '%".$toy_name."%'";
 				}

 				if ($toy_code <> "")
 				{
 					 if($sqlwhereclause =='')
 					 {
 					 	 $sqlwhereclause =  "  toy_code  like '%".$toy_code."%'";
 					 }
 					 else
 					 {
 					 		$sqlwhereclause = $sqlwhereclause. " or  toy_code  like '%".$toy_code."%'";
 					 }
 					
 				}

 				if ($category_id <> "")
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
 					$sql = $sql . " where ".$sqlwhereclause;
 				}*/

 				if ($query <> '')
 				{
 					$query = str_replace("points_btw", "points",  $query);
 					$query = str_replace(",", " and ",  $query);
 					
 					//$sql = $sql . "where ".$query;
 					$sql = $sql ." and " .$query;
 				}
 				 
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

}

?>