<?php 
include("db_connect.php");

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT email,type,id FROM users WHERE email = 'videet' and password = 'asd'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      
      $count = mysqli_num_rows($result);
      		
      if($count == 1) {
      	while($row=mysql_fetch_assoc($result)){
      		echo $row[0];
      	}

         $_SESSION['login_user'] = $myusername;
         
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?>