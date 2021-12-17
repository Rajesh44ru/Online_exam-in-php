<?php 
      error_reporting(0);
      session_start();

      if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
      {
        header("location: ../index.php");
      }
 ?>
 <?php include 'include/header.php'; ?>
        
        <div class="row p-5" style="background: #fafafa;">
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="course.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Course
              </div>
            </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="subjects.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Subjects
              </div>
            </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="exam.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Exams
              </div>
            </a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="jumbotron jumbotron-fluid bg-primary text-center">
              <a href="question.php" class="text-light">
              <div class="container">
                <i class="fa fa-book"></i><br>
                Question
              </div>
            </a>
            </div>
          </div>
        </div>
        <?php include 'include/footer.php'; ?>
