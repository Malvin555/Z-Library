<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}

require "../../config/config.php";
// Ambil data dari url
$review = $_GET["idReview"];
$reviewData = queryReadData("SELECT * FROM buku WHERE id_buku = '$review'")[0];

// ==== FASE PERCOBAAN DEBUGGING =====
/*
$reviewKategori = queryReadData("SELECT * FROM buku WHERE kategori = '$review'");
*/
// Data kategori buku
$kategori = queryReadData("SELECT * FROM kategori_buku"); 

if(isset($_POST["update"]) ) {
  
  if(updateBuku($_POST) > 0) {
    echo "<script>
    alert('Data buku berhasil diupdate!');
    document.location.href = 'daftarBuku.php';
    </script>";
  }else {
    echo "<script>
    alert('Data buku gagal diupdate!');
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

    /* Update */

        section.container-form {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            padding: 20px;
        }

        .image-container {
            margin-top: 100px;
        }

        .image-container img {
            width: 100%;
        }

        .add__form {
            display: flex;
            flex-direction: column;
        }

        .add__form div {
            margin-bottom: 15px;
        }

        .add__form label {
            display: block;
            margin-bottom: 5px;
        }

        .add__form a {
            display: inline-block;
            margin-top: 10px;
            color: var(--white-color: hsl(0, 0%, 100%));
            text-decoration: none;
            text-align : center;
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
      <a href="../dashboardAdmin.php" class="nav__logo">
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
    <section class="container-form container">
        <div class="image-container">
            <img src="../../imgDB/<?= $reviewData["cover"]; ?>" width="80px" height="80px" alt="Cover Buku">
        </div>
        <div class="add__form">
            <h1 class="login__title">Form Edit Book</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="coverLama" value="<?= $reviewData["cover"]; ?>">

                <div>
                    <label class="login__label" for="formFileMultiple">Cover Book</label>
                    <input class="login__input" type="file" name="cover" id="formFileMultiple">
                </div>

                <div>
                    <label class="login__label" for="exampleFormControlInput1">Id Book</label>
                    <input class="login__input" type="text" name="id_buku" id="exampleFormControlInput1" value="<?= $reviewData["id_buku"]; ?>">
                </div>

                <div>
                    <label class="login__label" for="inputGroupSelect01">Category</label>
                    <select class="login__input" id="inputGroupSelect01" name="kategori">
                        <option selected><?= $reviewData["kategori"]; ?></option>
                        <?php foreach ($kategori as $item) : ?>
                        <option><?= $item["kategori"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="login__label" for="title">Title</label>
                    <input class="login__input" type="text" name="judul" id="title" placeholder="Judul Buku" value="<?= $reviewData["judul"]; ?>">
                </div>

                <div>
                    <label class="login__label" for="exampleFormControlInput1">Author</label>
                    <input class="login__input" type="text" name="pengarang" id="exampleFormControlInput1" value="<?= $reviewData["pengarang"]; ?>">
                </div>

                <div>
                    <label class="login__label" for="exampleFormControlInput1">Publisher</label>
                    <input class="login__input" type="text" name="penerbit" id="exampleFormControlInput1" value="<?= $reviewData["penerbit"]; ?>">
                </div>

                <div>
                    <label class="login__label" for="validationCustom01">Publication Year</label>
                    <input class="login__input" type="date" name="tahun_terbit" id="validationCustom01" value="<?= $reviewData["tahun_terbit"]; ?>">
                </div>

                <div>
                    <label class="login__label" for="validationCustom01">Number Page</label>
                    <input class="login__input" type="number" name="jumlah_halaman" id="validationCustom01" value="<?= $reviewData["jumlah_halaman"]; ?>">
                </div>

                <div>
                    <label class="login__label" for="floatingTextarea2">Description</label>
                    <textarea class="login__input" name="buku_deskripsi" id="floatingTextarea2"
                placeholder="Description about this book" style=" max-width: 100%; resize:none; min-width: 100%; margin-bottom:20px;"></textarea>
                </div>

                <button type="submit" name="update" class="login__button button">Edit</button>
                <a class="login__button button" href="daftarBuku.php">Batal</a>
            </form>
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