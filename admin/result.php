<?php
 session_start();
 include 'include/header.php'; 
 if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
 {
   header("location: ../index.php");
 }

 include_once '../dbconn.php';
 $query = "SELECT * FROM exam";
 $exam = mysqli_query($conn, $query);
 $query1 = "SELECT * FROM course";
      $result1 = mysqli_query($conn, $query1);
      echo "<br> <br> <br>";

echo '<center><strong>Please Select Exam and Enter Student Name To View Result of Student!! </strong> </center>';
 ?>
<div class="row p-5" style="background: #fafafa;">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <?php
       if(isset($_GLOBALS['message']))
       {
        echo "<div class='alert alert-success'>".$_GLOBALS['message']."</div>";
       }
     ?>
        <form method="post" action="resultshow.php">
            <div class="form-group row">

            </div>

            <div class="form-group row">
                <label class="col-sm-5 col-form-label">Select Exam:</label>
                <div class="col-sm-7">
                    <select class="form-control" name="exam_name" required="">
                        <option value="">Select exam</option>
                        <?php if(!empty($exam)){ ?>
                        <?php while($row = mysqli_fetch_array($exam)){ ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-5 col-form-label">Enter Name of student:</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="" name="student_name"
                        placeholder="Enter Name of Student" required="">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 ml-auto">
                    <button class="btn btn-primary" name="submit" type="submit">View</button>
                </div>

            </div>
        </form>
    </div>
</div>
<?php



?>
<?php include 'include/footer.php'; ?>