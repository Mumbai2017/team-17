<?php
include("db_connect.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

$id = $_SESSION['id'];

$sql = "SELECT patients.id as id,patients_name as name,wish.status as status FROM wish inner join patients 
WHERE wish.patient_id = patients.id and wish.doc_id='$id'";
$result = mysqli_query($db,$sql);
$data=array();

while($row=mysql_fetch_array($result))
{
array_push($data,array('id'=>$row['id'],'name'=>$row['name'],'status'=>$row['status']));
      
}
echo json_encode(array('data'=>$data));
      

}
?>