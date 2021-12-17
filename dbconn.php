<?php
$servername="localhost";
$username="root";
$password="";
$dbname="e_exam";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Errror:".mysqli_connect_error());

}
//else
// echo "connected sucessfully";

?>