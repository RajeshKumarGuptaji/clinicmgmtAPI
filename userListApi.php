<?php require_once ("dbConnection.php");
$db_handle = new DBController();
$select_qry ="select * from `registration_info`";
$query_data = $db_handle->selectQuery($select_qry);
if(($db_handle->numRows($select_qry)) > 0) {
    $response = array('status' => "200",'result' => $query_data);
}else{
	$response = array('status' => "204",'result' => "No User Founded");
}
print_r(json_encode($query_data));?>