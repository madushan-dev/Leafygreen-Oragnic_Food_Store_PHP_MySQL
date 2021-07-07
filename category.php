<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
        <?php
                    $category_query = "SELECT * FROM category";
                    $category_result = mysqli_query($conn, $category_query);;

                    $category=$_GET['cat'];
                    $product_query ="SELECT products.p_id,products.p_name,products.description,products.price,products.quantity,products.image,store.s_name as store FROM products,store WHERE products.p_s_id=store.s_id ORDER BY p_id DESC LIMIT 9";
                    $total= mysqli_num_rows($product_result = mysqli_query($conn, $product_query));
         
        ?>
<h2><?php echo $total?> Products Available </h2>
</section>



<section class="mt-5 ">
    <div class="row">
        <div class="col-3 main-categories">

        <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action bg-success title">
                        All Categories
                    </button>
                    <?php
                    while ($row = mysqli_fetch_assoc($category_result)) {
                    ?>

                        <a href="category.php?cat=<?php echo ($row['c_id']) ?>"><button type="button" class="list-group-item list-group-item-action" name="<?php echo ($row['c_id']) ?>"><?php echo ($row['c_name']) ?></button></a>

                    <?php } ?>

        </div>

    
        </div>
        <div class="col-9">


            <div class="product-row shop-products">
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
                   <?php $last =  $row['p_id'];?>    

            <?php } ?>

            </div>
            <div class="load-more pt-5 btn-center "><a href="#" id="loadmore" class="btn btn-danger btn-lg w-100" role="button" data-id="<?php echo $last ?>">Load More</a></div>


        </div>

    </div>



</section>





<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->