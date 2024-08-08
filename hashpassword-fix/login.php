<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = array();
    if (empty($_POST['username'])) {
        $error['username'] = 'Please enter a username';
    } else {
        $username = $_POST['username'];
    }
    if (empty($_POST['password'])) {
        $error['password'] = 'Please enter a password';
    } else {
        $password = $_POST['password'];
    }
    if (empty($error)) {
        header('location: loginHandle.php?username=' . $username . '&password=' . $password);
    }
} ?>
<h2>Login</h2>
<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br>
    <?php if (isset($error['username'])) echo '<span style="color:red;">' . $error['username'] . '</span><br>'; ?><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    <?php if (isset($error['password'])) echo '<span style="color:red;">' . $error['password'] . '</span><br>'; ?><br>
    <input type="submit" value="Login">
    <p>Don't have an account? <a href="index.php?page=signup">Signup</a></p>

</form>
<!-- 
    OR'1'='1'
    <script>alert("Hello! I am an alert box!")</script> 
    
    -->