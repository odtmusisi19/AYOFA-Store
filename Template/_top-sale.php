<!-- Top Sale -->
<?php
error_reporting(0);
ini_set('display_errors', 0);
  $username = $_SESSION['login'];
  $id = mysqli_query($connection, "SELECT id FROM tbl_user WHERE email='$username'");
  // var_dump($id);
    while($row = mysqli_fetch_array($id)) 
    $real_id = $row['id']; 
    // echo($real_id);


  

    if (isset($_POST['kelogin'])){
                header("location: login.php?from=header");
        }
    shuffle($product_shuffle);


    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($real_id, $_POST['item_id']);
        }
    }
?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
            <div class="item py-2 white m-2 rounded">
                <div class="product font-rale col-md-12">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price'] ?? '0' ; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php
                            if (in_array($item['item_id'], $Cart->getCartId($product->getCart('cart')) ?? []) && isset($_SESSION['login'])){
                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                            }else{
                                 if(!isset($_SESSION['login'])) {
                                    echo '<button onclick="klik()" name="kelogin" class="btn btn-warning font-size-12">Add to Cart</button>';
                                 }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                 }
                                
                            }
                            ?>

                        </form>
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<script>
    function klik() {
    // alert("anda harus login terlebih dahulu");
      // window.location.href = 'login.php?from=header';
    }
</script>
<!-- !Top Sale -->