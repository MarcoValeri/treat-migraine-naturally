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
    <section class="main-home-gridcontainer-container-one">
    1
    </section>
    <section class="main-home-gridcontainer-container-two">
    2
    </section>
    <section class="main-home-gridcontainer-container-three">
    3
    </section>
    <section class="main-home-gridcontainer-container-four">
    4
    </section>
    <section class="main-home-gridcontainer-container-five">
    5
    </section>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>