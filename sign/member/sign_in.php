<?php 
session_start();

// Jika member sudah login, tidak boleh kembali ke halaman login, kecuali logout
if(isset($_SESSION["signIn"])) {
  header("Location: ../../DashboardMember/dashboardMember.php");
  exit;
}

require "../../loginSystem/connect.php";

$error_message = '';

if(isset($_POST["signIn"])) {
  
  $nama = strtolower($_POST["nama"]);
  $nisn = $_POST["nisn"];
  $password = $_POST["password"];
  
  $result = mysqli_query($connect, "SELECT * FROM member WHERE nama = '$nama' AND nisn = $nisn");
  
  if(mysqli_num_rows($result) === 1) {
    // cek pw 
    $pw = mysqli_fetch_assoc($result);
    if(password_verify($password, $pw["password"])) {
      // SET SESSION 
      $_SESSION["signIn"] = true;
      $_SESSION["member"]["nama"] = $nama;
      $_SESSION["member"]["nisn"] = $nisn;
      header("Location: ../../DashboardMember/dashboardMember.php");
      exit;
    } else {
      $error_message = "Incorrect password.";
    }
  } else {
    $error_message = "Incorrect username or NISN.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Z-Library | Member</title>

  <!--=============== FAVICON ===============-->
  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">

  <!--=============== REMIXICONS ===============-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

  <!--=============== SWIPER CSS ===============-->
  <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">

  <!--=============== CSS ===============-->
  <link rel="stylesheet" href="../../assets/css/styles.css">

  <style>
    .login__webpage {
      margin-top: 25%;
    }

    @media screen and (min-width: 1220px) {
      .login__webpage {
        margin-top: 10%;
        margin-bottom: 5%;
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

    .login__signup {
      text-align: center;
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

  <!--==================== Register ====================-->
  <div class="login__webpage grid" id="login-content">
    <form action="" method="post" class="login__form grid">
      <h3 class="login__title">Sign-In</h3>
      
      <?php if (!empty($error_message)): ?>
        <div class="error-message">
          <?php echo $error_message; ?>
        </div>
      <?php endif; ?>

      <div class="grid">
        <div class="login__group">
          <label for="name" class="login__label">Username</label>
          <input type="text" placeholder="Write your Username" name="nama" id="name" class="login__input" required>
        </div>
        <div class="login__group">
          <label for="nisn" class="login__label">Nisn</label>
          <input type="text" placeholder="Write your NISN" name="nisn" id="nisn" class="login__input" required>
        </div>
        <div class="login__group">
          <label for="password" class="login__label">Password</label>
          <input type="password" placeholder="Enter your password" name="password" id="password" class="login__input" required>
        </div>
        <button type="submit" class="login__button button" name="signIn">Log In</button>
        <a href="../../index.php" class="login__button button center">Cancel</a>
        <span class="login__signup">
          You do not have an account? <a href="sign_up.php" id="login-button">Sign Up</a>
        </span>
      </div>
    </form>
  </div>

  <!--=============== SCROLLREVEAL ===============-->
  <script src=""></script>

  <!--=============== SWIPER JS ===============-->
  <script defer src="../../assets/js/swiper-bundle.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script defer src="../../assets/js/main.js"></script>
</body>

</html>
