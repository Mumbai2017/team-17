<?php
	header("Access-Control-Allow-Origin: *");
	include("db_connect.php");
	if($_SERVER["REQUEST_METHOD"] == "POST") {	


    $doc_email = mysqli_real_escape_string($db,$_POST['docemail']); 
	$name=mysqli_real_escape_string($db,$_POST['name']);
	$mother_tongue=mysqli_real_escape_string($db,$_POST['mother_tongue']);
	$parent=mysqli_real_escape_string($db,$_POST['parent']);
	$dob=mysqli_real_escape_string($db,$_POST['dob']);
	$city=mysqli_real_escape_string($db,$_POST['city']);
	$state=mysqli_real_escape_string($db,$_POST['state']);
	$phone=mysqli_real_escape_string($db,$_POST['phone']);
	$address=mysqli_real_escape_string($db,$_POST['address']);
	$type=mysqli_real_escape_string($db,$_POST['type']);
	$notes=mysqli_real_escape_string($db,$_POST['notes']);

    $q = "select doctors.id from users inner join doctors where users_id = users.id and email = '$doc_email'";
    $result = mysqli_query($db, $q);
    $row=mysqli_fetch_array($result);
 

	$query="insert into patients(name,dob,address,mother_tongue,city,state,type,phone, parent, notes, doc_id) 
	values('$name','$dob','$address','$mother_tongue','$city','$state','$type','$phone', '$parent', '$notes', '$row[0]')";
	echo $query;
	mysqli_query($db, $query);

	if(mysqli_error($db)){
		echo "Register unsuccessful";
	}
	else{
		echo "Thank you for your recommendation";

	}
}
?>