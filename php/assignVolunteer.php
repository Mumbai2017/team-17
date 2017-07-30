<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maw";


$id=$_SESSION["id"];
$wishid=$_SESSION["wid"];
echo $id;
echo $wishid;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE wish SET v1_id=$id WHERE id=$wishid";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>