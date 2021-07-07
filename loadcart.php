<?php
include_once 'resources/db.php';

$user="2";

if(isset($_POST['prdid'])){
    $ptd_id=$_POST['prdid'];
    $update_cart="UPDATE cart SET status=0 WHERE cart_u_id='$user' AND cart_p_id='$ptd_id'";
    $update_cart_result = mysqli_query($conn, $update_cart);
}

if(isset($user)){

    $cart_query ="SELECT cart.status,cart.cart_id,SUM(cart.quantity) as quantity ,cart.cart_p_id,products.p_name,products.price,products.image FROM cart,products WHERE cart_u_id=$user AND cart.cart_p_id=products.p_id AND cart.status=1 GROUP BY cart.cart_p_id";
    $cart_result = mysqli_query($conn, $cart_query);
}


if(mysqli_num_rows($cart_result)>0)
{
 
    $output="";

    $output.='<section class="mt-5 ">
    <div class="row">
        <div class="col-8">

            <table class="table cart-table">
                <thead class="mb-5">
                    <tr class="thead">

                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="cart-row">
   ';
   $subtotal=0;
    while ($row = mysqli_fetch_array($cart_result))
    {
        $subtotal= $subtotal+$row['price']*$row['quantity'];

        $output .= '<tr>

        <td class="d-flex  justify-content-around">
            <div class="cart-image">
                <img class="img-fluid" src="images/products/'.$row['image'].'" alt="">
            </div>
            <div class="cart-title ml-2">
                <p>'.$row['p_name'].'</p>
            </div>
        </td>
        <td>Rs. '.$row['price'].'.00</td>
        <td>'.$row['quantity'].'</td>
        <td>Rs. '.$row['price']*$row['quantity'].'.00</td>
        <td class="tools" ><i class="cart-delete fa fa-window-close-o delete px-2" prid="'.$row['cart_p_id'].'"></i></td>
        </td>
    </tr>';

    }


    $output.='
    </tbody>
</table>
</div>
<div class="col-4 d-flex">
<div class="cart-summary justify-content-center w-100">
    <h2>Cart Total</h2>
    <table class="table">

        <tbody>
            <tr>
                <th scope="row">Subtotal</th>
                <td>Rs. '.$subtotal.'.00</td>

            </tr>
            <tr>
                <th scope="row">Tax</th>
                <td>Rs. '.(($subtotal*10)/100).' (10%)</td>

            </tr>
            <tr class="total">
                <th scope="row">Total</th>
                <td>Rs. '.($subtotal+(($subtotal*10)/100)).'</td>

            </tr>
            <tr>

                <td colspan="2" style="border:none;"><a href="checkout.php?total='.$subtotal.'" class="btn btn-success" role="button">Proceed to Checkout</a>

            </tr>

        </tbody>
    </table>
</div>

</div>

</div>


</section>';
    echo $output;
}
else{
    echo '<p class="unavailable">No any products available in cart!</p>';
}

?>