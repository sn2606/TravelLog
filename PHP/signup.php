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

  <!-- background images -->
  <img src="https://images.pexels.com/photos/998641/pexels-photo-998641.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" id="backgroundVideo">
  <img src="https://images.pexels.com/photos/1624496/pexels-photo-1624496.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="Mobile-Imange" id="backgroundImage">

  <!-- title of website -->
  <div class="Site-Title"><a href="../index.html" class="Text">TRAVELLOG</a></div>

  <?php
  require_once "functions.php";
  ?>

  <?php
  dbConnect();
  if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['confirm']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery = "SELECT * FROM users WHERE email = '$email'";
    $emailres = $conn->query($emailquery);

    $userquery = "SELECT * FROM users WHERE username = '$username'";
    $userres = $conn->query($userquery);

    if ($emailres->num_rows > 0) {
      echo "Email already exists.";
    } elseif ($userres->num_rows > 0) {
      echo "User already exists.";
    } else {
      if ($password === $cpassword) {
        $sql = "INSERT INTO users(name, email, username, password) VALUES('$name', '$email', '$username', '$pass')";
        $result = $conn->query($sql);
        $sql = "SELECT user_id FROM users WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $id = $row['user_id'];
            $sql = "INSERT into notifications(user_id, notification) VALUES('$id', 'Welcome to TravelLog')";
            $res = $conn->query($sql);
          }
        }
        redirect_to("login.php");
      } else {
        echo "Passwords not matching.";
      }
    }
    $conn->close();
  }
  ?>

  <!-- login form -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="signup-form">
    <div class="login-box">
      <h1 id="sutext">Sign Up</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Name" name="name" id="name" required>
      </div>
      <div class="textbox">
        <i class="fas fa-envelope"></i>
        <input type="email" placeholder="Email" name="email" id="email" required>
      </div>
      <div class="textbox">
        <i class="fas fa-at"></i>
        <input type="text" placeholder="Username" name="username" id="username" required>
      </div>
      <div class="textbox">
        <i class="fas fa-key"></i>
        <input type="password" placeholder="Password" name="password" id="password" required>
      </div>
      <div class="textbox">
        <i class="fas fa-key"></i>
        <input type="password" placeholder="Confirm Password" name="confirm" id="confirm" required>
      </div>

      <iframe id="t-and-c" src="terms-and-conditions.php" height="100" width="100%" title="Terms and Conditions"></iframe>
      <input type="checkbox" name="Agree" value="Yes" required> <span class="Acc">I Agree to the Terms and Conditions.</span>

      <input class="btn" type="submit" value="Sign Up" name="signup">
      <hr>
      <div class="Acc">
        Already have an account?
        <a href="login.php">Login!</a>
      </div>
    </div>
  </form>
</body>

</html>