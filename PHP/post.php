<?php
function displayPosts($sql, $conn, $num, $username=null)
{
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($post = $result->fetch_assoc()) {
?>
            <!-- One Post -->
            <div id="main-window">
                <div class="post">
                    <div class="user">
                        <div class="user-stuff">
                            <div class="user-img">
                                <?php
                                if ($post['profile_img'] != NULL) {
                                    echo '<img style="width: 35px; height: 35px;" src="data:image/jpeg;base64,' . base64_encode($post['profile_img']) . '"/>';
                                } else {
                                ?>
                                    <img class="media-object" style="width: 35px; height: 35px;" alt="Portrait Placeholder" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="user-info">
                                <div class="user-name">
                                    <a href="profile.php?username=<?php echo $post['username']; ?>">
                                        <?php echo $post['name']; ?>
                                    </a>
                                </div>
                                <span class="post-date"><?php echo $post['created_at']; ?></span>
                            </div>
                        </div>
                        <?php
                        if ($num === 1 and $username == $_SESSION['username']) {
                        ?>
                            <div class="actions">
                                <!-- <span id="heart" class="heart"></span>
                            <span class="comment"></span> -->
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
                        <?php } ?>
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
                    <!-- <div class="card__footer">
                        <span class="card__footer__like">
                            <i class="far fa-heart"></i> 
                        </span>
                        <span class="card__footer__comment" id="comment-icon">
                            <i class="far fa-comment"></i> 
                        </span>
                    </div> -->

                    <!-- comments section -->
                    <!-- <div class="comments-section" comments> -->
                    <!-- comment form -->
                    <!-- <form class="clearfix" action="index.php" method="post" id="comment_form">
                            <h6>Post a comment:</h6>
                            <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                            <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
                        </form> -->

                    <!-- Display total number of comments on this post  -->
                    <!-- <hr> -->
                    <!-- comments wrapper -->
                    <!-- <div id="comments-wrapper">
                            <div class="comment clearfix">
                                <img src="../Images/traveller.png" alt="" class="profile_pic">
                                <div class="comment-details">
                                    <span class="comment-name">Melvine</span>
                                    <span class="comment-date">Apr 25, 2021</span>
                                    <p>Beautiful!</p>
                                    <a class="reply-btn" href="#">reply</a>
                                </div>
                                <div> -->
                    <!-- reply -->
                    <!-- <div class="comment reply clearfix">
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
                        </div> -->
                    <!-- // comments wrapper -->
                    <!-- </div> -->
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
<?php
}
?>