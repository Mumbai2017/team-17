<?php
include("db_connect.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

 $id = mysqli_real_escape_string($db,$_POST['username']);



$sql = "SELECT * FROM wish inner join patients WHERE patient_id = patients.id  and isAssigned=0 and wish.id='$id'";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result))
{


}


}
?>