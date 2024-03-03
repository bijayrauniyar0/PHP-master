<?php session_start(); 
include 'partials/_dbconnect.php';
$loggedin = false;
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){
    $loggedin = true;
    header("location:index.php");

}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql  = "SELECT * from `users` where email = '$email' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
       if(password_verify($password, $row["password"])){
        echo'
        <script>
        alert("Login Successful")
        </script>';

        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;
        header("location:welcome.php");
        exit;
       }
       else{
        echo'
        <script>
        alert("Wrong Password")
        </script>';
       }
    }}


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign-in</title>
    
</head>
<body>
    <?php include 'partials/_nav.php' ?>

    <div class="in-form-container">
        <h2>Sign In</h2>
        <form action="sign-in.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <span class="button-sub">
                <button type="submit">Sign In</button>
            </span>
        </form>
    </div>
</body>
</html>