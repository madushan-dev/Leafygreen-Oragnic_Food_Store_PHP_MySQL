<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>

<?php
$category_query = "SELECT * FROM category";

$pid=$_GET['pid'];
$product_query = "SELECT products.image,products.p_name,products.price,products.quantity,products.description,store.s_name as vendor,category.c_name as category FROM products,category,store WHERE p_id='$pid' AND products.p_s_id=store.s_id AND p_c_id=category.c_id";

$product_result = mysqli_query($conn, $product_query);;
$row = mysqli_fetch_assoc($product_result);

$name = $row['p_name'];
$price=$row['price'];
$category=$row['category'];
$vendor=$row['vendor'];
$quantity=$row['quantity'];
$description=$row['description'];
?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading"><?php echo $name?></h1>
</section>

<section class="mt-5 ">
    <div class="row ">
        <div class="col-5">
        <img class="img-fluid" src="images/products/<?php echo $row['image']?>" alt="">

        </div>
        <div class="col-7 product-details d-flex flex-column justify-content-center align-items-start">
            <p>Price: Rs. <?php echo $price?>.00</p>
            <p>Category: <?php echo $category?></p>
            <p>Vendor: <?php echo $vendor?></p>
            <form action="" class="form quantity-selector my-4">
                <label for="quantity">Select Quantity</label>
                <select name="quantity" id="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

            </form>
            <a href="#" class="btn btn-success btn-lg px-4 py-3 add-to-cart" role="button">Add to cart</a>

        </div>
        <div class="product-description mt-5">
            <h2>Description</h2>
            <p><?php echo $description?></p>
        </div>
    </div>


</section>





<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->