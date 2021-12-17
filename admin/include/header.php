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
    <body>      
      <div class="container">
        <div class="row p-2 top-header"> 
          <div class="col-sm-3">
            <img src="../images/raj.png "style="width:200px">
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
                </div>
              </div>
            <a href="logout.php" class="btn btn-danger">Logout</a>
          </div>
        </div>
        <div class="row bg-dark">
          <div class="col-sm-12">
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
              <a class="navbar-brand d-lg-none" href="#">Menu Bar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="subjects.php">Subjects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="course.php">Course</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="exam.php">Exam</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="question.php">Question</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="result.php">Result</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>