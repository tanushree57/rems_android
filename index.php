<?php
header("Access-Control-Allow-Origin: *");
$curr_emp_id=$_GET["emp_id"];
//echo $curr_emp_id;
include("db.php");
$result=mysqli_query($db,"SELECT
 project_staff_task.start_date as pst_start,
 project_staff_task.end_date as pst_end,
project_staff_task.progress as pst_progress,
 project_staff_task.status as pst_status
,project_staff_task.*,project.*,task.*,
 (select CONCAT(employee.emp_fname,' ',employee.emp_lname)
  from project_pm,employee

  where
   project_pm.project_id=project_staff_task.project_id
   and
   employee.emp_id=project_pm.emp_id
 ) as Manager

FROM project_staff_task,project,task


where
 project.project_id=project_staff_task.project_id
 and
 task.task_id=project_staff_task.task_id

 and
 project_staff_task.status='ongoing'
 and
 project_staff_task.emp_id=".$curr_emp_id );


$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($count>=1) {
        echo '<div class="alert alert-success fade in">';
        echo ' <strong>Task Name:' . $row['task_name'] . '</strong><br>';
        echo ' Description :' . $row['task_desc'] . '<br><br>';
        echo ' Progress :' . $row['pst_progress'] . '%<br>';
        ?>
        <div class="progress progress-xs">
                <div class="progress-bar progress-bar" role="progressbar"
                     aria-valuenow="<?php echo $row['pst_progress']; ?>" aria-valuemin="0"
                     aria-valuemax="100"
                     style="width: <?php echo $row['pst_progress']; ?>%">
                </div>
        </div>


        <?php


        echo ' Start Date :' . $row['pst_start'] . '<br>';
        echo ' End Date :' . $row['pst_end'] . '<br><br>';
        echo ' Status:' . $row['pst_status'] . '<br>';
        echo ' Manager:' . $row['Manager'] . '<br>';
        echo '</div>';
        ?>
<br>
<br>
<a href="camera.html" class="btn btn-success">Upload Daily Task</a>


      <script>
              var pst_id = <?php echo $row['pst_id'];?>;
              window.localStorage.setItem("pst_id",pst_id);
              var project_id = <?php echo $row['project_id'];?>;
              window.localStorage.setItem("project_id",project_id);
      </script>


<?php
}
else
echo "No tasks assigned"

?>

