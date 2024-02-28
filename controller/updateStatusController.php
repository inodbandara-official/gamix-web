<?php
    include_once "../config/dbconnect.php";

    $v_id=$_POST['v_id'];
    $product= $_POST['product'];
    $status= $_POST['status'];
    $qty= $_POST['qty'];
   
    $updateItem = mysqli_query($conn,"UPDATE product_status SET 
        product_id=$product, 
        status_id=$status,
        WHERE status_id=$v_id");


    if($updateItem)
    {
        echo "true";
    }
?>