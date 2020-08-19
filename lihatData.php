<?php
if($_SERVER['REQUEST_METHOD']=='GET') {

    require_once('dbConnect.php');
        $response = array(); 
        
        $sql = "SELECT * FROM produk";
        $result=mysqli_query($con,$sql);
         
        while($row=mysqli_fetch_array($result)) {
            // $response[]=$row;
            array_push($response, array(
                "id" => $row['id'],
                "name" => $row['name'],
                "price" => $row['price'],
                "stock" => $row['stock'],
                "description" => $row['description']
            ));
        }
    header('Content-Type: application/json');
    echo json_encode($response);
 }
?>