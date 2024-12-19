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

// Check if 'id' and 'pnl' are set in the POST data
if (isset($_POST['orderticket']) && isset($_POST['pnl'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeIdToUpdate = $_POST['orderticket'];
    $tradeOderProfitToUpdate = $_POST['pnl'];
    $tradeTaken = 1;

    echo "Received 'id' parameter: " . $tradeIdToUpdate;
    echo "Received 'pnl' parameter: " . $tradeOderProfitToUpdate;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET orderProfit = ? WHERE ticket = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dii", $tradeOderProfitToUpdate, $tradeIdToUpdate, $tradeTaken);

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
    echo "Error: 'id' and 'pnl' parameters not found in POST data";
}


// Check if 'id' and 'pnl' are set in the POST data
if (isset($_POST['hedgeID']) && isset($_POST['hedgepnl'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $hedgeID = $_POST['hedgeID'];
    $hedgePNL = $_POST['hedgepnl'];
    $tradeTaken = 1;

    echo "Received 'id' parameter: " . $hedgeID;
    echo "Received 'pnl' parameter: " . $hedgePNL;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE hedge_trades SET orderprofit = ? WHERE id = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dii", $hedgePNL, $hedgeID, $tradeTaken);

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
    echo "Error: 'id' and 'pnl' parameters not found in POST data";
}


//Update take_over
// Check if 'id' and 'pnl' are set in the POST data
if (isset($_POST['takeOverID'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tkID = $_POST['takeOverID'];
    $takeOver = 1;
    $tradeTaken = 1;

    echo "Received 'id' parameter: " . $tkID;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;
    echo "Received 'Trade take_over' parameter: " . $takeOver;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE hedge_trades SET take_over = ? WHERE from_trade = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii",$takeOver,$tkID,$tradeTaken);

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
    echo "Error: 'tkID' parameters not found in POST data";
}

// Debugging: Print POST data
var_dump($_POST);

// Close the database connection
$conn->close();
?>
