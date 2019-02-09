<?php 
require_once ("dbConnection.php");
$db_handle = new DBController();
$msg;
$current_date = date("Y/m/d");
if(!empty($_POST)){
	$insert_reg_qry ="INSERT INTO `expenses_info` (`id`, `description`,`expensesDate`,`expensesBy`,`rupees`) VALUES (NULL, '".$_POST["description"]."', '".$_POST["expensesDate"]."', '".$_POST["expensesBy"]."', '".$_POST["rupees"]."')";
	
	$reg_resutl = $db_handle->insertQuery($insert_reg_qry);
	if($reg_resutl){
		$msg = "Expenses Data Save Successfully!!";
	}else{
		$msg = "Expenses Data Save Failed... Please try again!!";
	}
}
echo json_encode(array("response" => $msg));
?>