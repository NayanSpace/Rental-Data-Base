
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="List_Properties.css">
</head>
</html>

<?php
include 'connect.php';

$sql = "SELECT p.code, CONCAT(o.fname, ' ', o.lname) AS ownerName, CONCAT(m.fname, ' ', m.lname) AS managerName 
        FROM property p 
        LEFT JOIN ownsProperty op ON p.code = op.propertyID 
        LEFT JOIN owner o ON op.ownerID = o.ID 
        LEFT JOIN manager m ON p.managerID = m.ID";

$stmt = $connection->query($sql);

echo "<h2>Property Listings</h2>";
echo "<table>";
echo "<tr><th>Property ID</th><th>Owner Name</th><th>Manager Name</th></tr>";
while ($row = $stmt->fetch()) {
    echo "<tr><td>{$row['code']}</td><td>{$row['ownerName']}</td><td>{$row['managerName']}</td></tr>";
}
echo "</table>";
?>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="rental.html" class="btn">Return to Homepage</a>