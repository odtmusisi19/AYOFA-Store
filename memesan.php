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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">
      </script>
      <script>
      $(document).ready(function(){
        $("button").live("click", function(){
          var a = 1;
          $(".show").slideToggle();
        });
      });
</script>
  <style>
    .tinggi{
    height: 50px;
    border: 1px solid black;
  }
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
	margin-top: -116px;
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
  //   header("Location: index.php");
  //   exit;
  // }
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
                <p style="background-color: red; padding: 10px; font-weight: bold; color: white;">Tidak dibayarkan</p>
              </div>   
              <div class="col-md-4">
                <i class="bi bi-geo-alt" style="font-size: 30px"></i>
                <h3>Kirim Ke</h3>
                <p class="black">Alamat : <?= $bayar['kota'] ?>, <?= $bayar['alamat'] ?>,<br> <?= $bayar['kode_pos'] ?></p>
                <p style="background-color: red; padding: 10px; font-weight: bold; color: white;">Tidak terkirim</p>

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
                <table class="table text-center" >
                    <tr>
                      <th>Total</th>
                    </tr> 
                    <tr>
                      <td><?php echo $item['item_price'] ?? 0; ?></td>
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
              <div class="col-md-4 posisi" style="">
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
                <a style="background-color: #F2BA36; color: white; font-size: 20px" href="https://www.sandbox.paypal.com/checkoutnow?sessionID=uid_3866306a5a_mdi6nda6mdg&buttonSessionID=uid_067aeaa744_mdi6nda6mdg&stickinessID=uid_7470bcd730_mdm6ndk6mtq&inlinexo=false&fundingSource=paypal&buyerCountry=ID&locale.x=id_ID&commit=true&clientID=AdWHLFKBryI5Hur4zLh0iUvFSCoHWPP0n35XRi4FaI2uJ4cYUqR1auwZcQZBiUaLGRkU9dQMB0Nqh0NJ&env=sandbox&sdkMeta=eyJ1cmwiOiJodHRwczovL3d3dy5wYXlwYWwuY29tL3Nkay9qcz9jbGllbnQtaWQ9QWRXSExGS0JyeUk1SHVyNHpMaDBpVXZGU0NvSFdQUDBuMzVYUmk0RmFJMnVKNGNZVXFSMWF1d1pjUVpCaVVhTEdSa1U5ZFFNQjBOcWgwTkoiLCJhdHRycyI6eyJkYXRhLXVpZCI6InVpZF9pcHhxa2R6aWt4cGN1dWdpc2V3eXdmcnFjY3lwenMifX0&xcomponent=1&version=5.0.317&token=9GH89950HU8602129" class="form-control btn rounded submit px-3 mt-2" target="_blank" rel="noreferrer noopener"><img width="80" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAxcHgiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAxMDEgMzIiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaW5ZTWluIG1lZXQiIHhtbG5zPSJodHRwOiYjeDJGOyYjeDJGO3d3dy53My5vcmcmI3gyRjsyMDAwJiN4MkY7c3ZnIj48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDEyLjIzNyAyLjggTCA0LjQzNyAyLjggQyAzLjkzNyAyLjggMy40MzcgMy4yIDMuMzM3IDMuNyBMIDAuMjM3IDIzLjcgQyAwLjEzNyAyNC4xIDAuNDM3IDI0LjQgMC44MzcgMjQuNCBMIDQuNTM3IDI0LjQgQyA1LjAzNyAyNC40IDUuNTM3IDI0IDUuNjM3IDIzLjUgTCA2LjQzNyAxOC4xIEMgNi41MzcgMTcuNiA2LjkzNyAxNy4yIDcuNTM3IDE3LjIgTCAxMC4wMzcgMTcuMiBDIDE1LjEzNyAxNy4yIDE4LjEzNyAxNC43IDE4LjkzNyA5LjggQyAxOS4yMzcgNy43IDE4LjkzNyA2IDE3LjkzNyA0LjggQyAxNi44MzcgMy41IDE0LjgzNyAyLjggMTIuMjM3IDIuOCBaIE0gMTMuMTM3IDEwLjEgQyAxMi43MzcgMTIuOSAxMC41MzcgMTIuOSA4LjUzNyAxMi45IEwgNy4zMzcgMTIuOSBMIDguMTM3IDcuNyBDIDguMTM3IDcuNCA4LjQzNyA3LjIgOC43MzcgNy4yIEwgOS4yMzcgNy4yIEMgMTAuNjM3IDcuMiAxMS45MzcgNy4yIDEyLjYzNyA4IEMgMTMuMTM3IDguNCAxMy4zMzcgOS4xIDEzLjEzNyAxMC4xIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDAzMDg3IiBkPSJNIDM1LjQzNyAxMCBMIDMxLjczNyAxMCBDIDMxLjQzNyAxMCAzMS4xMzcgMTAuMiAzMS4xMzcgMTAuNSBMIDMwLjkzNyAxMS41IEwgMzAuNjM3IDExLjEgQyAyOS44MzcgOS45IDI4LjAzNyA5LjUgMjYuMjM3IDkuNSBDIDIyLjEzNyA5LjUgMTguNjM3IDEyLjYgMTcuOTM3IDE3IEMgMTcuNTM3IDE5LjIgMTguMDM3IDIxLjMgMTkuMzM3IDIyLjcgQyAyMC40MzcgMjQgMjIuMTM3IDI0LjYgMjQuMDM3IDI0LjYgQyAyNy4zMzcgMjQuNiAyOS4yMzcgMjIuNSAyOS4yMzcgMjIuNSBMIDI5LjAzNyAyMy41IEMgMjguOTM3IDIzLjkgMjkuMjM3IDI0LjMgMjkuNjM3IDI0LjMgTCAzMy4wMzcgMjQuMyBDIDMzLjUzNyAyNC4zIDM0LjAzNyAyMy45IDM0LjEzNyAyMy40IEwgMzYuMTM3IDEwLjYgQyAzNi4yMzcgMTAuNCAzNS44MzcgMTAgMzUuNDM3IDEwIFogTSAzMC4zMzcgMTcuMiBDIDI5LjkzNyAxOS4zIDI4LjMzNyAyMC44IDI2LjEzNyAyMC44IEMgMjUuMDM3IDIwLjggMjQuMjM3IDIwLjUgMjMuNjM3IDE5LjggQyAyMy4wMzcgMTkuMSAyMi44MzcgMTguMiAyMy4wMzcgMTcuMiBDIDIzLjMzNyAxNS4xIDI1LjEzNyAxMy42IDI3LjIzNyAxMy42IEMgMjguMzM3IDEzLjYgMjkuMTM3IDE0IDI5LjczNyAxNC42IEMgMzAuMjM3IDE1LjMgMzAuNDM3IDE2LjIgMzAuMzM3IDE3LjIgWiI+PC9wYXRoPjxwYXRoIGZpbGw9IiMwMDMwODciIGQ9Ik0gNTUuMzM3IDEwIEwgNTEuNjM3IDEwIEMgNTEuMjM3IDEwIDUwLjkzNyAxMC4yIDUwLjczNyAxMC41IEwgNDUuNTM3IDE4LjEgTCA0My4zMzcgMTAuOCBDIDQzLjIzNyAxMC4zIDQyLjczNyAxMCA0Mi4zMzcgMTAgTCAzOC42MzcgMTAgQyAzOC4yMzcgMTAgMzcuODM3IDEwLjQgMzguMDM3IDEwLjkgTCA0Mi4xMzcgMjMgTCAzOC4yMzcgMjguNCBDIDM3LjkzNyAyOC44IDM4LjIzNyAyOS40IDM4LjczNyAyOS40IEwgNDIuNDM3IDI5LjQgQyA0Mi44MzcgMjkuNCA0My4xMzcgMjkuMiA0My4zMzcgMjguOSBMIDU1LjgzNyAxMC45IEMgNTYuMTM3IDEwLjYgNTUuODM3IDEwIDU1LjMzNyAxMCBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny43MzcgMi44IEwgNTkuOTM3IDIuOCBDIDU5LjQzNyAyLjggNTguOTM3IDMuMiA1OC44MzcgMy43IEwgNTUuNzM3IDIzLjYgQyA1NS42MzcgMjQgNTUuOTM3IDI0LjMgNTYuMzM3IDI0LjMgTCA2MC4zMzcgMjQuMyBDIDYwLjczNyAyNC4zIDYxLjAzNyAyNCA2MS4wMzcgMjMuNyBMIDYxLjkzNyAxOCBDIDYyLjAzNyAxNy41IDYyLjQzNyAxNy4xIDYzLjAzNyAxNy4xIEwgNjUuNTM3IDE3LjEgQyA3MC42MzcgMTcuMSA3My42MzcgMTQuNiA3NC40MzcgOS43IEMgNzQuNzM3IDcuNiA3NC40MzcgNS45IDczLjQzNyA0LjcgQyA3Mi4yMzcgMy41IDcwLjMzNyAyLjggNjcuNzM3IDIuOCBaIE0gNjguNjM3IDEwLjEgQyA2OC4yMzcgMTIuOSA2Ni4wMzcgMTIuOSA2NC4wMzcgMTIuOSBMIDYyLjgzNyAxMi45IEwgNjMuNjM3IDcuNyBDIDYzLjYzNyA3LjQgNjMuOTM3IDcuMiA2NC4yMzcgNy4yIEwgNjQuNzM3IDcuMiBDIDY2LjEzNyA3LjIgNjcuNDM3IDcuMiA2OC4xMzcgOCBDIDY4LjYzNyA4LjQgNjguNzM3IDkuMSA2OC42MzcgMTAuMSBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5MC45MzcgMTAgTCA4Ny4yMzcgMTAgQyA4Ni45MzcgMTAgODYuNjM3IDEwLjIgODYuNjM3IDEwLjUgTCA4Ni40MzcgMTEuNSBMIDg2LjEzNyAxMS4xIEMgODUuMzM3IDkuOSA4My41MzcgOS41IDgxLjczNyA5LjUgQyA3Ny42MzcgOS41IDc0LjEzNyAxMi42IDczLjQzNyAxNyBDIDczLjAzNyAxOS4yIDczLjUzNyAyMS4zIDc0LjgzNyAyMi43IEMgNzUuOTM3IDI0IDc3LjYzNyAyNC42IDc5LjUzNyAyNC42IEMgODIuODM3IDI0LjYgODQuNzM3IDIyLjUgODQuNzM3IDIyLjUgTCA4NC41MzcgMjMuNSBDIDg0LjQzNyAyMy45IDg0LjczNyAyNC4zIDg1LjEzNyAyNC4zIEwgODguNTM3IDI0LjMgQyA4OS4wMzcgMjQuMyA4OS41MzcgMjMuOSA4OS42MzcgMjMuNCBMIDkxLjYzNyAxMC42IEMgOTEuNjM3IDEwLjQgOTEuMzM3IDEwIDkwLjkzNyAxMCBaIE0gODUuNzM3IDE3LjIgQyA4NS4zMzcgMTkuMyA4My43MzcgMjAuOCA4MS41MzcgMjAuOCBDIDgwLjQzNyAyMC44IDc5LjYzNyAyMC41IDc5LjAzNyAxOS44IEMgNzguNDM3IDE5LjEgNzguMjM3IDE4LjIgNzguNDM3IDE3LjIgQyA3OC43MzcgMTUuMSA4MC41MzcgMTMuNiA4Mi42MzcgMTMuNiBDIDgzLjczNyAxMy42IDg0LjUzNyAxNCA4NS4xMzcgMTQuNiBDIDg1LjczNyAxNS4zIDg1LjkzNyAxNi4yIDg1LjczNyAxNy4yIFoiPjwvcGF0aD48cGF0aCBmaWxsPSIjMDA5Y2RlIiBkPSJNIDk1LjMzNyAzLjMgTCA5Mi4xMzcgMjMuNiBDIDkyLjAzNyAyNCA5Mi4zMzcgMjQuMyA5Mi43MzcgMjQuMyBMIDk1LjkzNyAyNC4zIEMgOTYuNDM3IDI0LjMgOTYuOTM3IDIzLjkgOTcuMDM3IDIzLjQgTCAxMDAuMjM3IDMuNSBDIDEwMC4zMzcgMy4xIDEwMC4wMzcgMi44IDk5LjYzNyAyLjggTCA5Ni4wMzcgMi44IEMgOTUuNjM3IDIuOCA5NS40MzcgMyA5NS4zMzcgMy4zIFoiPjwvcGF0aD48L3N2Zz4" data-v-b01da731="" alt="" role="presentation" class="paypal-logo paypal-logo-paypal paypal-logo-color-blue"> </a> 
                <a style="background-color: #2C2E2F; color: white; font-size: 20px" href="#" id="click"  class="form-control btn show rounded submit px-3 mt-2" onclick="show()">Kartu Kredit</a> 
                 <div id="lihat" style="display: none;">
                  <!-- <label for="alamat">Card Number</label> -->
                   <input style="border: 1px solid black" type="text" id="cardnumber" name="cardnumber" class="form-control tinggi mt-2" placeholder="Card Number" required>
                       <div class="row">
                        <div class="col-md-8">
                          <input style="border: 1px solid black" type="text" id="cardnumber" name="cardnumber" class="form-control tinggi mt-2" placeholder="Card Number" required>
                        </div>
                        <div class="col-md-4">
                          <input style="border: 1px solid black" type="text" id="Expiry date" name="Expiry date" class="form-control tinggi mt-2" placeholder="Expiry date" required>
                        </div>

                     </div>
                     <div class="row">
                        <div class="col-md-8">
                          <input style="border: 1px solid black" type="text" id="Cardholder name:" name=" Cardholder name:" class="form-control tinggi mt-2" placeholder="Cardholder Name" required>
                        </div>
                        <div class="col-md-4">
                          <input style="border: 1px solid black" type="text" id="CVC/CVV" name="CVC/CVV" class="form-control tinggi mt-2" placeholder="CVC/CVV" required>
                        </div>

                     </div>
                       
                 </div>

                
              </div>

            </div>                 
        </div>
        <script>
          function show() {
            var lihat = document.getElementById('lihat');
            lihat.style.display = "block";
          }
        </script>

    <script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>
</body>
</html>