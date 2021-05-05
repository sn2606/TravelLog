<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TravelLog</title>
  <link rel="icon" type="image/png" href="Images/alps_favicon.png">
  <meta name="description" content="Connect with people over travelling">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/style.css">
  <!-- jQuery -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- google font api -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="JS/change-bg.js" defer></script>
</head>


<body>
  <?php
  require_once "PHP/functions.php";
  dbConnect();
  ?>
  <!-- short content -->
  <div id="content">
    <header>
      <h2><a href="#">TRAVELLOG</a></h2>
      <nav>
        <li><a href="PHP/signup.php">Get Started</a></li>
        <li><a href="PHP/about-us.php">About</a></li>
        <li><a href="PHP/contact-us.php">Contact</a></li>
      </nav>
    </header>

    <div class="Tagline">
      <h1>NEVER STOP EXPLORING</h1>
      <h3>Connect with other travellers and explorers</h3>
      <br> <br>
      <div class="buttons-flex">
        <a href="PHP/login.php" class="button">Login</a>
        <a href="PHP/signup.php" class="button">Sign Up</a>
      </div>
    </div>
  </div>

  <!-- footer section -->
  <footer class="footer-distributed">
    <div class="footer-top">
      <p class="footer-links">
        <a href="PHP/about-us.php">About Us</a>
        <a href="PHP/contact-us.php">Contact Us</a>
      </p>
    </div>
    <div class="footer-icons">
      <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
      <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
      <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
      <a href="https://github.com/sn2606/TravelLog"><i class="fab fa-github"></i></a>
    </div>
    <hr>
    <p class="footer-company-name"><strong>TravelLog &copy; 2021</strong></p>
  </footer>
</body>

</html>