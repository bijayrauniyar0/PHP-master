<?php session_start();

include 'partials/_dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];

    if($password == $cpassword){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT into `user` (`name`, `phone`, `email`, `gender`, `pw`) VALUES ('".$name."','".$phone."','".$email."','".$gender."','".$hash."') ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo'
            <script>
                alert("Congrats! Your Account Has Been Created Successfully")
            </script>
            ';
        }
        else{
            echo'Error creating your account';
        }
    }
    else{
        echo'
        <script>
        alert("Error! Passwords donot match")
        </script>';
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0../css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com../css2?family=DM+Serif+Display:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Sign UP Form</title>
</head>
<body>

<?php require 'partials/_nav.php'; ?>

    <section class="main-block">
        <div class="form-container">
            <div class="wrapper">
                <h1>Sign Up</h1>
                <form id="signup-form" name="signupForm" action="sign-up.php" method="POST">
                    <div class="field">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
                    </div>
                    <div class="field">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field">
                        <label for="phoneNumber">Phone Number</label>
                        <span id=checkNumber></span>
                        <div class="phone-input">
                            <input type="tel" maxlength="10" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
                        </div>
                    <div class="field">
                        <label for="roomType" class="form-margin"><p>Gender</p></label>
                        <select class="gender-drop-down" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div> 
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" maxlength="16" id="password" name="password" placeholder="Enter your password" required>
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" maxlength="16" id="confirmPassword" name="confirmPassword" placeholder="Re-Enter your password" required>
                        <span id="match-Error"></span>

                    </div>
                    <span class="btn">
                     <button type="submit">Sign Up</button>
                     </span>
                </form>
                <div class="sign-txt">Already a member? <a href="guest-login.php">Login here</a></div>
            </div>
        </div>
    </section>

</body>
</body>
</html>