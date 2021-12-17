<?php 
      session_start();

      if(!isset($_SESSION['username']) && !isset($_SESSION['usertype']))
      {
        header("location: ../index.php");
      }
      include_once '../dbconn.php';

      if(isset($_POST['submit']))
      {
          $exam_id = $_POST['exam_id'];
          $subject = $_POST['subject'];
          $question = $_POST['question'];
          //var_dump($question);
          $opt_a = $_POST['opt_a'];
          $opt_b = $_POST['opt_b'];
          $opt_c = $_POST['opt_c'];
          $opt_d = $_POST['opt_d'];
          $correct_option = $_POST['correct_option'];

          $query = "INSERT INTO question_list(exam_id, subjects_id,ques,opt_a,opt_b,opt_c,opt_d,correct_opt) VALUES ('$exam_id','$subject','$question','$opt_a','$opt_b','$opt_c','$opt_d','$correct_option')";
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

      $query = "SELECT * FROM exam";
      $exam = mysqli_query($conn, $query);

      $query1 = "SELECT * FROM subjects";
      $subjects = mysqli_query($conn, $query1);

      $que = "SELECT * FROM question_list";
      $fetchques = mysqli_query($conn, $que);
      
      //delete query
      if(isset($_GET['del_id']))
      {
        $id = $_GET['del_id'];
        $query = "DELETE FROM question_list WHERE id='$id'";
        $delete = mysqli_query($conn, $query);
        if($delete == true)
        {
          $_GLOBALS['message'] = 'Record Deleted successfully';
          echo "<script>location.href = 'question.php';</script>";
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
              <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                <div class="card border border-primary">
                  <div class="card-block">
                   <div class="card-header bg-primary text-light">
                    <h5><i class="fa fa-question-circle"></i> Add New Question</h5>
                  </div>
                  <div class="card-body">
                    <form method="post" action="question.php">
                      <div class="form-group">
                        <label>Exam Name</label>
                        <select class="form-control" name="exam_id" required="">
                         <option value="">Select exam</option>
                         <?php if(!empty($exam)){ ?>
                          <?php while($row = mysqli_fetch_array($exam)){ ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                          <?php } ?>
                        <?php } ?>
                       </select>
                      </div>
                      <div class="form-group">
                        <label>Subject</label>
                        <select class="form-control" name="subject" required="">
                         <option value="">Select subject</option>
                         <?php if(!empty($subjects)){ ?>
                          <?php while($row = mysqli_fetch_array($subjects)){ ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                          <?php } ?>
                        <?php } ?>
                       </select>
                      </div>
                      <div class="form-group">
                        <label>Question</label>
                        <textarea class="form-control question_paper" name="question" autocomplete="off" placeholder="Question here"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Option A</label>
                        <input type="text" class="form-control" placeholder="Option A" required="" autocomplete="off" name="opt_a">
                      </div>
                      <div class="form-group">
                        <label>Option B</label>
                        <input type="text" class="form-control" placeholder="Option B" required="" autocomplete="off" name="opt_b">
                      </div>
                      <div class="form-group">
                        <label>Option C</label>
                        <input type="text" class="form-control" placeholder="Option C" required="" autocomplete="off" name="opt_c">
                      </div>
                      <div class="form-group">
                        <label>Option D</label>
                        <input type="text" class="form-control" placeholder="Option D" required="" autocomplete="off" name="opt_d">
                      </div>
                      <div class="form-group">
                        <label>Correct Option</label>
                        <select class="form-control" name="correct_option" required="">
                          <option value="">Select Correct Option</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary" name="submit"> Add Question</button>
                    </form>
                  </div>
                  </div>
                </div>
            </div>
                          </div>
                          </div>
             
                        <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
                          <script>
                        CKEDITOR.replace('question');
                </script>
