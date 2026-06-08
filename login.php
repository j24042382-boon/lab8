<?php 
session_start();
include("db_conn.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
        die("<p>❌ Unable to connect to the database.</p>");
    }

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users
            WHERE username='$username'
            AND password='$password'";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) == 1)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: profile.php");
        exit();
    }
    else
    {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <input type="submit" name="login" value="Login">
</form>

</body>
</html>


