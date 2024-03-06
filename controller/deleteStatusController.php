<?php

    include_once "../config/dbconnect 2.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM product_status where status_id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"status Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>