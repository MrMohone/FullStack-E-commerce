<?php
include("../includes/connect.php");
session_start();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    // echo $order_id;
    $select_data = "SELECT * FROM `user_orders` WHERE order_id = $order_id";
    $result = mysqli_query($con,$select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
   $invoice_number = $_POST['invoice_number'];
   $amount = $_POST['amount'];
   $payment_mode = $_POST['payment_mode'];
   $insert_query = "INSERT INTO `user_payment` (order_id,invoice_number,amount,payment_mode)
       VALUES ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result_query =mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Successfully</h3>";
        echo "<script>window.open('profile.php?my_orders', '_self')</script>";
    }
    $update_order = "UPDATE `user_orders` SET order_statuse='Complete' WHERE  order_id = $order_id";
    $result_order = mysqli_query($con, $update_order);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   </style>

</head>
<body class="bg-secondary">
    <div class="container my-5">
    <h1 class="text-center text-light">Confrim Payment</h1>
        <form action="" method="post" >
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due; ?>">
            </div>
            <div class="form-outline mt-4 text-center w-50 m-auto">
                <p></p>
                <select name="payment_mode" class="form-select w-50 m-auto p-2">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Cash on Delivery</option>
                    <option>Payoffline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info mt-4 py-2 px-3 border-0" value="Confrim"
                name="confirm_payment">
            </div>

        </form>
    </div>
</body>
</html>