<?php
$conn = new mysqli("localhost", "root", "", "exploreworlddb");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $sql = "INSERT INTO places (name, location) VALUES ('$name', '$location')";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_places.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Place</title></head>
<body>
    <h2>Add New Place</h2>
    <form method="POST">
        Name: <input type="text" name="name" required><br><br>
        Location: <input type="text" name="location" required><br><br>
        <input type="submit" value="Add Place">
    </form>
</body>
</html>
