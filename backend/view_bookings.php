<?php
$server = "localhost";
$uname = "root";
$pwd = "";
$dbname = "exploreworlddb";

$conn = mysqli_connect($server, $uname, $pwd, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM booking ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Bookings</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; }
        table { width: 90%; margin: auto; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background: #1976d2; color: white; }
        h2 { text-align: center; color: #333; }
    </style>
</head>
<body>
    <h2>All Bookings</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Location</th>
            <th>Guests</th>
            <th>Arrivals</th>
            <th>Leaving</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['location'] ?></td>
                    <td><?= $row['guests'] ?></td>
                    <td><?= $row['arrivals'] ?></td>
                    <td><?= $row['leaving'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="9">No bookings found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
