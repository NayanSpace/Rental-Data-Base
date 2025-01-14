
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="List_Properties.css">
</head>
</html>

<?php
include 'connect.php';

$sql = "SELECT 'House' AS type, ROUND(AVG(cost)) AS avgRent FROM property WHERE type='House'
        UNION
        SELECT 'Apartment', ROUND(AVG(cost)) FROM property WHERE type='Apartment'
        UNION
        SELECT 'Room', ROUND(AVG(cost)) FROM property WHERE type='Room'";

$stmt = $connection->query($sql);

echo "<h2>Average Rent by Property Type</h2>";
echo "<table>";
echo "<tr><th>Type</th><th>Average Rent</th></tr>";
while ($row = $stmt->fetch()) {
    echo "<tr><td>{$row['type']}</td><td>\${$row['avgRent']}</td></tr>";
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