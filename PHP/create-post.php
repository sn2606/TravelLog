<?php
require_once "functions.php";
dbConnect();

if (isset($_POST['post'])) {

    if (empty($_POST['content']) && empty($_FILES['get-photo']['tmp_name'])) {
        print "Invalid post";
        $_SESSION['post-flag'] = 0;
?>
        <script>
            window.location.replace("homepage.php");
            // window.onload = function() {
            //     document.getElementById("size-chk").innerHTML = "Please make a valid post";
            // }
        </script>
<?php
    } else {

        // $sql = "INSERT INTO posts (user_id, content, content_img, created_at) VALUES (?, ?, ?, ?)";
        $content = $_POST['content'];
        $blobimg = file_get_contents($_FILES['get-photo']['tmp_name']);
        $uid = $_SESSION['userid'];
        $date = date('Y/m/d H:i:s');
        $statement = $conn->prepare("INSERT INTO posts (user_id, content, content_img, created_at) VALUES (?, ?, ?, ?)");
        $statement->bind_param('isss', $uid, $content, $blobimg, $date);
        // $statement->bind_param('s', $content);
        // $statement->bind_param('b', $blobimg);
        // $statement->bind_param('s', $date);
        if ($statement->execute()) {
            $_SESSION['post-flag'] = 1;
            redirect_to("homepage.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
// $conn->close();