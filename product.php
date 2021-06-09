<!-- Including Header -->
<?php include_once 'resources/header.php'; ?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading">Product Name</h1>
</section>

<section class="mt-5 ">
    <div class="row ">
        <div class="col-5">
            <img class="img-fluid" src="https://www.astaspice.org/wordpress/wp-content/uploads/2014/01/iStock_000065823839_Large.jpg" alt="">

        </div>
        <div class="col-7 product-details d-flex flex-column justify-content-center align-items-start">
            <p>Price: Rs. 12,00.00</p>
            <p>Category: Spices</p>
            <p>Vendor: New Store</p>
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
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto rem veniam sit iure est repudiandae harum, modi maxime omnis animi magnam libero minima reiciendis maiores perferendis dignissimos, quis molestiae incidunt!</p>
        </div>
    </div>


</section>





<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->