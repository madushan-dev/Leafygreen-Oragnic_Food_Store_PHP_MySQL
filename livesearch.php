<?php
include_once 'resources/db.php';

if($_POST["category"]=="all"){

    $product_query ="SELECT * FROM products WHERE p_name LIKE '%".$_POST["search"]."%' LIMIT 5";
}
else{
    $product_query ="SELECT * FROM products WHERE p_name LIKE '%".$_POST["search"]."%' AND p_c_id=".$_POST["category"]." LIMIT 5";
   
}

$output='';
$product_result = mysqli_query($conn, $product_query);

if(mysqli_num_rows($product_result)>0)
{
 

    while ($row = mysqli_fetch_array($product_result))
    {
        $output .= '<div class="search-result-row"><a href="product.php?pid='.$row["p_id"].'">'.$row["p_name"]." | R.s ".$row["price"].".00".'</div>';
    }
    echo $output;
}
else{
    echo '<p class="unavailable">Product is not available!</p>';
}

?>