<!-- connect file -->
<?php
include("../includes/connect.php");
include("../functions/commen_function.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce user-profile</title>
    <!-- bootstrap css link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        .profile_img{
            width: 90%;
            margin: auto;
            display: block;
            object-fit: contain;
         }
         .edit_img{
            width: 100px;
            height: 100px;
            object-fit: contain;
         }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid">
                <img src="../images//logo.jpg" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../dispaly_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup> <?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?> /- </a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search"  name="search_data" placeholder="Search" aria-label="Search">
                         <input type="submit"  name="search_data_product" value="Search" class="btn btn-outline-ligth">
                    </form>
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
               
                <!-- login and logout -->
                <?php
                 if(!isset($_SESSION['username'])){
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a> </li>";
                 }else{
                    echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a> </li>";
                 }

                if(!isset($_SESSION['username'])){
                   echo "<li class='nav-item'><a class='nav-link' href='user_login.php'>Login</a> </li>";
                }else{
                   echo "<li class='nav-item'><a class='nav-link' href='user_logout.php'>Logout</a> </li>";
                }
                ?>
            </ul>
        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of E-commerce and Community</p>
        </div>


        <!-- fourht child -->
         <div class="row">
            <div class="col-md-3">
                <ul class="navbar-nav bg-secondary text-center" style="height: 100vh;">
                  <li class="nav-item my-4 bg-info">
                    <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a> 
                  </li>
                 <?php
                    $username = $_SESSION['username'];
                    $user_image = "SELECT * FROM `user_table` WHERE username = '$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image  = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    echo "<li class='nav-item'><img src='./user_images/$user_image' alt='' class='profile_img my-4'></li>";
                 ?>
                 <!-- <li class='nav-item'><img src='../images/milk.jpg' alt='' class='profile_img my-4'></li> -->
                  <li class="nav-item"><a class="nav-link text-light" href="profile.php">Pending orders</a> </li>
                  <li class="nav-item"><a class="nav-link text-light" href="profile.php?edit_account">Edit account</a> </li>
                  <li class="nav-item"><a class="nav-link text-light" href="profile.php?my_orders">My orders</a> </li>
                  <li class="nav-item"><a class="nav-link text-light" href="profile.php?delete_account">Delete account</a> </li>
                  <li class="nav-item"><a class="nav-link text-light" href="user_logout.php">Logout</a></li> 
                </ul>
            </div>
            <div class="col-md-9 text-center" >
                <?php get_user_order_details(); 
                if(isset($_GET['edit_account'])){ 
                    include("edit_account.php");
                }
                if(isset($_GET['my_orders'])){ 
                    include("user_orders.php");
                }
                if(isset($_GET['delete_account'])){ 
                    include("delete_account.php");
                }
                ?>
            </div>
         </div>


        <!-- last child -->
      <!-- include footer -->
      <?php include("../includes/footer.php")  ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>