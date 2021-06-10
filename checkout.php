<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading">Cart</h1>
</section>

<section class="mt-5 ">
    <form action="" class="form">
        <div class="row checkout-form">
            <div class="col-8">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">

                </div>
                <div class="form-group">
                    <label for="address1">Address Line 1</label>
                    <input type="text" class="form-control" id="address" aria-describedby="name" placeholder="Enter Address Line 1">

                </div>
                <div class="form-group">
                    <label for="address2">Address Line 2</label>
                    <input type="text" class="form-control" id="address" aria-describedby="name" placeholder="Enter Address Line 2">

                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" aria-describedby="name" placeholder="Enter City">

                </div>


                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="name" placeholder="Enter Phone Number">

                </div>


            </div>
            <div class="col-4 d-flex">
                <div class="cart-summary justify-content-center w-100">
                    <h2>Your Order</h2>
                    <table class="table complete-order">

                        <tbody>
                            <tr>
                                <th scope="row">Subtotal</th>
                                <td>Mark</td>

                            </tr>
                            <tr>
                                <th scope="row">Tax</th>
                                <td>Jacob</td>

                            </tr>
                            <tr class="total">
                                <th scope="row">Total</th>
                                <td>Jacob</td>

                            </tr>
                            <tr>

                            </tr>
                            <tr>


                                <td colspan="2" style="border:none;" class="payment">
                                    <input type="radio" name="car" value="card"> <label for="card">Card Payment</label><br>
                                    <input type="radio" name="bank" value="bank"> <label for="card">Bank Deposit</label><br>
                                    <input type="radio" name="bank" value="cod"> <label for="cod">Cash on Delivery</label>
                                    <input type="submit" class="btn btn-success" value="Complete Order">

                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </form>

</section>



<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->