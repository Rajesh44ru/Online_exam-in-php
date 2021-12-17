<?php
error_reporting(0);
session_start();
include_once("dbconn.php");


?>
<?php 
if(isset($_POST['submit']))
{
    $usertype = $_POST['usertype'];
    $username = ucwords($_POST['username']);
    if($usertype=="admin")
    $password = $_POST['password'];
    else
    $password=md5($_POST['password']);

    $query = "select * from login where username='$username' AND password='$password' AND user_type = '$usertype'";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0)
    {
        $res=mysqli_fetch_assoc($result);
        $_SESSION['username']=htmlspecialchars_decode($res['username']);
        $_SESSION['id']=$res['id'];
        unset($_GLOBALS['message']);
        if($usertype == 'admin')
        {
          $_SESSION['usertype'] = 'admin';
          header('Location: admin/index.php');
        }
        else
        {
          $_SESSION['student'] = 'student';
          header('Location: student/index.php');
        }
    }
    else
    {
      $_GLOBALS['message']="Username and Password doesn't match.";
    }
}
?>
<?php 

include 'include/header.php';?>

<div class="row middle-header">
          <div class="col-sm-12 p-2 text-right">
            <a href="register.php" class="btn btn-primary">Register</a>
          </div>
        </div>
        <div class="row p-5" style="background: #fafafa;">
          <div class="col-sm-6 ml-auto">
            <form method="post" action="index.php">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">User Type :</label>
                <div class="col-sm-9">
                  <select class="form-control" name="usertype" required="">
                    <option value="">Select User Type</option>
                    <option value="admin" <?php if($_POST['usertype'] == 'admin'){ echo "selected"; } ?>>Admin</option>
                    <option value="student" <?php if($_POST['usertype'] == 'student'){ echo "selected"; } ?>>Student</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">User Name :</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>" name="username" placeholder="Enter Username" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password :</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="" placeholder="Enter Password" name="password" required=""> 
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3 ml-auto mr-auto">
                  <button type="submit" class="form-control btn btn-primary" name="submit">Login</button>
                </div>
              </div>
            </form>

            <?php
              if(isset($_GLOBALS['message']))
              {
               echo "<div class='alert alert-danger'>".$_GLOBALS['message']."</div>";
              }
            ?>
          </div>
          <div class="col-sm-3">
            
          </div>
        </div>
        <?php include 'include/footer.php'; ?>
