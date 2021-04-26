<?php
require_once "functions.php";
dbConnect();
$sql = "DELETE FROM posts WHERE post_id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('i', $_GET['id']);
if ($statement->execute()) {
    redirect_to("homepage.php");
} else {
    echo "Error: " . $conn->error;
}
// $conn->close();