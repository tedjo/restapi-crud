<?php 

if($_SERVER['REQUEST_METHOD']=='POST') {

    $response = array();
    //mendapatkan data
    $id        = $_POST['id'];  

    require_once('dbConnect.php');
    //Cek npm sudah terdaftar apa belum
    $sql = "SELECT * FROM produk WHERE id ='$id'";
    $check = mysqli_fetch_array(mysqli_query($con,$sql));
    if(isset($check)){
        $sql = "DELETE FROM produk WHERE id=$id";
        if(mysqli_query($con,$sql)) {
            $response["value"] = 1;
            $response["message"] = "Sukses delete";
            echo json_encode($response);
          } else {
            $response["value"] = 0;
            $response["message"] = "oops! Coba lagi!";
            echo json_encode($response);
          }
    }
    $response["value"] = 0;
    $response["message"] = "oops! Data Tidak Ada!";
    echo json_encode($response);
    // tutup database
    mysqli_close($con);
 } 
 else {
   $response["value"] = 0;
   $response["message"] = "oops! Coba lagi!";
   echo json_encode($response);
 }

?>