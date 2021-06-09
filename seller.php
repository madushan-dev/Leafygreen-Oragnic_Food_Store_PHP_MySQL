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

                    <a href="admin.php"><button type="button" class="list-group-item list-group-item-action menu-active">Dashboard</button></a>
                    <a href="seller-products.php"><button type="button" class="list-group-item list-group-item-action ">Products</button></a>
                    <a href="seller-orders.php"> <button type="button" class="list-group-item list-group-item-action ">Orders</button></a>
                    <a href="seller-purchased.php"> <button type="button" class="list-group-item list-group-item-action">My Purchased</button></a>
                    <a href="seller-edit.php"> <button type="button" class="list-group-item list-group-item-action">Edit Profile</button></a>


                </div>


            </div>


        </div>
        <div class="col-9 dashboard-overview d-flex justify-content-center align-items-center pt-5">
            <div style="background-color: #3498db;">
                <h2>Revenue</h2>
                <h3>R.s 30,000</h3>

            </div>

            <div style="background-color: #2c3e50;">
                <h2>Products</h2>
                <h3>10</h3>
            </div>
            <div style="background-color: #8e44ad;">
                <h2>Orders</h2>
                <h3>15</h3>
            </div>
            <div style="background-color: #f1c40f;">
                <h2>Purchased</h2>
                <h3>10</h3>
            </div>



        </div>

    </div>



</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->