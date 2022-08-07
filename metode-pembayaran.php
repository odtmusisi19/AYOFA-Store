<?php
  // session_start();

  include('config/db.php');

  

  if(isset($_POST["cek"])){


    // var_dump($_POST["check"]);

    if($_POST["check"] == "on"){
      $_POST["check"] = true;
       header("Location: placeorder.php");

    }else{
      echo "<script> alert('anda belum check list') </script>";
    }
  }else{
    $_POST["check"] = false;
  }

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
    
    <link rel="stylesheet" href="login/css/style.css">  
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    body{
      font-family: 'Montserrat', sans-serif;
    }
    .lupa:hover {
        filter: opacity(75%);
    }
  </style>
  <title>Metode Pembayaran</title>
</head>
<body>
 <?php 
 // if(!isset($_SESSION["login"])){
 //    header("Location: index.php");
 //    exit;
 //  }
  include "header.php";
   if(!isset($_SESSION["login"])){
    header("Location: login.php?from=header");
    exit;
  }
  ?>
    </nav>

        <div class="container">
            <div class="row justify-content-center">
            	<div class="col-md-5 border mt-4 shadow-sm p-5">
                    <h2 class="heading-section text-center">Pilih Metode Pembayaran</h2>
            		<form action="#" class="signin-form" method="post">
                        <div class="form-check">
                        <input class="form-check-input" name="check" type="hidden" value="off" id="flexCheckDefault">
                        <input class="form-check-input" name="check" type="checkbox" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault" style="color: black;">
                          PayPal atau Kartu Kredit
                        </label>
                      </div>
                     <button name="cek" type="submit" class="form-control btn rounded submit px-3" style="background-color: #00A5C4">Lanjutkan</button> 
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

