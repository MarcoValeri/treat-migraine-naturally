<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Define a variable that gives the title to the page
$page_title = 'About us';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'About Us';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main class="main-home-gridcontainer">
    <section class="main-home-gridcontainer-container-one main-home-gridcontainer-single">
        <img src="http://localhost/treat-migraine-naturally/public/images/migraine.jpg" alt="Migraine" /> <!-- Photo by Nik Shuliahin on Unsplash -->
        <div class="main-home-gridcontainer-single-content-one">
            <p>
                <a href="https://www.who.int/news-room/fact-sheets/detail/headache-disorders" target="_blank"><span class="first-letter">W</span>orld Health Organization</a> 
                <br>declares that almost half of the adult population have had a headache 
                <br >at least once within the last year.
            </p>
            <!-- <p><mark>Migraine is a primary headache disorder of the nervous system.</mark></p>
            <p>Treat Migraine Naturally has the mission to cure this headache
                </br> disorder in a efficient and natural way.
            </p> -->
            <p>
                Get today our healthy survey and keep in touch with our</br> 
                staff for a personal and natural treatment.
            </p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <a href="https://www.who.int/news-room/fact-sheets/detail/headache-disorders" target="_blank">
                    <div class="main-home-gridcontainer-single-btn">
                        Read More
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-two main-home-gridcontainer-single">
        <img src="http://localhost/treat-migraine-naturally/public/images/acquatic-jungle.jpg" alt="Aquatic Jungle" /> <!-- Photo by Alfred Schrock on Unsplash -->
        <div class="main-home-gridcontainer-single-content-two">
            <p>
                <a href="<?= url_for('/pages/sign-up.php'); ?>">
                    <span class="first-letter">D</span>o you know it is possible to Treat Migraine Naturally?
                </a>
            </p>
            <p>
                Nowadays there are different types of natural treatments that allow to 
                <br><mark>treat the migraine with healthy and natural products.</mark>    
            </p>
            <p>
                Start now to treat the migraine in a 
                <br>different, 
                <br>healthy, 
                <br>natural and efficient way, 
                <br>register to our application and 
                <br>get our healthy survey.
            </p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <a href="<?= url_for('/pages/sign-up.php'); ?>">
                    <div class="main-home-gridcontainer-single-btn">
                        Register
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-three main-home-gridcontainer-single">
        <img src="http://localhost/treat-migraine-naturally/public/images/moon.jpg" alt="Moon" /> <!-- Photo by Roberto H on Unsplash -->
        <div class="main-home-gridcontainer-single-content-three">
            <p><span class="first-letter">F</span>ollow Treat Migraine Naturally on</p>
            <i class="fab fa-facebook-square"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter-square"></i>
            <i class="fab fa-linkedin"></i>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-four main-home-gridcontainer-single">
        <img src="http://localhost/treat-migraine-naturally/public/images/world.jpg" alt="World" /> <!-- Photo by NASA on Unsplash -->
        <div class="main-home-gridcontainer-single-content-four">
            <p>
                <a href="<?= url_for('/pages/login.php'); ?>">
                    <span class="first-letter">S</span>o far we have helped <span class="first-letter"><?= users_registered($db); ?></span> people in the world to fight against migraine.
                </a>
            </p>
            <p><mark>Are you the next?</mark></p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <a href="<?= url_for('/pages/login.php'); ?>">
                    <div class="main-home-gridcontainer-single-btn">
                        Login
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-five main-home-gridcontainer-single">
        <img src="http://localhost/treat-migraine-naturally/public/images/brain.jpg" alt="Brain" /> <!-- Photo by Gerd Altmann on Pixabay -->
        <div class="main-home-gridcontainer-single-content-five">
            <p>
                <a href="<?= url_for('/pages/login.php'); ?>">
                    <span class="first-letter">W</span>ho we are?.
                </a>
            </p>
            <p>
                <mark>Treat Migraine Naturally</mark>
                <br>is a Company that has the goal 
                <br>to treat migraine with healthy, 
                <br>naturally and efficient products.
            </p>
            <p>So far, we have helped…</p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <a href="<?= url_for('/pages/about-us.php'); ?>">
                    <div class="main-home-gridcontainer-single-btn">
                        Read More
                    </div>
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>