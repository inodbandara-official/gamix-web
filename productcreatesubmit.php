<?php
// Assuming you have a file named 'db_config.php' with your database connection details
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the input data
    $productName = $conn->real_escape_string($_POST['productName']);
    $productCategory = $conn->real_escape_string($_POST['productCategory']);
    // ... sanitize other fields as well

    // Handle the file upload
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == 0) {
        // ... handle the file upload (move the file to a directory and get the file path)
        $productImagePath = '/path/to/the/uploaded/image.jpg';
    }

    // Insert the data into the database
    $sql = "INSERT INTO products (name, category, image_path) VALUES ('$productName', '$productCategory', '$productImagePath')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
