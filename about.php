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
        <style>
        .box {
        background-color: var(--container-color);
        border: 2px solid var(--border-color);
        width: 100%;
        }
        .box > img {
        width: 200px;
        display: block;
        margin: 0 auto;
        }
        .center {
        text-align: center;
        padding: 10px;
        }
        .box-form, .box-form-b {
        display: grid;
        gap: 20px;
        }
        /* Default grid layout */
        .box-form {
        grid-template-columns: repeat(4, 1fr);
        }
        .box-form-b {
        grid-template-columns: repeat(3, 1fr);
        }
        /* Responsive adjustments */
        @media (max-width: 1200px) {
        .box-form {
        grid-template-columns: repeat(3, 1fr);
        }
        .box-form-b {
        grid-template-columns: repeat(2, 1fr);
        }
        }
        @media (max-width: 900px) {
        .box-form {
        grid-template-columns: repeat(2, 1fr);
        }
        .box-form-b {
        grid-template-columns: 1fr;
        }
        }
        @media (max-width: 600px) {
        .box-form, .box-form-b {
        grid-template-columns: 1fr;
        }
        .box > img {
        width: 150px; /* Adjust image size for smaller screens */
        }
        }
        </style>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="index.php" class="nav__logo">
                    <i class="ri-book-3-line"></i> Z-Library
                </a>
                <div class="nav__menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.php" class="nav__link active-link">
                                <i class="ri-home-line"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="index.php" class="nav__link">
                                <i class="ri-book-3-line"></i>
                                <span>Featured</span>
                            </a>
                        </li>
                        <li class="nav__item">
                            <a href="index.php" class="nav__link">
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
                <div style="margin-top: 100px;" class="container grid">
                    <div>
                        <h2 class="home__title center">About Us</h2>
                        <p class="center">The Z-Library website is a project that we created with a working time span of one month. Starting from 03/08/2024 to 03/09/2024, in this period we use this time to look for website builder parts. Such as code, references, material content, ideas, and others. Z-Library is programmed to provide services like an online library, providing books, lending books, or even selling books. The location of the Z-Library designer is based at Triatma Jaya Badung Highschool, by one of the groups from Class XI PPLG. </p> <br>
                        <p class="center">With this project, it is proof of our commitment to program a library-themed website to serve you in seeking knowledge-based needs through a digital library. Of course, we will always try to improve our quality from the appearance of the website to expanding our knowledge. With this website, we offer you to read, borrow and buy books with an extraordinary experience! We guarantee that any information contained in our content has sufficient accuracy to make us confident in the experience we provide to you!</p> <br>
                        <p class="center">Thank you for visiting our site. Feel free to contact us if you have any questions or feedback.</p>
                    </div>
                    <div class="box-form">
                        <div class="box">
                            <h1 class="center">Malvin</h1>
                            <img src="assets/adminLogo.png">
                            <h2 class="center">Tech</h2>
                            <p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                        </div>
                        <div class="box">
                            <h1 class="center">Semadi</h1>
                            <img src="assets/adminLogo.png">
                            <h2 class="center">Tech</h2>
                            <p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                        </div>
                        <div class="box">
                            <h1 class="center" >Atha</h1>
                            <img src="assets/adminLogo.png">
                            <h2 class="center">Tech</h2>
                            <p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                        </div>
                        <div class="box">
                            <h1 class="center">Chandra</h1>
                            <img src="assets/adminLogo.png">
                            <h2 class="center">Tech</h2>
                            <p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                        </div>
                    </div>
                    <div class="box-form-b">
                        <div class="box">
                            <h1 class="center">Giovanny</h1>
                            <img src="assets/adminLogo.png">
                            <h2 class="center">Tech</h2>
                            <p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                        </div><div class="box">
                        <h1 class="center">Rizkyla</h1>
                        <img src="assets/adminLogo.png">
                        <h2 class="center">Tech</h2>
                        <p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                    </div><div class="box">
                    <h1 class="center">Bayu</h1>
                    <img src="assets/adminLogo.png">
                    <h2 class="center">Tech</h2>
                    <p class="center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</p>
                </div>
            </div>
        </div>
    </main>
    <!--==================== HOME ====================-->
    
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
                            <a href="" class="footer__link">Awards</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">FAQs</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">Privacy policy</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">Terms of service</a>
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