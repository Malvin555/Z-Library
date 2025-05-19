<?php
session_start();

if(isset($_SESSION["signIn"])) {
  header("Location: ../../DashboardAdmin/dashboardAdmin.php");
  exit;
}

require "../../loginSystem/connect.php";

$error_message = '';

if(isset($_POST["signIn"])) {
  
  $nama = strtolower($_POST["nama_admin"]);
  $password = $_POST["password"];
  
  $result = mysqli_query($connect, "SELECT * FROM admin WHERE nama_admin = '$nama' AND password = '$password'");
  
  if(mysqli_num_rows($result) === 1) {
    // SET SESSION 
    $_SESSION["signIn"] = true;
    $_SESSION["admin"]["nama_admin"] = $nama;
    header("Location: ../../DashboardAdmin/dashboardAdmin.php");
    exit;
  } else {
    $error_message = "Incorrect username or password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

  <!--=============== REMIXICONS ===============-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="../../assets/css/styles.css">

  <title>Z - Library | Login</title>

  <style>
    .login__webpage {
      margin-top: 25%;
    }

    @media screen and (min-width: 1220px) {
      .login__webpage {
        margin-top: 10%;
      }
    }

    .login__button {
      text-align: center;
    }

    .login__title {
      text-align: center;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="../../index.php" class="nav__logo">
        <i class="ri-book-3-line"></i> Z-Library
      </a>


      <div class="nav__actions">
        <!-- Theme Button -->
        <i class="ri-moon-line change-theme" id="theme-button"></i>
      </div>
    </nav>
  </header>

  <!--==================== LOGIN ====================-->
  <div class="login__webpage grid container" id="login-content">
    <!-- Login -->
    <form action="" method="post" class="login__form grid">
      <h3 class="login__title">Log In</h3>
      
      <?php if (isset($_POST["signIn"]) && !empty($error_message)): ?>
        <div class="error-message">
          <?php echo $error_message; ?>
        </div>
      <?php endif; ?>

      <div class="grid">
        <div class="login__group">
          <label for="name_admin" class="login__label">Username</label>
          <input type="text" placeholder="Write your Username" name="nama_admin" class="login__input" required>
        </div>
        <div class="login__group">
          <label for="password" class="login__label">Password</label>
          <input type="password" placeholder="Enter your password" name="password" class="login__input" required>
        </div>
        <button type="submit" class="login__button button" name="signIn">Log In</button>
        <a href="../../index.php" class="login__button button center">Cancel</a>
      </div>
    </form>
  </div>

  <!--==================== MAIN ====================-->

  <!--=============== SCROLLREVEAL ===============-->
  <script src=""></script>

  <!--=============== SWIPER JS ===============-->
  <script defer src="../../assets/js/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script defer src="../../assets/js/main.js"></script>
</body>

</html>
