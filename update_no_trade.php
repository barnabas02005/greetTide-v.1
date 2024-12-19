<?php
$received = trim($_GET['order']);

if (isset($received) && !empty($received)) {
    $data = explode('|', $received);

    // Initialize variables for EA_name and Orderstotal
    $eaName = '';
    $ordersTotal = 0;

    // Database connection settings
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mt4';

    // Establish a connection to the database
    $mysqli = mysqli_connect($hostname, $username, $password, $database);

    // Check the connection
    if (mysqli_connect_error()) {
        echo "Failed to connect to the database: " . mysqli_connect_error();
        exit;
    }

    foreach ($data as $entry) {
        list($orderData, $eaName, $ordersTotal) = explode(', ', $entry);
    }

    // Update the EA_name and ordersTotal in the database
    $updateQuery = "UPDATE ea_count_orders SET name = ?";
    $stmtUpdate = mysqli_prepare($mysqli, $updateQuery);
    mysqli_stmt_bind_param($stmtUpdate, 's', $eaName);
    mysqli_stmt_execute($stmtUpdate);

    $updateQuery = "UPDATE ea_count_orders SET no_orders = ?";
    $stmtUpdate = mysqli_prepare($mysqli, $updateQuery);
    mysqli_stmt_bind_param($stmtUpdate, 'i', $ordersTotal);
    mysqli_stmt_execute($stmtUpdate);

    // Close the database connection
    mysqli_close($mysqli);

    echo "Data processed successfully.";
} else {
    echo "No data received.";
}
?>
