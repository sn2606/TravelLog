<?php
require_once "functions.php";
dbConnect();

$sql = "DELETE FROM friend_requests WHERE user_id = ? and friend_id = ?";
$statement = $conn->prepare($sql);
$statement->bind_param('ii', $_GET['uid'], $_SESSION['userid']);
if ($statement->execute()) {
    redirect_to("homepage.php");
} else {
    echo "Error: " . $conn->error;
}
