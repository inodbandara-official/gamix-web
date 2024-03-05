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
            <h2>Orders List</h2>
            <!-- Other header elements here, if necessary -->
          </header>

          <!-- <div class="row mb-4">
            <div class="col">
              <span>Date From</span>
              <input class="form-control" type="date" name="date_from" placeholder="Date From">
            </div>
            <div class="col">
              <span>Date To</span>
              <input class="form-control" type="date" name="date_to" placeholder="Date To">
            </div>
            <div class="col">
              <span>Order ID</span>
              <input class="form-control" type="text" name="order_id" placeholder="Order Id">
            </div>
            <div class="col">
              <span>Customer Name</span>
              <input class="form-control" type="text" name="customer_name" placeholder="Customer Name">
            </div>
            <div class="col">
              <span>Contact No</span>
              <input class="form-control" type="text" name="contact_no" placeholder="Contact No">
            </div>
            <div class="col-auto">
              <span><br></span>
              <button class="btn btn-primary">Search</button>
            </div>
          </div> -->

          <!-- Table -->
          <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Date</th>
                <th>Customer</th>
                <th>Contact No</th>
                <th>Delivery Address</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Amount (LKR)</th>
                <th>Order Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'config/dbconnect.php';
            $sellerID=1;
            $sql = "SELECT Orders.OrderID, Orders.OrderDate, CONCAT(User.FirstName, ' ', User.LastName) AS CustomerName, User.PhoneNumber, Orders.DeliveryAddress, Orders.PaymentMethod, Orders.PaymentStatus, Orders.Price, Orders.OrderStatus FROM Orders JOIN User ON Orders.UserID = User.UserID WHERE Orders.SellerID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $sellerID); 
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['OrderID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['OrderDate']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['CustomerName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['PhoneNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['DeliveryAddress']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['PaymentMethod']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['PaymentStatus']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['OrderStatus']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No results found</td></tr>";
            }
            $stmt->close();
            ?>
        </tbody>
    </table>
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