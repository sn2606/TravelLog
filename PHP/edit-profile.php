<?php
require_once "functions.php";
dbConnect();
echo "Hello";
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

if (isset($_POST['update_img'])) {

    if (empty($_FILES['get-photo']['tmp_name'])) {
        print "Invalid request";
        $_SESSION['prof-flag'] = 0;
        redirect_to("profile.php?username={$_SESSION['username']}");
    } else {

        // $sql = "INSERT INTO posts (user_id, content, content_img, created_at) VALUES (?, ?, ?, ?)";
        $blobimg = file_get_contents($_FILES['get-photo']['tmp_name']);
        $uid = $_SESSION['userid'];
        // $sql = "INSERT INTO users(profile_img) VALUES '$blobimg' WHERE user_id = '$uid'";
        $statement = $conn->prepare("UPDATE users SET profile_img = ? WHERE user_id = ?");
        $statement->bind_param('si', $blobimg, $uid);
        // $statement->bind_param('s', $content);
        // $statement->bind_param('b', $blobimg);
        // $statement->bind_param('s', $date);
        if ($statement->execute()) {
            $_SESSION['prof-flag'] = 1;
            redirect_to("profile.php?username={$_SESSION['username']}");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
$conn->close();