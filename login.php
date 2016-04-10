<?php
include("db.php");
if(isset($_POST['username']) && isset($_POST['password']))
{
// username and password sent from Form
 $username=$_POST['username'];
//Here converting passsword into MD5 encryption.
 $password=$_POST['password'];

 $result=mysqli_query($db,"select emp_id,emp_fname,emp_lname from employee where username=(select username from login where username='".$username."' and password='".$password."')"  );
 $count=mysqli_num_rows($result);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// If result matched $username and $password, table row  must be 1 row
 if($count==1)
 {
  //$_SESSION['login_user']=$row['uid']; //Storing user session value.
  echo $row['emp_id'];
 }

}
?>