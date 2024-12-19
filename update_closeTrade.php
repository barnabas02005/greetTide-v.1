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

// Check if 'id' is set in the POST data
if (isset($_POST['id']) && isset($_POST['closingid']) && isset($_POST['Toutid'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeIdToUpdate = $_POST['id'];
    $closing_trade = $_POST['closingid'];
    $trade_out = $_POST['Toutid'];
    $tradeTaken = 1;

    echo "Received 'id' parameter: " . $tradeIdToUpdate;
    echo "Received 'Trade Out' parameter: " . $trade_out;
    echo "Received 'Closing Trade' parameter: " . $closing_trade;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET close_trade = ? , trade_out = ? WHERE id = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii",$closing_trade,$trade_out,$tradeIdToUpdate,$tradeTaken);

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
    echo "Error: 'id 1', 'close_order', 'trade_taken' parameters not found in POST data";
}

// Check if 'hedgeID' is set in the POST data
if (isset($_POST['hedgeCID'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeHedgeIdToUpdate = $_POST['hedgeCID'];
    $tradeOut = 1;
    $tradeTaken = 1;

    echo "Received 'id' parameter: " . $tradeHedgeIdToUpdate;
    echo "Received 'Trade Out' parameter: " . $tradeOut;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE hedge_trades SET trade_out = ? WHERE id = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $tradeOut, $tradeHedgeIdToUpdate, $tradeTaken);

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
    echo "Error: 'id 2', 'close_order', 'trade_out', 'trade_taken' parameters not found in POST data";
}


// Check if 'id' and 'pnl' are set in the POST data
if (isset($_POST['doneID'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeDoneIdToUpdate = $_POST['doneID'];
    $tradeOut = 1;
    $tradeTaken = 1;

    echo "Received 'Done ID' parameter: " . $tradeDoneIdToUpdate;
    echo "Received 'Trade Out' parameter: " . $tradeOut;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET trade_out = ? WHERE id = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $tradeOut, $tradeDoneIdToUpdate, $tradeTaken);

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
    echo "Error: 'DoneID 2', 'trade_out', 'trade_taken' parameters not found in POST data";
}

if (isset($_POST['doneID'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeHDoneIdToUpdate = $_POST['doneID'];
    $tradeOut = 1;
    $tradeTaken = 1;

    echo "Received 'Done ID' parameter: " . $tradeHDoneIdToUpdate;
    echo "Received 'Trade Out' parameter: " . $tradeOut;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE hedge_trades SET trade_out = ? WHERE id = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $tradeOut, $tradeHDoneIdToUpdate, $tradeTaken);

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
    echo "Error: 'doneID 1', 'trade_out', 'trade_taken' parameters not found in POST data";
}


//Close trade -- no trailing
if (isset($_POST['closeID'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeHCloseIdToUpdate = $_POST['closeID'];
    $closetrade = 1;
    $tradeTaken = 1;

    echo "Received 'Close ID' parameter: " . $tradeHCloseIdToUpdate;
    echo "Received 'close Trade' parameter: " . $closetrade;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE hedge_trades SET closetrade = ? WHERE from_trade = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $closetrade, $tradeHCloseIdToUpdate, $tradeTaken);

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
    echo "Error: 'closeTrade 1', 'trade_taken' parameters not found in POST data";
}


if (isset($_POST['closeID'])) {
    // Assuming you have a table named 'mt4order' with columns 'id' and 'orderProfit'
    $tradeCloseIdToUpdate = $_POST['closeID'];
    $closetrade = 1;
    $tradeTaken = 1;

    echo "Received 'Close ID' parameter: " . $tradeCloseIdToUpdate;
    echo "Received 'close Trade' parameter: " . $closetrade;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET close_trade = ? WHERE id = ? AND trade_taken = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $closetrade, $tradeCloseIdToUpdate, $tradeTaken);

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
    echo "Error: 'closeID 1', 'trade_taken' parameters not found in POST data";
}

//Update for mt4order table
if (isset($_POST['profitingID'])) {
    $tradeClosingIdToUpdate = $_POST['profitingID'];
    $closingOrder = 1;
    $tradeTaken = 1;
    $thresholdLoss = 0;

    echo "Received 'Closging Trade ID' parameter: " . $tradeClosingIdToUpdate;
    echo "Received 'Closing Trade && Trailing' parameter: " . $closingOrder;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;
    echo "Received 'Trade Threshold' parameter: " . $thresholdLoss;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET close_trade = ? WHERE id = ? AND trade_taken = ? AND orderprofit < '0'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $closingOrder,$tradeClosingIdToUpdate, $tradeTaken);

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
    echo "Error: 'ProfitingID-mt4order(less than 0)', 'trade_out', 'trade_taken' parameters not found in POST data";
}


//Update for mt4order table
if (isset($_POST['profitingID'])) {
    $tradeClosingIdToUpdate2 = $_POST['profitingID'];
    $thresholdProfit = 0;
    $tradeTaken = 1;
    $trailingValue = 1;
    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE mt4order SET trailing_p = ? WHERE id = ? AND trade_taken = ? AND orderprofit >= '0'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $trailingValue,$tradeClosingIdToUpdate2, $tradeTaken);

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
    echo "Error: 'ProfitingID-mt4order(greater than 0)', 'close_trade', 'trade_taken' parameters not found in POST data";
}

// Update for hedge_trade table
if (isset($_POST['profitingID'])) {
    $tradeHClosingIdToUpdate = $_POST['profitingID'];
    $closingOrder = 1;
    $tradeTaken = 1;
    $thresholdLoss = 0;

    echo "Received 'Closging Trade ID' parameter: " . $tradeHClosingIdToUpdate;
    echo "Received 'Closing Trade && Trailing' parameter: " . $closingOrder;
    echo "Received 'Trade Taken' parameter: " . $tradeTaken;

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE hedge_trades SET closetrade = ? WHERE from_trade = ? AND trade_taken = ? AND orderprofit < '0'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $closingOrder,$tradeHClosingIdToUpdate,$tradeTaken);

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
    echo "Error: 'ProfitingID-hedge_trades(less than 0)', 'closetrade', 'trade_taken' parameters not found in POST data";
}
// Update for hedge_trade table
if (isset($_POST['profitingID'])) {
        $tradeHClosingIdToUpdate2 = $_POST['profitingID'];
        $thresholdProfit = 0;
        $trailingValue = 1;
        $tradeTaken = 1;
        // Use prepared statements to prevent SQL injection
        $sql = "UPDATE hedge_trades SET trailingP = ? WHERE from_trade = ? AND trade_taken = ? AND orderprofit >= '0'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $trailingValue,$tradeHClosingIdToUpdate2, $tradeTaken);
    
        if ($stmt->execute()) {
            echo "Record updated successfully, trailing activated for profiting trades";
            $conn->commit();
        } else {
            $conn->rollback();
            echo "Error updating record: " . $stmt->error;
        }
    
        // Close the prepared statement
        $stmt->close();
} else {
    $conn->rollback();
    echo "Error: 'ProfitingID-hedge_trades(greater than 0)', 'closetrade', 'trade_taken' parameters not found in POST data";
}



// Debugging: Print POST data
var_dump($_POST);

// Close the database connection
$conn->close();
?>