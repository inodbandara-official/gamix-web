<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Wishlists</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <link href="dashboard.css" rel="stylesheet">
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

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
        <div class="sidebar-sticky">
          <div class="sidebar-header">
            <a href="web/index.php" class="logo">Gamix</a>
          </div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="buyerdashboardprofile.php">My Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="buyerdashboardorder.php">Order History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="buyerdashboardwishlist.php">My Wishlists</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="buyerdashboardreview.php">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Logout</a>
            </li>

          </ul>
        </div>
      </nav>


      <!-- Main Content -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Wishlists</h1>

        </div>
        <ul>
          <?php
          include 'config/dbconnect.php';


          $userID = 25;

          $sqlWishlist = "SELECT w.WishlistID
                FROM wishlist w
                WHERE w.UserID = ?";

          $resultWishlist = $conn->prepare($sqlWishlist);
          $resultWishlist->bind_param("i", $userID);
          $resultWishlist->execute();
          $resultWishlist = $resultWishlist->get_result();

          if ($resultWishlist->num_rows > 0) {
            while ($rowWishlist = $resultWishlist->fetch_assoc()) {
              $wishlistID = $rowWishlist["WishlistID"];


              $sqlProduct = "SELECT p.Name, p.ImgPath
                      FROM product p
                      INNER JOIN productwishlist pw ON p.ProductID = pw.ProductID
                      WHERE pw.WishlistID = ?";

              $resultProduct = $conn->prepare($sqlProduct);
              $resultProduct->bind_param("i", $wishlistID);
              $resultProduct->execute();
              $resultProduct = $resultProduct->get_result();

              if ($resultProduct->num_rows > 0) {
                while ($rowProduct = $resultProduct->fetch_assoc()) {
                  $productName = $rowProduct["Name"];
                  $productImgPath = $rowProduct["ImgPath"];


                  ?>
                  <div class="col-md-6 mb-3">
                    <div class="card overview-card">
                      <li>
                        <div><img src="<?php echo $productImgPath; ?>" alt="Product Image" width="250px" height="200px" /></div>
                        <div>
                          <?php echo $productName; ?>
                        </div>
                      </li>
                    </div>
                  </div>
                  <?php
                }
              }
            }
          } else {
            echo "<p>No wishlist items found!</p>";
          }

          $conn->close();
          ?>

        </ul>

        <div>
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
    feather.replace() 
  </script>

  <script>

  </script>
</body>

</html>