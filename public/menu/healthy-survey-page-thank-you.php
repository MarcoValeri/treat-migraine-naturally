<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_user($_SESSION['email'], url_for('/pages/login.php'));

// Define a variable that gives the title to the page
$page_title = 'Thank you page';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');


?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Healthy Survey - Thank you page';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- main --> 
<main class="thanks-page-main">
    <h2>Thank you to fill up our survey</h2>
    <p>A member of our staff will  be in touch with you soon</p>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>