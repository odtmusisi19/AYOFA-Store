
<?php 
    // session_start();

    
   

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bs/bootstrap.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    
    <link rel="stylesheet" href="login/css/style.css">  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    body{
      font-family: 'Montserrat', sans-serif;
    }
    .lupa:hover {
        filter: opacity(75%);
    }
    .black{
      color:black;

    }
.posisi{
  
}

@media screen and (max-width: 766px) {
  .posisi{
    margin-top: 0px;
  }
  
}


  </style>
  <title>Place Order</title>
</head>
<body>
<?php 
    include 'config/db.php';
// if(!isset($_SESSION["login"])){
//     header("Location: index.php");
//     exit;
//   }
   include "header.php"; 
   $username = $_SESSION['login'];
  
   $id = mysqli_query($connection, "SELECT id FROM tbl_user WHERE email='$username'");
    while($row = mysqli_fetch_array($id)) 
   $real_id = $row['id']; 
    $carts = mysqli_query($connection, "SELECT * FROM cart WHERE user_id = $real_id");
    $all_cart = mysqli_num_rows($carts);
    var_dump($all_cart);
   if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  } 

  //BAGIAN PELANGGAN
  $get_user = $_SESSION["login"];
  $username = mysqli_query($connection, "SELECT * FROM tbl_user WHERE email='$get_user' ");
  $user = mysqli_fetch_array($username);
  $nama = $user["username"];

  //BAGIAN KIRIM KE
  $pembayaran = mysqli_query($connection, "SELECT * FROM tabel_pembayaran WHERE nama_pelanggan='$nama' ");
  $bayar = mysqli_fetch_array($pembayaran);

 ?>
     
        <div class="container mt-5">
            <div class="row justify-content-start" style="background-color: #00A5C4">
              <div class="col-md-4">
                <i class="bi bi-person" style="font-size: 30px"></i>
                <h3>Pelanggan</h3>
                <p class="black">
                  <?= $user["username"]; ?> <br>
                 <?= $get_user ?>
               </p>
                <!-- <p class="black"></p> -->
              </div>  
              <div class="col-md-4">
                <i class="bi bi-truck" style="font-size: 30px"></i>
                <h3>Info Pemesanan</h3>
                <p class="black">Pengiriman : Indonesia <br>
                    Metode Pembayaran : Paypal
                </p>
              </div>   
              <div class="col-md-4">
                <i class="bi bi-geo-alt" style="font-size: 30px"></i>
                <h3>Kirim Ke</h3>
                <p class="black">Alamat : <?= $bayar['kota'] ?>, <?= $bayar['alamat'] ?>,<br> <?= $bayar['kode_pos'] ?></p>

              </div>               
            </div>

           
   <!--  -->
            <div class="row justify-content-start p-2 mt-3 border white" >
               <?php
                    foreach ($product->getCart('cart') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
               <div class="col-md-8">
                  <div class="row" style="border-bottom: 2px silver solid;">
                  <div class="col-md-3">
                <img width="100" src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="Kosong" style="margin-top: ">
              </div>
              <div class="col-md-4">
                <h6 class="black mt-3"><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
              </div>
              <div class="col-md-5">
                <table class="table text-center">
                    <tr>
                      <!-- <th>Kuantitas</th> -->
                      <th>Harga</th>
                    </tr> 
                    <tr>
                      <!-- <td>1</td> -->
                      <td>
                        
                        &nbsp; <span class="text-dark">$<span class="text-dark" id="deal-price"><?php echo $item['item_price'] ?? 0; ?></span> </span> </h5>
                      </td>
                    </tr>
                </table>
              </div>
                </div>
               </div>

               <?php
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
                <div class="col-md-4 ">
                <table class="table posisi" style="background: #F3F3F3; margin-top:<?= ($all_cart - 1 ) * -116 ?>px;">
                 
                    <tr>
                      <th scope="col">Banyak Barang</th>
                      <td style="font-weight: bold; ">&nbsp; <?= $all_cart ?? 0; ?></td>
                    </tr>
                  <tbody>
                    <tr>
                      <th scope="row">Ongkos Kirim</th>
                      <td>&nbsp; <span class="text-dark">$<span class="text-dark" id="deal-price"><?= round(($Cart->getSum($subTotal)) / ($all_cart * 10))  ?></span> </span> </td>
                    </tr>
                   <!--  <tr>
                      <th scope="row">Pajak</th>
                      <td>Rp. </td>
                    </tr> -->
                      
                    <tr>
                      <th scope="row">Total Awal</th>
                      <td>&nbsp; <span class="text-dark">$<span class="text-dark" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span>
                         </td>
                    </tr>
                    <tr>
                      <th scope="row" style="color: red">Total</th>
                      <td>&nbsp; <span class="text-dark">$<span class="text-dark" id="deal-price"><?= ($Cart->getSum($subTotal) + round(($Cart->getSum($subTotal)) / ($all_cart * 10))) ?></span> </span>
                         </td>
                    </tr>
                  </tbody>
                </table>
                
                
              </div>
               
              
 <form action="#" class="signin-form" method="post">                  
                    <div class="form-group">
                        <!-- <button name="login" type="submit" class="form-control btn rounded submit px-3" style="background-color: #00A5C4">Lanjutkan</button> -->      
                        <a style="background-color: #00A5C4; color: white; font-size: 20px" href="memesan.php" class="form-control btn rounded submit px-3 mt-2">Memesan</a>             
                    </div>
                  </form>
            </div>
       

               <!--  <div class="row justify-content-end ">
                  <div class="col-md-4 p-3 mt-1 border">
                    <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                  </div>
                </div> -->
                
               

        </div>

    <script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>
</body>
</html>