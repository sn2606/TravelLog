<link rel="stylesheet" href="../CSS/search.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
require_once "functions.php";
dbConnect();

include "header.php";
?>

<main>

    <?php

    if (isset($_POST['sub'])) {
        $term = mysqli_real_escape_string($conn, $_POST['term']);
        // echo $term;
        $sql = "SELECT * FROM users WHERE name LIKE '%" . $term . "%' OR username LIKE '%" . $term . "%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $username = $row['username'];
                $uid = $row['user_id'];
                $status = $row['status'];
                $profile_img = $row['profile_img'];
                $name = $row['name'];
    ?>
                <div class="card profile-card-5">
                    <div class="card-img-block">
                        <?php
                        if ($profile_img != NULL) {
                            echo '<img style="width: 150px; height: 150px;" src="data:image/jpeg;base64,' . base64_encode($profile_img) . '"/>';
                        } else {
                        ?>
                            <img class="media-object" style="width: 150px; height: 150px;" alt="Portrait Placeholder" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="card-body pt-0">
                        <h5 class="card-title"><?php echo $name ?></h5>
                        <?php
                        echo "@" . $username;
                        ?>
                        <p class="card-text"><?php echo $status ?></p>
                        <a href="profile.php?username=<?php echo $username ?>" class="btn">Profile</a>
                    </div>
                    <hr>
                </div>
    <?php
            }
        }
    }
    ?>

</main>

<?php
include "footer.php";
