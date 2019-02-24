<?php
// require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Product.php');
require_once('models/Transaction.php');

//start
require_once('header.php');
?>




<body>
    <div class="container mt-4">
        <hr>
        <h2>Add Product</h2>
        <form action="./productController.php" method="post" id="add">
 
                <div class="form-group">
                    <input type="text" name="product" class="form-control mb-3 StripeElement StripeElement--empty"
                        placeholder="Product Name">
                </div>
                <div class="form-group">
                    <input type="text" name="type" class="form-control mb-3 StripeElement StripeElement--empty"
                        placeholder="Product Type">
                </div>
                <div class="form-group">
                    <input type="text" name="amount" class="form-control mb-3 StripeElement StripeElement--empty"
                        placeholder="Price">
                </div>
                <div class="form-group">
                    <input type="text" name="stock" class="form-control mb-3 StripeElement StripeElement--empty"
                        placeholder="Number of Stocks">
                </div>


                <!-- <input type="text" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Amount"> -->


            <button class="btn btn-primary btn-md">Add to Stock</button>
        </form>

    </div>
</body>

</html>