<?php

 

error_reporting(0);
session_start();
include_once 'dbconn.php';

if(isset($_POST['submit']))
{
   $username = ucwords($_POST['username']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $email = $_POST['email'];
   $mobile = $_POST['mobile'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $pin = $_POST['pin'];

   if($password != $cpassword)
   {
     $_GLOBALS['message'] = 'Password and confirm password are not same';
   }
   else
   {
     $query = "select username from login where username='$username'";
     $result = mysqli_query($con, $query);
     if(mysqli_num_rows($result)>0)
     {
       $_GLOBALS['message'] = 'User name already exist';
     }
     else
     {
       $password = md5($password);
       $query = "INSERT INTO login(`username`, `password`, `email`, `mobile`, `address`, `city`, `pin`,`user_type`) VALUES ('$username','$password','$email','$mobile','$address','$city','$pin','student')";
       $result = mysqli_query($conn, $query);
       
       if($result == true)
       {
         $_GLOBALS['message'] = 'You have registered successfully';
         unset($username);unset($email);unset($mobile);unset($pin);unset($city);unset($address);
       }
       else
       {
         $_GLOBALS['message'] = 'Registration Failed';
       }

     }
   }
}
?>
<?php include 'include/header.php'; ?>
 <div class="row middle-header">
   <div class="col-sm-12 p-2 text-right">
     <a href="index.php" class="btn btn-primary">Login</a>
   </div>
 </div>
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
     <form method="post" action="register.php">
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">User Name :</label>
         <div class="col-sm-7">
           <input type="text" class="form-control" placeholder="user name" name="username" placeholder="Enter Username" required="">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">Password :</label>
         <div class="col-sm-7">
           <input type="password" class="form-control" id="" placeholder="Enter Password" name="password" required=""> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">Confirm Password :</label>
         <div class="col-sm-7">
           <input type="password" class="form-control" id="" placeholder="Enter Confirm Password" name="cpassword" required=""> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">Email :</label>
         <div class="col-sm-7">
           <input type="email" class="form-control" id="" placeholder="Enter Email" name="email" required="" value="<?php if(isset($email)){ echo $email; }?>"> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">Mobile :</label>
         <div class="col-sm-7">
           <input type="text" class="form-control" id="" placeholder="Enter Mobile" name="mobile" required="" value="<?php if(isset($mobile)){ echo $mobile; }?>"> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">Address :</label>
         <div class="col-sm-7">
           <textarea class="form-control" name="address" placeholder="Address"><?php if(isset($address)){
             echo $address;
           } ?></textarea>
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">City :</label>
         <div class="col-sm-7">
           <input type="text" class="form-control" id="" placeholder="Enter City" name="city" required="" value="<?php if(isset($city)){ echo $city; }?>"> 
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-5 col-form-label">Pin :</label>
         <div class="col-sm-7">
           <input type="text" class="form-control" id="" placeholder="Enter Pin" name="pin" required="" value="<?php if(isset($pin)){ echo $pin; }?>"> 
         </div>
       </div>
       <div class="form-group row">
         <div class="col-sm-4 ml-auto">
           <button class="btn btn-primary" name="submit" type="submit">Register</button>
         </div>
         <div class="col-sm-4 ml-auto">
           <button class="btn btn-danger" type="reset">Reset</button>
         </div>
       </div>
     </form>
   </div>
 </div>
<?php include 'include/footer.php'; ?>