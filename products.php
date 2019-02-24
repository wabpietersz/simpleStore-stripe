<?php
// require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Product.php');

//init Transaction
$product = new Product();

//Get transaction
$products = $product->getProducts();

//start
require_once('header.php');
?>



<body>
    <div class="container mt-4">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-secondary mr-1">Customers</a>
            <a href="transactions.php" class="btn btn-secondary mr-1">Transactions</a>
            <a href="products.php" class="btn btn-primary mr-1">Products</a>
        </div>
        <hr>
        <h2>Products</h2>
        <a href="addProduct.php" class="btn btn-primary">Add Product</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <?php echo $product->product; ?>
                    </td>
                    <td>
                        <?php echo $product->type; ?>
                    </td>
                    <td>
                        <?php echo sprintf('%.2f', $product->amount / 100); ?>
                        <?php echo strtoupper($product->currency); ?>
                    </td>
                    <td>
                        <?php echo $product->stock; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</body>


</html>