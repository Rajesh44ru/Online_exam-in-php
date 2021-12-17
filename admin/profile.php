<?php 
      // error_reporting(0);
      session_start();
      if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
      {
        header("location: ../index.php");
      }
      include_once '../dbconn.php';
       $id = $_SESSION['id'];
      if(isset($_POST['submit']))
      {
          $password = $_POST['new_pass'];
          $con_pass = $_POST['con_pass'];
          if($password != $con_pass)
          {
            $_GLOBALS['message'] = 'Password and Confirm Password do not match';
          }
          else
          {
            $password = md5($password);
            $query = "UPDATE login SET password='$password' WHERE id='$id'";
            $result = mysqli_query($conn, $query);
            if($result == true)
            {
              $_GLOBALS['message'] = 'Password Changed successfully';
              unset($name);
            }
            else
            {
              $_GLOBALS['message'] = 'failed';
            }
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
                    <h5><i class="fa fa-pencil-square-o"></i> Change Password</h5>
                  </div>
                  <div class="card-body">
                    <form method="post" action="profile.php">  
                      <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" placeholder="New Password" required="" autocomplete="off" name="new_pass">
                      </div>
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" required="" autocomplete="off" name="con_pass">
                      </div>
                      <button type="submit" class="btn btn-primary" name="submit"> Change Password</button>
                    </form>
                  </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-12 ml-auto">
                <div class="card border border-primary">
                  <div class="card-block">
                   <div class="card-header bg-primary text-light">
                      <h5><i class="fa fa-user"></i> Profile</h5>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-bordered table-stripped" style="font-size: 14px;">
                      <tbody class="text-left">
                          <?php 
                          $profiledata = mysqli_query($conn, "SELECT * FROM login WHERE id = $id"); 
                          $data = mysqli_fetch_array($profiledata);
                          ?>
                          <tr>
                            <td> Username : </td>
                            <td><?php echo $data['username']; ?></td>
                          </tr>
                          <tr>
                            <td> Email : </td>
                            <td><?php echo $data['email']; ?></td>
                          </tr>
                          <tr>
                            <td> Mobile : </td>
                            <td><?php echo $data['mobile']; ?></td>
                          </tr>
                          <tr>
                            <td> Address : </td>
                            <td><?php echo $data['address']; ?></td>
                          </tr>
                          <tr>
                            <td> City : </td>
                            <td><?php echo $data['city']; ?></td>
                          </tr>
                          <tr>
                            <td> Pin : </td>
                            <td><?php echo $data['pin']; ?></td>
                          </tr>
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
