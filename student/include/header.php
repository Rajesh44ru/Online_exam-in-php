<!DOCTYPE html>
<html>
  <head>
    <title>Online Examination System</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="../css/oes.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css"/>
  </head>
    <body >      
      <div class="container">
        <div class="row p-2 top-header"> 
          <div class="col-sm-3">
            <img src="../images/raj.png" style="width:200px;">
          </div>
          <div class="col-sm-9 text-light">
            <h1>Online Examination System</h1>
            <span class="pl-5">...because  examination  test the ablility</span>
          </div>
        </div>
        <div class="row middle-header">
          <div class="col-sm-12 p-2 text-right">
              <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['username']; ?>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="profile.php">Profile</a>
                  <a class="dropdown-item" href="profile.php">Change Password</a>
                </div>
              </div>
            <a href="logout.php" class="btn btn-danger">Logout</a>
          </div>
        </div>