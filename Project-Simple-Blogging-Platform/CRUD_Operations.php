<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include "db.php";
    
    //signin user
    //put info in database users
    function signin() {
        global $connection;

        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "INSERT INTO users ";
        $query .= "(username, password) ";
        $query .= "VALUES ('$username', '$password')";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            echo "something is wrong";
        }
    }

    //login user and redirect to page
    function login() {
        global $connection;

        $username = $_POST["username"];
        $password = $_POST["password"];

        $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            echo "Username or password is wrong";
        } else {
            $user = $result->fetch_assoc();
            if ($password == $user['password']) {
                $_SESSION['username'] = $user['username'];
                header("Location: http://localhost/Project-Simple-Blogging-Platform/index.php");
                exit();
            } else {
                echo "incorrect password";
            }
        }
    }

    //function for displaying the user in the page
    function getUser() {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<h1 style='text-align:center;'>Welcome, " . htmlspecialchars($username) . "!</h1>";
        } else {
            echo "<h1>Welcome, guest!</h1>";
        }
    }

    //Crud Opertions for Posts
    
    function createPosts() {

    }

    function readPosts() {

    }

    function updatePosts() {

    }
    function deletePosts() {

    }
?>