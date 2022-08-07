<?php 
  session_start();
  include "config/db.php";

  if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
  }


if(isset($_POST["Apple"])){
  $datas = mysqli_query($connection, "SELECT * FROM product WHERE item_brand='Apple' ");

}else if(isset($_POST["Samsung"])){
  $datas = mysqli_query($connection, "SELECT * FROM product WHERE item_brand='Samsung' ");

}else if(isset($_POST["Redmi"])){
  $datas = mysqli_query($connection, "SELECT * FROM product WHERE item_brand='Redmi' ");
  
}else{
  $datas = mysqli_query($connection, "SELECT * FROM product ");

}



  $nomor = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bs/bootstrap.min.css">
  <link rel="stylesheet" href="bs/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    ></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Admin Restoran</title>
</head>
<body style="background-color: #e6eaed;">

  <div class="container mt-3">
    <a href="add_product.php" class="btn btn-primary mt-2 mb-3">Tambahkan Produk Baru</a>
    <form method="post">
    <button class="btn btn-primary mt-2 mb-2" type="submit" name="Apple">Apple</button>
    <button class="btn btn-primary mt-2 mb-2" type="submit" name="Samsung">Samsung</button>
    <button class="btn btn-primary mt-2 mb-2" type="submit" name="Redmi">Redmi</button>
 
    </form>
    <table class="table table-bordered border-dark">
      <thead class="bg-primary">
        <tr>
          <th>No</th>
          <th>Nama Restoran</th>
          <th>Lokasi Penyimpanan</th>
          <th>gambar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($data = mysqli_fetch_array($datas)) { $nomor = $nomor + 1; ?>
        <tr>
          <td class="text-center"> <?php echo $nomor; ?> </td>
          <td>
            <h3><?= $data["item_name"] ?></h3>
          </td>
          <td>
            <small style="font-style: italic;"><?= $data["item_image"] ?></small style="font-style: italic;">
          </td>
          <td class="text-center">
            <img src="<?= $data['item_image'] ?>" style="width: 150px; height: 150px;">
          </td>
          <td class="text-center">
            <!-- <a href="" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill"></i></a> -->
            <a id="delete" href="delete_product.php?id=<?= $data["item_id"] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  
<script>
  $('#delete').on('click', function(e){
    e.preventDefault()
    var self = $(this);
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        location.href = self.attr('href')
      }
    })
  })
</script>
<script src="bs/bootstrap.min.js"></script>
</body>
</html>