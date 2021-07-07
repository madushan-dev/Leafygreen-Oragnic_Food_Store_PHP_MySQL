<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading">All Vendors</h1>
</section>

<section class="mt-5">
    <div class="row">
        <div class="vendors-grid d-flex justify-content-center">

                    <?php
                    $vendor_query = "SELECT store.s_id,store.s_name,count(products.p_s_id) as products FROM store,products where store.s_id = products.p_s_id GROUP BY products.p_s_id";
                    $vendor_result = mysqli_query($conn, $vendor_query);;
                    while ($row = mysqli_fetch_assoc($vendor_result)) {
                    ?>

                    <div>
                        <img src="https://img.etimg.com/thumb/msid-75214721,width-1200,height-900/industry/services/retail/future-group-negotiates-rents-for-its-1700-stores.jpg" alt="">
                        <h2 class="vendor-title"><a href="vendor.php?id=<?php echo $row['s_id']?>"><?php echo $row['s_name']?> | <?php echo $row['products']?> Products</a></h2>
                    </div>

                    <?php } ?>



        </div>
        <div class="load-more pt-5 btn-center "><a href="#" class="btn btn-danger btn-lg w-100" role="button">Load More</a></div>

    </div>


</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->