<?php 
require_once ("dbConnection.php");
$db_handle = new DBController();
$msg;
if(!empty($_POST)){
	// $user_name=$_POST["user_name"];
	// $user_email = $_POST["user_email"];
	// $user_password = $_POST["user_password"];
	// $url =

	$select_qry ="select `user_email` from `registration_info` where `user_email` = '".$_POST["user_email"]."'";
	if(($db_handle->numRows($select_qry)) > 0) {
		$msg = "User Email already exists!!!";
	}else{
		$date = date('Y/m/d');
		$insert_reg_qry ="INSERT INTO `registration_info` (`id`, `user_name`, `user_password`, `user_email`, `user_status`, `user_nick_name`, `user_display_name`, `user_created_at`, `user_updated_at`) VALUES (NULL, '".$_POST["user_name"]."', '".$_POST["user_password"]."', '".$_POST["user_email"]."', 'active', '".$_POST["user_name"]."', '".$_POST["user_name"]."', '".$date."', '')";
		$reg_resutl = $db_handle->insertQuery($insert_reg_qry);
		if($reg_resutl){
			$insert_log_qry ="INSERT INTO `login_info` (`id`, `user_name`, `user_password`, `user_email`, `user_status`, `user_created_at`, `user_updated_at`, `user_login_count`) VALUES (NULL, '".$_POST["user_name"]."', '".$_POST["user_password"]."', '".$_POST["user_email"]."', 'active', '".$date."', '', '0');";
			$log_resutl = $db_handle->insertQuery($insert_log_qry);
			if($log_resutl){
				$msg = "You are Registred Successfully!!";
			}else{
				$msg = "Registration Failed... Please try again!!";
			}
		}else{
			$msg = "Registration Failed... Please try again!!";
		}
	}
	echo json_encode(array("response" => $msg));
}
?>