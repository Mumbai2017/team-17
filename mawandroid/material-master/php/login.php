		<?php
		include("db_connect.php");

		session_start();
		   
		   if($_SERVER["REQUEST_METHOD"] == "POST") {
		      // username and password sent from form 
		      
		      $myusername = mysqli_real_escape_string($db,$_POST['username']);
		      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
		      $sql = "SELECT * FROM users WHERE email = '$myusername' and password = '$mypassword'";
		      $result = mysqli_query($db,$sql);		      
		      $count = mysqli_num_rows($result);			
		      if($count == 1) {
		         $_SESSION['login_user'] = $myusername;
		         // echo $myusername;
		         while($row = mysqli_fetch_assoc($result)) {
		         	// echo $row["email"];		         	
		            if($row["type"]=="0")
		            	echo "doctor";  
		            else if($row["type"]=="1")
		            	echo "wish granting volunteer";
		            else if($row["type"]=="2")
		            	 echo "wish organizing volunteer";
		            	else
		            		echo "Donor";

		         }

		      }else {
		         $error = "Your Login Name or Password is invalid";
		      }
			   }


		?>