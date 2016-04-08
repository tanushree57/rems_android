<?php
$conn=mysqli_connect("localhost", "root", "","rems_db");
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Connected successfully";
?>