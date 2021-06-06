<?php
if (isset($_POST['sub'])) {
  $to = "swaranjananayak@gamil.com"; // this is your Email address
  $from = $_POST['email']; // this is the sender's Email address
  $name = $_POST['name'];
  $subject = "Form submission";
  $message = $name . " " . $from . " wrote the following:" . "\n\n" . $_POST['message'];

  $headers = "From:" . "adreaminginworld@gmail.com";
  mail($to, $subject, $message, $headers);
  echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Contact Us</title>
  <link rel="icon" type="image/png" href="../Images/alps_favicon.png">
  <meta name="description" content="Connect with people over travelling">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../CSS/contact-us.css">
  <!-- google font api -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "functions.php";
  ?>
  <section class="contact">
    <div class="container">
      <!-- contact information of the company -->
      <div class="contact-info">
        <a href="../index.html">
          <h2>TRAVELLOG</h2>
        </a>
        <div class="box">
          <div class="icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <div class="text">
            <h3>Address</h3>
            <p>Rahjung street, Pune, India</p>
          </div>
        </div>

        <div class="box">
          <div class="icon">
            <i class="fas fa-envelope"></i>
          </div>
          <div class="text">
            <h3>Email</h3>
            <p>contact@travellog.com</p>
          </div>
        </div>

        <div class="box">
          <div class="icon">
            <i class="fas fa-phone"></i>
          </div>
          <div class="text">
            <h3>Phone</h3>
            <p>123-456-7890</p>
          </div>
        </div>
      </div>

      <!-- the actual form -->
      <div class="contact-form">
        <form action="contact-us.php" method="POST">
          <h2>Send Message</h2>
          <div class="input-box">
            <input type="text" name="name" value="" required>
            <span>Full Name</span>
          </div>
          <div class="input-box">
            <input type="text" name="email" value="" required>
            <span>Email</span>
          </div>
          <div class="input-box">
            <textarea name="message" required></textarea>
            <span>Message</span>
          </div>
          <div class="input-box">
            <input type="submit" name="sub" value="Send">
          </div>
        </form>
      </div>
    </div>
  </section>

</body>

</html>