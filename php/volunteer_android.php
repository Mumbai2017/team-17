<?php
db_connect();
$id=$_GET['id'];
$sql1="SELECT * FROM wma where id='$id'";

//GETS THE ASSIGNED ID
$query1=mysql_query($sql);
$row1=mysql_fetch_assoc($query1);
$assigned_id=$row1['assigned_id'];

//SHOWS THE ASSIGNED PATIENT DETIALS
$sql2="SELECT * FROM patients where assigned_id='$assigned_id'";
$query2=mysql_query($sql);
$row2=mysql_fetch_assoc($query2);
echo json_encode($row2);
?>