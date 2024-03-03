<?php
session_start();
include 'partials/_dbconnect.php';
    $loggedin = false;
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
        $loggedin = true;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $sql1 = "UPDATE users SET Name = '$name' where email = '".$_SESSION['email']."'";
    $result1 = mysqli_query($conn,$sql1);
    if($result1){
        echo'
            <script> 
                alert("Changes Saved Sucessfully")
            </script>
        ';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .details{
            margin-top: 50px;
            border: 2px solid black;
            background-color: gray;
            border-radius: 5px;
            width: 300px;
            height: 100px;
            margin-left: 40%;
            padding: 10px 20px;
        }
        form{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
<?php include 'partials/_nav.php'; 
$sql = "SELECT * from users where Email = '".$_SESSION['email']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
// update in crud
echo'

<div class="details">
    <form action="profile.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="'.$row['Name'].'">
        <button type="submit">Save Changes</button>
    </form>
</div>';
?>
    
</body>
</html>