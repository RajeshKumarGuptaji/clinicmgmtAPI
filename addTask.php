<?php 
require_once ("dbConnection.php");
$db_handle = new DBController();
$msg;
$current_date = date("Y/m/d");
if(!empty($_POST)){
	$insert_reg_qry ="INSERT INTO `task_info` (`id`, `description`,`lastDate`,`priority`,`createdDate`) VALUES (NULL, '".$_POST["description"]."','".$_POST["lastDate"]."','".$_POST["priority"]."','".$current_date."')";
	$reg_resutl = $db_handle->insertQuery($insert_reg_qry);
	if($reg_resutl){
		$msg = "Task Data Save Successfully!!";
	}else{
		$msg = "Task Data Save Failed... Please try again!!";
	}
}
echo json_encode(array("response" => $msg));
?>