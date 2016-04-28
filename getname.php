<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 4/13/2016
 * Time: 12:08 AM
 */
header("Access-Control-Allow-Origin: *");
$curr_emp_id=$_GET["emp_id"];
//echo $curr_emp_id;
include("db.php");
$result=mysqli_query($db,"select emp_fname,emp_lname from employee where emp_id=".$curr_emp_id );
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
    <span> <?php echo $row['emp_fname'].' '.$row['emp_lname']; ?></span>
    <b class="caret"></b>

