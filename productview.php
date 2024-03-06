<?php
if (!isset($_GET['sellerId'])) {
  header('Location: seller_login.php');
  exit();
}

$sellerId = $_GET['sellerId'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - Orders List</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link href="dashboard.css" rel="stylesheet" />
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
          <header class="d-flex justify-content-between align-items-center pb-2 mb-4 border-bottom">
            <h2>Product List</h2>
            <!-- <button class="btn btn-primary">New Product</button> -->
          </header>

          <!-- Page Main Container -->
          

          <!-- Table -->
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Stock</th>
                  <th>Regular Price</th>
                  <th>Sale Price</th>
                  <th>Shop Name</th>
           <th>Status</th>
                  <th>Active</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
include 'config/dbconnect.php';


$sql = "SELECT Product.ProductID, Product.Name, Product.Quantity, Product.RegularPrice, Product.SalePrice, Seller.ShopName, Product.Status, Product.Cod FROM Product JOIN Seller ON Product.SellerID = Seller.SellerID WHERE Product.SellerID = '$sellerId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        $status_display = ($row["Status"] == 'pa') ? 'Pending' : (($row["Status"] == 'online') ? 'Online' : $row["Status"]);
        $cod_display = ($row["Cod"] ? "Yes" : "No");
        echo "<tr>
            <td>" . $row["ProductID"] . "</td>
            <td>" . htmlspecialchars($row["Name"]) . "</td>
            <td>" . $row["Quantity"] . "</td>
            <td>" . $row["RegularPrice"] . "</td>
            <td>" . $row["SalePrice"] . "</td>
            <td>" . htmlspecialchars($row["ShopName"]) . "</td>
            <td>" . $status_display . "</td>
            <td>" . $cod_display . "</td>
         
        </tr>";
    }
} else {
    echo "<tr><td colspan='9'>0 results</td></tr>";
}
$conn->close();
?>


              </tbody>
            </table>
          </div>

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

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Feather Icons -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace();
  </script>
  <!-- Custom scripts -->
  <script>

  </script>
</body>

</html>