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
        <img src="./images/brain.jpg" alt="Brain" />
        <div class="main-home-gridcontainer-single-content">
            <p>
                <a href="https://www.who.int/news-room/fact-sheets/detail/headache-disorders" target="_blank">World Health Organization</a> 
                declares that almost half of the adult population have had a headache at least once within the last year.
            </p>
            <p><strong>Migraine is a primary headache disorder of the nervous system.</strong></p>
            <p>Treat Migraine Naturally has the mission to cure this headache disorder in a efficient and natural way.</p>
            <p>Get today out healthy survey and keep in touch with our staff for a personal and natural treatment.</p>
            <a href="">Read More</a>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-two main-home-gridcontainer-single">
        <img src="./images/brain.jpg" alt="Brain" />
        <div class="main-home-gridcontainer-single-content">
            <p>Some test</p>
            <a href="">Read More</a>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-three main-home-gridcontainer-single">
        <img src="./images/brain.jpg" alt="Brain" />
        <div class="main-home-gridcontainer-single-content">
            <p>Some test</p>
            <a href="">Read More</a>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-four main-home-gridcontainer-single">
        <img src="./images/brain.jpg" alt="Brain" />
        <div class="main-home-gridcontainer-single-content">
            <p>Some test</p>
            <a href="">Read More</a>
        </div>
    </section>
    <section class="main-home-gridcontainer-container-five main-home-gridcontainer-single">
        <img src="./images/brain.jpg" alt="Brain" />
        <div class="main-home-gridcontainer-single-content">
            <p>Some test</p>
            <a href="">Read More</a>
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