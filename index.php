<?php
session_start();
include 'partials/_dbconnect.php';

$loggedin = false;
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $loggedin = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'partials/_nav.php'?>
</body>
</html>