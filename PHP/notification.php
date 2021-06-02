<?php
include "header.php";
?>

<link rel="stylesheet" href="../CSS/notification.css">
<main>
    <!-- ==================== -->

<?php
dbConnect();
$id = $_SESSION['userid'];
$sql = "SELECT notification,timestamp FROM notifications WHERE user_id='$id' ORDER BY timestamp DESC LIMIT 5";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // <!-- Notification Element -->
        $notif = $row["notification"];
        $ts = $row["timestamp"];
        ?>
        <div class="notification animation" class="notification">
            <h6><?php echo $notif ?></h6>
            <a href="#"><?php echo $ts ?></a>
        </div>
        <br>
        <?php
        // <!-- Notification Element -->
    }
} else {
    echo "<h3> No notifications! </h3>";
}
?>    
    <!-- ==================== -->
</main>

<?php
include "footer.php";
?>