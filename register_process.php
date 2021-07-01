<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    
    

    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $email = $_POST["regemail"];
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) <= 0) {
        $sql = "SELECT phone_number FROM users WHERE phone_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $phone);
        $phone = $_POST["phone"];
        $stmt->execute();
        $result = $stmt->get_result();

        if(mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO users (name, email, phone_number, type, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name,$email,$phone,$type,$password);
            $name = $_POST["name"];
            $password = $_POST["regpassword"];
            $type = $_POST["usertype"];
            if ($stmt->execute() === TRUE) {
                echo("regsuccess");
                $sql = "SELECT u_id,type FROM users WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = mysqli_fetch_assoc($result);
                $_SESSION["userID"] = $row["u_id"];
            } else {
                echo("regerror");
            }
        }
        else {
            echo("phone");
        }
    }
    else {
        echo("email");
    }
?> 

 
