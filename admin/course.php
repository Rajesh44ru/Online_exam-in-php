<?php 
      session_start();

      if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
      {
        header("location: ../index.php");
      }
      include_once '../dbconn.php';

      if(isset($_POST['submit']))
      {
          $name = $_POST['name'];

          $query = "INSERT INTO course(name) VALUES ('$name')";
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

      //delete query
      if(isset($_GET['del_id']))
      {
        $id = $_GET['del_id'];
        $query = "DELETE FROM course WHERE id='$id'";
        $delete = mysqli_query($conn, $query);
        if($delete == true)
        {
          $_GLOBALS['message'] = 'Record Deleted successfully';
          echo "<script>location.href = 'course.php';</script>";
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
            <form method="post" action="course.php">
              <div class="card border border-danger">
                <div class="card-header alert-danger">
                  <h5><i class="fa fa-graduation-cap"></i> Add New Course</h5>
                </div>
                <div class="card-body">
                  <div class="form-group row"> 
                    <label class="col-sm-2 col-form-label">Course Name :</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" name="name" placeholder="Course Name" required="" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                      <button class="btn btn-primary mt-auto" type="submit" name="submit">Add Course</button>
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
                  <h5><i class="fa fa-graduation-cap"></i> Course Lists</h5>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-stripped">
                    <thead>
                      <th>Course Name</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      <?php if(!empty($result)){ ?>
                      <?php while($row = mysqli_fetch_array($result)){ ?>
                        <tr>
                          <td><?php echo $row['name']; ?></td>
                          <td>
                            <a href="course.php?del_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
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
