<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "db.php";
    include "CRUD_Operations.php";
    include "create_posts.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Blog Platform</title>
</head>
<body>
    <div class="container-fluid blog">
        <!-- Display a welcome message to the user if succesfully logged in -->
        <?php 
              getUser();
        ?>
      <div class="blog-container">
          <button class="btn btn-primary" id="createBlog">Do you want to create a blog ?</button>
          <div class="create-blog">

          </div>
          <div class="display-blog">

          </div>  
      </div>  
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>