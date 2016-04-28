<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 10-04-2016
 * Time: 04:13 PM
 */
include("db.php");
$emp_id= $_POST['emp_id'];
$lat= $_POST['lat'];
$long= $_POST['long'];
$pst_id=$_POST['pst_id'];
$project_id=$_POST['project_id'];
$description=$_POST['desc'];
//$description="hardcoded";
$time=time();
$up_date=date("yyyy-mm-dd", $time);
$name=$project_id."_".$pst_id."_".$emp_id."_".$time;
$image_name="/rems/images/uploads/".$name.".jpg";
//$new_image_name = "namethisimage.jpg";
move_uploaded_file($_FILES["file"]["tmp_name"], "/wamp/www/rems/images/uploads/".$name.".jpg");

//$insert=mysqli_query($db,"INSERT INTO picture values (DEFAULT,'images/'".$name."'.jpg','".$description."',".$lat.",".$long.",1,".$date.",".$emp_id.")" );

$insert=mysqli_query($db,"INSERT INTO picture values (DEFAULT,'".$image_name."','".$description."',".$lat.",".$long.",1,FROM_UNIXTIME($time),".$emp_id.")" );


//getting the pic_id
$result=mysqli_query($db,"select * from picture where path='".$image_name."'" );
$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$pic_id=$row['pic_id'];
if($count>=1) {
    $insert_2=mysqli_query($db,"insert into picture_pst values ( ".$pst_id.",".$pic_id.")");
}




?>