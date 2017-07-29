		<?php
				include("db_connect.php");

				session_start();

	 $sql = "SELECT * FROM wish inner join patients WHERE patient_id = patients.id  and isAssigned=0";
	 $result=mysql_query($sql);
	 while($row=mysql_fetch_assoc($result))
	 {


	 }







		?>