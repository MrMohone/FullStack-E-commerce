

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
     <!-- bootstarp css link -->
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awseome link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body{
            overflow-x: hidden;
        }
        img{
            height: 90%;
            width: 85%;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="Admin registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-lable">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter you name"
                        required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter you password"
                        required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login"
                        value="Login">
                        <p class="small fw-bold mt2 pt-1">Don't you have an account? <a href="./admin_registration.php?" class="link-danger">Register</a></p>
                    </div>
                </form>
        </div>
        </div>
    </div>
</body>
</html>

<?php
  if(isset($_POST['admin_login'])){
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];

    $select_query = "SELECT * FROM `admin_table` WHERE 	admin_name = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    // $user_ip = getIPAddress();

    if($row_count > 0){
        $_SESSION['username'] = $user_username;
        if(password_verify($user_password, $row_data['admin_password'])){
            // echo "<script>alert('Login successfully')</script>";
            if($row_count){
                 $_SESSION['username'] = $user_username;
                 echo "<script>alert('Login successfully')</script>";
                 echo "<script>window.open('./index.php','_self')</script>";
            }
        }
    }
    else{
        echo "<script>alert('Please enter valid data')</script>";
    }
  }


?>