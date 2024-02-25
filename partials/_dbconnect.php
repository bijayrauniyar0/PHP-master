<?php 
$server = "localhost";

$username = "root";
$password = "";
$database = "temporary";

$conn = mysqli_connect($server, $username, $password, $database);
if($conn){
  echo'';
}
else{
    echo 'Error!!';
}
?>