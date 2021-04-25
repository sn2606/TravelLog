<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TravelLog</title>
  <link rel="icon" type="image/png" href="../Images/alps_favicon.png">
  <meta name="description" content="Connect with people over travelling">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../CSS/homepage.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>

  <!-- navbar -->
  <div class="nav-wrapper">
    <nav class="navbar">
      <div class="Logo">
        <img src="../Images/mountain.png" class="Logo-Img" alt="Alps-Logo" usemap="#home">
        <a href="../index.php"><span class="Logo-Text">TRAVELLOG</span></a>
      </div>
      <div class="navigation">
        <ul class="menu">
          <li><a href="../index.php"><i class="fas fa-home"></i></a></li>
          <li><a href="#"><i class="fas fa-bell"></i></a></li>
          <li><a href="#"><i class="fas fa-user-alt"></i></a></li>
        </ul>
        <div class="not-menu">
          <div class="search">
            <div class="search-content">
              <button class="search-button"><i class="fas fa-search"></i></button>
              <input type="text" class="search-input" placeholder="Search here...">
            </div>
          </div>
          <div class="sign-out">
            <a href="../index.php"><span class="menu-text">Sign Out</span></a>
          </div>
          <div class="sign-out-mobile">
            <a href="../index.php"><i class="fas fa-sign-out-alt"></i></a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- map for usemap of Logo-Img -->
  <map name="home">
    <area shape="default" coords="21,21,21" href="../index.php" alt="Home Page">
  </map>

  <!-- One Post -->
  <div id="main-window">
    <div class="post">
      <div class="user">
        <div class="user-stuff">
          <div class="user-img"></div>
          <div class="user-info">
            <div class="user-name">Louis Dickinson</div>
            <span class="post-date">Yesterday at 11:49</span>
          </div>
        </div>
        <div class="actions">
          <span class="heart"></span>
          <span class="comment"></span>
          <span class="share"></span>
        </div>
      </div>
      <div class="content">
        <img src="https://images.pexels.com/photos/450441/pexels-photo-450441.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="Louis image">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati beatae ipsum aperiam recusandae tempora eos architecto odio, voluptatibus, et fuga veritatis, ratione, magnam laudantium quas accusamus! Ea, maiores! Tenetur, nesciunt.
      </div>
    </div>
  </div>
</body>

</html>
