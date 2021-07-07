<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
<?php           $sid=$_GET['id'];
                $vendor_query = "SELECT * FROM store WHERE s_id='$sid'";
                $vendor_result = mysqli_query($conn, $vendor_query);
                $row = mysqli_fetch_assoc($vendor_result); ?>

    <h1 class="page-heading"><?php echo $row['s_name']?></h1>
</section>

<section class="mt-5 ">
    <div class="row ">



        <div class="col-4 vendor-image">
            <img class="img-fluid" src="https://img.etimg.com/thumb/msid-75214721,width-1200,height-900/industry/services/retail/future-group-negotiates-rents-for-its-1700-stores.jpg" alt="">

        </div>
        <div class="col-8 vendor-details d-flex flex-column justify-content-center px-5">
            <p><i class="fa fa-phone-square"></i> <?php echo $row['s_phone_number']?></p>
            <p class="description"> <?php echo $row['s_description']?></p>


        </div>
    </div>


</section>

<section class="mt-5">

    <div class="row">
        <h2 class="category-title" style="font-size:2rem">Vendor Products </h2>

            <?php
                $product_query = "SELECT products.p_id,products.p_name,products.description,products.price,products.quantity,products.image,store.s_name as store FROM products,store WHERE s_id='$sid' AND products.p_s_id=store.s_id ORDER BY p_id DESC LIMIT 8";

                $product_result = mysqli_query($conn, $product_query);

            ?>
            
    
        <div class="product-row mt-3">
            <?php
                 while ($row = mysqli_fetch_assoc($product_result)) {
                    ?>

                    <div>
                    <img class="img-fluid" src="images/products/<?php echo $row['image']?>" alt="">
                        <small>
                            <h4 class="row-category"><?php echo $row['store'];?></h4>
                        </small>
                    <h3 class="row-title"><a href="product.php?pid=<?php echo $row['p_id']?>"><?php echo $row['p_name'] ?></a></h3>
                        <p class="row-description"><?php echo $row['description'] ?></p>
                        <p class="row-price">රු. <?php echo $row['price'].".00" ?></p>
                        <a href="#" class="btn btn-success btn-lg px-4 py-3 add-to-cart" role="button">Add to cart</a>
                    </div>

                    <?php } ?>

        </div>

    </div>

</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->