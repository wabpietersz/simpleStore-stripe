<?php
// require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Product.php');
require_once('models/Transaction.php');

//init Customer
$product = new Product();

//Get Customer
$products = $product->getProductsAvailable();

//start
require_once('header.php');
?>

<body>
    <div class="container mt-4">
        <div class="row">
        <?php foreach($products as $p): ?>
            <div class="col-md-3">
                <div class="card bg-light mb-4">
                    <div class="card-header"><b><?php echo $p->product; ?></b> <small><?php echo $p->type;?></small></div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <img src="https://assets.academy.com/mgen/69/20017969.jpg?wid=50&hei=50" style="height:100px" alt="">
                        </h5>
                        <p class="card-text"><?php echo sprintf('%.2f', $p->amount / 100); ?> <?php echo strtoupper($p->currency); ?></p>
                        <a href="index.php?product=<?php echo $p->product; ?>&type=<?php echo $p->type; ?>&amount=<?php echo $p->amount; ?>&ID=<?php echo $p->id; ?>" class="btn btn-primary">Purchase</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
        </div>

    </div>
</body>

</html>