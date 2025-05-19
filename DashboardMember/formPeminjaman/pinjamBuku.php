<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";
// Tangkap id buku dari URL (GET)
$idBuku = $_GET["id"];
$query = queryReadData("SELECT * FROM buku WHERE id_buku = '$idBuku'");
//Menampilkan data siswa yg sedang login
$nisnSiswa = $_SESSION["member"]["nisn"];
$dataSiswa = queryReadData("SELECT * FROM member WHERE nisn = $nisnSiswa");
$admin = queryReadData("SELECT * FROM admin");

// Peminjaman 
if(isset($_POST["pinjam"]) ) {
  if(pinjamBuku($_POST) > 0) {
    echo "<script>
    alert('Buku berhasil dipinjam');
    window.location.href = '../buku/daftarBuku.php'; // Redirect to the desired page
    </script>";
  } else {
    echo "<script>
    alert('Buku gagal dipinjam!');
    // Optionally, you can redirect to the same page or a different page
    window.location.href = '../buku/daftarBuku.php'; // Redirect to the same page or another page
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

  <title>Z - Library | Borrow</title>

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



    /* Book Layout */
    .card-container {
      margin-left: 80px;
      margin-right: 80px;
      margin-top: 25px;
      margin-bottom: 25px;
      padding: 20px;
      background-color: var(--body-color);
      border: 2px solid var(--border-color);
    }

    .button {
      width: 49.5%;
      text-align: center;
      margin-top: 25px;
    }

    p,
    h1 {
      text-align: center;
      padding: 20px;
    }

    .login__label {
      padding-bottom: 10px;
      padding-top: 10px;
    }

    .img-student {
      display: block;
      margin: 0 auto;
      width: 20%;
    }
  </style>


</head>

<body>
  <!--==================== HEADER ====================-->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="../../dashboardMember.php" class="nav__logo">
        <i class="ri-book-3-line"></i> Z-Library
      </a>

      <div class="nav__menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="../buku/daftarBuku.php" class="nav__link">
            <i class="ri-git-repository-commits-line"></i>
              <span>List Book</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="TransaksiPeminjaman.php" class="nav__link">
            <i class="ri-health-book-line"></i>
              <span>History Borrow Book</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="TransaksiPengembalian.php" class="nav__link">
            <i class="ri-money-pound-circle-line"></i>
              <span>History Returning Book</span>
            </a>
          </li>
          <li class="nav__item">
            <a href="TransaksiDenda.php" class="nav__link">
              <i class="ri-message-line"></i>
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
              <img src="../assets/img/memberLogo.png" class="logo__dash" alt="adminLogo">
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
  <main class="container">
    <section class="book-details">
      <h1>Book Borrowing Form</h1>
      <div class="home__container">
        <div class=" card-container">
          <h1 class="login__title">Book Details</h1>
          <?php foreach ($query as $item) : ?>
          <form action="" method="post" class="book-form">
            <div class="form-group">
              <label class="login__label">Book ID</label>
              <input class="login__input" type="text" value="<?= $item["id_buku"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Category</label>
              <input class="login__input" type="text" value="<?= $item["kategori"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Title</label>
              <input class="login__input" type="text" value="<?= $item["judul"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Author</label>
              <input class="login__input" type="text" value="<?= $item["pengarang"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Publisher</label>
              <input class="login__input" type="text" value="<?= $item["penerbit"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Publication Year</label>
              <input class="login__input" type="text" value="<?= $item["tahun_terbit"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Page Number</label>
              <input class="login__input" type="number" value="<?= $item["jumlah_halaman"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Book Description</label>
              <textarea class="login__input" style=" max-width: 100%; resize:none; min-width: 100%; margin-bottom:20px;"
                readonly><?= $item["buku_deskripsi"]; ?></textarea>
            </div>
          </form>
          <?php endforeach; ?>
        </div>

        <div class="card-container">
          <h1 class="login__title">Student Details</h1>
          <?php foreach ($dataSiswa as $item) : ?>
          <div class="student-image">
            <img class="img-student" src="../../assets/memberLogo.png" alt="Student Photo">
          </div>
          <form action="" method="post" class="student-form">
            <div class="form-group">
              <label class="login__label">NISN</label>
              <input class="login__input" type="number" value="<?= $item["nisn"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Member Code</label>
              <input type="text" class="login__input" value="<?= $item["kode_member"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Name</label>
              <input type="text" class="login__input" value="<?= $item["nama"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Gender</label>
              <input type="text" class="login__input" value="<?= $item["jenis_kelamin"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Class</label>
              <input type="text" class="login__input" value="<?= $item["kelas"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Major</label>
              <input type="text" class="login__input" value="<?= $item["jurusan"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Phone Number</label>
              <input type="text" class="login__input" value="<?= $item["no_tlp"]; ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Registration Date</label>
              <input type="text" class="login__input" value="<?= $item["tgl_pendaftaran"]; ?>" readonly>
            </div>
          </form>
          <?php endforeach; ?>
        </div>

        <div class="instructions">
          <p>Please review the data above to ensure it is correct before borrowing the book. If there is any data error,
            please contact the admin.</p>
        </div>

        <div class="card-container">
          <h1 class="login__title">Book Borrowing Form</h1>
          <form action="" method="post" id="borrow-form">
            <?php foreach ($query as $item) : ?>
            <div class="form-group">
              <label class="login__label">Book ID</label>
              <input class="login__input" type="text" name="id_buku" value="<?= $item["id_buku"]; ?>" readonly>
            </div>
            <?php endforeach; ?>
            <div class="form-group">
              <label class="login__label">NISN</label>
              <input class="login__input" type="number" name="nisn"
                value="<?php echo htmlentities($_SESSION["member"]["nisn"]); ?>" readonly>
            </div>
            <div class="form-group">
              <label class="login__label">Admin ID</label>
              <select class="login__input" name="id" required>
                <option value="" disabled selected>Select Admin ID</option>
                <?php foreach ($admin as $item) : ?>
                <option value="<?= $item["id"]; ?>"><?= $item["id"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label class="login__label">Borrow Date</label>
              <input type="date" class="login__input" name="tgl_peminjaman" id="tgl_peminjaman"
                onchange="setReturnDate()" required>
            </div>
            <div class="form-group">
              <label class="login__label">Return Deadline</label>
              <input type="date" class="login__input" name="tgl_pengembalian" id="tgl_pengembalian" readonly>
            </div>
            <div class="form-actions">
              <a href="../buku/daftarBuku.php" class="button">Cancel</a>
              <button type="submit" name="pinjam" class="button">Borrow</button>
            </div>
          </form>
        </div>

        <div class="note">
          <p><strong>Note:</strong> Any delay in returning the book will incur a penalty.</p>
        </div>
      </div>
    </section>
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

  <script defer src="../../style/js/script.js"></script>

  <script>
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('borrow-form');

    form.addEventListener('submit', function (event) {
      var adminSelect = form.querySelector('select[name="id"]');

      if (adminSelect.value === "") {
        alert('Please select an Admin ID before submitting.');
        event.preventDefault(); // Prevent form submission
      }
    });
  });
</script>

  </script>
</body>

</html>