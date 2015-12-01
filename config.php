<?php
$host="localhost";
$username="root";
$password="";
$db_name="yourdbnamehere";
mysql_connect("$host", "$username", "$password")or die("cannot connect to server");
mysql_select_db("$db_name")or die("cannot select db"); 
?>