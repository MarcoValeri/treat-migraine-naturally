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

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>