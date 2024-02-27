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
            <h2>Product List</h2>
            <button class="btn btn-primary">New Product</button>
          </header>

          <!-- Page Main Container -->
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mb-2 mb-md-0">
              <form class="form-inline">
                <input class="form-control mr-2" type="search" placeholder="Item Id" aria-label="Search">
                <select class="form-control mr-2">
                  <option>All Stock</option>
                  <!-- Populate options -->
                </select>
                <select class="form-control mr-2">
                  <option>All Approval</option>
                  <!-- Populate options -->
                </select>
                <input class="form-control mr-2" type="search" placeholder="SKU" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>

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
                  <th>Action</th>
                </tr>
              </thead>
              <!--  <tbody>
          <?php
          // Database connection variables
          $servername = "localhost";
          $username = "your_username";
          $password = "your_password";
          $dbname = "your_dbname";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // SQL to select records from products table
          $sql = "SELECT id, product_name, stock, regular_price, sale_price, shop_name, status, active FROM products";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["product_name"] . "</td>
            <td>" . $row["stock"] . "</td>
            <td>" . $row["regular_price"] . "</td>
            <td>" . $row["sale_price"] . "</td>
            <td>" . $row["shop_name"] . "</td>
            <td>" . $row["status"] . "</td>
            <td>" . ($row["active"] ? "Yes" : "No") . "</td>
            <td>Actions</td>
          </tr>";
            }
          } else {
            echo "<tr><td colspan='9'>0 results</td></tr>";
          }
          $conn->close();
          ?>

        </tbody> -->
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