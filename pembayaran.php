<?php
  // session_start();

 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/title.png" type="image/x-icon">

    <title>Pembayaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    body{
      font-family: 'Montserrat', sans-serif;
    }
    .lupa:hover {
        filter: opacity(75%);
    }
   body {
    background: #e8cbc0;
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
    min-height: 100vh;
}
.latar{
    background: #e8cbc0;
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
}
.white{
    background-color: white;
}

  </style>
  <title>Halaman Pembayaran</title>
</head>
<body>
  <?php 
  // include "header.php";
  session_start();
  include('config/db.php');
  include('functions.php');

    $get_user = $_SESSION["login"];
  $username = mysqli_query($connection, "SELECT * FROM tbl_user WHERE email='$get_user' ");
  $user = mysqli_fetch_array($username);
  $nama = $user["username"];
  $Pembayaran = mysqli_query($connection, "SELECT * FROM tabel_pembayaran WHERE nama_pelanggan = '$nama'");
  $bayar = mysqli_num_rows($Pembayaran);
  // var_dump($bayar);

  if ($bayar > 0) {
    header("location: cart.php");
  }


if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }

  $get_user = $_SESSION["login"];
  $username = mysqli_query($connection, "SELECT * FROM tbl_user WHERE email='$get_user' ");
  $user = mysqli_fetch_array($username);
  $nama = $user["username"];


    if(isset($_POST["bayar"])){
    $alamat     = $_POST["alamat"];
    // $nama_produk   = $_POST["nama_produk"];
    $kota           = $_POST["kota"];
    $kodepos          = $_POST["kodepos"];
    $negara           = $_POST["negara"];

    $insert = mysqli_query($connection, "INSERT INTO tabel_pembayaran VALUES(NULL, '$nama', '$alamat', '$kota', '$kodepos', '$negara')");
    if ($insert) {
       header("Location: metode-pembayaran.php");
    }

  }


  ?>

  <header id="header" class="">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light latar">
        <?php if(!isset($_SESSION['login'])) { ?>

        <p class="font-rale font-size-12 text-black-50 m-0">login sebagai tamu</p>
        <div class="font-rale font-size-14">
            <a href="login.php?from=header" class="px-3 border-right border-left text-dark">Login</a>
            <!-- <a href="#" class="px-3 border-right text-dark">Whishlist (0)</a> -->
        </div>

          <?php }else{ ?>

        <p class="font-rale font-size-12 text-black-50 m-0"><?= "Welcome : " . $_SESSION['login'] . "" ?></p>
        <div class="font-rale font-size-14">
            <a href="login.php?logout=logout" class="px-3 border-right border-left text-dark">Log Out</a>
        </div>
        

    <?php } ?>
    </div>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
        <?php if(isset($_SESSION['login'])) { ?>
                    <form action="" class=" navbar-brand font-size-14 font-rale">
                        <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                            <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                            <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getCart('cart')); ?></span>
                        </a>
                    </form>
            <?php } ?>
    <a class="navbar-brand" href="index.php">AYOFA</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0 m-auto font-rubik">
        <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
            <!--     <li class="nav-item">
                    <a class="nav-link" href="#">Halaman Produk</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="daftar_pelanggan.php">Daftar Pelanggan </a>
                </li>
              <!--   <li class="nav-item">
                    <a class="nav-link" href="#">Identitas Mahasiswa</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="identitas_perusahaan.php">Identitas Perusahaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
      </ul>
       
    </div>
  </div>
</nav>
    <!-- !Primary Navigation -->

</header>

        <div class="container">
            <div class="row justify-content-center">
            	<div class="col-md-6 border mt-4 shadow-sm white">
                    <h2 class="heading-section text-center">Halaman Pembayaran</h2>
            		<form action="#" class="signin-form" method="post">
                               <div class="form-group mb-3">
                            <label class="label" for="alamat">Alamat</label>
                            <input style="border: 1px solid black;" type="alamat" id="alamat" name="alamat" class="form-control" placeholder="alamat" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="kota">Kota</label>
                            <input style="border: 1px solid black;" type="kota" id="kota" name="kota" class="form-control" placeholder="Kota" required>
                        </div>
                    <div class="form-group mb-3">
                        <label class="label" for="kodepos">Kode Pos</label>
                      <input style="border: 1px solid black;" type="kodepos" id="kodepos" name="kodepos" class="form-control" placeholder="Kode Pos" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="negara">Negara</label>
                      <input style="border: 1px solid black;" type="negara" id="negara" name="negara" class="form-control" placeholder="Negara" required>
                    </div>
                    <div class="form-group">
                        <button name="bayar" type="submit" class="form-control btn rounded submit px-3" style="background-color: #00A5C4">Lanjutkan</button>      
                        <!-- <a style="background-color: #00A5C4; color: black" type="submit" name="bayar" href="metode-pembayaran.php" class="form-control btn rounded submit px-3 mt-2">Lanjutkan</a>    -->          
                    </div>
                  </form>
            	</div>               
            </div>
        </div>

    <script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>
</body>
</html>

