<?php
// $src = $_FILES["image"]["tmp_name"];
// $imageName = $_FILES["image"]["name"];
// $imageExtension = explode('.', $imageName);
// $imageExtension = strtolower(end($imageExtension));
// $newImageName = uniqid() . "." . $imageExtension;
// $targ = "../assets/img/" . $newImageName;
// move_uploaded_file($src, $targ);

// echo $targ;  
?>


<?php
$src = $_FILES["image"]["tmp_name"];
$imageName = $_FILES["image"]["name"];
$imageExtension = explode('.', $imageName);
$imageExtension = strtolower(end($imageExtension));
$newImageName = uniqid() ."." .$imageExtension;
$targ = "../assets/img/cardFP/" . $newImageName;
move_uploaded_file($src, $targ);

echo $targ;
?>
