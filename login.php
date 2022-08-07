<?php
// error_reporting(0);
// ini_set('display_errors', 0);
include "config/db.php";
// include ('header.php');
session_start();
if (isset($_GET['logout'])){
     // session_start();
  $_SESSION = [];
  session_unset();
  session_destroy();

  echo 
  "
   <script>
      window.location.href = 'login.php?from=header';
    </script>
  ";
  exit;
}
if ($_GET['from'] == NULL){
  echo 
  "
   <script>
      window.location.href = 'login.php?from=header';
    </script>
  ";
}

 if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }


if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $_SESSION["login"] = $email;


  $result = mysqli_query($connection, "SELECT * FROM tbl_user WHERE email='$email'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
     $_SESSION["login"] = $email;
      
      if (isset($_GET['from'])) {
        header("Location: index.php");
        exit;
      }else{
      header("Location: pembayaran.php");
       exit;
      }
     
    }
  }
  $error = true;
}


?>

<?php
ob_start();
// include header.php file
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bs/bootstrap.min.css">
    <link rel="stylesheet" href="bs/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="login/css/style.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <?php
    // require functions.php file
    require ('functions.php');
    ?>


    <style type="text/css">
       body {
    background: #e8cbc0;
    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
    background: linear-gradient(to right, #e8cbc0, #636fa4);
    min-height: 100vh;
}
    .lupa:hover {
        filter: opacity(75%);
    }
    </style>
</head>

<body>
 <nav class="navbar navbar-expand-lg navbar-light shadow-sm " style="background-color: white">
        <a class="navbar-brand" href="index.php">AYOFA Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
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
            <!-- <form action="#" class="font-size-14 font-rale">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                </a>
            </form> -->
        </div>
    </nav>
    <div class="container">
        <?php if (isset($error)) { ?>
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password salah!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php } ?>
       <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Halaman Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img lupa" style="background-image: url(assets/LOGO.jpg);">
                  </div>
                        <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign In</h3>
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
                            <label class="label" for="email">Email</label>
                            <input autofocus="true" type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button name="login" type="submit" class="form-control btn rounded submit px-3" style="background-color: #00A5C4">Sign In</button>
                        <p>Not a member? <a href="register.php" style="color: #00A5C4">Sign Up</a></p>
                        
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50 text-left">
                            <label class="checkbox-wrap mb-0" style="color: #00A5C4">Remember Me
                                      <input type="checkbox" checked>
                                      <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
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


