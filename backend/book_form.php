<?php
$server="localhost";
$uname="root";
$pwd="";
$dbname="exploreworlddb";
$conn=mysqli_connect($server,$uname,$pwd,$dbname);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$location = $_POST['location'];
$guests = $_POST['guests'];
$arrivals = $_POST['arrivals'];
$leaving = $_POST['leaving'];

$errors = [];
if (empty($username) || !preg_match("/^[a-zA-Z-' ]*$/", $username)) $errors[] = "Invalid or missing name.";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid or missing email.";
if (empty($phone) || !preg_match("/^\d{10}$/", $phone)) $errors[] = "Invalid or missing phone number.";
if (empty($address) || !preg_match("/^[a-zA-Z0-9\s,.\-\/#]+$/", $address)) $errors[] = "Invalid or missing address.";
if (empty($location)) $errors[] = "Location is required.";
if ($guests < 1) $errors[] = "Guests must be at least 1.";
if (empty($arrivals) || empty($leaving)) $errors[] = "Arrival and leaving dates are required.";

if (!empty($errors)) {
    foreach ($errors as $e) {
        echo "<script>alert('$e'); window.history.back();</script>";
    }
    exit;
}

// Check if the user exists
$check = "SELECT * FROM booking WHERE email = '$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {
    // Update booking
    $update = "UPDATE booking SET name='$username', phone='$phone', address='$address', location='$location', guests=$guests, arrivals='$arrivals', leaving='$leaving' WHERE email='$email'";
    if ($conn->query($update)) {
        echo "<script>alert('Booking updated successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Update error: " . $conn->error . "'); window.history.back();</script>";
    }
} else {
    // Insert new booking
    $insert = "INSERT INTO booking (name, email, phone, address, location, guests, arrivals, leaving) VALUES ('$username', '$email', '$phone', '$address', '$location', $guests, '$arrivals', '$leaving')";
    if ($conn->query($insert)) {
        echo "<script>alert('Booking submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Insert error: " . $conn->error . "'); window.history.back();</script>";
    }
}

$conn->close();
?>