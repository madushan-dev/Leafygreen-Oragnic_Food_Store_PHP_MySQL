<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading">Cart</h1>
</section>

<section class="mt-5 ">
    <form class="form" method="POST">
        <div class="row checkout-form">
            <div class="col-8">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter Name" required>

                </div>
                <div class="form-group">
                    <label for="address1">Address Line 1</label>
                    <input type="text" class="form-control" id="add1" name="add1"aria-describedby="name" placeholder="Enter Address Line 1" required>

                </div>
                <div class="form-group">
                    <label for="address2">Address Line 2</label>
                    <input type="text" class="form-control" id="add2" name="add2" aria-describedby="name" placeholder="Enter Address Line 2">

                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" aria-describedby="name" placeholder="Enter City" required>

                </div>


                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="name" placeholder="Enter Phone Number" required>

                </div>


            </div>
            <div class="col-4 d-flex">
                <div class="cart-summary justify-content-center w-100">
                    <h2>Your Order</h2>
                    <table class="table complete-order">
                        <?php
                        if(isset($_GET['total']))
                        {
                            $subtotal=$_GET['total'];
                        
                         }
                         else{
                            $subtotal=0;
                         }
                        ?>
                        <tbody>
                            <tr>
                                <th scope="row">Subtotal</th>
                                <td>Rs. <?php echo $subtotal;?>.00</td>

                            </tr>
                            <tr>
                                <th scope="row">Tax</th>
                                <td>Rs. <?php echo (($subtotal*10)/100);?> (10%)</td>

                            </tr>
                            <tr class="total">
                                <th scope="row">Total</th>
                                <td>Rs. <?php echo ( $subtotal+(($subtotal*10)/100));?></td>

                            </tr>
                            <tr>

                            </tr>
                            <tr>


                                <td colspan="2" style="border:none;" class="payment">
                                    <input type="radio" name="payment" value="card"> <label for="card">Card Payment</label><br>
                                    <input type="radio" name="payment" value="bank"> <label for="card">Bank Deposit</label><br>
                                    <input type="radio" name="payment" value="cod"> <label for="cod">Cash on Delivery</label>
                                    <input type="submit" class="btn btn-success" name="submit" value="Complete Order">

                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </form>

</section>
<?php
if(isset($_POST['submit'])){

    $user= 2;
    $name= $_POST['name'];
    $address= $_POST['add1']." ".$_POST['add2'];
    $city= $_POST['city'];
    $phone= $_POST['phone'];
    $type= $_POST['payment'];

    $checkout_query ="INSERT INTO orders(total_payment,payment_type,address,o_u_id) VALUES('$subtotal','$type','$address','$user')";
   
   if($subtotal>0){

    $checkout_result = mysqli_query($conn, $checkout_query);
    if($checkout_result){  
        $update_cart="UPDATE cart SET status=0 WHERE cart_u_id='$user'";
        $update_cart_result = mysqli_query($conn, $update_cart);
        if( $update_cart_result){
            echo "<p class='cart-msg'>Order Placed Successfully!</p>";
        }
    }
   }
    else{
        echo "<p class='cart-msg'>No Products in the cart!</p>";
    }
   
   
 




}


?>


<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->