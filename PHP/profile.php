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
  <link rel="stylesheet" type="text/css" href="../CSS/profile.css">
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

  $sql = "SELECT user_id, name, username, status, profile_img_url, location FROM users WHERE username = ?";
  $statement = $conn->prepare($sql);
  $statement->bind_param('s', $_GET['username']);
  $statement->execute();
  $statement->store_result();
  $statement->bind_result($id, $name, $username, $status, $profile_image_url, $location);
  $statement->fetch();
  ?>>

  <!-- main -->
  <main class="container">
    <div class="row">
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
                <input class="btn btn-primary" type="submit" name="update_profile" value="Save">
              </div>
            </form>
          </div>
        </div>
        <!-- ./edit profile -->
      </div>
      <div class="col-md-6">
        <!-- user profile -->
        <div class="media">
          <div class="media-left">
            <img src="../Images/Background/pexels-dominika-roseclay-1252500.jpg" class="media-object" style="width: 128px; height: 128px;">
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
          $user_posts_sql = "SELECT * FROM posts WHERE user_id = {$id} ORDER BY created_at DESC";
          $result = $conn->query($user_posts_sql);

          if ($result->num_rows > 0) {
            while ($post = $result->fetch_assoc()) {
          ?>
              <!-- One Post -->
              <div id="main-window">
                <div class="post">
                  <div class="user">
                    <div class="user-stuff">
                      <div class="user-img"></div>
                      <div class="user-info">
                        <div class="user-name">Louis Dickinson</div>
                        <span class="post-date"><?php echo $post['created_at']; ?></span>
                      </div>
                    </div>
                    <div class="actions">
                      <span id="heart" class="heart"></span>
                      <span class="comment"></span>
                      <span class="share"></span>
                      <form method="post" action="delete-post.php" id="delete-post" name="delete-post">
                        <?php
                        global $post_id;
                        $post_id = $post['post_id'];
                        ?>
                        <span>
                          <!-- <label for="delete">
                            <input type="submit" id="del-this" name="delete" value="Del" class="btn"> -->
                          <a class="text-danger" href="delete-post.php?id=<?php echo $post['post_id']; ?>">
                            <i class="far fa-trash-alt"></i>
                          </a>
                          <!-- </label> -->
                        </span>
                      </form>
                    </div>
                  </div>
                  <div class="content">
                    <?php
                    if ($post['content_img'] != NULL) {
                      echo '<img src="data:image/jpeg;base64,' . base64_encode($post['content_img']) . '"/>';
                    }
                    echo $post['content'];
                    ?>
                  </div>

                  <!-- how many likes and comments -->
                  <div class="card__footer">
                    <span class="card__footer__like">
                      <i class="far fa-heart"></i> <?php echo $post['likes'] ?>
                    </span>
                    <span class="card__footer__comment" id="comment-icon">
                      <i class="far fa-comment"></i> <?php echo $post['comments'] ?>
                    </span>
                  </div>

                  <!-- comments section -->
                  <div class="comments-section" comments>
                    <!-- comment form -->
                    <form class="clearfix" action="index.php" method="post" id="comment_form">
                      <h6>Post a comment:</h6>
                      <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                      <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
                    </form>

                    <!-- Display total number of comments on this post  -->
                    <hr>
                    <!-- comments wrapper -->
                    <div id="comments-wrapper">
                      <div class="comment clearfix">
                        <img src="../Images/traveller.png" alt="" class="profile_pic">
                        <div class="comment-details">
                          <span class="comment-name">Melvine</span>
                          <span class="comment-date">Apr 25, 2021</span>
                          <p>Beautiful!</p>
                          <a class="reply-btn" href="#">reply</a>
                        </div>
                        <div>
                          <!-- reply -->
                          <div class="comment reply clearfix">
                            <img src="../Images/traveller.png" alt="" class="profile_pic">
                            <div class="comment-details">
                              <span class="comment-name">Louis Dickinson</span>
                              <span class="comment-date">Apr 25, 2021</span>
                              <p>Thank you!</p>
                              <a class="reply-btn" href="#">reply</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- // comments wrapper -->
                  </div>
                  <!-- // comments section -->

                </div>
              </div>
            <?php
            }
          } else {
            ?>
            <p class="text-center">No posts yet!</p>
          <?php
          }
          $conn->close();
          ?>
          <!-- ./post -->
        </div>
        <!-- ./feed -->
      </div>
      <!-- ./timeline -->
      <div class="col-md-3">
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
                <button class="friend-request decline-request" data-username="purplekoala395">Unfriend</button>
              </div>
            </div>
          </div>
        </div>
        <!-- ./friends -->
      </div>
    </div>
  </main>
  <!-- ./main -->

  <!-- footer -->
  <?php
  include "footer.php";
  ?>
  <!-- ./footer -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>

</html>