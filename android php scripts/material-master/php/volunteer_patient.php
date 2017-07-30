<?php
include("db_connect.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
$id = mysqli_real_escape_string($db,$_POST['id']);

$query = "Select patients.name, patients.age, patients.dob, patients.address from patients inner join wish inner join v1 inner join users where v1.users_id = users.id and patients.id = wish.patient_id and users.email='abc' and wish.isAssigned=1";

$result = mysqli_query($db, $query);

$data=array();

while($row=mysqli_fetch_array($result))
{
array_push($data,array('name'=>$row['name'],'age'=>$row['age'],'dob'=>$row['dob'], 'address'=>$row['address']
	,'description'=>$row['description']));
      
}
echo json_encode(array('data'=>$data));
}
?>