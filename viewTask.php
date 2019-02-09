<?php 
require_once ("dbConnection.php");
$db_handle = new DBController();
$select_qry ="select * from `task_info`";
$resutl = $db_handle->selectQuery($select_qry);
if(($db_handle->numRows($select_qry)) > 0) {
 print_r(json_encode($resutl));
}else{
	echo "No user founded";
}