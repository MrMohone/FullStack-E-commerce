<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center mb-5">Admin Registration</h2>
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
                        <label for="Email" class="form-lable">Email</label>
                        <input type="emil" id="Email" name="Email" placeholder="Enter you email"
                        required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter you password"
                        required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confrim_password" class="form-lable">Confrim Password</label>
                        <input type="password" id="confrim_password" name="confrim_password" placeholder="Confrim password "
                        required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registratiion"
                        value="Register">
                        <p class="small fw-bold mt2 pt-1">Do you already have an account? <a href="./admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
        </div>
        </div>
    </div>
</body>
</html>