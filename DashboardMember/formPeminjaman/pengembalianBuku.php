<?php 
session_start();

if(!isset($_SESSION["signIn"])) {
    header("Location: ../../sign/member/sign_in.php");
    exit;
}

require "../../config/config.php";
$idPeminjaman = $_GET["id"];
$query = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_buku, buku.judul, peminjaman.nisn, member.nama, peminjaman.id_admin, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian
FROM peminjaman
INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
INNER JOIN member ON peminjaman.nisn = member.nisn
WHERE peminjaman.id_peminjaman = $idPeminjaman");

// Jika tombol submit kembalikan diklik
if(isset($_POST["kembalikan"])) {
    if(pengembalian($_POST) > 0) {
        echo "<script>
        alert('Terimakasih telah mengembalikan buku!');
        document.location.href = '../buku/daftarBuku.php';
        </script>";
    } else {
        echo "<script>
        alert('Buku gagal dikembalikan');
        document.location.href = '../buku/daftarBuku.php';
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
   <link rel="stylesheet"
      href="../../assets/css/swiper-bundle.min.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet"
      href="../../assets/css/styles.css">

   <title>Z - Library | Return Book</title>

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

      .buttons {
        width: 49.5%;
        text-align: center;
        margin-top: 25px;
      }

      p,
      h3 {
        text-align: center;
        padding: 20px;
      }

      .login__label {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      main {
         margin-top: 100px;
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
   <div class="container">
        <div class="card-container">
            <form action="" method="post">
                <h3 class="home__title">Form Pengembalian Buku</h3>
                <?php foreach ($query as $item) : ?>
                    <div>
                        <div>
                            <label class="login__label" for="id_peminjaman">Id Peminjaman</label>
                            <input class="login__input" type="number" name="id_peminjaman" id="id_peminjaman" value="<?= $item["id_peminjaman"]; ?>" readonly>
                        </div>
                        <div>
                            <label class="login__label" for="id_buku">Id Buku</label>
                            <input class="login__input"  type="text" name="id_buku" id="id_buku" value="<?= $item["id_buku"]; ?>" readonly>
                        </div>
                        <div>
                            <label class="login__label" for="judul">Judul Buku</label>
                            <input class="login__input"  type="text" name="judul" id="judul" value="<?= $item["judul"]; ?>" readonly>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label class="login__label" for="nisn">Nisn Siswa</label>
                            <input class="login__input"  type="number" name="nisn" id="nisn" value="<?= $item["nisn"]; ?>" readonly>
                        </div>
                        <div>
                            <label class="login__label" for="nama">Nama Siswa</label>
                            <input class="login__input"  type="text" name="nama" id="nama" value="<?= $item["nama"]; ?>" readonly>
                        </div>
                        <div>
                            <label class="login__label" for="id_admin">Id Admin Perpustakaan</label>
                            <input class="login__input"  type="number" name="id_admin" id="id_admin" value="<?= $item["id_admin"]; ?>" readonly>
                        </div>
                    </div>

                    <div>
                        <div>
                            <label class="login__label" for="tgl_peminjaman">Tanggal Buku Dipinjam</label>
                            <input class="login__input"  type="date" name="tgl_peminjaman" id="tgl_peminjaman" value="<?= $item["tgl_peminjaman"]; ?>" readonly>
                        </div>
                        <div>
                            <label class="login__label" for="tgl_pengembalian">Tenggat Pengembalian Buku</label>
                            <input class="login__input"  type="date" name="tgl_pengembalian" id="tgl_pengembalian" value="<?= $item["tgl_pengembalian"]; ?>" oninput="hitungDenda()" readonly>
                        </div>
                        <div>
                            <label class="login__label" for="buku_kembali">Hari Pengembalian Buku</label>
                            <input class="login__input"  type="date" name="buku_kembali" id="buku_kembali" value="<?php echo date('Y-m-d');?>" oninput="hitungDenda()">
                        </div>
                    </div>
                <?php endforeach; ?> 

                <div>
                    <div>
                        <label class="login__label" for="keterlambatan">Keterlambatan</label>
                        <input class="login__input"  type="text" name="keterlambatan" id="keterlambatan" oninput="hitungDenda()" readonly>
                    </div>
                    <div>
                        <label class="login__label" for="denda">Denda</label>
                        <input class="login__input"  type="number" name="denda" id="denda" readonly>
                    </div>
                </div>
                <a class="buttons button" href="TransaksiPeminjaman.php">Batal</a>
                <button class="buttons button" type="submit" name="kembalikan">Kembalikan</button>
            </form>
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
   <script src="../../style/js/script.js"></script>
</body>

</html>
