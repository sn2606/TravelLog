<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up</title>
  <link rel="icon" type="image/png" href="../Images/alps_favicon.png">
  <meta name="description" content="Log into the website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../CSS/signup.css">
  <!-- google fonts api -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&family=Montserrat&display=swap" rel="stylesheet">
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
    <h1>Sign Up</h1>
    <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" placeholder="Name" name="" id="">
    </div>
    <div class="textbox">
      <i class="fas fa-envelope"></i>
      <input type="email" placeholder="Email" name="" id="">
    </div>
    <div class="textbox">
      <i class="fas fa-at"></i>
      <input type="text" placeholder="Username" name="" id="">
    </div>
    <div class="textbox">
      <i class="fas fa-key"></i>
      <input type="password" placeholder="Password" name="" id="">
    </div>

    <iframe id="t-and-c" src="terms-and-conditions.html" height="100" width="100%" title="Terms and Conditions"></iframe>
    <input type="checkbox" name="Agree" value="Yes" required> <span class="Acc">I Agree to the Terms and Conditions.</span>

    <input onclick="location.href = 'homepage.html';" class="btn" type="submit" value="Sign Up">
    <hr>
    <div class="Acc">
      Already have an account?
      <a href="login.html">Login!</a>
    </div>
  </div>
</body>

</html>