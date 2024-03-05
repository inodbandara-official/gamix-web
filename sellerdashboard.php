<?php

include 'config/dbconnect.php';

$totalProductsQuery = "SELECT COUNT(*) AS total FROM product";
$totalProductsResult = mysqli_query($conn, $totalProductsQuery);
$totalProductsRow = mysqli_fetch_assoc($totalProductsResult);
$totalProducts = $totalProductsRow['total'];


$reorderLevelQuery = "SELECT COUNT(*) AS reorder FROM product WHERE quantity <= ReorderLevel;";
$reorderLevelResult = mysqli_query($conn, $reorderLevelQuery);
$reorderLevelRow = mysqli_fetch_assoc($reorderLevelResult);
$reorderLevelProducts = $reorderLevelRow['reorder'];


$onlineProductsQuery = "SELECT COUNT(*) AS online FROM product WHERE status = 'Available'";
$onlineProductsResult = mysqli_query($conn, $onlineProductsQuery);
$onlineProductsRow = mysqli_fetch_assoc($onlineProductsResult);
$onlineProducts = $onlineProductsRow['online'];

$paymentsQuery = "SELECT SUM(amount) AS balance, MIN(next_payment_date) AS next_pay_date FROM payments";
$paymentsResult = mysqli_query($conn, $paymentsQuery);
$paymentsRow = mysqli_fetch_assoc($paymentsResult);
$availableBalance = $paymentsRow['balance'];
$nextPaymentDate = $paymentsRow['next_pay_date'];

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
            <img src="path_to_logo.png" alt="Tudo Logo" class="img-fluid" />
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
                  <a class="nav-link" href="productcreate.php">Add New Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="productview.php">View All Products</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="orders.php" data-toggle="collapse" aria-expanded="false">
                <span data-feather="shopping-cart"></span>
                Orders
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="payments.php" data-toggle="collapse" aria-expanded="false">
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
            <h2>WebCodoo</h2>
          </header>
          <!--Products, Orders, Payments -->
          <div class="row mb-3">
            <div class="col-md-4 mb-3">
              <div class="card overview-card">
                <div class="card-body">
                  <h5 class="card-title">Products</h5>
                  <div class="d-flex justify-content-between">
                    <div class="text-center">
                      <p class="card-text">Online</p>
                      <h3><?php echo $onlineProducts; ?></h3>
                    </div>
                    <div class="text-center">
                      <p class="card-text">Reorder Level</p>
                      <h3><?php echo $reorderLevelProducts; ?></h3>
                    </div>
                    <div class="text-center">
                      <p class="card-text">Out of Stock</p>
                      <h3><?php echo $totalProducts - ($onlineProducts + $reorderLevelProducts); ?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card overview-card">
                <div class="card-body">
                  <h5 class="card-title">Payments</h5>
                  <div class="text-center">
                    <p class="card-text">Next Pay</p>
                    <h3>LKR <?php echo number_format($availableBalance, 2); ?></h3>
                  </div>
                </div>
              </div>
            </div>
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
