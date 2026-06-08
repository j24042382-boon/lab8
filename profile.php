<?php
session_start();
require_once "db_conn.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}


$username = $_SESSION['username'];

$sql = "SELECT username, email FROM user WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
</head>
<body>

<h2>User Profile</h2>

<p>
    <strong>Username:</strong>
    <?php echo ($users['username']); ?>
</p>

<p>
    <strong>Email:</strong>
    <?php echo ($users['email']); ?>
</p>

<hr>

<h3>Edit Profile</h3>

<form action="update_profile.php" method="post">
    New Email:
    <input type="email" name="email" value="<?php echo ($users['email']); ?>" required>
    <input type="submit" value="Update Email">
</form>



<br>

<a href="logout.php">Logout</a>

</body>
</html>