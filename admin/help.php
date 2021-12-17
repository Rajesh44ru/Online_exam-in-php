<div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card border border-primary">
                  <div class="card-block">
                   <div class="card-header bg-primary text-light">
                      <h5><i class="fa fa-question-circle"></i> Exam Lists</h5>
                    </div>
                  <div class="table-responsive">
                    <table class="table table-bordered table-stripped" style="font-size: 14px;">
                      <thead class="alert-danger">
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Question</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>Correct</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php if(!empty($fetchques)){  ?>
                        <?php while($row = mysqli_fetch_array($fetchques)){ ?>
                          <?php 
                          $exam_id = $row['exam_id'];
                          $subject_id = $row['subjects_id'];
                          $fetchexams = mysqli_query($con, "SELECT name FROM exam WHERE id = '$exam_id'"); 
                          $examname = mysqli_fetch_array($fetchexams);
                          $fetchsubjects = mysqli_query($conn, "SELECT name FROM subjects WHERE id = '$subject_id'"); 
                          $subname = mysqli_fetch_array($fetchsubjects);
                          ?>
                          <tr>
                            <td><?php echo $examname['name']; ?></td>
                            <td><?php echo $subname['name']; ?></td>
                            <td><?php echo $row['ques']; ?></td>
                            <td><?php echo $row['opt_a']; ?></td>
                            <td><?php echo $row['opt_b']; ?></td>
                            <td><?php echo $row['opt_c']; ?></td>
                            <td><?php echo $row['opt_d']; ?></td>
                            <td><?php echo $row['correct_opt']; ?></td>
                            <td>
                              <a href="question.php?del_id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record')"><i class="fa fa-trash"></i></a>
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