<?php
include_once 'resources/db.php';

$user="2";
$id=$_POST['prid'];
$msg="";

if(isset($user)){

    if(isset($_POST['pcount'])){
        $count=$_POST['pcount'];     
        $cart_query ="INSERT INTO cart(quantity,cart_u_id,cart_p_id,status) VALUES('$count','$user',$id,1)";
        $cart_result = mysqli_query($conn, $cart_query);
    }
    else{
        $cart_query ="INSERT INTO cart(quantity,cart_u_id,cart_p_id,status) VALUES('1','$user',$id,1)";
        $cart_result = mysqli_query($conn, $cart_query);
    
    }


    if($cart_result){
     $msg.='Item added to the cart';
    }else{
       $msg.='Please Login into the website';
    }
    echo $msg;
}


?>