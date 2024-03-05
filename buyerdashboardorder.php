<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Orders</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet" />
    <style>
  .overview-card {
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    padding: 10px;
  }

  .card-title-in {
    color: #6c757d;
    font-size: small;
  }

  .card-text-in {
    font-size: large;
    font-style: bold;
  }

  button { 
    background-color: hsl(42, 99%, 46%); 
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 0.25rem;
  }

  button:hover {
    background-color: hsla(42, 99%, 46%, 0.75);
    color: white;
  }

  .btn-dash {
    color: #fff;
    background-color: hsl(42, 99%, 46%);
    border-color: hsl(42, 99%, 46%);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .btn-dash:hover {
    color: #fff;
    background-color: hsla(42, 99%, 46%, 0.75);
    border-color: hsla(42, 99%, 46%, 0.75);
  }

  body {
    font-family: Arial, sans-serif;
  }

  h1 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  li {
    border-bottom: 1px solid #ccc;
    padding: 10px;
  } 

  li:last-child {
    border-bottom: none;
  }

  a {
    text-decoration: none;
    color: #333;
  }

  a:hover {
    color: #000;
  }
</style>
  </head>
  <body>

  <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamix";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlOrder = "SELECT OrderID, OrderDate, Quantity, OrderStatus, DeliveryDate FROM orders WHERE OrderID = 2";
$sqlProduct = "SELECT Name, ImgPath FROM product WHERE ProductID = 1";

$resultOrder = $conn->query($sqlOrder);
$resultProduct = $conn->query($sqlProduct);

if ($resultOrder->num_rows > 0) {
    $rowOrder = $resultOrder->fetch_assoc();
    $orderID = $rowOrder["OrderID"];
    $orderDate = $rowOrder["OrderDate"];
    $quantity = $rowOrder["Quantity"];
    $orderStatus = $rowOrder["OrderStatus"];
    $deliveryDate = $rowOrder["DeliveryDate"];
} else {
    echo "Order not found!";
}

if ($resultProduct->num_rows > 0) {
    $rowProduct = $resultProduct->fetch_assoc();
    $productName = $rowProduct["Name"];
    $productImgPath = $rowProduct["ImgPath"];
} else {
    echo "Product not found!";
}

$conn->close();
?>

    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
          <div class="sidebar-sticky">
            <div class="sidebar-header">
              <a href="#" class="logo">Gamix</a>
            </div>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="buyerdashboardprofile.php"
                  >My Profile</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buyerdashboardorder.php"
                  >Order History</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buyerdashboardwishlist.php"
                  >My Wishlists</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buyerdashboardreview.php">Reviews</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
              </li>
              <!-- Add other sidebar items here -->
            </ul>
          </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
          >
            <h1 class="h2">Orders</h1>
            <!-- Add the rest of your dashboard content here -->
          </div>
          <ul>
            <div class="col-md-12 mb-3">
              <div class="card overview-card">
                <li>
                  <div><?php echo $orderID; ?></div>
                  <div><?php echo $orderDate; ?></div>
                </li>
                <li>
                  <div><img src="<?php echo $productImgPath; ?>" alt="Product Image" width="250px" height="200px" /></div>
                  <div>
                    <?php echo $productName; ?>
                  </div>
                  <div>Qty: <?php echo $quantity; ?></div>
                  <div><b><?php echo $orderStatus; ?></b></div>
                  <div><?php echo $deliveryDate; ?></div>
                </li>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="card overview-card">
            <li>
              <div>Order 4</div>
              <div>2023-12-17</div>
            </li>
            <li>
              <div><img src="assets\images\shop-img-2.jpg" width="250px" height="200px" alt="Product Image" /></div>
              <div>GEARS 5 XBOX ONE CONTROLLER</div>
              <div>Qty: 1</div>
              <div><b>Delivered</b></div>
              <div>Delivered 2023-12-24 </div>
            </li>
          </div>
        </div>
          </ul>
          <!-- Search Form -->
          <!-- ... (Include the search form code from Part 6 here) -->

          <!-- Tabs for Order Statuses -->
          <!-- ... (Include the tabs code from Part 7 here) -->

          <!-- The rest of your content such as tables and other information goes here -->
          <div>
            <!-- Footer -->
            <footer class="bg-body-tertiary text-center text-lg-start">
              <!-- Copyright -->
              <div
                class="text-center p-3"
                style="background-color: rgba(0, 0, 0, 0.05)"
              >
                © 2024 Copyright:
                <a class="text-body" href="#">Gamix Private Limited.</a>
              </div>
              <!-- Copyright -->
            </footer>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Feather Icons (used in the sidebar for icons) -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace(); // This will replace the span tags with the actual feather icons.
    </script>
    <!-- Custom scripts -->
    <script>
      // ... (Include the JavaScript code from Part 8 here)
    </script>
  </body>
</html>
