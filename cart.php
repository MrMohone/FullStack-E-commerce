<!-- connect file -->
<?php
include("includes/connect.php");
include("functions/commen_function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-cart details</title>
    <!-- bootstrap css link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit: contain;
      }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid">
                <img src="./images//logo.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dispaly_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                        </li>
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup> <?php cart_item(); ?></sup></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- calling cart function -->
         <?php
         cart();
         ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>
        <!-- thitd child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of E-commerce and Community</p>
        </div>

        <!-- fourth child table -->
         <div class="container">
            <div class="row">
                <form action="" method="post">
                <table class="table table-bordered text-center">
                    
                        <!-- dispaly dynamic data -->
                         <?php
                          $get_ip_add = getIPAddress();
                          $total_price =0;
                          $cart_query = "SELECT * FROM `cart_details` WHERE 	ip_address = '$get_ip_add'";
                          $result_query = mysqli_query($con, $cart_query);
                          $result_count = mysqli_num_rows($result_query);
                          if($result_count > 0){
                    echo "<thead>
                        <tr>
                            <td>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>";
                          while($row=mysqli_fetch_array($result_query)){
                              $product_id = $row['product_id'];
                              $select_products = "SELECT * FROM `products` WHERE 	product_id  = '$product_id'";
                              $result_products = mysqli_query($con, $select_products);
                              while($row_product_price=mysqli_fetch_array($result_products)){
                                  $product_price = array($row_product_price['product_price']);//200,300
                                  $price_table = $row_product_price['product_price'];
                                  $product_title = $row_product_price['product_title'];
                                  $product_image1 = $row_product_price['product_image1'];
                                  $product_values = array_sum($product_price);//500
                                  $total_price += $product_values;//500
                         ?>
                        <tr>
                            <td><?php echo $product_title; ?></td>
                            <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
                            <td><input type="text" name="qty" class="form-input w-50"></td>
                            <?php
                            $get_ip_add = getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities = $_POST['qty'];
                                $update_cart = "UPDATE `cart_details` SET quantity = $quantities WHERE 	ip_address =  '$get_ip_add'";
                                $result_products_quantity = mysqli_query($con, $update_cart);
                                $total_price = $total_price*$quantities;
                            }
                            ?>
                            <td><?php echo $price_table; ?>/-</td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                            <td>
                               <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                                <input type="submit" value="Update Cart" name="update_cart" class="bg-info px-3 py-2 border-0 mx-3">
                               <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                               <input type="submit" value="Remove Cart" name="remove_cart" class="bg-info px-3 py-2 border-0 mx-3">
                            </td>
                        </tr>
                        <?php
                         }
                        }
                    }else{
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                        ?>
                    </tbody>
                </table>
                <!-- subtotal -->
                 <div class="d-flex mb-5">
                    <?php
                    // $get_ip_add = getIPAddress();
                    // $cart_query = "SELECT * FROM `cart_details` WHERE 	ip_address = '$get_ip_add'";
                    // $result_query = mysqli_query($con, $cart_query);
                    $result_count = mysqli_num_rows($result_query);
                    if($result_count > 0){
                        echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>$total_price /-</strong></h4>
                    <input type='submit' value='Continue shopping' name='continue_shopping' class='bg-info px-3 py-2 border-0 mx-3'>
                    <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</button></a>";
                    }else{
                       echo "<input type='submit' value='Continue shopping' name='continue_shopping' class='bg-info px-3 py-2 border-0 mx-3'> ";
                    }
                    if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('index.php', '_self')</script>";
                    }
                    ?>
                    
                 </div>
            </div>
         </div>
         </form>
         <!-- fuction to remove item -->
              <?php
              function remove_cart_item(){
                global $con;
                if(isset($_POST['remove_cart'])){
                    foreach($_POST['removeitem'] as $remove_id){
                        echo $remove_id;
                        $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
                        $run_delete = mysqli_query($con, $delete_query);
                        if($run_delete){
                            echo "<script> window.open('cart.php' ,'_self')</script>";
                        }
                    }
                }
              }

              echo $remove_item = remove_cart_item();
              ?>

        <!-- last child -->
      <!-- include footer -->
      <?php include("./includes/footer.php")  ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>