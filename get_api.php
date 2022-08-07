
<!DOCTYPE html>
<html>
<head>
	<title>Get API</title>
</head>
<body>
	<?php
	//LINK LINK YANG TERSEDIA
	//	/posts 	100 posts
	//	/comments 	500 comments
	//	/albums 	100 albums
	//	/photos 	5000 photos
	//	/todos 	200 todos
	//	/users 	10 users
	//=================================================
	// Mengambil Data dari api
		$string = file_get_contents("https://v1.nocodeapi.com/ogidarmatena/fbsdk/sLvdzggOLvikkiEF/firestore/allDocuments?collectionName=products");
	// Memperlihatkan Output 
		$json = json_decode($string, true);
		var_dump($json[0] ["_fieldsProto"]);
	?>
<!-- =================================================== -->
	 <?php 
		foreach ($json as $value) {  ?>
        <!-- <br> -->
		 <?php 
		 $nama = $value["_fieldsProto"]["name"]["stringValue"]; 
		 $harga = $value["_fieldsProto"]["price"]["doubleValue"];
		 ?>
		 <h3><?= $nama ?></h3> 
		 <h2><?= $harga ?></h2> 
		<?php } ?>
</body>
</html>