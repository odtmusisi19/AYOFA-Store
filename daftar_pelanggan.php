<?php 
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include 'config/db.php';

  $id = mysqli_query($connection, "SELECT * FROM tbl_user ");
    
    // var_dump($row['id']);
  $index = 0;
 ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/title.png" type="image/x-icon">

    <title>Daftar Pelanggan</title>
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
    <link rel="stylesheet" type="text/css" href="pelanggan.css">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
      body{
        background: #e8cbc0;
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
    min-height: 100vh;
      }
      .white{
      	background-color: white;
      }
      .bingkai{
      	border: 2px black solid;
      	text-align: center;
      }
      .kepala{
      	color: blue;
      }
      .atas{
      	background: #e8cbc0;
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
      }
<?php include 'functions.php'; ?>
    </style>
    <!-- <title>Identias Perusahaan</title> -->
  </head>
  <body>
<header id="header" class="">
    <div style="margin-top: -20px" class="strip d-flex justify-content-between px-4 py-1 bg-light atas">
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
<div class="container mt-5">
<div class="row" data-aos="fade-down">
    <div class="col-lg-12 col-md-6">
        <div class="main-box clearfix">
            <div class="table-responsive">
                <table class="table user-list">
                    <thead class="">
                        <tr>
                            <th>User</th>
                            <th>Created</th>
                            <th class="text-center">Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    
              <?php while($row = mysqli_fetch_array($id)) { $index += 1?>

                        <tr>
                            <td>
                                <img src="https://res.cloudinary.com/teepublic/image/private/s--UymRXkch--/t_Resized%20Artwork/c_fit,g_north_west,h_1054,w_1054/co_ffffff,e_outline:53/co_ffffff,e_outline:inner_fill:53/co_bbbbbb,e_outline:3:1000/c_mpad,g_center,h_1260,w_1260/b_rgb:eeeeee/c_limit,f_auto,h_630,q_90,w_630/v1570281377/production/designs/6215195_0.jpg" alt="">
                                <a href="https://www.instagram.com/ogidarmatena/" class="user-link"><?= $row['username'] ?></a>
                                <span class="user-subhead">Admin</span>
                            </td>
                            <td>
                                <?= $row['tanggal'] ?><br><?= $row['jam']; ?>
                            </td>
                           
                            <td>
                                <a href="https://mail.google.com/mail/u/0/#inbox"><?= $row['email'] ?></a>
                            </td>
                             <td class="text-center">
                                <?php if($_SESSION["login"] == $row['email']){?>
                                <span class="label label-default" style="color: green; font-weight: bold;">Active</span>
                              <?php }else{ ?>
                                <span class="label label-default">Inactive</span>
                              <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                  </tbody>
        </div>
    </div>
</div>
</div>
  <script type="text/javascript" src="script.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
