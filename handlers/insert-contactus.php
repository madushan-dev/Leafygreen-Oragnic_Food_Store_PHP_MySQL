<?php
$servername = "81.19.211.39";
$username = "madushan_leafy";
$password = "leafy@123";
$db = "madushan_leafy";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db );

if(isset($_POST['submit'])){

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])  )

    $name = $_POST['name'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $message =$_POST['message'];

    $query = "INSERT INTO inquiry(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    $result = mysqli_query($conn,$query);
    
    if($result){
           //echo <script>alert("  * * * Form submited successfully * * *  ")</script>;
     echo " * * * Form submited successfully * * * ";
    }else{
        //echo <script>alert(" !!! Form not submited !!! ")</script>;
        echo " !!! Form not submited !!! ";}
}
?>
