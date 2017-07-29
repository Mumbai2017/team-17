<?php
include("db_connect.php");
session_start();
//$email=$_SESSION['login_user'];
$email="suraj@email.com";
$doctor_array = array();
$sql_query="select name,  age, phone, permanent_address, description, status, wish.type, isGranted  from patients, wish where wish.patient_id=patients.id and patients.doc_id = (select id from doctors where users_id = (select users_id from users where email='suraj@email.com'))"; 
$result=mysqli_query($db,$sql_query);
while($row = mysqli_fetch_array($result) )
{
array_push($doctor_array,
array('name'=>$row[0],
'age'=>$row[1],
'phone'=>$row[2],
'permanent_address'=>$row[3],
));
}

echo json_encode(array("doctor"=>$doctor_array));


?>