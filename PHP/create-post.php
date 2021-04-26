<?php
require_once "functions.php";
dbConnect();
if(isset($_POST['post'])){
    // $sql = "INSERT INTO posts (user_id, content, content_img, created_at) VALUES (?, ?, ?, ?)";
    $content = $_POST['content'];
    $blobimg = file_get_contents($_FILES['get-photo']['tmp_name']);
    $zero = 0;
    $date = date('Y/m/d H:i:s');
    $statement = $conn->prepare("INSERT INTO posts (user_id, content, content_img, created_at) VALUES (?, ?, ?, ?)");
    $statement->bind_param('isss', $zero, $content, $blobimg, $date);
    // $statement->bind_param('s', $content);
    // $statement->bind_param('b', $blobimg);
    // $statement->bind_param('s', $date);
    if ($statement->execute()) {
        redirect_to("homepage.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
// $conn->close();