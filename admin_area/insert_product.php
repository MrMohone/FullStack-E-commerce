
<?php
 include("../includes/connect.php");

 if(isset($_POST['insert_product'])){//button onclick or submit
    $product_title = $_POST['product_title'];
    $decription = $_POST['decription'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // checking empty condition
    if($product_title == '' or $decription == '' or  $product_keywords == '' or $product_category == '' or
    $product_brands == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == ''){
      echo "<script> alert('please fill available fildes!')</script>";
      exit();
    }else{ //move into dynamic folder
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        //insert query
        $insert_products = "insert into `products` (product_title, product_description,
                             product_keywords, category_id, brand_id, product_image1,
                             product_image2, product_image3, product_price, date, status)
                       values ('$product_title','$decription','$product_keywords','$product_category',
                       '$product_brands','$product_image1','$product_image2','$product_image3','$product_price',
                       NOW(), '$product_status')";

                       $result_query = mysqli_query($con, $insert_products);
                       if($result_query){
                        echo "<script> alert('Successfully inserted the products')</script>";

                       }
    }

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
       <!-- bootstarp css link -->
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awseome link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    
<div class="container mt-3">
    <h1 class="text-center">Insert Products</h1>
    
    <!-- form -->
     <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-lable">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control"
            placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <!-- decription -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="decription" class="form-lable">Product decription</label>
            <input type="text" name="decription" id="decription" class="form-control"
            placeholder="Enter product decription" autocomplete="off" required="required">
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-lable">Product keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control"
            placeholder="Enter product keywords" autocomplete="off" required="required">
        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select" ><!--product_category will return <option value=""> -->
                <option value="">Select a Category</option>
                <?php
                  $select_query = "select * from `categories`";
                  $result_query = mysqli_query($con, $select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                  }
                ?>
            </select>
        </div>
        <!-- Brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select" >
                <option value="">Select a Brands</option>
                <?php
                  $select_query = "select * from `brands`";
                  $result_query = mysqli_query($con, $select_query);
                  while($row = mysqli_fetch_assoc($result_query)){
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                  }
                ?>
            </select>
        </div>
        <!-- Image 1 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-lable">Product Image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
        </div>
        <!-- Image 2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-lable">Product Image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
        </div>
        <!-- Image 3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-lable">Product Image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
        </div>
        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-lable">Product price</label>
            <input type="text" name="product_price" id="product_price" class="form-control"
            placeholder="Enter product price" autocomplete="off" required="required">
        </div>
        <!-- submit -->
        <div class="form-outline mb-4 w-50 m-auto">
           <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
        </div>
        
     </form>
</div>
    
</body>
</html>