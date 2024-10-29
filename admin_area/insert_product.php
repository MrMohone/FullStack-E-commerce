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
        <!-- Brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select" >
                <option value="">Select a Category</option>
                <option value="">Category1</option>
                <option value="">Category2</option>
                <option value="">Category3</option>
                <option value="">Category4</option>
            </select>
        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select" >
                <option value="">Select a Brands</option>
                <option value="">Brands1</option>
                <option value="">Brands2</option>
                <option value="">Brands3</option>
                <option value="">Brands4</option>
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
        <!-- Price -->
        <div class="form-outline mb-4 w-50 m-auto">
           <input type="submit" name="insert_products" class="btn btn-info mb-3 px-3" value="Insert Products">
        </div>
        
     </form>
</div>
    
</body>
</html>