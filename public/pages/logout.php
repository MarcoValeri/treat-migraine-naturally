<?php

// Require initialize.php and relatd code
require_once('../../private/initialize.php');

// Called function destroy_current_session() that destroys the session
destroy_current_session();

// Define a variable that gives the title to the page
$page_title = 'Logout';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');
?>

</head>
<body>

<!-- Headers -->
<?php
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = "Logout";
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main class="logout-main">
    <h2>User has been logout</h2>
    <p>Thank you for visiting Treat Migraine Naturally</p>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>