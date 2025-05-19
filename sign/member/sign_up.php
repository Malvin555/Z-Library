<?php 
require "../../loginSystem/connect.php";
if(isset($_POST["signUp"])) {
  
  if(signUp($_POST) > 0) {
    echo "<script>
      alert('Sign Up berhasil!');
      window.location.href = 'sign_in.php';
    </script>";
  } else {
    echo "<script>
      alert('Sign Up gagal!');
    </script>";
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

   <title>Z - Library | Member</title>

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

      .login__signup {
         text-align: center;
      }
   </style>

   <script>
      function validateForm() {
         var fields = ["nisn", "kode_member", "nama", "password", "confirmPw", "jenis_kelamin", "kelas", "jurusan", "no_tlp", "tgl_pendaftaran"];
         var isValid = true;
         
         fields.forEach(function(field) {
            var element = document.getElementById(field);
            if (!element.value) {
               isValid = false;
               element.style.border = "2px solid red";
            } else {
               element.style.border = "1px solid #ccc"; // reset the border if valid
            }
         });

         if (!isValid) {
            alert("Please fill out all fields.");
         }

         return isValid;
      }
   </script>
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
   <div class="login__webpage grid">
      <form action="" method="post" class="login__form" onsubmit="return validateForm()">
         <h3 class="login__title">Sign Up</h3>
         <div class="grid login__group">
            <label for="nisn" class="login__label">NISN</label>
            <input placeholder="Enter your NISN" type="number" name="nisn" id="nisn" required class="login__input">
            <br><br>
            <label for="code_member" class="login__label">Member Code</label>
            <input placeholder="Enter your Member Code" type="text" name="kode_member" id="code_member" required class="login__input">
            <br><br>
            <label for="name" class="login__label">Full Name</label>
            <input placeholder="Enter your Name" type="text" name="nama" id="name" required class="login__input">
            <br><br>
            <label for="password" class="login__label">Password</label>
            <input placeholder="Enter your password" type="password" name="password" id="password" required class="login__input">
            <br><br>
            <label for="confirmPw" class="login__label">Confirm Password</label>
            <input placeholder="Confirm your password" type="password" name="confirmPw" id="confirmPw" required class="login__input">
            <br><br>
            <label for="gender" class="login__label">Gender</label>
            <select name="jenis_kelamin" id="gender" class="login__input" required>
               <option value="">Choose Gender</option>
               <option value="Male">Male</option>
               <option value="Female">Female</option>
               <option value="Secret">Secret</option>
            </select>
            <br><br>
            <label for="class" class="login__label">Class</label>
            <select name="kelas" id="class" class="login__input" required>
               <option value="">Choose Class</option>
               <option value="X">X</option>
               <option value="XI">XI</option>
               <option value="XII">XII</option>
            </select>
            <br><br>
            <label for="major" class="login__label">Jurusan</label>
            <select name="jurusan" id="major" class="login__input" required>
               <option value="">Choose</option>
               <option value="Mechanical Design">Mechanical Design</option>
               <option value="Machining Technology">Machining Technology</option>
               <option value="Automotive Engineering">Automotive Engineering</option>
               <option value="Building Information Modeling Design">Building Information Modeling Design</option>
               <option value="Housing Construction Technology">Housing Construction Technology</option>
               <option value="Electrical Power Engineering">Electrical Power Engineering</option>
               <option value="Electrical Power Installation Engineering">Electrical Power Installation Engineering</option>
               <option value="Computer Network Engineering">Computer Network Engineering</option>
               <option value="Information System Network and Applications">Information System Network and Applications</option>
               <option value="Software Engineering">Software Engineering</option>
               <option value="Visual Communication Design">Visual Communication Design</option>
            </select>
            <br><br>
            <label for="phone_number" class="login__label">No Telepon</label>
            <input placeholder="Enter your Number" type="number" name="no_tlp" id="phone_number" required class="login__input">
            <br><br>
            <label for="registration_date" class="login__label">Tanggal Pendaftaran</label>
            <input type="date" name="tgl_pendaftaran" id="registration_date" required class="login__input">
            <br><br>
            <button type="submit" name="signUp" class="login__button button">Sign Up</button>
            <input type="reset" value="Reset" class="login__button button">
            <span class="login__signup">
               You have an account? <a href="sign_in.php" id="login-button">Sign Up</a>
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
