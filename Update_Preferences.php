<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $parking = $_POST['parking'];
    $access = $_POST['access'];
    $laundry = $_POST['laundry'];

    $sql = "UPDATE rentalGroup SET parking=?, access=?, laundry=? WHERE code=?";
    $stmt= $connection->prepare($sql);
    $stmt->execute([$parking, $access, $laundry, $code]);

    echo "<p>Preferences updated successfully.</p>";
}

// Form to select a rental group and update preferences
echo '<form action="" method="post">
        Rental Group Code: <input type="text" name="code" required><br>
	<br>
	<br>
        Parking: <select name="parking">
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                 </select><br>
	<br>
	<br>
	<br>
	<br>
        Access: <select name="access">
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select><br>
	<br>
	<br>
	<br>
	<br>
        Laundry: <select name="laundry">
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                 </select><br>
	<br>
	<br>
        <input type="submit" value="Update Preferences">
      </form>';
?>
<br>
<br>
<br>
<br>
<br>
<br>

<a href="rental.html" class="btn">Return to Homepage</a>