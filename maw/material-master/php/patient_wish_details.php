<?php
include("db_connect.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
$patient_id = mysqli_real_escape_string($db,$_POST['id']);

$query = "Select patients.name, patients.age, wish.status, wish.isCompleted, wish.description from patients inner join wish 
where patients.id='$patient_id' and wish.patient_id = patients.id";
echo $query;
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$data=array();
if ($row['isCompleted']==1)
$row['isCompleted'] = "Wish is completed!!";
else
$row['isCompleted'] = "Wish is not completed yet";


while($row=mysqli_fetch_array($result))
{
array_push($data,array('name'=>$row['name'],'age'=>$row['age'],'status'=>$row['status'], 'isCompleted'=>$row['isCompleted']
	,'description'=>$row['description']));
      
}
echo json_encode(array('data'=>$data));
}
?>