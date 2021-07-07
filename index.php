<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
    <div class="container col">
        <form class="form d-flex justify-content-center flex-fill">
            <div class="mb-3 flex-1 col-2">

                <select class="form-select form-control p-3 py-3" id="cat">
                    <option selected value="all">Select Category</option>
                    <?php
                    $category_query = "SELECT * FROM category";
                    $category_result = mysqli_query($conn, $category_query);;
                    while ($row = mysqli_fetch_assoc($category_result)) {
                    ?>

                        <option value="<?php echo ($row['c_id']) ?>"><?php echo ($row['c_name']) ?></option>

                    <?php } ?>
                </select>

            </div>
            <div class="mb-3 col-6">

                <input type="text" name="search_text" id="search_text" class="form-control p-3 py-3 pl-5" placeholder="Enter item name">
                <div id="result"></div>
            </div>

            <div class="mb-3">

                <input type="button" class="form-control btn btn-success p-3 py-3" value="Search">
            </div>
        </form>

    </div>
</section>

<section class="hero">
    <div class="main-categories">
        <div class="row">
            <div class="col col-md-3">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action bg-success title">
                        All Categories
                    </button>
                    <?php
                    $category_result = mysqli_query($conn, $category_query);;
                    while ($row = mysqli_fetch_assoc($category_result)) {
                    ?>

                        <a href="category.php?cat=<?php echo ($row['c_id']) ?>"><button type="button" class="list-group-item list-group-item-action" name="<?php echo ($row['c_id']) ?>"><?php echo ($row['c_name']) ?></button></a>

                    <?php } ?>

                </div>


            </div>
            <div class="col col-md-9">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid" src="images/banners/1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="images/banners/5.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid" src="images/banners/2.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------- organic foods products--------->

<section class="foods space ">
    <div class="row">
        <h2 class="category-title">Latest Oragnic Vegitables </h2>

        <div class="product-row">
        <?php
                    $vegitable_query ="SELECT products.p_id,products.p_name,products.description,products.price,products.quantity,products.image,store.s_name as store FROM products,store WHERE p_c_id='2' AND products.p_s_id=store.s_id ORDER BY p_id DESC LIMIT 4";
                    $vegitalble_result = mysqli_query($conn, $vegitable_query);
                    while ($row = mysqli_fetch_assoc($vegitalble_result)) {
                    ?>

            <div>
            <img class="img-fluid" src="images/products/<?php echo $row['image']?>" alt="">
                <small>
                    <h4 class="row-category"><?php echo $row['store'] ?></h4>
                </small>
                <h3 class="row-title"><a href="product.php?pid=<?php echo $row['p_id']?>"><?php echo $row['p_name'] ?></a></h3>
                <p class="row-description"><?php echo $row['description'] ?></p>
                <p class="row-price">රු. <?php echo $row['price'].".00" ?></p>
                <a href="#" class="btn btn-success btn-lg px-4 py-3 add-to-cart" role="button">Add to cart</a>
            </div>


                    <?php } ?>
         


        </div>

    </div>

    </div>



</section>
<!--------- organic Spices products--------->
<section class="spices space">
    <div class="row">
        <h2 class="category-title">Latest Organic Spices </h2>

        <div class="product-row">
        <?php
                    $spice_query ="SELECT products.p_id,products.p_name,products.description,products.price,products.quantity,products.image,store.s_name as store FROM products,store WHERE p_c_id='1' AND products.p_s_id=store.s_id ORDER BY p_id DESC LIMIT 4";
                    $spice_result = mysqli_query($conn, $spice_query);
                    while ($row = mysqli_fetch_assoc($spice_result)) {
                    ?>

            <div>
                <img class="img-fluid" src="images/products/<?php echo $row['image']?>" alt="">
                <small>
                    <h4 class="row-category"><?php echo $row['store']?></h4>
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


<!--------- organic Fruits products--------->

<section class="foods space">
    <div class="row">
        <h2 class="category-title">Latest Oragnic Fruits </h2>

        <<div class="product-row">
        <?php
                    $fruit_query ="SELECT products.p_id,products.p_name,products.description,products.price,products.quantity,products.image,store.s_name as store FROM products,store WHERE p_c_id='3' AND products.p_s_id=store.s_id ORDER BY p_id DESC LIMIT 4";
                    $fruit_result = mysqli_query($conn, $fruit_query);
                    while ($row = mysqli_fetch_assoc($fruit_result)) {
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

    </div>



</section>




<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->

<script>
 
$(document).ready(function(){
    var cat= "all";
    $('#cat').change(function(){
        cat = $(this).val();
    });


    $('#search_text').keyup(function(){
        
        var txt = $(this).val();
         if(txt != '')
         {
            $("#result").show();
            $('#result').html('');
            $.ajax({
                url:"livesearch.php",
                method:"post",
                data:{search:txt,category:cat},
                dataType:"text",
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
     
         }
         else{
            $("#result").hide();
        }
     
    });
});




</script>
