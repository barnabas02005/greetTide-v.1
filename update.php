<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "mt4";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the POST data
if(isset($_POST['id'])){
    // Assuming you have a table named 'prices' with a primary key 'id'
    $tradeIdToUpdate = $_POST['id']; // Assuming you receive the trade_id from MQL4
    echo "Received 'id' parameter: " . $tradeIdToUpdate;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE prices SET in_trade = '1' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tradeIdToUpdate);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error: 'id' parameter not found in POST data";
}

// Debugging: Print POST data
var_dump($_POST);

// Close the database connection
$conn->close();
?>
