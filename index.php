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
    <title>Ecommerce Website</title>
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
        body{
            overflow-x: hidden;
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
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                        </li>
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup> <?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?> /- </a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search" action="search_product.php" method="get">
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./users_area/user_login.php">Login</a>
                </li>
            </ul>
        </nav>
        <!-- thitd child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at the heart of E-commerce and Community</p>
        </div>


        <!-- fourht child -->
        <div class="row px-1">
            <div class="col-md-10">
                <!-- products -->
                <div class="row ">
                    <!-- fetching products -->
                    <?php
                    //calling function

                    getproducts();//cool idea
                    get_unique_categories();
                    get_unique_brands();
                    // $ip = getIPAddress();  
                    // echo 'User Real IP Address - '.$ip;  
                    ?>
                    <!-- row end -->
                </div>
                <!-- colum end -->
            </div>
            <div class="col-md-2 bg-secondary p-0">

                <!-- brands to be displayed-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Delivery Brands</h4>
                        </a>
                    </li>
                    <?php
                    //function calling
                    getbrands();
                    ?>
                </ul>
                <!-- categories are displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info"><a href="#" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    
                <?php
                //calling function
                   getcategories();
                    ?>
                </ul>
            </div>
        </div>

        <!-- last child -->
      <!-- include footer -->
      <?php include("./includes/footer.php")  ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>