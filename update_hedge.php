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

$conn->begin_transaction();

// Check if 'id' and 'Hedging' are set in the POST data
if (isset($_POST['updateHedgeId']) && isset($_POST['hedging']) && isset($_POST['hedging_reached']) && isset($_POST['signal_sent'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'Hedging'
    $tradeupdateHedgeId = $_POST['updateHedgeId'];
    $tradeHedgeToUpdate = $_POST['hedging'];
    $tradeHedgeReachedToUpdate = $_POST['hedging_reached'];
    $tradeSignalSent = $_POST['signal_sent'];
    $tradeTaken = 1;

    echo "Received 'Id' parameter: " . $tradeupdateHedgeId;
    echo "Received 'Hedging' parameter: " . $tradeHedgeToUpdate;
    echo "Received 'Hedging Reached' parameter: " . $tradeHedgeReachedToUpdate;
    echo "Received 'Hedging signal sent' parameter: " . $tradeSignalSent;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET hedging = ?, hedged_reached = ?, hedge_signal = ? WHERE id = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiii", $tradeHedgeToUpdate, $tradeHedgeReachedToUpdate,$tradeSignalSent,$tradeupdateHedgeId, $tradeTaken);

    if ($stmt->execute()) {
        echo "Record updated successfully";
        $conn->commit();
    } else {
        $conn->rollback();
        echo "Error updating record: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    $conn->rollback();
    echo "Error: 'hedging','hedging_reached,'hedge_signal', 'id', 'trade_taken' parameters not found in POST data";
}

// Debugging: Print POST data
var_dump($_POST);

// Close the database connection
$conn->close();
?>
