<?php



session_start();


include_once 'resources/db.php';


    

    $sql = "SELECT * FROM users WHERE u_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("cc", $uid);
    $uid = $_SESSION["userID"];
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) == 1) {
        if($_POST["name"] != null){
            $sql = "UPDATE users SET name = ? WHERE u_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("cc",$name, $uid);
            $name = $_POST["name"];
            $uid = $_SESSION["userID"];
            if ($stmt->execute() === TRUE) {
                echo "Name updated";
            }
        }else {
            echo "empty";
        }

        if($_POST["email"] != null){
            $sql = "UPDATE users SET email = ? WHERE u_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("cc",$email, $uid);
            $email = $_POST["email"];
            $uid = $_SESSION["userID"];
            if ($stmt->execute() === TRUE) {
                echo "email updated";
            }
        }else {
            echo "empty";
        }

        if($_POST["password"] != null){
            $sql = "UPDATE users SET password = ? WHERE u_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("cc",$password, $uid);
            $password = $_POST["password"];
            $uid = $_SESSION["userID"];
            if ($stmt->execute() === TRUE) {
                echo "password updated";
            }
        }else {
            echo "empty";
        }

        if($_POST["phone"] != null){
            if (strlen($_POST["phone"]) == 10){
                if(is_numeric($_POST["phone"])){
                    $sql = "UPDATE users SET phone_number = ? WHERE u_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("cc",$phone, $uid);
                    $phone = $_POST["phone"];
                    $uid = $_SESSION["userID"];
                    if ($stmt->execute() === TRUE) {
                        echo "phone number updated";
                    }
                }else{
                    echo "not a valid phone number";
                }
               
            }else{
                echo "not a valid phone number";
            }
            
        }else {
            echo "empty";
        }


    }else{
        echo "error";
    }
?> 

 
