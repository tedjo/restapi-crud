<?php 

if($_SERVER['REQUEST_METHOD']=='POST') {

    $response = array();
    //mendapatkan data
    $name        = $_POST['name'];
    $price       = $_POST['price'];
    $stock       = $_POST['stock'];
    $description = $_POST['description'];
 
    require_once('dbConnect.php');
    //Cek npm sudah terdaftar apa belum
    
    $sql = "SELECT * FROM produk WHERE name ='$name'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));
    if(isset($check)){
      $response["value"] = 0;
      $response["message"] = "oops! Data sudah terdaftar!";
      echo json_encode($response);
    } else {
        
      $sql = "INSERT INTO produk (name,price,stock,description) VALUES('$name','$price','$stock','$description');";
      if(mysqli_query($con,$sql)) {
        $response["value"] = 1;
        $response["message"] = "Sukses mendaftar";
        echo json_encode($response);
      } else {
        $response["value"] = 0;
        $response["message"] = "oops! gagal Coba lagi!";
        echo json_encode($response);
      }
    }
    // tutup database
    mysqli_close($con);
 } 
 else {
   $response["value"] = 0;
   $response["message"] = "oops! Coba lagi!";
   echo json_encode($response);
 }

?>