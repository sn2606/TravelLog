<?php
function dispFriendBox($sql, $conn, $mode, $username = null)
{
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
?>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php
                while ($tuser = $result->fetch_assoc()) {
                ?>
                    <!-- add friend -->

                    <div class="friend-box">
                        <a href="profile.php?username=<?php echo $tuser['username'] ?>" class="profile-links">
                            <div class="friend-profile">
                                <?php
                                if ($tuser['profile_img'] != NULL) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($tuser['profile_img']) . '"/>';
                                } else {
                                ?>
                                    <img class="media-object" style="width: 70px; height: 70px;" alt="Portrait Placeholder" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png">
                                <?php
                                }
                                ?>
                            </div>
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
                            <?php
                            if ($mode === 1) {
                            ?>
                                <a href="add-friend.php?uid=<?php echo $tuser['user_id'] ?>">
                                    <button class="friend-request accept-request">Add</button>
                                </a>
                            <?php
                            } elseif ($mode === 2) {
                            ?>
                                <a href="accept-request.php?uid=<?php echo $tuser['user_id'] ?>">
                                    <button class="friend-request accept-request">Accept</button>
                                </a>
                                <a href="decline-request.php?uid=<?php echo $tuser['user_id'] ?>">
                                    <button class="friend-request decline-request">Decline</button>
                                </a>
                            <?php
                            } elseif ($mode === 3) {
                            ?>
                                <a href="remove-friend.php?uid=<?php echo $tuser['user_id'] ?>">
                                    <?php
                                    if ($username === $_SESSION['username']) {
                                    ?>
                                        <button class="friend-request decline-request">Remove</button>
                                    <?php
                                    }
                                    ?>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <br>

                <?php
                }
                ?>

            </div>
        </div>
        <!-- ./add friend -->

    <?php
    } else {
    ?>
        <p class="text-center">Nothing to display yet!</p>
<?php
    }
}
