<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
    <!-- Custom styles -->
    <link href="paymentform.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- Invoice Creation Section -->
            <div class="col-md-7">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h2 class="mb-4">Create new invoice</h2>
                    <form>
                        <div class="form-group mb-3">
                            <label for="firstName">First Name</label>
                            <input class="form-control" type="text" id="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="lastName">Last Name</label>
                            <input class="form-control" type="text" id="lastName" placeholder="Last Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input class="form-control" type="text" id="address" placeholder="Street Address">
                        </div>
                        <div class="form-group mb-3">
                            <label for="telephone">Telephone</label>
                            <input class="form-control" type="text" id="telephone" placeholder="Telephone">
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input class="form-control" type="text" id="city" placeholder="City">
                        </div>
                        <div class="form-group mb-3">
                            <label for="country">Country</label>
                            <select class="form-control" id="country">
                                <option>Sri Lanka</option>
                                <!-- Add other countries as needed -->
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="postalCode">Postal Code</label>
                            <input class="form-control" type="text" id="postalCode" placeholder="Postal Code">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Invoice Details Section -->
            <div class="col-md-5">
                <div class="p-4 bg-white rounded shadow-sm">
                    <h2 class="mb-4">Invoice Details</h2>
                    <!-- Invoice items table -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Items</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="invoiceItems">
                            <!-- Items will be added here dynamically -->
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <strong>Total Amount:</strong>
                        <span id="totalAmount">Rs.0.00</span>
                    </div>
                    <!-- PayPal button container -->
                    <div id="paypal-button-container" class="mt-4"></div>


                </div>
                <!-- Cancel Button -->
                <div class="mb-3">
                    <button type="button" id="cancelButton" class="btn btn-secondary">Cancel</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>feather.replace();</script>
    <!-- PayPal SDK -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=AVma9oW45xiS0jVQeT-zKWwboVr2pK320w9xJwH-rKv3E3DwcY0JkDvipq1P1N-3IhmTJLYWzPs34lQf&currency=LKR"></script>
    <script>
        paypal.Buttons({
            // Set up the transaction
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01' // Can be dynamically set
                        }
                    }]
                });
            },
            // Finalize the transaction
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container');
    </script>
    <script>
        function loadInvoiceItems() {
            // Retrieve the cart items from local storage
            var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            var invoiceItemsContainer = document.getElementById('invoiceItems');
            var totalAmount = 0;

            cartItems.forEach(function (item) {
                // Create a new row for each item
                var row = document.createElement('tr');
                row.classList.add('text-muted', 'h8'); // Match the class with the CSS

                row.innerHTML = `
            <td>${item.title}</td>
            <td>${item.qty}</td>
            <td>Rs.${item.price.toFixed(2)}</td>
            <td>Rs.${item.total.toFixed(2)}</td>
        `;

                // Append the row to the table body
                invoiceItemsContainer.appendChild(row);
                totalAmount += item.total;
            });

            // Update the total amount
            document.getElementById('totalAmount').textContent = totalAmount.toFixed(2);
        }

        // Call loadInvoiceItems when the page loads
        document.addEventListener('DOMContentLoaded', loadInvoiceItems);


    </script>
    <script>
    document.getElementById('cancelButton').addEventListener('click', function() {
        window.location.href = 'web/index.html'; 
    });
</script>

</body>

</html>