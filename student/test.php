<?PHP 
$servername="localhost";
$username="root";
$password="";
$dbname="e_exam";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Errror:".mysqli_connect_error());

}else
{
    $exam="First term";
                  $q1="SELECT * from exam where `name`='$exam'";
                  $result=mysqli_query($conn,$q1);
                  while($row=mysqli_fetch_assoc($result))
                  echo $row['course_id'];
                //   if(mysqli_num_rows($result)>0)
                // {
                //     while($row=mysqli_fetch_assoc($result))
                //     {
                //         echo $row['course_id'];
                //     }
                // }
                  
}
    //     echo "exam id: $exam_id";
      //     echo '<br>';
      //     echo "subjects id : $subjects_id";
      //     echo $login_id;

      //     $query = "select * from student_exam where login_id='$login_id' AND exam_id='$exam_id' AND subjects_id = '$subjects_id'";
      //     $result = mysqli_query($conn, $query);
      //     $res=mysqli_fetch_assoc($result);

      //     if(mysqli_num_rows($result)>10)
      //     {
      //       $_GLOBALS['message'] = 'You have already submitted this exam';
      //     }
      //     else
      //     {
      //       $query = "INSERT INTO student_exam(`login_id`, `exam_id`, `subjects_id`) VALUES ('$login_id','$exam_id','$subjects_id')";
      //       $result = mysqli_query($conn, $query);
      //       $insert_id = mysqli_insert_id($conn);
      //       if($result == true)
      //       {
      //         setcookie('exam_id', $exam_id, time() + (86400 * 1), "/");
      //         setcookie('subjects_id', $subjects_id, time() + (86400 * 1), "/");
      //         setcookie('student_exam_id', $insert_id, time() + (86400 * 1), "/");
      //         header("Location: question.php");

      //       }
      //     }
        
              
                  
?>
