<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form</title>
</head>
<body>
    <?php
    $fName = $lName = "";
    $cnp = 0;
    $jsonContent = file_get_contents('node_modules/cities.json/cities.json');
    $data = json_decode($jsonContent, true);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["fName"])) {
            echo "First name is required";
        } elseif (empty($_POST["lName"])) {
            echo "Last name is required";
        } elseif (empty($_POST["cnp"])) {
            echo "Cnp name is required";
        } elseif ((empty($_POST["fName"]) and empty($_POST["lName"]) and empty($_POST["cnp"])) or empty($_POST["fName"]) and empty($_POST["lName"]) or empty($_POST["lName"]) and empty($_POST["cnp"]) or empty($_POST["fName"]) and empty($_POST["cnp"])) {
            echo "Fill all the fields";
        } else {
                if (isset($_POST["fName"]) and isset($_POST["lName"]) and isset($_POST["cnp"])) {
                    echo '<script>alert("Thank you for completing the fields!")</script>';
                    $fName = $_POST["fName"];
                    $lName = $_POST["lName"];
                    $cnp = $_POST["cnp"];
                }
            }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['fileToUpload'])) {
        $allowedTypes = [IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF];
        $detectedType = exif_imagetype($_FILES['fileToUpload']['tmp_name']);
        $error = !in_array($detectedType, $allowedTypes);
    
        if ($error) {
            echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        } else {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
        
    ?>

    <h1>Welcome To Simple Contact Form</h1>
    <div class="container">
        <!-- Change action to PHP_SELF for the same page and method to POST -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group" method="post">
           <div class="form-flex">
            <label for="fName">First Name</label>
            <!-- Add the name attribute -->
            <input type="text" id="fName" name="fName">
           </div> 
            <div class="form-flex">
                <label for="lName">Last Name</label>
                <!-- Add the name attribute -->
                <input type="text" id="lName" name="lName">
            </div>
            <div class="form-flex">
                <label for="cnp">CNP</label>
                <!-- Add the name attribute -->
                <input type="number" id="cnp" name="cnp">
            </div>
            <input type="submit">
        </form>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpeg, .jpg, .png, .gif">
            <input type="submit" value="Upload Image" name="submit">
        </form>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-group" method="post">
            <label for="city">City:</label>
            <select name="city" id="city">
            <?php
            foreach ($data as $city) {
                echo '<option value="' . htmlspecialchars($city['name']) . '">' . htmlspecialchars($city['name']) . '</option>';
            }
            ?>
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Your Input:</h2>";
        echo $fName;
        echo " ";
        echo $lName;
        echo " ";
        echo $cnp;
    }
    ?>
</body>
</html>
