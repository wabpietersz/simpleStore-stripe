<?php
// require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');

// require_once('models/Transaction.php');

//init Customer
$customer = new Customer();

//Get Customer
$customers = $customer->getCustomers();

//start
require_once('header.php');
?>




<body>
    <div class="container mt-4">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-primary">Customers</a>
            <a href="transactions.php" class="btn btn-secondary ml-1">Transactions</a>
            <a href="products.php" class="btn btn-secondary ml-1">Products</a>
        </div>

        <hr>
        <div>
            <h2>Customers</h2>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td>
                            <?php echo $customer->id; ?>
                        </td>
                        <td>
                            <?php echo $customer->first_name; ?>
                            <?php echo $customer->last_name; ?>
                        </td>
                        <td>
                            <?php echo $customer->email; ?>
                        </td>
                        <td>
                            <?php echo $customer->created_at; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>