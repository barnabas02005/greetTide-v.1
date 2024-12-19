<?php
// Assuming you have a database connection
$con = mysqli_connect('localhost', 'root', '', 'mt4');
$con->begin_transaction();
$ticket = $_POST['ticket']; // Adjust accordingly
$tables = explode(',', $_POST['tables']); // Adjust accordingly
//echo implode(',',$tables);
// Check if the ticket exists in any of the specified tables
$existsInTables = false;

foreach ($tables as $tableName) {
    // Define the column name based on the table
    $columnName = ($tableName == 'hedge_trades') ? 'orderticket' : 'ticket';

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM $tableName WHERE $columnName = ?";
    $stmt = mysqli_prepare($con, $query);

    if (!$stmt) {
        // Handle the query error
        die(mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "s", $ticket);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $existsInTables = true;
        break;
    }

    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);

// Return the result as a string
echo $existsInTables ? 'true' : 'false';
?>
