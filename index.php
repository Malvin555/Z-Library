<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== FAVICON ===============-->
   <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

   <!--=============== SWIPER CSS ===============-->
   <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="assets/css/styles.css">

   <title>Z - Library</title>


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
                  <a href="#" class="nav__link active-link">
                     <i class="ri-home-line"></i>
                     <span>Home</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="#discount" class="nav__link">
                     <i class="ri-book-3-line"></i>
                     <span>Featured</span>
                  </a>
               </li>
               <li class="nav__item">
                  <a href="#report" class="nav__link">
                     <i class="ri-message-line"></i>
                     <span>Report</span>
                  </a>
            </ul>
         </div>

         <div class="nav__actions">

            <!-- Login-->
            <i class="ri-user-line login-button" id="login-button"></i>

            <!-- Theme Button -->
            <i class="ri-moon-line change-theme" id=theme-button></i>
         </div>
      </nav>
   </header>

   <!--==================== LOGIN ====================-->
   <div class="login grid" id="login-content">
      <form action="" class="login__form grid" id="featured">
         <h3 class="login__title">Admin Or User?</h3>

         <div class="login__group grid">
            <div>
               <label for="" class="login__label">Admin</label>
               <a href="sign/admin/sign_in.php" class="login__button button">Admin</a>
            </div>

            <div>
               <label for="login-pass" class="login__label">Members</label>
               <a href="sign/member/sign_in.php" class="login__button button">Members</a>
            </div>
         </div>
         <span class="login__signup">
            You do not have an account? <a href="sign/member/sign_up.php" id="login-button">Sign Up</a>
         </span>
      </form>

      <i class="ri-close-line login__close" id="login-close"></i>
   </div>

   <!--==================== MAIN ====================-->
   <main class="main">
      <!--==================== HOME ====================-->
      <section class="home section" id="home">
         <div class="home__container container grid">
            <div class="home__data">
               <h1 class="home__title">
                  Browse & <br>
                  Select E-Books
               </h1>

               <p class="home__description">
                  Find the best e-boks from your favorite
                  writers, explore hundreds of books with all
                  possible categories, take advantage
                  and much more.
               </p>

               <a href="#" class="button">Explore Now</a>
            </div>

            <div class="home__images">
               <div class="home__swiper swiper">
                  <div class="swiper-wrapper">
                     <article class="home__article swiper-slide">
                        <img src="assets/img/home-book-1.png" alt="image" class="home__img">
                     </article>

                     <article class="home__article swiper-slide">
                        <img src="assets/img/home-book-2.png" alt="image" class="home__img">
                     </article>

                     <article class="home__article swiper-slide">
                        <img src="assets/img/home-book-3.png" alt="image" class="home__img">
                     </article>

                     <article class="home__article swiper-slide">
                        <img src="assets/img/home-book-4.png" alt="image" class="home__img">
                     </article>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!--==================== SERVICES ====================-->
      <section class="services section">
         <div class="services__container container grid">
            <article class="services__card">
               <i class="ri-speed-fill"></i>
               <h3 class="services__title">Fast Response</h3>
               <p class="services__description">Our System More Fasters</p>
            </article>

            <article class="services__card">
               <i class="ri-creative-commons-nc-line"></i>
               <h3 class="services__title">100% Free</h3>
               <p class="services__description">Free To Use</p>
            </article>

            <article class="services__card">
               <i class="ri-folder-shield-line"></i>
               <h3 class="services__title">Secure Information</h3>
               <p class="services__description">100% Your Data Encrypted</p>
            </article>

         </div>
      </section>

      <!--==================== DISCOUNT ====================-->
      <section class="discount section" id="discount">
         <div class="discount__container container grid">
            <div class="discount__data">
               <h2 class="discount__title section__title">
                  New Book Everyday
               </h2>

               <p class="discount__description">
                  Z-Library provide you the lastest, treding book from worldwide. don't forget always use our services
               </p>

               <a href="" class="button">Explore Now</a>
            </div>

            <div class="discount__images">
               <img src="assets/img/discount-book-1.png" alt="" class="discount__img-1">
               <img src="assets/img/discount-book-2.png" alt="" class="discount__img-2">
            </div>
         </div>
      </section>

      <!--==================== FOOTER ====================-->
      <footer class="footer" id="report">
         <div class="footer__container container grid">
            <div>
               <a href="#" class="footer__logo">
                  <i class="ri-book-3-line"></i>Z - Book
               </a>

               <p class="footer__description">
                  Find and explore the best <br>
                  Z-Books from all your <br>
                  favorite writters.
               </p>
            </div>

            <div class="footer__data grid">
               <div>
                  <h3 class="footer__title">About</h3>

                  <ul class="footer__links">
                     <li>
                        <a href="about.php" class="footer__link">Awards</a>
                     </li>

                     <li>
                        <a href="about.php" class="footer__link">FAQs</a>
                     </li>

                     <li>
                        <a href="about.php" class="footer__link">Privacy policy</a>
                     </li>

                     <li>
                        <a href="about.php" class="footer__link">Terms of service</a>
                     </li>
                  </ul>
               </div>

               <div>
                  <h3 class="footer__title">Company</h3>

                  <ul class="footer__links">
                     <li>
                        <a href="" class="footer__link">Blogs</a>
                     </li>

                     <li>
                        <a href="" class="footer__link">Community</a>
                     </li>

                     <li>
                        <a href="" class="footer__link">Our teams</a>
                     </li>

                     <li>
                        <a href="" class="footer__link">Help center</a>
                     </li>
                  </ul>
               </div>

               <div>
                  <h3 class="footer__title">Contact</h3>

                  <ul class="footer__links">
                     <li>
                        <address class="footer__info">
                           MG. Malvin <br>
                           Badung, 30443 Bali
                        </address>
                     </li>

                     <li>
                        <address class="footer__info">
                           malvinbrine475@gmail.com <br>
                           0878-4404-6347
                        </address>
                     </li>
                  </ul>
               </div>

               <div>
                  <h3 class="footer__title">Social</h3>

                  <div class="footer__social">
                     <a href="" target="_blank" class="footer__social-link">
                        <i class="ri-facebook-circle-line"></i>
                     </a>

                     <a href="" target="_blank" class="footer__social-link">
                        <i class="ri-instagram-line"></i>
                     </a>
                     
                     <a href="" target="_blank" class="footer__social-link">
                        <i class="ri-twitter-x-line"></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>

         <span class="footer__copy">
            &#169; All Rights Reversed By XI - PPLG
         </span>
      </footer>

      <!--========== SCROLL UP ==========-->
      <a href="" class="scrollup" id="scroll-up">
         <i class="ri-arrow-up-line"></i>
      </a>

      <!--=============== SCROLLREVEAL ===============-->
      <script src=""></script>

      <!--=============== SWIPER JS ===============-->
      <script defer src="assets/js/swiper-bundle.min.js"></script>

      <!--=============== MAIN JS ===============-->
      <script defer src="assets/js/main.js"></script>
</body>

</html>