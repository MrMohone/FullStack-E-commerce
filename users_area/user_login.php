<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
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
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <!-- user name field -->
                        <label for="user_username" class="form-lable">User Name</label>
                        <input type="text" id="user_username" name="user_username" class="form-control" 
                        placeholder="Enter your username" autocomplete="off" required="required"/>
                    </div>
                    
                     <!-- password  field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-lable">Password</label>
                        <input type="password" id="user_password" name="user_password" class="form-control" 
                        placeholder="Enter your password" autocomplete="off" required="required"/>
                    </div>
         
                    <!-- submit -->
                     <div class="mt-4 pt-2">
                        <input type="submit" value="Login" name="user_login" class="bg-info py-2 px-3 border-0">
                        <p class="small account">Don't have an account? <a href="user_registration.php" class="text-danger"> Register</a></p>
                     </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
