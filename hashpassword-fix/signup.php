<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = array();
    
    // Validate username
    if (empty($_POST['username'])) {
        $error['username'] = 'Please enter a username';
    } else {
        $pattern = "/^[a-zA-Z0-9_]{5,30}$/";
        if (!preg_match($pattern, $_POST['username'])) {
            $error['username'] = 'Invalid username. Must be 5-30 characters long and contain only letters, numbers, and underscores.';
        } else {
            $username = $_POST['username'];
        }
    }
    
    // Validate password
    if (empty($_POST['password'])) {
        $error['password'] = 'Please enter a password';
    } else {
        $pattern = "/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,30}$/";
        if (!preg_match($pattern, $_POST['password'])) {
            $error['password'] = 'Password must be 6-30 characters long, contain at least one uppercase letter, one number, and one special character';
        } else {
            $password = $_POST['password'];
        }
    }
    
    // Validate repeat password
    if (empty($_POST['repassword'])) {
        $error['repassword'] = 'Please enter the password again';
    } else {
        if ($_POST['repassword'] !== $_POST['password']) {
            $error['repassword'] = 'Passwords do not match';
        }
    }

    // Validate email
    if (empty($_POST['email'])) {
        $error['email'] = 'Please enter an email address';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Invalid email address';
        } else {
            $email = $_POST['email'];
        }
    }
    
    // If no errors, proceed to save the user
    if (empty($error)) {
        header('location: signupHandle.php?username='.$username.'&password='.$password.'&email='.$email);
    }
}
?>

<h2>Register</h2>
<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" required><br>
    <?php if (isset($error['username'])) echo '<span style="color:red;">' . $error['username'] . '</span><br>'; ?><br> 

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    <?php if (isset($error['password'])) echo '<span style="color:red;">' . $error['password'] . '</span><br>'; ?><br>  

    <label for="repassword">Repeat password:</label>
    <input type="password" id="repassword" name="repassword" required><br>
    <?php if (isset($error['repassword'])) echo '<span style="color:red;">' . $error['repassword'] . '</span><br>'; ?><br>  

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" required><br>
    <?php if (isset($error['email'])) echo '<span style="color:red;">' . $error['email'] . '</span><br>'; ?><br>    

    <input type="submit" value="Register">

    <p>Have an account? <a href="index.php?page=login">Login</a></p>
</form>
