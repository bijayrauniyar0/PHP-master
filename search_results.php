<?php 
session_start();

include 'partials/_dbconnect.php';
$query = isset($_GET['query'])? $_GET['query'] : '';
$searchQuery = $query;

$query  = "%$query%";
$sql1 = "SELECT * from loopverse where name LIKE ? OR description LIKE ?";

$stmt = $conn->prepare($sql1);
$stmt->bind_param("ss", $query, $query);
$stmt->execute();
$result =$stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="../search-bar/style.css">
</head>
<body>
    <?php require 'partials/_nav.php' ?>
    <?php 
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {
        echo '<h1>Search results for '.$searchQuery.'...</h1>
    <div class="card">
        <h2>'.$row['name'].'</h2>
        <p>'.$row['description'].'</p>
    </div>';
        }
    }
    ?>
</body>
</html>