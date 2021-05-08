<?php
require_once "functions.php";
dbConnect();
$sql = "DELETE FROM friends WHERE (user_id = ? AND friend_id = ?) OR (user_id = ? AND friend_id = ?)";
$statement = $conn->prepare($sql);
$statement->bind_param('iiii', $_GET['uid'], $_SESSION['userid'], $_SESSION['userid'], $_GET['uid']);
if ($statement->execute()) {
    redirect_to("homepage.php");
} else {
    echo "Error: " . $conn->error;
}
