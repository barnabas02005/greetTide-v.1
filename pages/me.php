<!-- JESUS IS LORD -->
<?php
session_start();
include("../config/db.php");

if (@!isset($_SESSION["displaymail"])) {
  header("location: signin.php?youarenotloggedin");
}
require_once("../functions/data.php");
include("../functions/updateaccount.php");
$memid = $_SESSION["id"];
//print_r($memdata["id"]);

//print_r($_SESSION);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Me</title>
  <link rel="stylesheet" href="../assets/css/home.css">
  <!-- theme -->
  <?php if ($memdata['theme'] == 0) {
  ?>
    <link rel="stylesheet" href="../assets/css/theme/light.css">
  <?php
  } else if ($memdata['theme'] == 1) {
  ?>
    <link rel="stylesheet" href="../assets/css/theme/dark.css">
  <?php
  }
  ?>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      /* background-color: #111; */
      height: 100vh;
      width: 100%;
      flex-direction: column;
      gap: 30px;
    }

    .image {
      height: 200px;
      width: 200px;
      border: 2px solid red;
      border-radius: 50%;

      background-color: transparent;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .image img {
      max-width: 100%;
      max-height: 100%;
      border-radius: inherit;
      cursor: pointer;
      height: 100%;
      width: 100%;
      transition: all 2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .image img:hover {
      transform: scale(1.05);
    }
  </style>
</head>

<body>
  <?php include("../includes/bottomtab.php"); ?>
  <?php echo $memdata['displayname']; ?>
  <form action="" method="post">
    <input type="hidden" name="member_id" value="<?php echo $memdata['id']; ?>">
    Ligth theme: <input type="radio" name="theme" id="light" value="0">
    Dark themee: <input type="radio" name="theme" id="dark" value="1">
    <input type="submit" name="set_theme" value="set theme">
  </form>
  <div class="image">
    <img src="../assets/img/9.png" data-src="../assets/img/5.jpg" alt="image">
  </div>
</body>

</html>