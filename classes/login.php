<?php

require_once 'dbconfig.php';

class login
{
  function check_login($username,$password)
	{
		$sql = "SELECT * from user where user_name=:username and password=:pwd";
		$query = DB::prepare($sql);
		$query->bindParam(':username',$username,PDO::PARAM_STR);
		$query->bindParam(':pwd',$password,PDO::PARAM_STR);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		$cnt=1;
		
		if($query->rowCount() > 0)
		{
			 $_SESSION["user_id"]=$results[0]->user_id;
			  $_SESSION["user_name"]=$results[0]->user_name;
			   $_SESSION["user_role"]=$results[0]->user_role;
			return true;
		}
		else
		{
			 $_SESSION["user_id"]='';
			  $_SESSION["user_name"]='';
			   $_SESSION["user_role"]=$results[0]->user_role;
			return false;
		}
	}
}

?>