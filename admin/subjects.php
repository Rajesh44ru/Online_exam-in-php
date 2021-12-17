<?php 
      error_reporting(0);
      session_start();

      if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
      {
        header("location: ../index.php");
      }
      include_once '../dbconn.php';

      if(isset($_POST['submit']))
      {
          $course_id = $_POST['course'];
          $name = $_POST['name'];

          $query = "INSERT INTO subjects(course_id, name) VALUES ('$course_id','$name')";
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

      $fetchsubject = mysqli_query($conn, "SELECT * FROM subjects");
      //delete query
      if(isset($_GET['del_id']))
      {
        $id = $_GET['del_id'];
        $query = "DELETE FROM subjects WHERE id='$id'";
        $delete = mysqli_query($conn, $query);
        if($delete == true)
        {
          $_GLOBALS['message'] = 'Record Deleted successfully';
          echo "<script>location.href = 'subjects.php';</script>";
        }
        else
        {
          $_GLOBALS['message'] = 'Deletion failed';
        }
      }
 ?>
 <?php include 'include/header.php'; ?>
        
        <div class="row py-3" style="background: #fafafa;">
          <div class="col-sm-12">
            <?php
              if(isset($_GLOBALS['message']))
              {
               echo "<div class='alert alert-success'>".$_GLOBALS['message']."</div>";
              }
            ?>
            <form method="post" action="subjects.php">
              <div class="card border border-danger">
                <div class="card-header alert-danger">
                  <h5><i class="fa fa-book"></i> Add New Subject</h5>
                </div>
                <div class="card-body  " >
                  <div class="form-group row"> 
                    <label class="col-sm-1 col-form-label">Course :</label>
                    <div class="col-sm-3">
                     <select class="form-control" name="course" required="">
                       <option value="">Select Course</option>
                       <?php if(!empty($result)){ ?>
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                      <?php } ?>
                     </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Subject Name :</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" name="name" placeholder="Subject Name" required="" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-primary mt-auto" type="submit" name="submit">Add Subject</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

      </div>

      <div class="row pb-5" style="background: #fafafa;">
          <div class="col-sm-12">
              <div class="card border border-danger">
                <div class="card-header alert-danger">
                  <h5><i class="fa fa-book"></i> Subject Lists</h5>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-stripped">
                    <thead>
                      <th>Course Name</th>
                      <th>Subject Name</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <?php if(!empty($fetchsubject)){ ?>
                      <?php while($row = mysqli_fetch_array($fetchsubject)){ ?>
                        <?php 
                        $course_id = $row['course_id'];
                        $fetchcourse = mysqli_query($conn, "SELECT name FROM course WHERE id = '$course_id'"); 
                        $coursename = mysqli_fetch_array($fetchcourse);
                        ?>
                        <tr>
                          <td><?php echo $coursename['name']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td>
                            <a href="subjects.php?del_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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
        <?php include 'include/footer.php'; ?>
