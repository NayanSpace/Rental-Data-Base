<?php
include 'connect.php';

function backButton() {
    echo '<form action="" method="get">';
    echo '<input type="submit" value="Back to Rental Groups List">';
    echo '</form>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rentalGroupCode'])) {
    $selectedCode = $_POST['rentalGroupCode'];

    $rentersSql = "SELECT fname, lname FROM renter WHERE rentalGroup = ?";
    $stmtRenters = $connection->prepare($rentersSql);
    $stmtRenters->execute([$selectedCode]);
    $renters = $stmtRenters->fetchAll();

    $preferencesSql = "SELECT parking, access, laundry, type, beds, bath FROM rentalGroup WHERE code = ?";
    $stmtPreferences = $connection->prepare($preferencesSql);
    $stmtPreferences->execute([$selectedCode]);
    $preferences = $stmtPreferences->fetch();

    echo "<h2>Students in Rental Group: {$selectedCode}</h2>";
    foreach ($renters as $renter) {
        echo "<p>{$renter['fname']} {$renter['lname']}</p>";
    }

    echo "<h2>Rental Preferences</h2>";
    echo "<p>Parking: {$preferences['parking']}</p>";
    echo "<p>Access: {$preferences['access']}</p>";
    echo "<p>Laundry: {$preferences['laundry']}</p>";
    echo "<p>Type: {$preferences['type']}</p>";
    echo "<p>Beds: {$preferences['beds']}</p>";
    echo "<p>Bath: {$preferences['bath']}</p>";

    // Display the back button
    backButton();
} else {
    $sql = "SELECT code FROM rentalGroup";
    $stmt = $connection->query($sql);
    $rentalGroups = $stmt->fetchAll();

    echo '<form action="" method="post">';
    echo '<label for="rentalGroupCode">Select a Rental Group Code:</label>';
    echo '<select name="rentalGroupCode" id="rentalGroupCode">';
    foreach ($rentalGroups as $group) {
        echo "<option value=\"{$group['code']}\">{$group['code']}</option>";
    }
    echo '</select>';
    echo '<input type="submit" value="View Details">';
    echo '</form>';
}
?>
<br>
<br>
<br>
<br>
<br>
<br>

<a href="rental.html" class="btn">Return to Homepage</a>