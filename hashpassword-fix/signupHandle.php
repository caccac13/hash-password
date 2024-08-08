<?php
include 'db.php';

$user = $_REQUEST['username'];
$pass = $_REQUEST['password'];
$email = $_REQUEST['email'];

$sql = "INSERT INTO `account`(`username`, `password`, `email`) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $user, md5($pass), $email);

if ($stmt->execute()) {
    echo "Success!";
    header("location: index.php?page=login");
} else {
    echo "Fail!";
}

$stmt->close();
$conn->close();