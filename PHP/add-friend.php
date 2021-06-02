<?php
require_once "functions.php";
dbConnect();
$sql = "INSERT INTO friend_requests(user_id, friend_id) VALUES (?, ?)";
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $_SESSION['userid'], $_GET['uid']);
if ($statement->execute()) {
    $id = $_GET['uid'];
    $un = $_SESSION['username'];
    $msg = "@".$un." sent you a friend request.";
    $sql = "INSERT into notifications(user_id, notification) VALUES('$id','$msg')";
    if($conn->query($sql)){
        redirect_to("homepage.php?request_sent=true");
    }
} else {
    echo "Error: " . $conn->error;
}