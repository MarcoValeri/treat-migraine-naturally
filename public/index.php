<?php 

// Require initialize.php and related code
require_once('../private/initialize.php');

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Welcome';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main class="main-home-gridcontainer">
    <section class="main-home-gridcontainer-container-one main-home-gridcontainer-single">
        <img src="./images/migraine.jpg" alt="Migraine" /> <!-- Photo by Nik Shuliahin on Unsplash -->
        <div class="main-home-gridcontainer-single-content">
            <p>
                <a href="https://www.who.int/news-room/fact-sheets/detail/headache-disorders" target="_blank">World Health Organization</a> 
                declares that almost half of the adult population have had a headache at least once within the last year.
            </p>
            <p><strong>Migraine is a primary headache disorder of the nervous system.</strong></p>
            <p>Treat Migraine Naturally has the mission to cure this headache disorder in a efficient and natural way.</p>
            <p>Get today our healthy survey and keep in touch with our staff for a personal and natural treatment.</p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <div class="main-home-gridcontainer-single-btn" >Read More</div>
            </div>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-two main-home-gridcontainer-single">
        <img src="./images/acquatic-jungle.jpg" alt="Aquatic Jungle" /> <!-- Photo by Alfred Schrock on Unsplash -->
        <div class="main-home-gridcontainer-single-content">
            <p>
                Do you know it is possible to Treat Migraine Naturally?
            </p>
            <p>
                Nowadays there are different types of natural treatments that allow to treat the migraine with healthy and natural products.    
            </p>
            <p>
                Start now to treat the migraine in a different, healthy, natural and efficient way, register to our application and get our healthy survey.
            </p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <div class="main-home-gridcontainer-single-btn" >Read More</div>
            </div>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-three main-home-gridcontainer-single">
        <img src="./images/moon.jpg" alt="Moon" /> <!-- Photo by Roberto H on Unsplash -->
        <div class="main-home-gridcontainer-single-content">
            <p>Follow Treat Migraine Naturally on:</p>
            <a href="">Read More</a>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-four main-home-gridcontainer-single">
        <img src="./images/world.jpg" alt="World" /> <!-- Photo by NASA on Unsplash -->
        <div class="main-home-gridcontainer-single-content">
            <p>So far we have helped NUMBER people in the world to fight against migraine.</p>
            <p>Are you the next?</p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <div class="main-home-gridcontainer-single-btn" >Login</div>
            </div>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-five main-home-gridcontainer-single">
        <img src="./images/brain.jpg" alt="Brain" /> <!-- Photo by Gerd Altmann on Pixabay -->
        <div class="main-home-gridcontainer-single-content">
            <p>Who we are?</p>
            <p>Treat Migraine Naturally is a Company that has the goal to treat migraine with healthy, naturally and efficient products.</p>
            <p>So far, we have helped…</p>
            <div class="main-home-gridcontainer-single-btn-wrap">
                <div class="main-home-gridcontainer-single-btn" >Read More</div>
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