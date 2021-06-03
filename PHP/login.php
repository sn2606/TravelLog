<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <link rel="icon" type="image/png" href="../Images/alps_favicon.png">
  <meta name="description" content="Log into the website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../CSS/login.css">
  <!-- google fonts api -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "functions.php";
  ?>
  <!-- background video -->
  <video autoplay muted loop id="backgroundVideo" src="https://player.vimeo.com/external/406227594.sd.mp4?s=d4f7b20af5b399e8a6fe8d4b48c7a6a12a0a4bb3&profile_id=139&oauth2_token_id=57447761"></video>
  <video autoplay muted loop src="https://player.vimeo.com/external/504717899.sd.mp4?s=f97ae0cbf3dab49c7ddedcbef15346dcac089cdf&profile_id=165&oauth2_token_id=57447761" alt="Mobile-Image" id="backgroundImage"></video>

  <!-- title of website -->
  <div class="Site-Title"><a href="../index.html" class="Text">TRAVELLOG</a></div>

  <?php
  dbConnect();

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userquery = "SELECT * FROM users WHERE username = '$username'";
    $userres = $conn->query($userquery);

    if (!$userres->num_rows) {
  ?>
      <p style='color:crimson;'>User does not exist.</p>
      <?php
    } else {
      $userpass = $userres->fetch_assoc();
      $db_pass = $userpass['password'];
      $pass_decode = password_verify($password, $db_pass);

      if ($pass_decode) {
        $_SESSION['name'] = $userpass['name'];
        $_SESSION['username'] = $username;
        $_SESSION['post-flag'] = 1;
        $_SESSION['prof-flag'] = 1;
        $_SESSION['userid'] = $userpass['user_id'];
      ?>
        <script>
          location.replace("homepage.php");
        </script>

  <?php

      } else {
        echo "Password Incorrect";
      }
    }
  }
  ?>

  <!-- login form -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="login-form">
    <div class="login-box">
      <h1>Login</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Username" name="username" id="username" required>
      </div>
      <div class="textbox">
        <i class="fas fa-key"></i>
        <input type="password" placeholder="Password" name="password" id="password" required>
      </div>
      <!-- <div class="forgot-password">
        <a href="#">Forgot Password?</a>
      </div> -->

      <input class="btn" type="submit" value="Sign In" name="login">
      <hr>
      <div class="Acc">
        Don't have an account?
        <a href="signup.php">Create one!</a>
      </div>
    </div>
  </form>

</body>

</html>