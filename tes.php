
 <!DOCTYPE html>
 <html>
 <head>
   <title>API</title>
 </head>
 <body>
 <?php 
include 'config/db.php';

$sql = "SELECT * FROM product";

$query = mysqli_query($connection, $sql);
$result = array();
while ($row = mysqli_fetch_array($query)){
    array_push($result, array(
      'nama' => $row['item_name']
    ));
}

  //  $item[] = array(
  //   'nama' => $data["item_name"],
  //   'brand' => $data['item_brand'],
  // );



//  $response = array(

//       'status' => "OK", 
//       'data' => $item,
// );

 echo json_encode(
   array('result' => $result,)

 );

 ?>



 </body>
 </html>