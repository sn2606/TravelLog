<?php
require_once "functions.php";
dbConnect();
if(isset($_POST['update_profile'])) {
    $sql = "UPDATE users SET status = ?, location = ? WHERE user_id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ssi', $_POST['status'], $_POST['location'], $_SESSION['userid']);
    if($statement->execute()) {
        redirect_to("profile.php?username={$_SESSION['username']}");
    } else {
        echo "Error: ".$conn->error;
    }
}