<?php 
session_start();

include_once 'resources/db.php';
$user=$_SESSION['userID'];

$store_query ="SELECT s_id FROM store WHERE s_u_id='$user'";
$row = mysqli_fetch_array(mysqli_query($conn, $store_query ));
$store=$row['s_id'];



$name=$_POST['name'];
$description=$_POST['desc'];
$price=$_POST['price'];
$quantity=$_POST['qty'];
$category=$_POST['cat'];


$add_query ="INSERT INTO products(p_name,description,price,quantity,p_s_id,p_c_id) VALUES('$name','$description',$price,$quantity,'$store','$category')";
$add_result = mysqli_query($conn, $add_query);

if($add_result){
    echo "Item Added";
}
else{
    echo "Item Cannot Added";
}

?>