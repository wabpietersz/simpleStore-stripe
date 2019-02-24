<?php
//start
require_once('header.php');

$GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

$id = $GET['ID'];
$product = $GET['product'];
$amount = $GET['amount'];
$type = $GET['type'];
$currency = 'usd';

?>


<body>
  <div class="container">
    <br>
    <form action="./charge.php" method="post" id="payment-form">
    <hr>
    <h3>Product Info</h3>
    <div class="form-row">

        <div class="form-group col-md-6">
          <label for="product">Product Name</label>
          <input type="text" name="product_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="" value="<?php echo $product; ?> <?php echo $type; ?>" disabled>
        </div>
        <div class="form-group col-md-6">
          <label for="amount">Amount</label>
          <input type="text" name="price" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="" value="<?php echo sprintf('%.2f', $amount / 100); ?> <?php echo strtoupper($currency); ?> " disabled>
        </div>
      </div>
      <hr>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="text" name="first_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="First Name">
        </div>
        <div class="form-group col-md-6">
          <input type="text" name="last_name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Last Name">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email">

        </div>

        <input type="text" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Amount" value="<?php echo $amount; ?>" hidden>
        <input type="text" name="product" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Amount" value="<?php echo $product; ?>" hidden>
        <input type="text" name="id" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Amount" value="<?php echo $id; ?>" hidden>

      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
      <div id="card-element" class="form-control">
          <!-- A Stripe Element will be inserted here. -->
        </div>
        </div>


        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button>Submit Payment</button>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script src="js/charge.js"></script>

</body>

</html>