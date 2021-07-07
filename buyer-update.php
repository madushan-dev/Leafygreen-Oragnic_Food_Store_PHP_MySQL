<?php
#Ajax need seperate php to handle the requests cz it returns all php elements including html as the server response

#Starting sessions
session_start();

#Including DB Connection
include_once 'resources/db.php';

#PHP for send data to the DB
    

    $sql = "SELECT * FROM users WHERE u_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uid);
    $uid = $_SESSION["userID"];
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) == 1) {
        if($_POST["name"] != null || $_POST["email"] != null || $_POST["phone"] != null || $_POST["password"] != null){
            if(strlen($_POST["password"]) > 8){
                if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    if(is_numeric($_POST["phone"]) || strlen($_POST["phone"]) == 10){
                        $sql = "UPDATE users SET name = ? , email = ? , password = ? , phone_number = ? WHERE u_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sssss", $name, $email, $password, $email, $uid);
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $phone = $_POST["phone"];
                        $password = $_POST["password"];
                        $uid = $_SESSION["userID"];
                        if ($stmt->execute() === TRUE) {
                            echo "Details updated";
                        }
                    }else{
                        echo "invalid phone number";
                    }
                }else{
                    echo "invalid email";
                }
            }else{
                echo "Weak Password";
            }
        }else {
            echo "Fields are empty";
        }

    }else{
        echo "error";
    }
?> 

 
