<?php
#Starting sessions
session_start();

#File upload code
if($_FILES['file']['name'] != ''){
    $test = explode('.', $_FILES['file']['name']);
    $extension = end($test);    
    $name = rand(1,99999).'.'.$extension;
    $_SESSION["storeimg"] = $name;
    $location = 'images/stores'.$name;
    move_uploaded_file($_FILES['file']['tmp_name'], $location);
}
?>