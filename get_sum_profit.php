<?php
// Set appropriate headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Expires: 0");
header("Pragma: no-cache");

// Generate a unique timestamp or random parameter
$cacheBuster = time(); // You can use time() for a timestamp
// Your PHP script to fetch and format data from the database

// Create a connection to the database
$con = mysqli_connect('localhost', 'root', '', 'mt4');

$con->begin_transaction();
// Check the database connection
if (mysqli_connect_error()) {
    echo "Failed connecting to the database!";
    echo mysqli_connect_error();
    $con->rollback();
} else {
    // Fetch data from the database and store it in an array
    $dataArray = array();

    // Check if 'id' is set in the POST data
    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        
        $sql = "SELECT SUM(orderprofit) AS total_orderprofit
                FROM (
                    SELECT orderprofit
                    FROM mt4order
                    WHERE trade_taken = 1 AND hedging = 1 AND close_trade = 0 AND id = ?
                    UNION ALL
                    SELECT orderprofit
                    FROM hedge_trades
                    WHERE trade_taken = 1 AND closetrade = 0 AND trade_out = 0 AND from_trade = ?
                 ) AS subquery";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii", $id, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = mysqli_fetch_assoc($result)) {
            if(mysqli_num_rows($result) > 0){
                $dataArray[] = $row;
            }
        }
        
        $con->commit();
        
        // Encode the array as JSON and send it as the response
        header('Content-Type: application/json');
        echo json_encode($dataArray);
    } else {
        $con->rollback();
        echo "Error: 'id' parameter not found in POST data";
    }
}

// Close the database connection
mysqli_close($con);


// $sql = "SELECT SUM(a.orderprofit + b.orderprofit) AS total_orderprofit
// FROM mt4order a
// JOIN hedge_trades b ON b.from_trade = a.id
// WHERE b.trade_taken = 1 AND b.closetrade = 0 AND a.trade_taken = 1 AND a.close_trade = 0 AND a.id= ?";
?>
