
<?php
      session_start();
      include('include/header.php');
      include_once '../dbconn.php';

     
          $exam_id = $_POST['exam_id'];
          $subjects_id = $_POST['subjects_id'];
          $login_id = $_SESSION['id'];
      



?>
<?php //***************timer part***************

include('timer/index.html');

 ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>online Examination</title>
	<!--bootstrap import  -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">
		<div class="jumbotron">
			<?php
			
                  $q1="SELECT * from `question_list` where `exam_id`='$exam_id' and `subjects_id`='$subjects_id'";
                  $result=mysqli_query($conn,$q1);
                  $row=mysqli_fetch_assoc($result);
				  $arr[]=mysqli_fetch_array($result);
				 
                   // echo $num_row;

					
					$quizes = array(
						"$row[ques]" => 
							array("$row[opt_a]", "$row[opt_b]", "$row[opt_c]", "$row[opt_d]"),

                                          
					);

					echo '<h1>Welcome To Online Examination system</h1>';
					echo '<h2 style="color:red;">Do not Refresh the page!!</h2>';
					//iterating through available questions
					foreach ($quizes as $key => $value) {
						echo '<br>';
						echo '<div class="card">';
						echo '<div class="card-header">';
						echo '<strong>Question - 1</strong>'. $key;
						echo '</div>';
						echo '<div class="card-body">';
						echo '<form>';
						echo '<div class="row">';
						
						//iterating through current question options.
						$index = 0;
						foreach ($value as $option ){
							echo '<div class="col-6">';
								echo '<div class="form-check">';
									echo '<input class="form-check-input" type="radio" name="exampleRadios" id="'.$key.$index.'" value="'.$option.'">';
									echo '<label class="form-check-label" for="'.$key.$index.'">';
									echo $option;
									echo '</label>';
								echo '</div>';
							echo '</div>';
							$index++;
						};
						echo '</div>';
						echo '<br>';
						echo '</form>';
						echo '</div>';
						echo '</div>';
					}
					// previous next btn outside question block
					echo '<br><div style="float:right;">';
					echo '<button type="button" class="btn btn-warning" name="nxt" >Next</button>';
					echo '</div>';
			?>

			
		</div>
            <?php include 'include/footer.php'; ?>

	</div>

  </body>
</html>