<?php
    //Fetch member account details
    $accountdetails = "SELECT * FROM members WHERE email = '$_SESSION[displaymail]' || displayname = '$_SESSION[displaymail]'"; 

    
    $memberd = mysqli_query($conn, $accountdetails);
    $memdata = mysqli_fetch_assoc($memberd);

    //theme
    // $themedetails =  "SELECT * FROM theme WHERE member_id = '$_SESSION[id]'"; 
    // $themed = mysqli_query($conn, $themedetails);
    //     while($row = mysqli_fetch_assoc($themed)) {
    //     $bg = $row["theme"];
    //     $id = $row["member_id"];
    // }
        
?>