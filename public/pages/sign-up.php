<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

/*
* Validation form for create new account
*/

// Define a variable that gives the title to the page
$page_title = 'Sign Up';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>

</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Create new account';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main>
    <form action="" method="post">
        <label for="first_name">First Name *</label>
        <input id="first_name" name="first_name" type="text" value="" placeholder="First Name">
        <label for="last_name">Last Name *</label>
        <input id="last_name" name="last_name" type="text" value="" placeholder="Last Name">
        <label for="email">Email *</label>
        <input id="email" name="email" type="email" value="" placeholder="Email">
        <label for="cofirm_email">Confirm email *</label>
        <input id="confirm_email" name="confirm_email" type="email" value="" placeholder="Confirm Email">
        <label for="password">Password *</label>
        <input id="password" name="password" type="password" value="" placeholder="Password">
        <label for="confirm_password">Confirm Password *</label>
        <input id="confirm_password" name="confirm_password" type="password" value="" placeholder="Confirm Password">
        <p>Shows Password</p>
        <input name="submit" value="Create new account">
    </form>
</main>

</body>
</html>