<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

$member = queryReadData("SELECT * FROM member");

if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
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

  <title>Z - Library</title>

  
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
      margin-bottom: 50px;
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
            <a href="#" class="nav__link">
            <i class="ri-map-pin-user-line"></i>
              <span>Member Data</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="../buku/daftarBuku.php" class="nav__link">
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
        <i class="ri-printer-line" id=printTable></i>
          
      </div>
    </nav>
  </header>

  <!--==================== SEARCH ====================-->


  <!--==================== MAIN ====================-->
  <main>
    <div class="admin__search">
      <form action="" method="post" class="search__form">
        <i class="ri-search-line search__icon"></i>
        <input type="search" placeholder="Stalking Member?" class="search__input" name="keyword" id="keyword">
        <button type="submit" name="search"><i class="ri-search-line search__icon button"></i></button>
      </form>
    </div>
      <div class="container grid">
        <h1 class="title__m-m">Member Information</h1>
        <div class="table__admin-m">
          <table>
            <thead>
              <tr>
                <th class="th-m">Nisn</th>
                <th class="th-m">Code</th>
                <th class="th-m">Name</th>
                <th class="th-m">Gender</th>
                <th class="th-m">Class</th>
                <th class="th-m">Major</th>
                <th class="th-m">Number</th>
                <th class="th-m">Date</th>
                <th class="th-m delete">Delete</th>
              </tr>
            </thead>
            <?php foreach($member as $item) : ?>
            <tr>
              <td class="td-m"><?=$item["nisn"];?></td>
              <td class="td-m"><?=$item["kode_member"];?></td>
              <td class="td-m"><?=$item["nama"];?></td>
              <td class="td-m"><?=$item["jenis_kelamin"];?></td>
              <td class="td-m"><?=$item["kelas"];?></td>
              <td class="td-m"><?=$item["jurusan"];?></td>
              <td class="td-m"><?=$item["no_tlp"];?></td>
              <td class="td-m"><?=$item["tgl_pendaftaran"];?></td>
              <td class="td-m">
                <div class="action">
                  <a href="deleteMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-danger"
                    onclick="return confirm('Yakin ingin menghapus data member ?');"><i class="ri-delete-bin-line"></i></a>
                </div>
              </td>
            </tr>
            <?php endforeach;?>
          </table>
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
    
    // Print
      
      document.addEventListener('DOMContentLoaded', function () {
    var printButton = document.getElementById('printTable');

    printButton.addEventListener('click', function () {
        var printWindow = window.open('', '', 'height=600,width=800');
        var table = document.querySelector('.table__admin-m').innerHTML;
        var style = `
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    table-layout: auto;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: center;
                    overflow: visible;
                    white-space: normal;
                    word-wrap: break-word;
                    min-width: 100px;
                }
                th {
                    background-color: #f2f2f2;
                }
                @media print {
                    .no-print {
                        display: none;
                    }
                    body {
                        margin: 0;
                        padding: 0;
                        overflow: visible;
                    }
                    table {
                        width: 100%;
                        page-break-inside: auto;
                    }
                    thead {
                        display: table-header-group;
                    }
                    tbody {
                        display: table-row-group;
                    }
                    tr {
                        page-break-inside: auto;
                    }
                }
            </style>
        `;

        printWindow.document.write('<html><head><title>Print Table</title>');
        printWindow.document.write(style);
        printWindow.document.write('</head><body >');
        printWindow.document.write('<h1>List of Returning Book</h1>');
        printWindow.document.write(table);
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
    });
});
  </script>
</body>

</html>
