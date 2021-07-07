<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    $sql = "DELETE FROM orders where o_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$id);
    $id = $_GET["id"];
    $stmt->execute();

?> 

