<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";
$idBuku = $_GET["id"];
$query = queryReadData("SELECT * FROM buku WHERE id_buku = '$idBuku'");
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
   <link rel="stylesheet"
      href="../../assets/css/swiper-bundle.min.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet"
      href="../../assets/css/styles.css">

   <title>Z - Library | Detail</title>

   <style>
      /* Basic styling for dropdown */
      .dropdown {
         position: relative;
         display: inline-block;
      }

      .dropdown-toggle {
         text-decoration: none;
         color: inherit;
         cursor: pointer;
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .dropdown-menu {
         display: none;
         position: absolute;
         background-color: var(--body-color);
         min-width: 150px;
         box-shadow: 0 2px 16px hsla(0, 0%, 0%, .4);
         z-index: 1;
         padding: 10px;
         border-radius: 5px;
         left: 50%;
         transform: translateX(-50%);
         text-align: center;
         margin-top: 15px;
         color: var(--text-color);
      }

      .dropdown-item {
         padding: 10px;
         display: block;
         text-decoration: none;
         color: inherit;
         font-weight: normal;
         transition: color 0.3s ease;
      }

      .text-center {
         text-align: center;
      }

      .rounded {
         border-radius: 5px;
      }

      .logo__dash {
         width: 40px;
         display: block;
         margin: auto;
      }

      /* Book Layout */
      .card-container {
         margin: 80px auto 0 auto;
         padding: 20px;
         max-width: 800px;
         background-color: var(--body-color);
         border: 2px solid var(--border-color);
         gap: 20px;
      }

      .img-card {
         border-radius: 4px;
         max-width: 200px;
         height: auto;
      }

      .card-details {
         flex: 1;
      }

      .list-group {
         padding: 0;
         margin: 20px 0;
         list-style: none;
      }

      .list-group-item {
         padding: 15px 20px;
         margin-bottom: 10px;
         background-color: var(--container-color);
         font-size: 16px;
         color: var(--text-color);
         display: flex;
         justify-content: space-between;
         align-items: center;
         transition: background-color 0.3s ease, box-shadow 0.3s ease;
      }

      .list-group-item:last-child {
         margin-bottom: 0;
      }

      .list-group-item:hover {
         background-color: var(--first-color);
         color: white;
         box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      }

      .list-group-item strong {
         color: var(--title-color);
         font-weight: bold;
      }

      .buttons {
         text-align: center;
         width : 49.5%;
      }

      /* Responsive Design */
      @media screen and (max-width: 768px) {
         .card-container {
            flex-direction: column;
            align-items: center;
         }

         .img-card {
            max-width: 100%;
         }

         .card-details {
            text-align: center;
         }
      }

      main {
         margin-top : 100px;
         margin-bottom: 100px;
      }

      .home__title{
         text-align: center;
      }

      .desc {
         padding-left : 100px;
      }
   </style>
</head>

<body>
   <!--==================== HEADER ====================-->
   <header class="header" id="header">
      <nav class="nav container">
         <a href="../dashboardMember.php" class="nav__logo">
            <i class="ri-book-3-line"></i> Z-Library
         </a>

         <div class="nav__menu">
            <ul class="nav__list">
               <li class="nav__item">
                  <a href="daftarBuku.php" class="nav__link">
                     <i class="ri-book-3-line"></i>
                     <span>List Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="../formPeminjaman/TransaksiPeminjaman.php" class="nav__link">
                  <i class="ri-git-repository-commits-line"></i>
                     <span>History Borrow Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="../formPeminjaman/TransaksiPengembalian.php" class="nav__link">
                  <i class="ri-health-book-line"></i>
                     <span>History Returning Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="../formPeminjaman/TransaksiDenda.php" class="nav__link">
                  <i class="ri-money-pound-circle-line"></i>
                     <span>Penalty</span>
                  </a>
               </li>
            </ul>
         </div>

         <div class="nav__actions">
            <!-- Account -->
            <div class="dropdown">
               <!-- Use the icon as the dropdown toggle -->
               <a href="#" class="dropdown-toggle">
                  <i class="ri-user-line login-button"></i>
               </a>
               <ul class="dropdown-menu">
                  <li class="text-center">
                     <img src="../../assets/img/memberLogo.png" class="logo__dash" alt="adminLogo">
                  </li>
                  <li class="text-center">
                     <p class="dropdown-item">
                        <?php echo $_SESSION['member']['nama']; ?></p>
                  </li>
                  <hr>
                  <li>
                     <p class="dropdown-item text-center">
                        Account Verified <i class="fa-solid fa-circle-check"></i>
                     </p>
                  </li>
                  <li>
                     <a class="text-center rounded button" href="signOut.php">
                        Sign Out <i class="fa-solid fa-right-to-bracket"></i>
                     </a>
                  </li>
               </ul>
            </div>

            <!-- Theme Button -->
            <i class="ri-moon-line change-theme" id="theme-button"></i>
         </div>
      </nav>
   </header>

   <!--==================== MAIN ====================-->
   <main>
      <div class="container">
         <div class="card-container">
            <?php foreach ($query as $item) : ?>
               <!-- <img src="../../imgDB/<?= $item["cover"]; ?>" class="img-card" alt="coverBuku"> -->
               <div class="card-details">
                  <h2 class="home__title"><?= $item["judul"]; ?></h2>
                  <ul class="list-group">
                     <li class="list-group-item"><strong>Id Book:</strong> <?= $item["id_buku"]; ?></li>
                     <li class="list-group-item"><strong>Category:</strong> <?= $item["kategori"]; ?></li>
                     <li class="list-group-item"><strong>Author:</strong> <?= $item["pengarang"]; ?></li>
                     <li class="list-group-item"><strong>Publisher:</strong> <?= $item["penerbit"]; ?></li>
                     <li class="list-group-item"><strong> Year Publication:</strong> <?= $item["tahun_terbit"]; ?></li>
                     <li class="list-group-item"><strong>Page Number:</strong> <?= $item["jumlah_halaman"]; ?></li>
                     <li class="list-group-item"><strong>Description Book:</strong> <div class="desc"> <?= $item["buku_deskripsi"]; ?></div></li>
                  </ul>
                  <div class="card-body">
                     <a href="daftarBuku.php" class="buttons button">Cancel</a>
                     <a href="../formPeminjaman/pinjamBuku.php?id=<?= $item["id_buku"]; ?>" class=" buttons button">Borrow</a>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </main>

   

   <!--=============== SCROLLREVEAL ===============-->
   <script src=""></script>

   <!--=============== SWIPER JS ===============-->
   <script defer
      src="../../assets/js/swiper-bundle.min.js">
   </script>

   <!--=============== MAIN JS ===============-->
   <script defer
      src="../../assets/js/main.js">
   </script>

   <script>
      document.addEventListener('DOMContentLoaded', function () {
         var dropdownToggle = document.querySelector('.dropdown-toggle');
         var dropdownMenu = document.querySelector('.dropdown-menu');

         // Toggle dropdown on click
         dropdownToggle.addEventListener('click', function (event) {
            event.preventDefault();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
         });

         // Close the dropdown if the user clicks outside of it
         window.addEventListener('click', function (event) {
            if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
               dropdownMenu.style.display = 'none';
            }
         });
      });
   </script>
</body>

</html>

