<?php
$server="localhost";
$uname="root";
$pwd="";
$dbname="exploreworlddb";
$conn=mysqli_connect($server,$uname,$pwd,$dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

$result = mysqli_query($conn,"SELECT * FROM places");
?>
<!DOCTYPE html>
<html>
<head><title>View Places</title></head>
<body>
    <h2>Places</h2>
    <table border="1">
        <tr><th>ID</th><th>Name</th><th>Location</th></tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['place_id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['location'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
