<?php
  session_start();
  // if(isset($_SESSION["login"])){
  //   header("Location: login.php");
  //   exit;
  // }
  include('config/db.php');
  //MENGAMBIL WAKTU
  date_default_timezone_set("Asia/Jakarta");
  $h = intval(date("G")) +1;
  $tanggal = date("Y/m/d ");
  $jam = date($h.":i:s");

  

  if(isset($_POST['register'])){
    $username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email      = $_POST["email"];
    $password   = password_hash($_POST["password1"], PASSWORD_DEFAULT);
    
    $result = mysqli_query($connection, "SELECT username FROM tbl_user WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
      echo("
      <script>
        alert('Username yang dipilih sudah ada!');
        document.location.href = 'register.php';
      </script>
     ");
    }else{
      if ($_POST['password1']!= $_POST['password2']){
        echo("
         <script>
           alert('Password tidak sama!');
           document.location.href = 'register.php';
         </script>
        ");
       }
   
   
       $insert = mysqli_query($connection, "INSERT INTO tbl_user VALUES(NULL, '$username', '$email','$tanggal','$jam','$password')");
       if($insert){
         echo "
           <script>
             alert('Berhasil registrasi!');
             document.location.href = 'login.php?from=header';
           </script>
         ";
       }else{
         echo "
           <script>
             alert('Gagal!);
             document.location.href = 'register.php';
           </script>
         ";
       }
    }
  }

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
  <!-- <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <link rel="stylesheet" href="bs/bootstrap.min.css">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="login/css/style.css">  
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
  </style>
</head>
<body>
  <header id="header" class="">
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
    <div class="container">
     <!--    <?php if (isset($error)) { ?>
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password salah!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php } ?> -->
       <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Halaman Resigter</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img lupa" style="background-image: url(login/images/bg-1.jpg);">
                  </div>
                        <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign Up</h3>
                        </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                    </div>
                            <form action="#" class="signin-form" method="post">
                               <div class="form-group mb-3">
                            <label class="label" for="username">Username</label>
                            <input type="username" id="username" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Password</label>
                      <input type="password" id="password" name="password1" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="konfirmasi">Konfirmasi Password</label>
                      <input type="password" id="konfirmasi" name="password2" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button name="register" type="submit" class="form-control btn rounded submit px-3" style="background-color: #00A5C4">Sign Up</button>      
                        <a style="background-color: #00A5C4; color: black" href="login.php" class="form-control btn rounded submit px-3 mt-2">Sudah punya akun</a>
                        
                    </div>
                  </form>
                </div>
              </div>
                </div>
            </div>
        </div>
    </section>

    <script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>
</body>
</html>

