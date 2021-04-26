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
  <script src="../JS/scroll-homepage.js" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="../JS/homepage.js" defer></script>
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
  <map name="home">
    <area shape="default" coords="21,21,21" href="../index.php" alt="Home Page">
  </map>

  <!-- main -->
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- profile brief -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>swaranjana</h4>
            <p>I love to code!</p>
          </div>
        </div>
        <!-- ./profile brief -->

        <!-- friend requests -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friend requests</h4>
            <ul>
              <li>
                <a class="user" href="#">johndoe</a>
                <a class="text-success" href="#">[accept]</a>
                <a class="text-danger" href="#">[decline]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friend requests -->
      </div>
      <div class="col-md-6">
        <!-- post form -->
        <form method="post" action="create-post.php" id="create-post" name="create-post" enctype="multipart/form-data">
          <div class="input-group">
            <input class="form-control" type="text" name="content" placeholder="Make a post...">
          </div>
          <br>
          <p id="size-chk"></p>
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
        <div>
          <!-- post -->
          <?php
          $sql = "SELECT * FROM posts ORDER BY created_at DESC";
          $result = $conn->query($sql);

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
                      <span><i class="far fa-trash-alt"></i></span>
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
                      <i class="far fa-heart"></i> 13
                    </span>
                    <span class="card__footer__comment" id="comment-icon">
                      <i class="far fa-comment"></i> 2
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
      <div class="col-md-3">
        <!-- add friend -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>add friend</h4>
            <ul>
              <li>
                <a class="user" href="#">alberte</a>
                <a class="text-success" href="#">[add]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./add friend -->

        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friends</h4>
            <ul>
              <li>
                <a class="user" href="#">peterpan</a>
                <a class="text-danger" href="#">[unfriend]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friends -->
      </div>
    </div>
  </div>
  <!-- ./main -->

  <?php
  include "footer.php";
  ?>


</body>

</html>