<?php 
    // session_start();
session_start();
include "config/db.php";

 ?>

<!DOCTYPE html>
<html>

<head>
      <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/title.png" type="image/x-icon">
    <title>About</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap CDN -->
   <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  
    <style>
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
        body {
            background: #e8cbc0;
            background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
            background: linear-gradient(to right, #e8cbc0, #636fa4);
            min-height: 100vh;
        }

        .gambar:hover {
            opacity: 90%;
        }

        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
        }
    </style>
   <?php
    // require functions.php file
    require ('functions.php');
    ?>

</head>

<body>
   <header id="header" class="">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light latar">
        <?php if(!isset($_SESSION['login'])) { ?>

        <p class="font-rale font-size-12 text-black-50 m-0">login sebagai tamu</p>
        <div class="font-rale font-size-14">
            <a href="login.php?from=header" class="px-3 border-right border-left text-dark">Login</a>
            <a href="register.php" class="px-3 border-right  text-dark">Register</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- For demo purpose -->
    <div class="container py-5">
        <div class="row text-center text-white">
            <div class="col-lg-8 mx-auto" data-aos="fade-down" data-aos-duration="1500" data-aos-delay="500">
                <img width="200" src="assets/title.png">
                <!-- <h4 class="display-6">Anggota Tim</h4> -->
                <h4 class="display-7">Developer</h4>
                <small >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</small>

                <!-- <h1 class="display-4">Team Page</h1>
                <p class="lead mb-0">Using Bootstrap 4 grid and utilities, create a nice team page.</p>
                <p class="lead">Snippet by<a href="https://bootstrapious.com/snippets" class="text-white">
                        <u>Bootstrapious</u></a>
                </p> -->
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row text-center justify-content-center">

            <!-- Team item -->
            <div class="col-xl-2  col-sm-6 mb-5 " data-aos="flip-right" data-aos-duration="1300" data-aos-delay="0">
                <!-- <h1>A</h1> -->
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="assets/arif.png" alt="" width="100" class="gambar img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0"><b style="color: #02B5C9">A</b>rif Rahman</h5><!-- <span class="small text-uppercase text-muted">Database</span> -->
                    <p class="text-muted" style="font-size: 10px">1901010106</p>

                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div><!-- End -->

            <!-- Team item -->
            <div class="col-xl-2  col-sm-6 mb-5"  data-aos="flip-right" data-aos-duration="1300" data-aos-delay="500">
                <!-- <h1>Y</h1> -->
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="assets/yusril.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0"><b style="color: #02B5C9">Y</b>usril</h5><!-- <span class="small text-uppercase text-muted">Designer</span> -->
                    <p class="text-muted" style="font-size: 10px">1901010115</p>
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div><!-- End -->

            <!-- Team item -->
            <div class="col-xl-2  col-sm-6 mb-5"  data-aos="flip-right" data-aos-duration="1300" data-aos-delay="1000">
                <!-- <h1>O</h1> -->
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="assets/ogi.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0"><b style="color: #02B5C9">O</b>gi Darma Tena</h5><!-- <span class="small text-uppercase text-muted">Programmer</span> -->
                    <p class="text-muted" style="font-size: 10px">1901010101</p>

                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a target="_blank" href="https://www.facebook.com/ogidarmatena.tena/" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="https://www.youtube.com/channel/UC4EbvULdSkf6HS7_FlGP_Dg" class="social-link"><i class="bi bi-youtube"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="https://www.instagram.com/ogidarmatena/" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div><!-- End -->

            <!-- Team item -->
            <div class="col-xl-2  col-sm-6 mb-5" data-aos="flip-right" data-aos-duration="1300" data-aos-delay="1500">
                <!-- <h1>F</h1> -->
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="assets/papad.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0"><b style="color: #02B5C9">F</b>apad</h5><!-- <span class="small text-uppercase text-muted">System Analist</span> -->
                    <p class="text-muted" style="font-size: 10px">1901010119</p>

                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div><!-- End -->
                <div class="col-xl-2  col-sm-6 mb-5" data-aos="flip-right" data-aos-duration="1300" data-aos-delay="2000">
                    <!-- <h1>A</h1> -->
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="assets/amru.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0"><b style="color: #02B5C9">A</b>mrullah</h5><!-- <span class="small text-uppercase text-muted">System Analist</span> -->
                    <p class="text-muted" style="font-size: 10px">1901010130</p>

                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-youtube"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="social-link"><i class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div><!-- End -->
        </div>
    </div>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>