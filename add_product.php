<?php 
  session_start();
  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }
  include "config/db.php";

  date_default_timezone_set("Asia/Jakarta");
  $h = intval(date("G")) +1;
  $waktu = date("Y-m-d ".$h.":i:s");
  // echo $waktu;


  if(isset($_POST["add_produk"])){
    $item_brand     = $_POST["item_brand"];
    $item_name      = $_POST["item_name"];
    $item_price     = $_POST["item_price"];
    // $Item_image     = $_POST["Item_image"];
    // $item_register  = $_POST["item_register"];
    $image_name     = $_FILES["image"]["name"];
    $image_tmp      = $_FILES["image"]["tmp_name"];

    // $folder_resto = 
    // $fol = "tmp_upload/".$nama_resto;
    //   if (!is_dir($fol)) {
    //                 mkdir("tmp_upload/".$nama_resto);
    //       $gallery = mkdir("tmp_upload/".$nama_resto."/gallery");
    //           $folder = "tmp_upload/".$nama_resto."/";
    $folder = "./assets/products/";
    $insert = mysqli_query($connection, "INSERT INTO product VALUES(NULL, '$item_brand', '$item_name', '$item_price', './assets/products/$image_name', '$waktu') ");

    $id = mysqli_query($connection, "SELECT * FROM product WHERE item_name= '$item_name'");
    $set_id = mysqli_fetch_array($id);
    $get_id = $set_id["item_id"];

    $move = move_uploaded_file($image_tmp, $folder.$image_name);
    // echo $item_name;

    // if ($insert) {
    // $update = mysqli_query($connection, "UPDATE product SET item_brand='$item_brand', item_name='$item_name', item_price='$item_price', item_image='$get_id./assets/products/$image_name', item_register='$waktu'");

    // $folder_update = "./assets/products/$image_name";
    // if ($move) {
    //   mysqli_query($connection, "UPDATE product SET item_image = './assets/products/$get_id.$image_name' WHERE product.item_name = '$item_name;'");
    // }
    // }

      // }else{
      //       echo "
      //       <script>
      //         confirm('Maaf Nama yang anda gunakan sudah ada, Mohon gunakan Nama yang berbeda');
      //       </script>
      //     ";
      // }

  }



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bs/bootstrap.min.css" />
    <link rel="stylesheet" href="bs/style.css" />
    <title>Add Restoran</title>
  </head>
  <body>
    <div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row justify-content-center">
          <div class="mb-3 col-12 col-md-4">
            <label for="item_brand" class="form-label">Nama Brand</label>
            <input type="text" name="item_brand" id="item_brand" class="form-control" required />
            <label for="item_name" class="form-label">Nama Produk</label>
            <input type="text" name="item_name" id="item_name" class="form-control" required />
            <label for="item_price" class="form-label">Harga Item</label>
            <input type="text" name="item_price" id="item_price" class="form-control" required />
          <!--   <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea> -->



          </div>
          <div class="mb-3 col-12 col-md-4">
           <!--  <label for="Item_image" class="form-label">Lokasi Gambar</label>
            <input type="text" name="Item_image" id="Item_image" class="form-control" required /> -->
           <!--  <label for="item_register" class="form-label">item_register</label>
            <input type="text" name="item_register" id="item_register" class="form-control" required /> -->
            <!-- <label for="lokasi" class="form-label">lokasi</label> -->
            <!-- <input type="text" name="lokasi" id="lokasi" class="form-control" required /> -->
            <label for="image" class="form-label">Upload Gambar</label>
            <input type="file" name="image" id="image" class="form-control" />
            <button name="add_produk" type="submit" class="btn btn-primary mt-3">
            Tambahkan
          </button>
          </div>
        </div>
      </form>
    </div>
    <script src="bs/bootstrap.min.js"></script>
  </body>
</html>
