
<?php
include("../includes/connect.php");
include("../functions/commen_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
        <!-- bootstrap css link -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       .payment_img{
            width: 60%;
            margin: auto;
            display: block;
        }
    </style>

</head>
<body>
    <!-- php code to access user id -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM `user_table` WHERE user_ip = '$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
     ?>

    <div class="container mt-3">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                 <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.png" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                 <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>