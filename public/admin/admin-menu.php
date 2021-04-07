<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

// Called redirect_user($value, $url); that redirects to the login page 
// an authorized user
redirect_admin($_SESSION['email'], $_SESSION['admin'], url_for('/admin/admin.php'));

// Define a variable that gives the title to the page
$page_title = 'Admin Menu';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');


?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Admin Menu';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main class='admin-menu-main'>
    <section class="admin-menu-main-gridcontainer">
        <section class="admin-menu-main-gridcontainer-title">
            <h2 class="admin-menu-main-gridcontainer-title-elastic">Admin Menu</h2>
        </section>
        <section class="admin-menu-main-gridcontainer-one">
            <div class="admin-menu-main-gridcontainer-one-btn-wrap">
                <a href="<?= url_for('/admin/users/users.php'); ?>">
                    <div class="menu-main-gridcontainer-section-one-btn">
                        Users
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