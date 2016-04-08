<?php
 include "db.php";
 if(isset($_POST['login']))
 {
 $user=$_POST['user'];
 $pass=$_POST['pass'];
 $q=mysql_query("select emp_id,emp_fname,emp_lname from employee where username=(select username from login where username='".$user."' and password='".$pass."')" );
 if($q)
  echo "ok";
 else
  echo "error";
 }
 ?>