<?php
$server="localhost";
$uname="root";
$pwd="";
$dbname="exploreworlddb";
$conn=mysqli_connect($server,$uname,$pwd,$dbname);
if(!$conn){
    echo "Not Connected";
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($username)||empty($email)||empty($password)){
    die("All fields are required");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format!");
}

// Validate password length
if (strlen($password) < 6) {
    die("Password must be at least 6 characters long.");
}

// Hash the password before storing it
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    die("This email is already registered. Please use another email.");
}

// Insert data into database
$sql = "INSERT INTO users (user_name, email, user_password) 
        VALUES ('$username','$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.html");
    exit();
} else {
    echo "Error: " . $conn->error;
}


$conn->close();
?>