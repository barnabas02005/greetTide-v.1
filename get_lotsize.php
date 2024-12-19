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
if (isset($_POST['id'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'lot_size'
    $tradeIdToSelect = mysqli_real_escape_string($conn, $_POST['id']);

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT lotsize FROM lotsizing WHERE from_trade = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $tradeIdToSelect);
    $stmt->execute();
    $stmt->bind_result($lotSize);

    $response = array();

    if ($stmt->fetch()) {
        // Record found, add 'lotSize' to response
        $response['lotsize'] = $lotSize;
        echo json_encode($response);
    } else {
        // No record found for the given trade ID
        echo json_encode(array('error' => 'No record found for the given trade ID'));
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo json_encode(array('error' => 'TradeID not provided'));
}

// Close the database connection
$conn->close();
?>
