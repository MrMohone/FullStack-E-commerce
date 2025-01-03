
<?php
  include("../includes/connect.php");
  include('../functions/commen_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration</title>
    <!-- bootstrap css link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome link
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    
        <style>
            .account{
                font-weight: bold;
                margin-top: 10px;
                padding-top: 3px;
                margin-bottom: 0;
            }
        </style>
    </head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- user name field -->
                        <label for="user_username" class="form-lable">User Name</label>
                        <input type="text" id="user_username" name="user_username" class="form-control" 
                        placeholder="Enter your username" autocomplete="off" required="required"/>
                    </div>
                    <!-- email  field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-lable">Email</label>
                        <input type="email" id="user_email" name="user_email" class="form-control" 
                        placeholder="Enter your email" autocomplete="off" required="required"/>
                    </div>
                     <!-- image  field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-lable">User Image</label>
                        <input type="file" id="user_image" name="user_image" class="form-control" required="required"/>
                    </div>
                     <!-- password  field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-lable">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" 
                        placeholder="Enter your password" autocomplete="off" required="required"/>
                    </div>
                   <!--confirm password  field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-lable">Confrim Password</label>
                        <input type="password" id="conf_user_password" name="conf_user_password" class="form-control" 
                        placeholder="Confrim password" autocomplete="off" required="required"/>
                    </div>
                    <!-- Address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-lable">Address</label>
                        <input type="text" id="user_address" name="user_address" class="form-control" 
                        placeholder="Enter your address" autocomplete="off" required="required"/>
                    </div>
                    <!-- Contatct field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-lable">Contact</label>
                        <input type="text" id="user_contact" name="user_contact" class="form-control" 
                        placeholder="Enter your mobile number" autocomplete="off" required="required"/>
                    </div>
                    <!-- submit -->
                     <div class="mt-4 pt-2">
                        <input type="submit" value="Register" name="user_register" class="bg-info py-2 px-3 border-0">
                        <p class="small account">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
                     </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- php code  -->
 <?php
 if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $password_hash = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // select query
    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username' or user_email = '$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    if($row_count > 0){
        echo "<script> alert('User name and email already exist')</script>";
    }
    else if($user_password != $conf_user_password){
        echo "<script> alert('Password do not match!')</script>";
    }else{
    //  insert query
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");//x
    $insert_query = "INSERT INTO `user_table` (username, user_email, user_password,	user_image, user_ip,user_address,user_mobile)
                            VALUES ('$user_username','$user_email','$password_hash','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_excute = mysqli_query($con, $insert_query);
    echo "<script> alert('You are registerd!')</script>";
 }
//  selecting cart items x
   $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
   $result_cart = mysqli_query($con, $select_cart_items);
   $rows_count = mysqli_num_rows($result_cart);
   if($rows_count > 0){
    $_SESSION['username'] = $user_username;
    echo "<script> alert('You have items in your cart')</script>";
    echo "<script> window.open('checkout.php', '_self')</script>";
   }else{
    echo "<script> window.open('../index.php', '_self')</script>";
   }

}

 ?>