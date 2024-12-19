<?php
// Set appropriate headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Expires: 0");
header("Pragma: no-cache");


// Create a connection to the database (adjust the database credentials)
$con = new mysqli('localhost', 'root', '', 'mt4');

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$con->begin_transaction();


// Function to check if all records for a specific from_id have trade_out set to '1'
function allHedgeClosed($con, $fromId) {
    $query = "SELECT * FROM hedge_trades WHERE from_trade = ? AND trade_out != '1'";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $fromId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows == 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['from_id'])) {
    $fromId = $_POST['from_id'];

    // Check if all records for the specific from_id have trade_out set to '1'
    if (allHedgeClosed($con, $fromId)) {
        // Update the original trade in mt4order table
        $updateQuery = "UPDATE mt4order SET trade_out = '1' WHERE id = ? AND close_trade = '1'";
        $updateStmt = $con->prepare($updateQuery);
        $updateStmt->bind_param("i", $fromId);
        $updateStmt->execute();

        echo "All hedge for the from_id closed.";
    } else {
        echo "Hedge trade still opened.";
    }
}


$con->close();
?>
