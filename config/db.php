<?php
$server = "localhost";
$servername = "root";
$serverpasscode = "";
$serverdatabse = "EcardExt";

$conn = mysqli_connect($server, $servername, $serverpasscode, $serverdatabse);

if($conn){
      // echo "Database CONNECTED --- ALL THANKS TO JESUS OUR LORD 😁😁😁";
}
else {
      echo "Database not connected";
}
?>