<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');
require_once('models/Product.php');

$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING );
$product = $POST['product'];
$type = $POST['type'];
$amount = $POST['amount'];
$stock = $POST['stock'];

$amount = $amount *100;

//Product Data
$productData = [
    'product' => $product,
    'type' => $type,
    'amount' => $amount,
    'currency' => 'usd',
    'stock' => $stock,

];

$name = $product;
//Init product
$productobj = new Product();


//available product or not
$availabilty = $productobj->productAvailable($name);


if($availabilty){
    //update with the new stock
    //
    //***checking the amount and type */
    //
    $productobj->updateProduct($name,$stock);



}else{
    //Add product
    $productobj->addProduct($productData); 
}


header('Location: products.php');

