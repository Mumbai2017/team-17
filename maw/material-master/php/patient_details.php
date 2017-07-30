<?php
	header("Access-Control-Allow-Origin: *");
	include("db_connect.php");
	if($_SERVER["REQUEST_METHOD"] == "POST") {	

	$name=mysqli_real_escape_string($db,$_POST['name']);
	$email=mysqli_real_escape_string($db,$_POST['email']);
	$password=mysqli_real_escape_string($db,$_POST['hospital']);
	$mother_tongue=mysqli_real_escape_string($db,$_POST['mother_tongue']);
	$parent=mysqli_real_escape_string($db,$_POST['parent']);
	$dob=mysqli_real_escape_string($db,$_POST['dob']);
	$city=mysqli_real_escape_string($db,$_POST['city']);
	$state=mysqli_real_escape_string($db,$_POST['state']);
	$phone=mysqli_real_escape_string($db,$_POST['phone']);
	$address=mysqli_real_escape_string($db,$_POST['address']);
	$type=mysqli_real_escape_string($db,$_POST['type']);


	$query="insert into users(name,email,password,dob,address,mother_tongue,city,state,type,phone, parent) 
	values('$name','$email','$password','$dob','$address','$mother_tongue','$city','$state','$type','$phone', $parent)";
	mysqli_query($db, $query);

	if(mysqli_error($db)){
		echo "Register successful";
	}
	else{
		echo "Thank you for your recommendation";

	}
}
?>