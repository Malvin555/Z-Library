<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}

require "../../config/config.php";
$buku = queryReadData("SELECT * FROM buku");

// mengaktifkan tombol search engine
if(isset($_POST["search"]) ) {
  //buat variabel dan ambil apa saja yg diketikkan user di dalam input dan kirimkan ke function search.
  $buku = search($_POST["keyword"]);
  
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

   <title>Z - Library | List</title>

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
         /* Hidden by default */
         position: absolute;
         background-color: var(--body-color);
         min-width: 150px;
         box-shadow: 0 2px 16px hsla(0, 0%, 0%, .4);
         z-index: 1;
         padding: 10px;
         border-radius: 5px;
         left: 50%;
         transform: translateX(-50%);
         /* Center align the dropdown */
         text-align: center;
         /* Center the text */
         margin-top: 15px;
         color: var(--text-color);
      }

      /* Styling dropdown items */
      .dropdown-item {
         padding: 10px;
         display: block;
         text-decoration: none;
         color: inherit;
         font-weight: normal;
         transition: color 0.3s ease;
      }

      /* Additional styling */
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

      /* Book */

      .title__m-a,
      .desc__m-a {
         text-align: center;
      }

      .book-list {
         display: grid;
         gap: 20px;
         grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
         padding: 20px;
      }

      .book-item {
         background-color: var(--body-color:);
         box-shadow: 0 2px 16px hsla(0, 0%, 0%, .1);
         padding: 15px;
         text-align: center;
      }

      .book-cover {
         width: 60%;
         height: auto;
         border-radius: 4px;
         margin-bottom: 10px;
         display: block;
         margin: 0 auto;
      }

      .book-title {
         font-size: 1.2em;
         margin: 10px 0;
         color: #333;
      }

      .book-details {
         list-style: none;
         padding: 0;
         margin: 0 0 15px 0;
         font-size: 0.9em;
         color: #666;
      }

      .book-details li {
         margin-bottom: 5px;
      }

      .book-actions {
         display: flex;
         justify-content: space-around;
      }

      .btn {
         padding: 15px 15px;
         text-align: center;
         text-decoration: none;
         color: white;
         font-size: 0.9em;
         width: 49.2%;
      }

      .submit-admin-m {
         display: none;
      }

      .button-delete {
         display: inline-block;
         background-color: red;
         color: var(--white-color);
         font-weight: var(--font-semi-bold);
         transition: box-shadow .4s;
      }

      .search__forms {

         display: flex;
         align-items: center;
         column-gap: .5rem;
         background-color: var(--container-color);
         border: 2px solid var(--border-color);
         padding-inline: 1rem;
      }

      
      main {
         margin-bottom: 100px;
      }
   </style>


</head>

<body>
   <!--==================== HEADER ====================-->
   <header class="header" id="header">
      <nav class="nav container">
         <a href="../../DashboardAdmin/dashboardAdmin.php" class="nav__logo">
            <i class="ri-book-3-line"></i> Z-Library
         </a>

         <div class="nav__menu">
            <ul class="nav__list">
               <li class="nav__item">
                  <a href="../member/member.php" class="nav__link">
                  <i class="ri-map-pin-user-line"></i>
                     <span>Member Data</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="#" class="nav__link">
                     <i class="ri-book-3-line"></i>
                     <span>List Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="../peminjaman/peminjamanBuku.php" class="nav__link">
                  <i class="ri-git-repository-commits-line"></i>
                     <span>Borrowed Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="../pengembalian/pengembalianBuku.php" class="nav__link">
                  <i class="ri-health-book-line"></i>
                     <span>Returned Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="../denda/daftarDenda.php" class="nav__link">
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
                     <img src="../../assets/img/adminLogo.png" class="logo__dash" alt="adminLogo" width="30px">
                  </li>
                  <li class="text-center">
                     <p class="dropdown-item">
                        <?php echo $_SESSION['admin']['nama_admin']; ?></span>
                        </a>
                  </li>
                  <hr>
                  <li>
                     <p class="dropdown-item text-center">
                        Account Verified <i class="fa-solid fa-circle-check"></i></span>
                     </p>
                  </li>
                  <li>
                     <a class="text-center rounded button" href="../signOut.php">
                        Sign Out <i class="fa-solid fa-right-to-bracket"></i>
                     </a>
                  </li>
               </ul>
            </div>




            <!-- Theme Button -->
            <i class="ri-moon-line change-theme" id=theme-button></i>
         </div>
      </nav>
   </header>

   <!--==================== MAIN ====================-->
   <main>
      <div class="home section" id="home">
         <div class="container grid">
            <div class="home__data">
               <h1 class="home__title title__m-a">
                  Browse & <br>
                  Select E-Books
               </h1>

               <p class="home__description desc__m-a">
                  Find the best e-boks from your favorite
                  writers, explore hundreds of books with all
                  possible categories, take advantage
                  and much more.
               </p>


               <div>
                  <form action="" method="post" class="search__forms">
                     <i class="ri-search-line search__icon"></i>
                     <input type="text" placeholder="Searching Book?" class="search__input" name="keyword" id="keyword">
                     <button type="submit" name="search"><i
                           class="ri-search-line search__icon button submit-admin-m"></i></button>
                     <a href="tambahBuku.php"><i class="ri-contacts-book-upload-line button"></i></a>
                  </form>


               </div>
            </div>


            <div class="book-list">
               <?php foreach ($buku as $item) : ?>
               <div class="book-item">
                  <img src="../../imgDB/<?= $item["cover"]; ?>" alt="coverBook" class="book-cover">
                  <h5 class="book-title"><?= $item["judul"]; ?></h5>
                  <ul class="book-details">
                     <li>Kategori: <?= $item["kategori"]; ?></li>
                     <li>Id Buku: <?= $item["id_buku"]; ?></li>
                  </ul>
                  <div class="book-actions">
                     <a href="updateBuku.php?idReview=<?= $item["id_buku"]; ?>" class="btn button">Edit</a>
                     <a href="deleteBuku.php?id=<?= $item["id_buku"]; ?>" class="btn button-delete"
                        onclick="return confirm('Yakin ingin menghapus data buku?');">Delete</a>
                  </div>
               </div>
               <?php endforeach; ?>
            </div>
         </div>
   </main>

   <!--=============== SCROLLREVEAL ===============-->
   <script src=""></script>

   <!--=============== SWIPER JS ===============-->
   <script defer src="../../assets/js/swiper-bundle.min.js">
   </script>

   <!--=============== MAIN JS ===============-->
   <script defer src="../../assets/js/main.js">
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