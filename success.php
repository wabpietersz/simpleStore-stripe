<?php
 if(!empty($_GET['tid']) && !empty($_GET['product'])){
     $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

     $tid = $GET['tid'];
     $product = $GET['product'];
 }else{
     header('Location: index.php');
 }
//start
require_once('header.php');
?>

<body>
    <div class="container mt-4">

        <div class="card">
            <h5 class="card-header">Thank you for purchasing
                <?php echo $product; ?>
            </h5>
            <div class="card-body">
                <h5 class="card-title">
                    <p>Your Transaction ID is
                        <?php echo $tid; ?>
                    </p>
                </h5>
                <p class="card-text">Check your email for more info</p>
                <a href="stores.php" class="btn btn-primary">Back to Shopping</a>
            </div>
        </div>
    </div>
</body>

</html>