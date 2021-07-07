<section class="footer">
    <div class="row">
        <div class="col col-md-3">
            <div class="list-group ">


                <img src="images/logo.png" alt="">
                <button type="button" class="list-group-item list-group-item-action">Best organic foods sellers and buyers portal in Sri Lanka. Browse wide range of oragnic foods from sellers in all around Sri Lanka</button>


            </div>

        </div>
        <div class="col col-md-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action footer-title">
                    Menu
                </button>
                <a href="index.php"><button type="button" class="list-group-item list-group-item-action">Home</button></a>
                <a href="about-us.php"> <button type="button" class="list-group-item list-group-item-action">About us</button></a>
                <a href="shop.php"><button type="button" class="list-group-item list-group-item-action">Shop</button></a>
                <a href="vendors.php"> <button type="button" class="list-group-item list-group-item-action">Vendors</button></a>
                <a href="contact-us.php"><button type="button" class="list-group-item list-group-item-action">Contact us</button></a>


            </div>



        </div>
        <div class="col col-md-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action footer-title">
                    Categories
                </button>
                <?php
                    $category_query = "SELECT * FROM category";
                    $category_result = mysqli_query($conn, $category_query);;
                    while ($row = mysqli_fetch_assoc($category_result)) {
                    ?>

                        <a href="category.php?cat=<?php echo ($row['c_id']) ?>"><button type="button" class="list-group-item list-group-item-action" name="<?php echo ($row['c_id']) ?>"><?php echo ($row['c_name']) ?></button></a>

                    <?php } ?>

          

            </div>



        </div>
        <div class="col col-md-3">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action footer-title">
                    Contact Details
                </button>
                <button type="button" class="list-group-item list-group-item-action">Email: info@leafygreen.com</button>
                <button type="button" class="list-group-item list-group-item-action">Phone: 076 6666 777</button>
                <button type="button" class="list-group-item list-group-item-action">Address: Kamurupitiya, Matara</button>

                <div>
                    <i class="fa fa-facebook-official"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-twitter-square"></i>

                </div>



            </div>
        </div>



    </div>


    </div>
    <div class="footer-bar bg-success">
        <p>&copy;2021 Dep. of ICT Faculty of Technology. University of Ruhuna</p>
    </div>

</section>



<!-- JavaScript Bundle with Popper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>


</html>