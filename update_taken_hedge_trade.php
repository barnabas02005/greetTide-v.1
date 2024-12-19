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
if (isset($_POST['id']) && isset($_POST['openprice']) && isset($_POST['ticket']) && isset($_POST['time']) && isset($_POST['tradetaken'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeIdToUpdate = mysqli_real_escape_string($conn, $_POST['id']);
    $tradeOrderPriceToUpdate = mysqli_real_escape_string($conn, $_POST['openprice']);
    $tradeTicketToUpdate = mysqli_real_escape_string($conn, $_POST['ticket']);
    $tradeTimeToUpdate = mysqli_real_escape_string($conn, $_POST['time']);
    $tradetakenToUpdate = mysqli_real_escape_string($conn, $_POST['tradetaken']);

    echo "Received 'id' parameter: " . $tradeIdToUpdate;
    echo "Received 'entryprice' parameter: " . $tradeOrderPriceToUpdate;
    echo "Received 'Trade Ticket' parameter: " . $tradeTicketToUpdate;
    echo "Received 'Trade Time' parameter: " . $tradeTimeToUpdate;
    echo "Received 'Tradetaken' parameter: " . $tradetakenToUpdate;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE hedge_trades SET `entryprice` = ? , `timing` = ? , `orderticket` = ? , `trade_taken` = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsiii", $tradeOrderPriceToUpdate, $tradeTimeToUpdate, $tradeTicketToUpdate, $tradetakenToUpdate, $tradeIdToUpdate);

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


if (isset($_POST['fromTradeID']) && isset($_POST['orderLotsize'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $lotsizingtradeIdToUpdate = mysqli_real_escape_string($conn, $_POST['fromTradeID']);
    $lotToUpdate = mysqli_real_escape_string($conn, $_POST['orderLotsize']);
    $lotsizingtradeTimeToUpdate = date("Y-m-d", time());
    echo "Received 'id' parameter: " . $lotsizingtradeIdToUpdate;
    echo "Received 'Lotsize to update' parameter: " . $lotToUpdate;
    echo "Time updated: " . $lotsizingtradeTimeToUpdate;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE lotsizing SET `lotsize` = ? , `date_updated` = ? WHERE from_trade = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dsi", $lotToUpdate, $lotsizingtradeTimeToUpdate,  $lotsizingtradeIdToUpdate);

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
    echo "Error: 'from_trade' and 'lotsize' parameters not found in POST data";
}

// Debugging: Print POST data
var_dump($_POST);

// Close the database connection
$conn->close();
?>
