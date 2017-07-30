<?php 
session_start();
  $con=mysql_connect('localhost','root','');
	$flag=mysql_select_db('maw',$con);
	

 $sql = "UPDATE wish SET notified=1 WHERE notified=0";
 mysql_query($sql,$con);
 
?>