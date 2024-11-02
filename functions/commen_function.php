    <?php
        // connect file
        include("./includes/connect.php");


        //getting products
        function getproducts()
        {
            global $con; //very essential part

            //condition to check isset or not
            if (!isset($_GET['category'])) {
                if (!isset($_GET['brand'])) {
                    $select_query = "SELECT * from `products` ORDER BY RAND() LIMIT 0,2";
                    $result_query = mysqli_query($con, $select_query);
                    //  $row = mysqli_fetch_assoc($result_query);
                    //  echo $row['product_title'];
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
               <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-info'>Add to cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                   </div>
               </div>
             </div>";
                    }
                }
            }
        }

        // getting all products in shop.php
        function get_all_products()
        {
            global $con; //very essential part

            //condition to check isset or not
            if (!isset($_GET['category'])) {
                if (!isset($_GET['brand'])) {
                    $select_query = "SELECT * from `products` ORDER BY RAND()";
                    $result_query = mysqli_query($con, $select_query);
                    //  $row = mysqli_fetch_assoc($result_query);
                    //  echo $row['product_title'];
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
               <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-info'>Add to cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                   </div>
               </div>
             </div>";
                    }
                }
            }
        }
        // geting unique categoris
        function get_unique_categories()
        {
            global $con;
            if (isset($_GET['category'])) { //based on browsed data
                $category_id = $_GET['category'];
                $select_query = "SELECT * from `products` WHERE category_id =  $category_id"; //select only specific data
                $result_query = mysqli_query($con, $select_query);
                $num_of_rows = mysqli_num_rows($result_query);
                if ($num_of_rows == 0) {
                    echo "<h2 class = 'text-center text-danger'>No stock for this category</h2>";
                }
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
               <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-info'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                   </div>
               </div>
             </div>";
                }
            }
        }

        // geting unique brands
        function get_unique_brands()
        {
            global $con;
            if (isset($_GET['brand'])) { //based on browsed data
                $brand_id = $_GET['brand'];
                $select_query = "SELECT * from `products` WHERE brand_id =  $brand_id"; //select only specific data
                $result_query = mysqli_query($con, $select_query);
                $num_of_rows = mysqli_num_rows($result_query);
                if ($num_of_rows == 0) {
                    echo "<h2 class = 'text-center text-danger'>This brand isn't available for service</h2>";
                }
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
               <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-info'>Add to cart</a>
                        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                   </div>
               </div>
             </div>";
                }
            }
        }

        // displaying brands in sidenav
        function getbrands()
        {
            global $con;
            $select_brands = "select * from `brands`";
            $result_brands = mysqli_query($con, $select_brands);
            // $row_data = mysqli_fetch_assoc($result_brands);
            // echo $row_data['brand_title'];
            // echo $row_data['brand_title'];
            while ($row_data = mysqli_fetch_assoc($result_brands)) {
                $brand_title = $row_data['brand_title'];
                $brand_id = $row_data['brand_id'];
                // echo $brand_title;
                echo "<li class='nav-item'>
                        <a href='index.php ? brand=$brand_id' class='nav-link text-light'>$brand_title</a> </li>";
            }
        }

        // displaying cayegories in sidenav
        function getcategories()
        {
            global $con;
            $select_categories = "select * from `categories`";
            $result_categoies = mysqli_query($con, $select_categories);
            while ($row_data = mysqli_fetch_assoc($result_categoies)) {
                $category_title = $row_data['category_title'];
                $category_id = $row_data['category_id'];

                echo "<li class='nav-item'>
        <a href='index.php ? category=$category_id' class='nav-link text-light'>$category_title</a> </li>";
            }
        }

        // searching products function
        function search_product()
        {
            global $con; //very essential part
            if (isset($_GET['search_data_product'])) { //based on url
                $search_data_value = $_GET['search_data'];
                $search_product = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
                $result_query = mysqli_query($con, $search_product);
                $num_of_rows = mysqli_num_rows($result_query);
                if ($num_of_rows == 0) {
                    echo "<h2 class = 'text-center text-danger'>No results match.No products found on this category!</h2>";
                }
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    echo "<div class='col-md-4 mb-2'>
               <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-info'>Add to cart</a>
                        <a href='product_details.php ? product_id = $product_id' class='btn btn-secondary'>View More</a>
                   </div>
               </div>
             </div>";
                }
            }
        }

        // view details function
        function view_details(){
            global $con; //very essential part
           if(isset($_GET['product_id'])){
            if (!isset($_GET['category'])) {
                if (!isset($_GET['brand'])) {
                    $product_id = $_GET['product_id'];
                    $select_query = "SELECT * from `products` WHERE product_id  = $product_id ";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_image2 = $row['product_image2'];
                        $product_image3 = $row['product_image3'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
               <div class='card'>
                   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>$product_description</p>
                       <a href='#' class='btn btn-info'>Add to cart</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                   </div>
               </div>
             </div>
              <div class='col-md-8'>
                    <!-- related images -->
                     <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-info mb-5'>Related Products</h4>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                        </div>
                     </div>
                </div>
             
             ";
                    }
                }
            }
        }}
        
        ?> 