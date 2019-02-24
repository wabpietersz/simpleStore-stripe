<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');
require_once('models/Product.php');


\Stripe\Stripe::setApiKey('sk_test_7Ynu0FFj6seQQ2XZ4MCbgdPi');

//sanitize POST array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING );
$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$product = $POST['product'];
$id = $POST['id'];
$amount = $POST['amount'];
$token = $POST['stripeToken'];


// Create Customer in Stripe
$customer = \Stripe\Customer::create(array(
    "email" => $email,
    "source" => $token
));

//charge the customer
$charge = \Stripe\Charge::create(array(
    "amount" => $amount,
    "currency" => "usd",
    "description" => $product,
    "customer" => $customer->id
));

//Customer Data
$customerData = [
    'id' => $charge->customer,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,

];

//Init Customer
$customer = new Customer();

//Add customer
$customer->addCustomer($customerData);

//Transaction Data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product' => $charge->description,
    'product_id' => $id,
    'amount' => $charge->amount,
    'currency' => $charge->currency,
    'status' => $charge->status

];

//Init transaction
$transaction = new Transaction();

//Add transaction
$transaction->addTransaction($transactionData);

//Init Product
$product = new Product();

//reduce stock
$product->stockReduce($id);

//Redirect to success

header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);


