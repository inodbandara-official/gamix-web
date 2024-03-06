<?php
    include_once "../config/dbconnect 2.php";
    
    if(isset($_POST['upload']))
    {
       
        $product = $_POST['product'];
        $staus= $_POST['status'];
        $qty = $_POST['qty'];

         $insert = mysqli_query($conn,"INSERT INTO product__status
         (product_id,status_id,status) VALUES ('$product','$status','$qty')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../dashboard.php?status=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../dashboard.php?status=success");
         }
     
    }
        
?>