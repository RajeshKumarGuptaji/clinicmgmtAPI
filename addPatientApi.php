<?php 
require_once ("dbConnection.php");
$db_handle = new DBController();
$msg;
$current_date = date("Y/m/d");
if(!empty($_POST)){
	$insert_reg_qry ="INSERT INTO `patient_info` (`id`, `name`,`address`,`gender`,`email`,`phoneNo`,`Dob`,`createdDate`) VALUES (NULL, '".$_POST["name"]."','".$_POST["address"]."','".$_POST["gender"]."','".$_POST["email"]."','".$_POST["phoneNo"]."','".$_POST["Dob"]."','".$current_date."')";
	$reg_resutl = $db_handle->insertQuery($insert_reg_qry);
	if($reg_resutl){
		$msg = "Patient Data Save Successfully!!";
	}else{
		$msg = "Patient Data Save Failed... Please try again!!";
	}
}
echo json_encode(array("response" => $msg));
?>