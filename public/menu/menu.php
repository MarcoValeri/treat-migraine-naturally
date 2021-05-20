<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_user($_SESSION['email'], url_for('/pages/login'));

// Define a variable that gives the title to the page
$page_title = 'Menu';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');


?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Menu';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- main --> 
<main class="menu-main">
    <section class="menu-main-gridcontainer">
        <section class="menu-main-gridcontainer-title">
            <h2 class="menu-main-gridcontainer-title-elastic">Main Menu</h2>
        </section>
        <section class="menu-main-gridcontainer-section-one">
            <div class="menu-main-gridcontainer-section-one-btn-wrap">
                <a href="<?= url_for('/menu/healthy-survey.php'); ?>">
                    <div class="menu-main-gridcontainer-section-one-btn">
                        Healthy Survey
                    </div>
                </a>
            </div>
        </section>
        <section class="menu-main-gridcontainer-section-two">
            <div class="menu-main-gridcontainer-section-two-btn-wrap">
                <a href="<?= url_for('/menu/user-settings.php'); ?>">
                    <div class="menu-main-gridcontainer-section-two-btn">
                        User Setting
                    </div>
                </a>
            </div>
        </section>
    </section>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>