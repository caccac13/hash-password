    <?php
    session_start();
    $user = $_REQUEST['username'];
    $pass = $_REQUEST['password'];


    include 'db.php';

    $sql = "SELECT * FROM `account` WHERE `username` = ? AND `password` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, md5($pass));

    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        echo $_SESSION['username'];
        header('location: index.php');
    } else {
        echo '<script>alert("Username hoặc mật khẩu không đúng");history.go(-1);</script>';
    }

    $stmt->close();
    $conn->close();