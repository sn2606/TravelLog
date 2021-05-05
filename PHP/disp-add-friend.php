<?php
function dispAddFriends($sql, $conn)
{
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
?>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                while ($result) {
                    $tuser = $result->fetch_assoc();
                ?>
                    <!-- add friend -->

                    <div class="friend-box">
                        <a href="profile.php?username=<?php echo $tuser['username'] ?>" class="profile-links">
                            <div class="friend-profile" style="background-image: url(&quot;https://images.pexels.com/photos/3328072/pexels-photo-3328072.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500&quot;);"></div>
                        </a>
                        <div class="name-box">
                            <a href="profile.php?username=<?php echo $tuser['username'] ?>" class="profile-links">
                                <?php echo $tuser['name'] ?>
                            </a>
                        </div>
                        <div class="user-name-box">
                            <a href="profile.php?username=<?php echo $tuser['username'] ?>" class="profile-links">
                                @<?php echo $tuser['username'] ?>
                            </a>
                        </div>
                        <div class="request-btn-row">
                            <a href="add-friend.php?uid=<?php echo $tuser['user_id'] ?>">
                                <button class="friend-request accept-request">Add</button>
                            </a>
                        </div>
                    </div>

                <?php
                }
                ?>

            </div>
        </div>
        <!-- ./add friend -->

    <?php
    } else {
    ?><p class="text-center">No users to add!</p><?php
                                                }
                                            }
