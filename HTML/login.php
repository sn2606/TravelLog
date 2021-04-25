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
  <!-- background video -->
  <video autoplay muted loop id="backgroundVideo" src="../Images/Background/campfire.mp4"></video>
  <img src="../Images/Mobile-Background/pexels-alex-azabache-3214958.jpg" alt="Mobile-Image" id="backgroundImage">

  <!-- title of website -->
  <div class="Site-Title"><a href="../index.html" class="Text">TRAVELLOG</a></div>

  <!-- login form -->
  <div class="login-box">
    <h1>Login</h1>
    <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Username" name="" id="">
    </div>
    <div class="textbox">
      <i class="fas fa-key"></i>
      <input type="password" placeholder="Password" name="" id="">
    </div>
    <div class="forgot-password">
      <a href="#">Forgot Password?</a>
    </div>

    <input onclick="location.href = 'homepage.html';" class="btn" type="button" value="Sign In">
    <hr>
    <div class="Acc">
      Don't have an account?
      <a href="signup.html">Create one!</a>
    </div>
  </div>

</body>

</html>
