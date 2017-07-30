<?php
include("db_connect.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
$email = mysqli_real_escape_string($db,$_POST['email']);

$query = "Select users.id from users where email='$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$sql = "SELECT patients.id as id,patients.name as name,wish.status as status FROM wish inner join patients inner join doctors
WHERE wish.patient_id = patients.id and wish.doc_id=doctors.id and doctors.users_id='$row[0]'";
$result = mysqli_query($db,$sql);
$data=array();

while($row=mysqli_fetch_array($result))
{
array_push($data,array('id'=>$row['id'],'name'=>$row['name'],'status'=>$row['status']));
      
}
echo json_encode(array('data'=>$data));
}
?>