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
if (isset($_POST['id']) && isset($_POST['openprice']) && isset($_POST['stoploss']) && isset($_POST['ticket']) && isset($_POST['time'])) 
{
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeIdToUpdate = mysqli_real_escape_string($conn, $_POST['id']);
    $tradeOrderPriceToUpdate = mysqli_real_escape_string($conn, $_POST['openprice']);
    $tradeStoplossPriceToUpdate = mysqli_real_escape_string($conn, $_POST['stoploss']);
    $tradeTaken = 1;
    $tradeTicketToUpdate = mysqli_real_escape_string($conn, $_POST['ticket']);
    $tradeTimeToUpdate = mysqli_real_escape_string($conn, $_POST['time']);

    echo "Received 'id' parameter: " . $tradeIdToUpdate;
    echo "Received 'entryprice' parameter: " . $tradeOrderPriceToUpdate;
    echo "Received 'stoploss' parameter: " . $tradeStoplossPriceToUpdate;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;
    echo "Received 'Trade Ticket' parameter: " . $tradeTicketToUpdate;
    echo "Received 'Trade Time' parameter: " . $tradeTimeToUpdate;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET `entryprice` = ? , `hedgeprice` = ?, `trade_taken` = ?, `time` = ? , `ticket` = ?  WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddisii", $tradeOrderPriceToUpdate, $tradeStoplossPriceToUpdate, $tradeTaken, $tradeTimeToUpdate, $tradeTicketToUpdate, $tradeIdToUpdate);

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

// for highest BID Price reached
if (isset($_POST['HBid']) && isset($_POST['HBPrice'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeHBIdToUpdate = mysqli_real_escape_string($conn, $_POST['HBid']);
    $tradeHBPriceToUpdate = mysqli_real_escape_string($conn, $_POST['HBPrice']);
    $tradeTaken = 1;

    echo "Received 'HB_id' parameter: " . $tradeHBIdToUpdate;
    echo "Received 'Highest BID price reached' parameter: " . $tradeHBPriceToUpdate;
    echo "Received 'Trade Taken (check)' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET `highestbidreached` = ?  WHERE `id` = ? AND `trade_taken` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dii", $tradeHBPriceToUpdate, $tradeHBIdToUpdate, $tradeTaken);

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
    echo "Error: 'HBLAid' and 'highestbidreached' parameters not found in POST data";
}

// for lowest ASK Price reached
if (isset($_POST['LAid']) && isset($_POST['LAPrice'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeLAIdToUpdate = mysqli_real_escape_string($conn, $_POST['LAid']);
    $tradeLAPriceToUpdate = mysqli_real_escape_string($conn, $_POST['LAPrice']);
    $tradeTaken = 1;

    echo "Received 'LA_id' parameter: " . $tradeLAIdToUpdate;
    echo "Received 'Lowsest ASK price reached' parameter: " . $tradeLAPriceToUpdate;
    echo "Received 'Trade Taken (check)' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET `lowestaskreached` = ?  WHERE `id` = ? AND `trade_taken` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dii", $tradeLAPriceToUpdate, $tradeLAIdToUpdate, $tradeTaken);

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
    echo "Error: 'HBLAid' and 'highestbidreached', 'lowestaskreached' parameters not found in POST data";
}


// Delete stale signal from mt4order
if (isset($_POST['DSSid'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeDSSIdToUpdate = mysqli_real_escape_string($conn, $_POST['DSSid']);
    $tradeTaken = 0;

    echo "Received 'DSS' parameter: " . $tradeDSSIdToUpdate;
    echo "Received 'Trade Taken (check)' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM mt4order WHERE `id` = ? AND `trade_taken` = ? AND `time` < NOW() - INTERVAL 3 MINUTE";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $tradeDSSIdToUpdate, $tradeTaken);

    if ($stmt->execute()) {
        echo "Record was successfully deleted; ALL THANKS TO GOD";
        $conn->commit();
    } else {
        $conn->rollback();
        echo "Error updating record: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    $conn->rollback();
    echo "Error: 'DSSid' parameters not found in POST data";
}

// Delete stale "HEDGE" signal from hedge_trades
if (isset($_POST['DHSid']) && isset($_POST['hr']) && isset($_POST['hss']) && isset($_POST['ft'])) {
    $tradeDSHIdToUpdate = mysqli_real_escape_string($conn, $_POST['DHSid']);
    $tradeHRToUpdate = mysqli_real_escape_string($conn, $_POST['hr']);
    $tradeHSSToUpdate = mysqli_real_escape_string($conn, $_POST['hss']);
    $tradeFTToUpdate = mysqli_real_escape_string($conn, $_POST['ft']);
    $tradeTaken = 0;

    echo "Received 'DHSid' parameter: " . $tradeDSHIdToUpdate;
    echo "Received 'hr' parameter: " . $tradeHRToUpdate;
    echo "Received 'hss' parameter: " . $tradeHSSToUpdate;
    echo "Received 'ft' parameter: " . $tradeFTToUpdate;
    echo "Received 'Trade Taken (check)' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM hedge_trades WHERE `id` = ? AND `trade_taken` = ? AND `timing` < NOW() - INTERVAL 3 MINUTE";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $tradeDSHIdToUpdate, $tradeTaken);

    if ($stmt->execute()) {
        echo "Record updated successfully";
                // Use prepared statements to prevent SQL injection
                $sql2 = "UPDATE mt4order SET `hedged_reached` = ?, hedge_signal = ?  WHERE `id` = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("iii", $tradeHRToUpdate, $tradeHSSToUpdate, $tradeFTToUpdate);

                if ($stmt2->execute()) {
                    echo "Update mt4order table successfully";
                    $conn->commit();
                } else {
                    $conn->rollback();
                    echo "Error updating record(mt4order): " . $stmt2->error;
                }
        $conn->commit();
    } else {
        $conn->rollback();
        echo "Error updating record: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    $conn->rollback();
    echo "Error: 'DSSid' parameters not found in POST data";
}



// Debugging: Print POST data
var_dump($_POST);

// Close the database connection
$conn->close();
?>
