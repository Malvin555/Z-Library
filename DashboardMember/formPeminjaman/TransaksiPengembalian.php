<?php 
session_start();

if(!isset($_SESSION["signIn"])) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php";
$akunMember = $_SESSION["member"]["nisn"];
$dataPengembalian = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, buku.kategori, pengembalian.nisn, member.nama, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN buku ON pengembalian.id_buku = buku.id_buku
INNER JOIN member ON pengembalian.nisn = member.nisn
INNER JOIN admin ON pengembalian.id_admin = admin.id
WHERE pengembalian.nisn = $akunMember");

if(isset($_POST["search"])) {
  $dataPengembalian = search($_POST["keyword"]);
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
   <link rel="stylesheet"
      href="../../assets/css/swiper-bundle.min.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet"
      href="../../assets/css/styles.css">

   <title>Z - Library | Returning</title>

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

    .admin__search {
      left: 0;
      width: 100%;
      height: 100%;
      padding-top: 10rem;
      padding-left: 1.5rem;
      padding-right: 1.5rem;
      padding-bottom: 2rem;
      transition: top .4s;
    }


    /* Table */

    /* Table container */
    .table__admin-m {
      overflow-x: auto;
      /* Horizontal scroll */
      overflow-y: auto;
      /* Vertical scroll */
      max-height: 300px;
      /* Limit the height */
      margin: 0 auto;
      width: 100%;
    }

    /* Ensure the table takes full width */
    .table__admin-m table {
      width: 100%;
    }

    /* Responsive design for mobile devices */
    @media (max-width: 768px) {

      /* Adjust height on mobile */
      .table__admin-m {
        max-height: 400px;
        overflow-y: scroll;
      }

      /* Ensure the body does not scroll when scrolling the table */
      body {
        overflow: hidden;
      }
    }

    .table-m {
      border-collapse: collapse;
      border: 2px solid var(--border-color);
      background-color: hsla(230, 12%, 96%, .6);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

    }

    .th-m,
    .td-m {
      padding: 15px 15px;
      text-align: center;
      border-bottom: 2px solid var(--border-color);
    }

    .dark-theme .th-m,
    .dark-theme .td-m {
      background-color: hsla(230, 12%, 8%, .6);
    }

    .th-m {
      background-color: hsla(230, 12%, 96%, .6);
      color: var(--text-color);
      font-weight: bold;
    }

    .action {
      display: flex;
      justify-content: center;
    }

    .btn {
      display: block;
      margin: 0 auto;
      font-size: 14px;
      text-decoration: none;
      border-radius: 4px;
      color: hsla(230, 12%, 96%, .6);
      padding: 10px;
    }

    .btn:hover {
      color: white;
      transition: all .3s ease-in-out;
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
      cursor: pointer;
      display: block;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    .title__m-m {
      text-align: center;
      margin-bottom: 20px;
    }

    main {
      padding-top: 125px;
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
                  <a href="../buku/daftarBuku.php" class="nav__link">
                     <i class="ri-book-3-line"></i>
                     <span>List Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="TransaksiPeminjaman.php" class="nav__link">
                  <i class="ri-git-repository-commits-line"></i>
                     <span>History Borrow Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="TransaksiPengembalian.php" class="nav__link">
                  <i class="ri-health-book-line"></i>
                     <span>History Returning Book</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="TransaksiDenda.php" class="nav__link">
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
    <div class="container grid">
      <h1 class="title__m-m">Transaction Return</h1>
    <div class="table__admin-m">
      <table>
        <thead>
          <tr>
            <th class="th-m">Id Return</th>
            <th class="th-m">Id Book</th>
            <th class="th-m">Title</th>
            <th class="th-m">Category</th>
            <th class="th-m">Nisn</th>
            <th class="th-m">Name</th>
            <th class="th-m">Admin</th>
            <th class="th-m">Date Return</th>
            <th class="th-m">Delay</th>
            <th class="th-m">Penalty</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dataPengembalian as $item) : ?>
            <tr>
              <td class="td-m"><?= $item["id_pengembalian"]; ?></td>
              <td class="td-m"><?= $item["id_buku"]; ?></td>
              <td class="td-m"><?= $item["judul"]; ?></td>
              <td class="td-m"><?= $item["kategori"]; ?></td>
              <td class="td-m"><?= $item["nisn"]; ?></td>
              <td class="td-m"><?= $item["nama"]; ?></td>
              <td class="td-m"><?= $item["nama_admin"]; ?></td>
              <td class="td-m"><?= $item["buku_kembali"]; ?></td>
              <td class="td-m"><?= $item["keterlambatan"]; ?></td>
              <td class="td-m"><?= $item["denda"]; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
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