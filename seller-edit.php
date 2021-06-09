<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header ">
    <div class="user-bar d-flex justify-content-between align-items-center">
        <h2 class="dashboard-username">Welcome Admin!</h2>
        <a href="#" class="btn btn-danger" role="button">Logout</a>
    </div>
</section>

<section class="mt-5 dashboard">
    <div class="row">
        <div class="col-3">
            <div class="dashboard-menu">

                <div class="list-group">


                    <a href="seller.php"><button type="button" class="list-group-item list-group-item-action ">Dashboard</button></a>
                    <a href="seller-products.php"><button type="button" class="list-group-item list-group-item-action ">Products</button></a>
                    <a href="seller-orders.php"> <button type="button" class="list-group-item list-group-item-action ">Orders</button></a>
                    <a href="seller-purchased.php"> <button type="button" class="list-group-item list-group-item-action">My Purchased</button></a>
                    <a href="seller-edit.php"> <button type="button" class="list-group-item list-group-item-action menu-active">Edit Profile</button></a>

                </div>


            </div>


        </div>
        <div class="col-9 dashboard-orders dashboard-profile-edit">

            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter Name">

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" aria-describedby="name" placeholder="Enter Phone Number">

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>

    </div>



</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->