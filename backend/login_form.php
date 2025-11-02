<?php
$server = "localhost";
$uname = "root";
$pwd = "";
$dbname = "exploreworlddb";

// Connect to the database
$con = mysqli_connect($server, $uname, $pwd, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get values from the login form
$username = $_POST['uname'];
$password = $_POST['pword'];

// Fetch the user from the database
$sql = "SELECT * FROM users WHERE user_name = '$username'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['user_password'])) {
        echo "<script>
                alert('Login successful! Welcome, " . htmlspecialchars($username) . "');
                window.location.href = 'index.html';
              </script>";
        exit();
    } else {
        echo "<script>alert('Invalid password.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('User not found.'); window.history.back();</script>";
}

mysqli_close($con);
?>
