<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}

require "../../config/config.php";
//$informatika = "informatika";
$kategori = queryReadData("SELECT * FROM kategori_buku");
if(isset($_POST["tambah"]) ) {
  
  if(tambahBuku($_POST) > 0) {
    echo "<script>
    alert('Data buku berhasil ditambahkan');
    document.location.href = 'daftarBuku.php';
    </script>";
  }else {
    echo "<script>
    alert('Data buku gagal ditambahkan!');
    document.location.href = 'daftarBuku.php';
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

  <title>Z - Library | Add Book</title>

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

    .add__form {
      margin-top: 100px;
      background-color: var(--container-color);
      padding: 2rem 1.5rem;
      border: 2px solid var(--border-color);
      row-gap: 1.25rem;
    }

    .login__title {
      text-align: center;
    }

    .login__label {
      margin : 12px 12px;
    }

    .login__button {
      margin-bottom : 10px;
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
      <a href="" class="nav__logo">
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
              <img src="../../assets/img/adminLogo.png" class="logo__dash" alt="adminLogo">
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
    <section class="add__book container">
      <div>
        <div class="add__form grid">
          <h1 class="login__title" ;>Form Add Book</h1>
          <form action="" method="post" enctype="multipart/form-data">
            <div>
              <label class="login__label" for="formFileMultiple">Cover Buku</label>
              <input class="login__input" type="file" name="cover" id="formFileMultiple" required>
            </div>
            <div>
              <label class="login__label" for="exampleFormControlInput1">Id Buku</label>
              <input class="login__input" type="text" name="id_buku" id="exampleFormControlInput1"
                placeholder="example inf01" required>
            </div>
            <div>
              <label class="login__label" for="inputGroupSelect01">Kategori</label>
              <select class="login__input" id="inputGroupSelect01" name="kategori">
                <option selected>Choose</option>
                <?php foreach ($kategori as $item) : ?>
                <option><?= $item["kategori"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div>
              <label class="login__label" for="title">Judul Buku</label>
              <input class="login__input" type="text" name="judul" id="title" placeholder="Judul Buku" required>
            </div>
            <div>
              <label class="login__label" for="exampleFormControlInput1">Pengarang</label>
              <input class="login__input" type="text" name="pengarang" id="exampleFormControlInput1"
                placeholder="nama pengarang" required>
            </div>
            <div>
              <label class="login__label" for="exampleFormControlInput1">Penerbit</label>
              <input class="login__input" type="text" name="penerbit" id="exampleFormControlInput1"
                placeholder="nama penerbit" required>
            </div>
            <div>
              <label class="login__label" for="validationCustom01">Tahun Terbit</label>
              <input class="login__input" type="date" name="tahun_terbit" id="validationCustom01" required>
            </div>
            <div>
              <label class="login__label" for="validationCustom01">Jumlah Halaman</label>
              <input class="login__input" type="number" name="jumlah_halaman" id="validationCustom01" required>
            </div>
            <div>
              <label class="login__label" for="floatingTextarea2">Sinopsis</label>
              <textarea class="login__input" name="buku_deskripsi" id="floatingTextarea2"
                placeholder="sinopsis tentang buku ini" style=" max-width: 100%; resize:none; min-width: 100%; margin-bottom:20px;"></textarea>
            </div>
            <button class="button login__button" type="submit" name="tambah">Tambah</button>
            <input class="button login__button" type="reset" value="Reset">
          </form>
        </div>
      </div>
    </section>
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