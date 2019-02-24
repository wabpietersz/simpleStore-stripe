<?php
// require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');

//init Transaction
$transaction = new Transaction();

//Get transaction
$transactions = $transaction->getTransactions();

//start
require_once('header.php');
?>



<body>
    <div class="container mt-4">
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-secondary">Customers</a>
            <a href="transactions.php" class="btn btn-primary ml-1">Transactions</a>
            <a href="products.php" class="btn btn-secondary ml-1">Products</a>

        </div>
        <hr>
        <div>
            <h2>Transactions</h2>
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Customer ID</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td>
                            <?php echo $transaction->id; ?>
                        </td>
                        <td>
                            <?php echo $transaction->customer_id; ?>
                        </td>
                        <td>
                            <?php echo $transaction->product; ?>
                        </td>
                        <td>
                            <?php echo sprintf('%.2f', $transaction->amount / 100); ?>
                            <?php echo strtoupper($transaction->currency); ?>
                        </td>
                        <td>
                            <?php echo $transaction->created_at; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>