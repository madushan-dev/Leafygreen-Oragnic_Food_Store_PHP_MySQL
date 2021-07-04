<!-- Starting sessions -->
<?php session_start(); ?>
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

                    <a href="buyer.php"><button type="button" class="list-group-item list-group-item-action menu-active">Dashboard</button></a>
                    <a href="buyer-purchased.php"><button type="button" class="list-group-item list-group-item-action">My Purchased</button></a>
                    <a href="buyer-edit.php"><button type="button" class="list-group-item list-group-item-action">Edit Profile</button></a>


                </div>


            </div>


        </div>
        <div class="col-9 dashboard-overview d-flex justify-content-center align-items-center pt-5">

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