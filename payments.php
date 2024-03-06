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
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet" />
</head>

<body>
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
            <h2>Payment List</h2>
            <!-- Other header elements here, if necessary -->
          </header>

          <!-- Payment Summary -->
          <div class="payment-summary mb-4">
    <div class="alert alert-primary" role="alert">
        <?php
        include 'config/dbconnect.php';
        
        $nextPaymentDateQuery = "SELECT MIN(next_payment_date) AS next_payment_date FROM payments WHERE next_payment_date > CURDATE() AND status = 'UNPAID'";
        $nextPaymentDateResult = $conn->query($nextPaymentDateQuery);
        $nextPaymentDateRow = $nextPaymentDateResult->fetch_assoc();
        $nextPaymentDate = $nextPaymentDateRow['next_payment_date'] ?? 'N/A'; 
        
        $totalAmountQuery = "SELECT SUM(amount) AS total_amount FROM payments WHERE status = 'UNPAID'";
        $totalAmountResult = $conn->query($totalAmountQuery);
        $totalAmountRow = $totalAmountResult->fetch_assoc();
        $totalUnpaidAmount = $totalAmountRow['total_amount'] ?? 0;
       
        $unpaidOrdersQuery = "SELECT COUNT(*) AS unpaid_orders FROM payments WHERE status = 'UNPAID'";
        $unpaidOrdersResult = $conn->query($unpaidOrdersQuery);
        $unpaidOrdersRow = $unpaidOrdersResult->fetch_assoc();
        $unpaidOrdersCount = $unpaidOrdersRow['unpaid_orders'] ?? 0;
        ?>

        <strong>NEXT PAYMENT DATE:</strong> <?php echo htmlspecialchars($nextPaymentDate); ?>
        <h4>LKR <?php echo number_format((float)$totalUnpaidAmount, 2); ?></h4> <!-- Dynamic total amount -->
        <p><?php echo htmlspecialchars($unpaidOrdersCount); ?> Order(s)</p>
    </div>
</div>


          <!--
          <div class="row mb-4">
            <div class="col-md-4">
              <input class="form-control" type="text" name="payment_reference" placeholder="Payment Reference">
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" name="order_id" placeholder="Order Id">
            </div>
            <div class="col-md-4">
              <button class="btn btn-primary">Search</button>
            </div>
          </div> -->

          <!-- Payments Table -->
          <div class="table-responsive">
          <table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>PAYMENT REFERENCE</th>
            <th>VENDOR</th>
            <th>CREATE DATE</th>
            <th>TRANSFERRING DATE</th>
            <th>AMOUNT</th>
            <th>PAYMENT STATUS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'config/dbconnect.php';
        $sql = "SELECT p.payment_id, s.ShopName AS vendor, o.OrderDate AS create_date, o.OrderDate AS payment_date, p.amount, p.status AS payment_status, p.next_payment_date FROM payments p INNER JOIN seller s ON p.SellerID = s.SellerID INNER JOIN orders o ON p.OrderID  = o.OrderID ";
$result = $conn->query($sql);


        if ($result->num_rows > 0) {
            while($payment = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($payment['payment_id']) . "</td>";
                echo "<td>" . htmlspecialchars($payment['vendor']) . "</td>";
                echo "<td>" . htmlspecialchars($payment['create_date']) . "</td>";
                echo "<td>" . htmlspecialchars($payment['payment_date']) . "</td>";
                echo "<td>" . htmlspecialchars(number_format($payment['amount'], 2)) . "</td>";
                echo "<td>" . htmlspecialchars($payment['payment_status']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No results found</td></tr>";
        }
        ?>
    </tbody>
</table>

          </div>

          <!-- Footer-->
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
  <!-- Feather Icons (used in the sidebar for icons) -->
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace(); 
  </script>
  <!-- Custom scripts -->
  <script>
    
  </script>
</body>

</html>