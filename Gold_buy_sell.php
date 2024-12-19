<?php
// Receive data from the Python script
$data = file_get_contents('php://input');
$data = json_decode($data, true);

// Extract the message from the received data (assuming 'message' key exists)
$message = $data['latest_filtered_message']['message'];

// Establish a database connection (replace with your database credentials)
$mysqli = new mysqli("localhost", "root", "", "gold_buy_sell");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Insert the message into the database
$sql = "INSERT INTO signall (message, date) VALUES ('$message', now())";

if ($mysqli->query($sql) === TRUE) {
    echo "Data saved successfully!";
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>
