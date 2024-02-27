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
                  <a class="nav-link" href="#">Add New Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">View All Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Wholesale Products</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#productsSubmenu" data-toggle="collapse" aria-expanded="false">
                <span data-feather="shopping-cart"></span>
                Orders
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#productsSubmenu" data-toggle="collapse" aria-expanded="false">
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
              <strong>NEXT PAYMENT DATE:</strong>
              <?php echo date('Y-m-d'); ?> <!-- Replace with dynamic date -->
              <h4>LKR
                <?php echo number_format(-5250.00, 2); ?>
              </h4> <!-- Replace with dynamic amount -->
              <p>0 Order</p>
              
            </div>
          </div>

          <!-- Payment Filtering Form -->
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
          </div>

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
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Sample PHP code to query the database and output the results
                // Replace this with your actual database query logic
                $payments = []; // Assume this array gets populated with payment data from your database
                foreach ($payments as $payment) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($payment['payment_reference']) . "</td>";
                  echo "<td>" . htmlspecialchars($payment['vendor']) . "</td>";
                  echo "<td>" . htmlspecialchars($payment['create_date']) . "</td>";
                  echo "<td>" . htmlspecialchars($payment['transferring_date']) . "</td>";
                  echo "<td>" . htmlspecialchars($payment['amount']) . "</td>";
                  echo "<td>" . htmlspecialchars($payment['payment_status']) . "</td>";
                  echo "<td><button class='btn btn-success btn-sm'>Paid</button></td>";
                  echo "</tr>";
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