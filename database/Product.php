<?php

// Use to fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getData($table = 'product'){

        // include 'config/db.php';
        //  $username = $_SESSION['login'];
        //  if ($username == null) {
        //      $username = 'ogidarmatena@gmail.com';
        //  }
        // $id = mysqli_query($connection, "SELECT id FROM tbl_user WHERE email='$username'");
        //  while($row = mysqli_fetch_array($id)) 
        // $real_id = $row['id']; 
        // $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id = $real_id");


        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    // /////////////////////////////////////////////////////////
     public function getCart($table = 'cart'){

        include 'config/db.php';
         $username = $_SESSION['login'];
         // var_dump($username);
         if ($username == null) {
             $username = 'ogidarmatena@gmail.com';
         }
        $id = mysqli_query($connection, "SELECT id FROM tbl_user WHERE email='$username'");
         while($row = mysqli_fetch_array($id)) 
        $real_id = $row['id']; 
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_id = $real_id");


        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    ///////////////////////////////////////////////////////////////////

    // get product using item id
    public function getProduct($item_id = null, $table= 'product'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

}