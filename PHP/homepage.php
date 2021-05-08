<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TravelLog</title>
  <link rel="icon" type="image/png" href="../Images/alps_favicon.png">
  <meta name="description" content="Connect with people over travelling">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- custom css -->
  <link rel="stylesheet" href="../CSS/homepage.css">
  <link rel="stylesheet" href="../CSS/post.css">
  <link rel="stylesheet" href="../CSS/friend.css">
  <!-- custom js -->
  <!-- <script src="../JS/scroll-homepage.js" defer></script> -->
  <script src="../JS/homepage.js" defer></script>
  <!-- jQuery -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- google fonts and fontawesome -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
  <!-- navbar/header -->
  <?php
  require_once "functions.php";
  require "header.php";
  dbConnect();
  ?>

  <!-- map for usemap of Logo-Img -->
  <!-- <map name="home">
    <area shape="default" coords="21,21,21" href="../index.html" alt="Home Page">
  </map> -->

  <!-- main -->
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- profile brief -->
        <div class="card profile-card-5">
          <div class="card-img-block">
            <img class="card-img-top" src="https://images.pexels.com/photos/3042160/pexels-photo-3042160.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="Card image cap">
          </div>
          <div class="card-body pt-0">
            <h5 class="card-title"><?php echo $_SESSION['name'] ?></h5>
            <?php
            $sql = "SELECT status FROM users WHERE username = ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param('s', $_SESSION['username']);
            $statement->execute();
            $statement->store_result();
            $statement->bind_result($status);
            $statement->fetch();
            echo "@" . $_SESSION['username'];
            ?>
            <p class="card-text"><?php echo $status ?></p>
            <a href="profile.php?username=<?php echo $_SESSION['username'] ?>" class="btn">Profile</a>
          </div>
          <hr>
        </div>
        <!-- ./profile brief -->

        <!-- friend requests -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Friend Requests</h4>
            <div class="friend-box">
              <div class="friend-profile" style="background-image: url(&quot;https://images.pexels.com/photos/3328072/pexels-photo-3328072.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500&quot;);"></div>
              <div class="name-box">
                Awa L
              </div>
              <div class="user-name-box">
                @awaaa sent you a friend request.
              </div>
              <div class="request-btn-row" data-username="purplekoala395">
                <button class="friend-request accept-request" data-username="purplekoala395">Accept</button>
                <button class="friend-request decline-request" data-username="purplekoala395">Decline</button>
              </div>
            </div>
          </div>
        </div>
        <!-- ./friend requests -->
      </div>
      <div class="col-md-6">
        <!-- post form -->
        <p>Hello <?php echo $_SESSION['name'] ?></p>
        <form method="post" action="create-post.php" id="create-post" name="create-post" enctype="multipart/form-data">
          <div class="input-group">
            <input class="form-control" type="text" name="content" placeholder="Make a post...">
          </div>
          <br>
          <p id="size-chk">
            <?php
            if ($_SESSION['post-flag'] == 0) {
              echo "Please create a valid post";
            }
            $_SESSION['post-flag'] = 1;
            ?>
          </p>
          <span class="input-group-btn">
            <label class="btn" type="button" for="get-photo">
              <input type="file" accept="image/*" name="get-photo" id="get-photo">
              <i class="far fa-images"></i>
            </label>
            <input type="submit" value="Post" name="post" class="btn">
          </span>
        </form>
        <hr>
        <!-- ./post form -->

        <!-- feed -->
        <div class="scrollable">
          <!-- post -->
          <?php
          $sql = "SELECT * FROM posts ORDER BY created_at DESC";

          require "post.php";
          displayPosts($sql, $conn);
          ?>
        </div>
        <!-- ./feed -->
      </div>
      <div class="col-md-3 right">
        <!-- add friends -->
        <h4>Add Friend</h4>
        <?php
        dbConnect();
        $sql = "SELECT user_id, name, username, 
        (SELECT COUNT(*) FROM friends WHERE friends.user_id = users.user_id AND friends.friend_id = {$_SESSION['userid']}) 
        AS is_friend FROM users WHERE user_id != {$_SESSION['userid']} 
        AND (user_id NOT IN (SELECT friend_id FROM friend_requests WHERE friend_requests.user_id = {$_SESSION['userid']} AND friend_requests.friend_id = users.user_id)) 
        AND (user_id NOT IN (SELECT user_id FROM friend_requests WHERE friend_requests.user_id = users.user_id AND friend_requests.friend_id = {$_SESSION['userid']}))        
        HAVING is_friend = 0 LIMIT 3";

        require_once "disp-add-friend.php";
        dispAddFriends($sql, $conn);
        ?>

        <!-- add friends -->

        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Friends</h4>
            <!-- <ul>
              <li>
                <a class="user" href="#">peterpan</a>
                <a class="text-danger" href="#">[unfriend]</a>
              </li>
            </ul> -->
            <div class="friend-box">
              <div class="friend-profile" style="background-image: url(&quot;https://images.pexels.com/photos/3328072/pexels-photo-3328072.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500&quot;);"></div>
              <div class="name-box">
                Awa L
              </div>
              <div class="user-name-box">
                @awaaa sent you a friend request.
              </div>
              <div class="request-btn-row" data-username="purplekoala395">
                <!-- <button class="friend-request accept-request" data-username="purplekoala395">Accept</button> -->
                <button class="friend-request decline-request" data-username="purplekoala395">Remove</button>
              </div>
            </div>
          </div>
        </div>
        <!-- ./friends -->
      </div>
    </div>
  </div>
  <!-- ./main -->
</body>

</html>