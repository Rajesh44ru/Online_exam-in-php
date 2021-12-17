<?php
 session_start();
 include 'include/header.php';
 include_once '../dbconn.php';
 
 if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
 {
   header("location: ../index.php");
 }
 $eid=$_POST['exam_name'];
 $sname=ucwords($_POST['student_name']);
//  echo $eid;
//  echo ucwords($sname);

 $sql1="SELECT * from `exam` where id='$eid'";
 $result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
$ename=$row1['name'];
$cid=$row1['course_id'];

//for course
$sql2="SELECT `name` from `course`where id='$cid'";
 $result2=mysqli_query($conn,$sql2);
 $row2=mysqli_fetch_assoc($result2);
 $course_name=$row2['name'];


 $sql="SELECT * from `subjects` where course_id= '$cid'";
 $result=mysqli_query($conn,$sql);
 ?>
<br><br>
Name of Student :-
&nbsp;&nbsp;<b><?php echo $sname?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Exam Title :-&nbsp;&nbsp;<b><?php echo ucwords($ename)?></b>
<br> <br>

<table class="table" border="1">
    <thead>
        <tr>
            <th>SN</th>
            <th>COURSE</th>
            <th>SUBJECTS</th>
            <th>SCORE</TH>
        </tr>
    </thead>
    <?php
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        $i=1;
        $s=45;
          while($row=mysqli_fetch_assoc($result))
          { 
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$course_name."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$s."</td>";
            echo '<tr>';
           $i++;
           $s=$s+13;


 }
}?>
 
<table>