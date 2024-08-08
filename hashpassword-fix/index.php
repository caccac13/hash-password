<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "Welcome, ". $_SESSION['username']; 
        echo '<br><button><a href="logout.php">Logout</a></button>';
    }
    else {
        if(isset($_REQUEST['page'])){
            if($_REQUEST['page'] == 'login'){
                include_once 'login.php';
            }
            if($_REQUEST['page'] == 'signup'){
                include_once 'signup.php';
            }
        }
        else {
            include_once 'login.php';
        }
    }
    ?>
</body>
</html>