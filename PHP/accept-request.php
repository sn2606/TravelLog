<?php
    require_once "functions.php";
    dbConnect();
    // add users to friends table
    $statement = $conn->prepare("INSERT INTO friends (user_id, friend_id) VALUES (?, ?), (?, ?)");
    // friendship is 2-sided
    $statement->bind_param('iiii', $_SESSION['userid'], $_GET['uid'], $_GET['uid'], $_SESSION['userid']);
    // remove friend request
    if ($statement->execute()) {
        redirect_to("decline-request.php?uid=" . $_GET['uid']);
    } else {
        echo "Error: " . $conn->error;
    }