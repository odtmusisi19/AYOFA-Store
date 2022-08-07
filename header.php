<?php 
    // session_start();
session_start();
include "config/db.php";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/title.png" type="image/x-icon">

    <title>AYOFA Store</title>
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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        
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

@media screen and (max-width: 766px) {
  .mobile{
    margin-left: 70px;

  }
}
.navbar-light .navbar-toggler-icon {
  background-image: url("https://png.pngtree.com/element_our/20190530/ourmid/pngtree-correct-icon-image_1267804.jpg");
}
// this is a white icon with 50% opacity
.navbar-dark .navbar-toggler-icon {
  background-image: url("https://png.pngtree.com/element_our/20190530/ourmid/pngtree-correct-icon-image_1267804.jpg");
}

    </style>

    <?php
    // require functions.php file
    require ('functions.php');
    ?>

</head>
<body>

<!-- start #header -->
<header id="header" class="">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light latar">
        <?php if(!isset($_SESSION['login'])) { ?>

        <p class="font-rale font-size-12 text-black-50 m-0">login sebagai tamu</p>
        <div class="font-rale font-size-14">
            <a href="login.php?from=header" class="px-3 border-right border-left text-dark">Login</a>
            <a href="register.php" class="px-3 border-right  text-dark">Register</a>
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
<!-- !start #header -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- start #main-site -->
<main id="main-site">