<?php
include "header.php";
?>

<link rel="stylesheet" href="../CSS/notification.css">
<main>
    <!-- ==================== -->

<?php
dbConnect();
$id = $_SESSION['userid'];
$sql = "SELECT notification,timestamp FROM notifications WHERE user_id='$id' LIMIT 5";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // <!-- Notification Element -->
        $notif = $row["notification"];
        $ts = $row["timestamp"];
        ?>
        <section class="notification animation" id="notification">
            <h6><?php echo $notif ?></h6>
            <a href="#"><?php echo $ts ?></a>
        </section>
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