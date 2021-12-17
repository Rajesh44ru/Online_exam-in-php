<?php 
      // error_reporting(0);
      session_start();

      if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
      {
        header("location: ../index.php");
      }
      include_once '../dbconn.php';

      if(isset($_POST['submit']))
      {
          $course_id = $_POST['course'];
          $name = $_POST['exam_name'];
          $exam_date = $_POST['exam_date'];
          $exam_duration = $_POST['exam_duration'];
          $full_marks = $_POST['full_marks'];
          $terms = $_POST['terms'];

          $query = "INSERT INTO exam(course_id,`name`,exam_date,full_marks,exam_duration,terms_n_conditions) VALUES ('$course_id','$name','$exam_date','$full_marks','$exam_duration','$terms')";
          $result = mysqli_query($conn, $query);
          if($result == true)
          {
            $_GLOBALS['message'] = 'Record Added successfully';
            unset($name);
          }
          else
          {
            $_GLOBALS['message'] = 'Insertion failed';
            
          }
      }

      $query = "SELECT * FROM course";
      $result = mysqli_query($conn, $query);

      $fetchexam = mysqli_query($conn, "SELECT * FROM exam");
      //delete query
      if(isset($_GET['del_id']))
      {
        $id = $_GET['del_id'];
        $query = "DELETE FROM exam WHERE id='$id'";
        $delete = mysqli_query($conn, $query);
        if($delete == true)
        {
          $_GLOBALS['message'] = 'Record Deleted successfully';
          echo "<script>location.href = 'exam.php';</script>";
        }
        else
        {
          $_GLOBALS['message'] = 'Deletion failed';
        }
      }
 ?>
 <?php include 'include/header.php'; ?>
        
        <div class="row py-3" style="background: #fafafa;">
          <div class="container">
            <?php
              if(isset($_GLOBALS['message']))
              {
               echo "<div class='alert alert-success'>".$_GLOBALS['message']."</div>";
              }
            ?>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-2">
                <div class="card border border-primary">
                  <div class="card-block">
                   <div class="card-header bg-primary text-light">
                    <h5><i class="fa fa-book"></i> Add New Exam</h5>
                  </div>
                  <div class="card-body">
                    <form method="post" action="exam.php">
                      <div class="form-group">
                        <label>Course</label>
                        <select class="form-control" name="course" required="">
                         <option value="">Select Course</option>
                         <?php if(!empty($result)){ ?>
                          <?php while($row = mysqli_fetch_array($result)){ ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                          <?php } ?>
                        <?php } ?>
                       </select>
                      </div>
                      <div class="form-group">
                        <label>Exam Name</label>
                        <input type="text" class="form-control" placeholder="Exam Name" required=""  name="exam_name">
                      </div>
                      <div class="form-group">
                        <label>Exam Date</label>
                        <input type="date" class="form-control datepicker" placeholder="Exam Date" required=""  name="exam_date">
                      </div>
                      <div class="form-group">
                        <label>Full Marks</label>
                        <input type="text" class="form-control" placeholder="Full Marks" required=""  name="full_marks">
                      </div>
                      <div class="form-group">
                        <label>Exam Duration in Minutes</label>
                        <input type="text" class="form-control" placeholder="Exam Duration" required=""  name="exam_duration">
                      </div>
                      <div class="form-group">
                        <label>Terms and Conditions</label>
                        <textarea class="form-control" name="terms" placeholder="Terms and Conditions" ></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" name="submit"> Add Exam</button>
                    </form>
                  </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card border border-primary">
                  <div class="card-block">
                   <div class="card-header bg-primary text-light">
                      <h5><i class="fa fa-book"></i> Exam Lists</h5>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-bordered table-stripped" style="font-size: 14px;">
                      <thead class="alert-danger">
                        <th>Course Name</th>
                        <th>Exam Name</th>
                        <th>Exam Date</th>
                        <th>Full Marks</th>
                        <th>Exam Duration</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php if(!empty($fetchexam)){ ?>
                        <?php while($row = mysqli_fetch_array($fetchexam)){ ?>
                          <?php 
                          $course_id = $row['course_id'];
                          $fetchcourse = mysqli_query($conn, "SELECT name FROM course WHERE id = '$course_id'"); 
                          $coursename = mysqli_fetch_array($fetchcourse);
                          ?>
                          <tr>
                            <td><?php echo $coursename['name']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['exam_date']; ?></td>
                            <td><?php echo $row['full_marks']; ?></td>
                            <td><?php echo $row['exam_duration']; ?></td>
                            <td>
                              <a href="exam.php?del_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record')"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php } ?>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <?php include 'include/footer.php'; ?>
