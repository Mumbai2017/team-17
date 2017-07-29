<?php
include("db_connect.php");

session_start();

$sql = "SELECT state,count(state) as count FROM `patients` group by state";
$result = mysqli_query($db,$sql);

$output = array();
while($row = mysqli_fetch_array($result)) {

$output[]=array('state' => $row[0], 'count' => $row[1]);
	
}
echo json_encode($output);

?>