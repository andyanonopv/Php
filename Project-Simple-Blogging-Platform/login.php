<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "db.php";
    include "CRUD_Operations.php";
    
    if(isset($_POST["submit"])) {
        login();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login To App</title>
</head>
<body>
    <div class="container-fluid login">
        <div class="col-xs-6 form">
            <h1>Login Account</h1>
            <form action="login.php" method="post">
                <div class="input-group">
                <label for="username" class="form-label" style="padding: 0 15px;">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                </div>
                <br>
                <div class="input-group">
                <label for="password" class="form-label" style="padding: 0 15px;">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <br>
                <input class="btn btn-primary" type="submit" name="submit">
                <p>Don`t have an account ? Go to <a href="signin.php">siginin in</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>