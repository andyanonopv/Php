<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "db.php";


if (isset($_POST['title']) && isset($_POST['content'])) {
    // Get the user's ID based on their session (you may need to modify this part)
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $stmt = $connection->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $authorId = $user['id'];

            // Insert the post into the "blogs" table
            $title = $_POST['title'];
            $content = $_POST['content'];

            $stmt = $connection->prepare("INSERT INTO blogs (title, content, author_id) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $title, $content, $authorId);

            if ($stmt->execute()) {
                echo "Post created successfully!";
            } else {
                echo "Error creating the post.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        echo "User is not logged in.";
    }
} else {
    echo "Invalid data submitted.";
}
?>
