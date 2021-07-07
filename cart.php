<!-- Including Header -->
<?php include_once 'resources/header.php'; 
session_start();?>
<!---------------------->
<section class="bottom-header">
    <h1 class="page-heading">Cart</h1>
</section>

<div id="cart-details">
    

</div>


<!-- Including Footer -->
<?php include_once 'resources/footer.php'; ?>
<!---------------------->

<script>
 
$(document).ready(function(){
  

            $.ajax({
                url:"loadcart.php",
                method:"post",
                data:{},
                dataType:"text",
                success:function(data)
                {
                    $('#cart-details').html(data);
                }
            });

     
});


</script>

<script>

$(document).delegate(".delete","click",function(e){
    var prdid=$(this).attr( "prid");
    console.log(prdid);
      
     $.ajax({
             url:"loadcart.php",
             method:"post",
             data:{prdid:prdid},
             dataType:"text",
             success:function(data)
             {
                $('#cart-details').html(data);
             }
             
         });
});

</script>