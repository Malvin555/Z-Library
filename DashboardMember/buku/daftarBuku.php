<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php";
// query read semua buku
$buku = queryReadData("SELECT * FROM buku");
//search buku
if(isset($_POST["search"]) ) {
  $buku = search($_POST["keyword"]);
}
//read buku informatika
if(isset($_POST["informatika"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'informatika'");
}
//read buku bisnis
if(isset($_POST["bisnis"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'bisnis'");
}
//read buku filsafat
if(isset($_POST["filsafat"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'filsafat'");
}
//read buku novel
if(isset($_POST["novel"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'novel'");
}
//read buku sains
if(isset($_POST["sains"]) ) {
$buku = queryReadData("SELECT * FROM buku WHERE kategori = 'sains'");
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
      width: 100%;
      text-align: center;
    }

    .submit-admin-m {
      display: none;
    }

    .button-delete {
      display: inline-block;
      background-color: red;
      color: var(--white-color);
      font-weight: var(--font-semi-bold);
      padding: 1rem 1.5rem;
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

    /* Basic styling for category buttons */
    .category-btn {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      /* Space between buttons */
      justify-content: center;
      /* Center align the buttons */
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .category-btn .button {

      border: none;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s, color 0.3s;
    }

    /* Media query for smaller screens */
    @media (max-width: 768px) {
      .category-btn {
        align-items: center;
      }

      .category-btn .button {
        width: 100%;
        /* Make buttons full-width on small screens */
        max-width: 300px;
        /* Optional: limit the max width of buttons */
      }
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
      <a href="../dashboardMember.php" class="nav__logo">
        <i class="ri-book-3-line"></i> Z-Library
      </a>

      <div class="nav__menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="#" class="nav__link">
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
                <?php echo $_SESSION['member']['nama']; ?></span>
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
    <div class="home section">
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


          <div class="admin__search container">
            <form action="" method="post" class="search__forms">
              <i class="ri-search-line search__icon"></i>
              <input type="text" placeholder="Searching Book?" class="search__input" name="keyword" id="keyword">
              <button type="submit" name="search"><i
                  class="ri-search-line search__icon button submit-admin-m"></i></button>
            </form>


          </div>

          <div class="category-btn">
            <form action="" method="post">
              <div class="category-btn">
                <button type="submit" class="button gaps">All</button>
                <button type="submit" class="button gaps" name="informatika">Technology</button>
                <button type="submit" class="button gaps" name="bisnis">Business</button>
                <button type="submit" class="button gaps" name="filsafat">Philosophy</button>
                <button type="submit" class="button gaps" name="novel">Novel</button>
                <button type="submit" class="button gaps" name="sains">Sains</button>
              </div>
            </form>
          </div>


          <!-- Book cards -->
          <div class="book-list">
            <?php foreach ($buku as $item) : ?>
            <div class="book-item">
              <img src="../../imgDB/<?= $item["cover"]; ?>" alt="coverBook" class="book-cover"">
          <div>
            <h5 class=" book-title"><?= $item["judul"]; ?></h5>
            </div>
            <ul class="book-details">
              <li>Kategori : <?= $item["kategori"]; ?></li>
            </ul>
            <div class="book-actions">
              <a href="detailBuku.php?id=<?= $item["id_buku"]; ?>" class=" btn button" z>Detail</a>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
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