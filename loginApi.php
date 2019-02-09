<?php 
require_once ("dbConnection.php");
$db_handle = new DBController();
$msg;
$mysql_qry ="select `user_status` from `login_info` where `user_name` = '".$_POST["user_name"]."' AND `user_password` = '".$_POST["user_password"]."' AND `user_status` = 'Active'";
if(($db_handle->numRows($mysql_qry)) > 0) {
	$msg = "Login success!!!";
}else{
	$resutl = $db_handle->selectQuery($mysql_qry);
	if($resutl[0]['user_status'] != 'Active'){
		$msg = "User Account deactived by Admin";
	}else{
		$msg = "Login failed... Please try again!!";
	}
}
echo json_encode(array("response" => $msg));
?>