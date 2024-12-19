<?php
// Set appropriate headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Expires: 0");
header("Pragma: no-cache");

// Generate a unique timestamp or random parameter
$cacheBuster = time(); // You can use time() for a timestamp
// Your PHP script to fetch and format data from the database

// Create a connection to the database
$conn = mysqli_connect('localhost', 'root', '', 'mt4');

$conn->begin_transaction();

// Check the database connection
if (mysqli_connect_error()) {
    $conn->rollback();
    echo "Failed connecting to the database!";
    echo mysqli_connect_error();
} else {
    // Fetch data from the database and store it in an array
    $dataArray = array();
    $result = mysqli_query($conn, "SELECT * FROM mt4order");
    while ($row = mysqli_fetch_assoc($result)) {
      if(mysqli_num_rows($result) > 0){
        $dataArray[] = $row;
        $conn->commit();
      }
      else{
        $conn->rollback();
      }
    }

    // Encode the array as JSON and send it as the response
    header('Content-Type: application/json');
    echo json_encode($dataArray);


}



// Close the database connection
mysqli_close($conn);
?>
