<?php
include("db_connect.php");

session_start();

$sql = "SELECT year,count(*) as counts FROM `wish` GROUP BY year;";
$result = mysqli_query($db,$sql);

$output = array();
while($row = mysqli_fetch_array($result)) {

$output[]=array('year' => $row[0], 'count' => $row[1]);
	
}
echo json_encode($output);

?>