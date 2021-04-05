<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_user($_SESSION['email'], url_for('/pages/login.php'));

// Define a variable that gives the title to the page
$page_title = 'Healthy Survey';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');


?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Healthy Survey';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- main --> 
<main class="survey-main">
    <section class="survey-main-container">
        <h2>Start our survey</h2>
        <div class="survey-main-container-btn-wrap">
            <a href="<?= url_for('/menu/healthy-survey-page-1.php'); ?>">
                <div class="survey-main-container-btn">
                    Start now
                </div>
            </a>
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