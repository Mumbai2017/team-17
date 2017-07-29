<?php
include("db_connect.php");

session_start();

$sql = "SELECT name FROM v2  ORDER BY frequency DESC LIMIT 5";
$result = mysqli_query($db,$sql);
echo $sql;

$output = array();
while($row = mysqli_fetch_assoc($result)) {

$output[]=array('name' => $row['name']);
	
}
echo json_encode($output);

?>