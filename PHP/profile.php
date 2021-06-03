<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TravelLog</title>
  <link rel="icon" type="image/png" href="../Images/alps_favicon.png">
  <meta name="description" content="Connect with people over travelling">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../JS/homepage.js"></script>
  <link rel="stylesheet" type="text/css" href="../CSS/profile.css">
  <link rel="stylesheet" type="text/css" href="../CSS/post.css">
  <link rel="stylesheet" href="../CSS/friend.css">
</head>

<body>
  <!-- nav -->
  <?php
  require_once "functions.php";
  include "header.php";
  // dbConnect();
  ?>

  <?php
  check_auth();
  dbConnect();

  $sql = "SELECT user_id, name, username, status, profile_img, location FROM users WHERE username = ?";
  $statement = $conn->prepare($sql);
  $statement->bind_param('s', $_GET['username']);
  $statement->execute();
  $statement->store_result();
  $statement->bind_result($id, $name, $username, $status, $profile_image, $location);
  $statement->fetch();
  ?>

  <!-- main -->
  <main class="container">
    <div class="row">
      <?php
      if ($username == $_SESSION['username']) {
      ?>
        <div class="col-md-3">
          <!-- edit profile -->
          <div class="panel panel-default">
            <div class="panel-body">
              <h4>Edit profile</h4>
              <form method="post" action="edit-profile.php">
                <div class="form-group">
                  <input class="form-control" type="text" name="status" placeholder="Status" value="">
                </div>

                <div class="form-group">
                  <input class="form-control" type="text" name="location" placeholder="Location" value="">
                </div>

                <div class="form-group">
                  <input class="btn" type="submit" name="update_profile" value="Save">
                </div>
              </form>
            </div>
          </div>
          <!-- ./edit profile -->
          <!-- edit profile img -->
          <div class="panel panel-default">
            <div class="panel-body">
              <h4>Change profile image</h4>
              <form method="post" action="edit-profile.php" enctype="multipart/form-data">
                <p id="size-chk">
                  <?php
                  if ($_SESSION['prof-flag'] == 0) {
                    echo "Please upload a valid image";
                  }
                  $_SESSION['prof-flag'] = 1;
                  ?>
                </p>
                <span class="input-group-btn">
                  <label class="btn" type="button" for="get-photo">
                    <input type="file" accept="image/*" name="get-photo" id="get-photo">
                    <i class="far fa-images"></i>
                  </label>
                  <input type="submit" value="Change" name="update_img" class="btn">
                </span>
              </form>
            </div>
          </div>
          <!-- /edit profile img -->
        </div>
      <?php
      }
      ?>
      <div class="col-md-6">
        <!-- user profile -->
        <div class="media">
          <div class="media-left">
            <?php
            if ($profile_image != NULL) {
              echo '<img style="width: 128px; height: 128px;" src="data:image/jpeg;base64,' . base64_encode($profile_image) . '"/>';
            } else {
            ?>
              <img class="media-object" style="width: 128px; height: 128px;" alt="Portrait Placeholder" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png">
            <?php
            }
            ?>
            <!-- <img src="../Images/Background/pexels-dominika-roseclay-1252500.jpg" class="media-object" style="width: 128px; height: 128px;"> -->
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $name ?></h2>
            <h4><?php echo "@$username" ?></h4>
            <p>Status: <?php echo $status ?><br>Location: <?php echo $location ?></p>
          </div>
        </div>
        <!-- user profile -->

        <hr>

        <!-- timeline -->
        <!-- feed -->
        <div class="scrollable">
          <!-- post -->
          <?php
          $user_posts_sql = "SELECT * FROM posts, users WHERE posts.user_id = users.user_id AND users.user_id = {$id} ORDER BY created_at DESC";
          require "post.php";
          displayPosts($user_posts_sql, $conn, 1, $username);
          ?>
        </div>
        <!-- ./feed -->
      </div>
      <!-- ./timeline -->
      <div class="col-md-3">
        <!-- friends -->
        <h4>Friends</h4>
        <?php
        dbConnect();
        $sql = "SELECT * FROM users,friends WHERE friends.friend_id = {$id} 
        AND users.user_id = friends.user_id LIMIT 3";

        require_once "disp-friend-box.php";
        // mode is how to display the box
        // 1 - Add friend (send request)
        // 2 - Accept / Decline friend requests
        // 3 - Remove existing friends
        $mode = 3;
        dispFriendBox($sql, $conn, $mode, $username);
        ?>
        <!-- ./friends -->
      </div>
    </div>
  </main>
  <!-- ./main -->

  <!-- footer -->
  <?php
  // include "footer.php";
  ?>
  <!-- ./footer -->
</body>

</html>