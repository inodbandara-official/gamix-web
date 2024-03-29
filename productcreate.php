<?php
// Include the database configuration file
include 'config/dbconnect.php';

$message = '';
if (!isset($_GET['sellerId'])) {
  header('Location: seller_login.php');
  exit();
}

$sellerId = $_GET['sellerId'];
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $productName = $_POST['productName'];
    $category = $_POST['category']; // Ensure this is an integer ID
    $productType = $_POST['productType'];
    $productTags = $_POST['productTags'];
    $codAvailable = isset($_POST['codAvailable']) ? 1 : 0;
    $shortDesc = $_POST['shortdesc'];
    $longDesc = $_POST['longdesc'];
    $condition = $_POST['condition'];
    $regularPrice = $_POST['regprice'];
    $salePrice = $_POST['saleprice'];
    $quantity = $_POST['quantity'];
    $reorderLevel = $_POST['reorderlevel'];
    $warrantyPeriod = $_POST['warrantyperiod'];
    $warrantyPolicy = $_POST['warrantypolicy'];
    $weight = $_POST['weight'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $status = "Available";
    $sellerID = 1;
    $sql = "SELECT MAX(ProductID) AS LastID FROM Product";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_id = (int)$row['LastID'] + 8; 
    } else {
        $product_id = 1;
    }

    // Handling file upload
    $productImageName = $_FILES['productImage']['name'];
    $productImagePath = "uploads/" . basename($productImageName);

    if (move_uploaded_file($_FILES['productImage']['tmp_name'], $productImagePath)) {
        // File uploaded successfully
    } else {
        // Failed to upload file
        $message = 'Failed to upload image.';
    }

        $sql = "INSERT INTO Product (ProductID, Name, CategoryID, Type, Tag, Cod, ShortDesc, LongDesc, ProductCondition, RegularPrice, SalePrice, Quantity, ReorderLevel, WarrentyPeriod, WarrentyPolicy, Weight, Length, Width, Height, ImgPath, Status, SellerID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$product_id, $productName, $category, $productType, $productTags, $codAvailable, $shortDesc, $longDesc, $condition, $regularPrice, $salePrice, $quantity, $reorderLevel, $warrantyPeriod, $warrantyPolicy, $weight, $length, $width, $height, $productImagePath, $status, $sellerID]);
        $message = 'Product submitted successfully';
    } catch (PDOException $e) {
        $message = "Error submitting product: " . $e->getMessage();
    }

    // Close connection and Redirect back, display message
    $conn = null;
    echo "<script>alert('" . $message . "'); window.location.href='" . $_SERVER['PHP_SELF'] . "';</script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Orders List</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
        <div class="sidebar-sticky">
          <div class="sidebar-header">
          <a href="web/index.php?sellerId=<?php echo urlencode($sellerId); ?>" class="logo">Gamix</a>
          </div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#productsSubmenu" data-toggle="collapse" aria-expanded="false">
                <span data-feather="box"></span>
                Products
                <span data-feather="chevron-down"></span>
              </a>
              <ul class="collapse" id="productsSubmenu">
                <li class="nav-item">
                  <a class="nav-link" href="productcreate.php?sellerId=<?php echo urlencode($sellerId); ?>">Add New Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="productview.php?sellerId=<?php echo urlencode($sellerId); ?>">View All Products</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="orders.php?sellerId=<?php echo urlencode($sellerId); ?>">
                <span data-feather="shopping-cart"></span>
                Orders
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="payments.php?sellerId=<?php echo urlencode($sellerId); ?>">
                <span data-feather="dollar-sign"></span>
                Payments
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="py-4">
          <!--Main Container Start-->
          <div class="container">
            <h1>Create Product</h1>

            <!-- Product Form -->
            <form id="productForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
              enctype="multipart/form-data">
              <!-- Information Section -->
              <div class="form-section">
                <h2>Basic Information</h2>

                <div class="form-group">
                  <label for="productName">Product Name</label>
                  <input type="text" id="productName" name="productName" maxlength="56" required />
                </div>
                <!-- Category -->
                <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <select class="form-select" id="category" name="category">
                    <option selected>Choose a category</option>
                    <option value="1">Gaming Consoles</option>
                    <option value="2">Gaming Accessories</option>
                    <option value="3">Gaming Laptops</option>

                  </select>
                </div>

                <!-- <div class="form-group">
                  <label for="productCategory">Select Category</label>
                  <select id="productCategory" name="productCategory">
                  </select>
                </div> -->

                <div class="form-group">
                  <label for="productType">Product Type</label>
                  <input type="text" id="productType" name="productType" />
                </div>

                <div class="form-group">
                  <label for="productTags">Product Tags</label>
                  <input type="text" id="productTags" name="productTags" />
                </div>

                <div class="form-group">
                  <label for="codAvailable">COD Available</label>
                  <input type="checkbox" id="codAvailable" name="codAvailable" />
                </div>

                <!-- Image upload -->
                <div class="mb-3">
                  <label for="productImage" class="form-label">Product Image</label>
                  <input class="form-control" type="file" id="productImage" name="productImage" />
                </div>

                <!-- Short Description -->
                <div class="mb-3">
                  <label for="shortDescription" class="form-label">Short Description</label>
                  <textarea class="form-control" id="shortDescription" rows="2" placeholder="Enter short description"
                    name="shortdesc"></textarea>
                </div>

                <!-- Long Description -->
                <div class="mb-3">
                  <label for="longDescription" class="form-label">Long Description</label>
                  <textarea class="form-control" id="longDescription" rows="4" placeholder="Enter long description"
                    name="longdesc"></textarea>
                </div>

                <!-- Product Condition -->
                <div class="mb-3">
                  <label for="productCondition" class="form-label">Product Condition</label>
                  <select class="form-select" id="productCondition" name="condition">
                    <option selected>Choose condition</option>
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                  </select>
                </div>

                <!-- Regular Price -->
                <div class="mb-3">
                  <label for="regularPrice" class="form-label">Regular Price</label>
                  <input type="text" class="form-control" id="regularPrice" placeholder="Enter regular price"
                    name="regprice" />
                </div>

                <!-- Sale Price -->
                <div class="mb-3">
                  <label for="salePrice" class="form-label">Sale Price</label>
                  <input type="text" class="form-control" id="salePrice" placeholder="Enter sale price"
                    name="saleprice" />
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                  <label for="quantity" class="form-label">Quantity</label>
                  <input type="number" class="form-control" id="quantity" placeholder="Enter quantity"
                    name="quantity" />
                </div>

                <!-- Reorder Level -->
                <div class="mb-3">
                  <label for="reorderLevel" class="form-label">Reorder Level</label>
                  <input type="number" class="form-control" id="reorderLevel" placeholder="Enter reorder level"
                    name="reorderlevel" />
                </div>

                <!-- Warranty -->
                <div class="mb-3">
                  <label for="warranty" class="form-label">Warranty</label>
                  <input type="text" class="form-control" id="warranty" placeholder="Enter warranty period"
                    name="warrantyperiod" />
                </div>

                <!-- Warranty Policy -->
                <div class="mb-3">
                  <label for="warrantyPolicy" class="form-label">Warranty Policy</label>
                  <textarea class="form-control" id="warrantyPolicy" rows="2"
                    placeholder="Enter warranty policy details" name="warrantypolicy"></textarea>
                </div>

                <!-- Delivery Section -->
                <h5>Delivery Details</h5>

                <!-- Package Weight -->
                <div class="mb-3">
                  <label for="packageWeight" class="form-label">Package Weight (kg)</label>
                  <input type="text" class="form-control" id="packageWeight" placeholder="Enter weight" name="weight" />
                </div>

                <!-- Package Dimensions -->
                <div class="row">
                  <div class="col-md-4">
                    <label for="packageLength" class="form-label">Length (cm)</label>
                    <input type="text" class="form-control" id="packageLength" placeholder="Length" name="length" />
                  </div>
                  <div class="col-md-4">
                    <label for="packageWidth" class="form-label">Width (cm)</label>
                    <input type="text" class="form-control" id="packageWidth" placeholder="Width" name="width" />
                  </div>
                  <div class="col-md-4">
                    <label for="packageHeight" class="form-label">Height (cm)</label>
                    <input type="text" class="form-control" id="packageHeight" placeholder="Height" name="height" />
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submitProduct" class="btn btn-primary mt-3">Add Product</button>
              </div>
            </form>
          </div>
          <!--Main Container End-->
          <!-- Footer -->
          <footer class="bg-body-tertiary text-center text-lg-start">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05)">
              © 2024 Copyright:
              <a class="text-body" href="#">Gamix Private Limited.</a>
            </div>
            <!-- Copyright -->
          </footer>
        </div>
      </main>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace(); 
  </script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var form = document.getElementById('productForm');

      form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        var formData = new FormData(form);

        // Send the form data to the server using fetch or XMLHttpRequest
        fetch(form.action, {
          method: 'POST',
          body: formData
        })
          .then(response => response.text())
          .then(data => {
            alert('Product submitted successfully'); // Show the success message
            form.reset(); // Reset the form
          })
          .catch(error => {
            alert('An error occurred');
            console.error('Error:', error);
          });
      });
    });
  </script>

</body>

</html>