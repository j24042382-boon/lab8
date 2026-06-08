<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

include("db_connect.php");

$username = $_SESSION['username'];
$email = $_POST['email'];

$sql = "UPDATE user
        SET email='$email'
        WHERE username='$username'";

if($conn->query($sql))
{
    header("Location: profile.php");
    exit();
}
else
{
    echo "Error updating profile.";
}
?>