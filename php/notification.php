<?php

$con=mysql_connect('localhost','root','');
mysql_select_db('maw2',$con);

$query="SELECT * from wish where notified=0";
$run=mysql_query($query);
echo mysql_num_rows($run);
?>