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
          <!--Main Container Start-->
          <div class="container">
            <h1>Create Product</h1>

            <!-- Product Form -->
            <form id="productForm" action="productcreatesubmit.php" method="post"
              enctype="multipart/form-data">
              <!-- Basic Information Section -->
              <div class="form-section">
                <h2>Basic Information</h2>

                <div class="form-group">
                  <label for="productName">Product Name</label>
                  <input type="text" id="productName" name="productName" maxlength="56" required />
                </div>

                <div class="form-group">
                  <label for="productCategory">Select Category</label>
                  <!-- You will populate this select element with options using PHP -->
                  <select id="productCategory" name="productCategory">
                    <!-- <?php // echo $categoryOptions; ?> -->
                  </select>
                </div>

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
                  <input class="form-control" type="file" id="productImage" />
                </div>

                <!-- Product Name -->
                <div class="mb-3">
                  <label for="productName" class="form-label">Product Name</label>
                  <input type="text" class="form-control" id="productName" placeholder="Enter product name" />
                </div>

                <!-- Category -->
                <div class="mb-3">
                  <label for="category" class="form-label">Category</label>
                  <select class="form-select" id="category">
                    <option selected>Choose a category</option>
                    <option value="1">Electronics</option>
                    <option value="2">Clothing</option>
                    <!-- Add more categories as needed -->
                  </select>
                </div>

                <!-- Short Description -->
                <div class="mb-3">
                  <label for="shortDescription" class="form-label">Short Description</label>
                  <textarea class="form-control" id="shortDescription" rows="2"
                    placeholder="Enter short description"></textarea>
                </div>

                <!-- Long Description -->
                <div class="mb-3">
                  <label for="longDescription" class="form-label">Long Description</label>
                  <textarea class="form-control" id="longDescription" rows="4"
                    placeholder="Enter long description"></textarea>
                </div>

                <!-- Product Condition -->
                <div class="mb-3">
                  <label for="productCondition" class="form-label">Product Condition</label>
                  <select class="form-select" id="productCondition">
                    <option selected>Choose condition</option>
                    <option value="new">New</option>
                    <option value="used">Used</option>
                    <!-- Add more conditions as needed -->
                  </select>
                </div>

                <!-- Regular Price -->
                <div class="mb-3">
                  <label for="regularPrice" class="form-label">Regular Price</label>
                  <input type="text" class="form-control" id="regularPrice" placeholder="Enter regular price" />
                </div>

                <!-- Sale Price -->
                <div class="mb-3">
                  <label for="salePrice" class="form-label">Sale Price</label>
                  <input type="text" class="form-control" id="salePrice" placeholder="Enter sale price" />
                </div>

                <!-- Quantity -->
                <div class="mb-3">
                  <label for="quantity" class="form-label">Quantity</label>
                  <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" />
                </div>

                <!-- Reorder Level -->
                <div class="mb-3">
                  <label for="reorderLevel" class="form-label">Reorder Level</label>
                  <input type="number" class="form-control" id="reorderLevel" placeholder="Enter reorder level" />
                </div>

                <!-- Warranty -->
                <div class="mb-3">
                  <label for="warranty" class="form-label">Warranty</label>
                  <input type="text" class="form-control" id="warranty" placeholder="Enter warranty period" />
                </div>

                <!-- Warranty Policy -->
                <div class="mb-3">
                  <label for="warrantyPolicy" class="form-label">Warranty Policy</label>
                  <textarea class="form-control" id="warrantyPolicy" rows="2"
                    placeholder="Enter warranty policy details"></textarea>
                </div>

                <!-- Delivery Section -->
                <h5>Delivery Details</h5>

                <!-- Package Weight -->
                <div class="mb-3">
                  <label for="packageWeight" class="form-label">Package Weight (kg)</label>
                  <input type="text" class="form-control" id="packageWeight" placeholder="Enter weight" />
                </div>

                <!-- Package Dimensions -->
                <div class="row">
                  <div class="col-md-4">
                    <label for="packageLength" class="form-label">Length (cm)</label>
                    <input type="text" class="form-control" id="packageLength" placeholder="Length" />
                  </div>
                  <div class="col-md-4">
                    <label for="packageWidth" class="form-label">Width (cm)</label>
                    <input type="text" class="form-control" id="packageWidth" placeholder="Width" />
                  </div>
                  <div class="col-md-4">
                    <label for="packageHeight" class="form-label">Height (cm)</label>
                    <input type="text" class="form-control" id="packageHeight" placeholder="Height" />
                  </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary mt-3">
                  Add Product
                </button>
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
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('productForm');
        
        form.addEventListener('submit', function(event) {
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