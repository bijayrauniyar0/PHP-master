<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <title>Responsive Menu</title>
</head>
<body>
    <header>
        <nav>
            <div class="left">
                <h2><a href="#">Loop Verse</a></h2>
            </div>
            <div class="search-form">
                <form action="../search-bar/search_results.php" method="get">
                    <input type="text" name="query" id="search" placeholder="&nbsp;Search....">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="mid">
                <ul>
                    <li><a href="#">Home</a></li>
                    <?php 
                    if(!$loggedin){
                    echo'<li><a href="sign-in.php">Login</a></li>';
                    }
                    
               echo' </ul>
            </div>
            <div class="right">';
            if(!$loggedin){
                echo'<h2><a href="sign-up.php">Get Started</a></h2>';
            }else{
                $sql = "SELECT * from users where Email = '".$_SESSION['email']."'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $name = $row['Name'];

                echo'<h2><a href="profile.php">'.$name.'</a></h2>';
            }

           echo' </div> ';?>
           
        </nav>
    </header>
  
</body>
</html>