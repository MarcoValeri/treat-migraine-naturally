<?php

// Require initialize.php and relatd code
require_once('../../private/initialize.php');

/*
* Validation form for login
*/

// Create a boolean variable with false value
$valid_user = false;

// Create an empty array where saving the errors if they exist
$errors_output = [];

// Create a empty variables where saving form input if they are valid
$email = '';
$password = '';

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    /*
    * Validate Email input
    * Email must be a valid email address
    * To achieve this task I used built-in function filter_var()
    */
    if (isset($_POST['email'])) {
        $email_input = trim($_POST['email']);
        $email_input = htmlentities($email_input);

        if ($email_input !== '') {

            if (filter_var($email_input, FILTER_VALIDATE_EMAIL)) {
                $email = $email_input;
                $valid_user = true;
            } else {
                $errors_output['Email'] = "should be a valid email address";
                $valid_user = false;
            }

        } else {
            $errors_output['Email'] = "is required";
            $valid_user = false;
        }
    }

    /*
    * Validate password input
    * User is free to type any kind of password
    * If the password does not match with a registered user
    * it's not possibile to login
    */
    if (isset($_POST['password'])) {
        $password_input = trim($_POST['password']);
        $password_input = htmlentities($password_input);

        if ($password_input !== '') {
            $password = $password_input;
            $valid_user = true;
        } else {
            $errors_output['Password'] = "is required";
            $valid_user = false;
        }

    }

}

/*
* Save the form inside a variable which name is output
* If the users login with a valid email and password
* and
* if the user has been already logged
* output savas a btn that allows user to enter into the menu section
*/
if ($valid_user && count($errors_output) === 0) {

    if (check_user($db, $email, $password)) {
        $redirect = url_for('menu/menu.php');
        $output = "Hi " . $email . "<br />";
        $output .= "<button><a href='${redirect}'>Menu</a></button>";
        echo "<br />";
        create_session_data(get_first_name($db, $email), get_last_name($db, $email), get_email($db, $email), get_admin_permission($db, $email));
    } else {
        $output = "Email and password are not valid";
    }

} else {
    $output = "
        <form action='./login.php' method='post'>
            <label for='email'>Email *</label>
            <input id='email' name='email' type='email' value='' placeholder='Email'>
            <label for='password'>Password *</label>
            <input id='password' name='password' type='password' value='' placeholder='Password'>
            <input name='submit' type='Submit' value='Create new account'>
        </form>
";
}

// Define a variable that gives the title to the page
$page_title = 'Login';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');
?>

</head>
<body>

<!-- Headers -->
<?php
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = "Login";
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->

<!-- Output -->
<?= $output; ?>

<section>
    <!-- Show errors if they exist -->
    <ul>
    <?php
        foreach($errors_output as $key => $value) {
    ?>
            <li><?= "${key}: ${value}"; ?></li>
    <?php
        }
    ?>
</section>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>