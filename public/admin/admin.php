<?php

// Require initialize.php and relatd code
require_once('../../private/initialize.php');

/*
* Validation form for admin login
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
* If the admin login with a valid email and password
* and
* if the admin has been already logged
* output savas a btn that allows user to enter into the menu section
*/
if ($valid_user && count($errors_output) === 0) {

    if (check_admin($db, $email, $password)) {
        $redirect = url_for('admin/admin-menu.php');
        $output = "<section class='admin-main-confim'><p>Hi " . $email . "<p/>";
        $output .= "<button><a href='${redirect}'>Admin Menu</a></button></section>";
        create_session_data(get_first_name($db, $email), get_last_name($db, $email), get_email($db, $email), get_admin_permission($db, $email));
    } else {
        $redirect = url_for('admin/admin.php');
        $output = "<section class='admin-main-confim'><p>Email and password are not valid</p>";
        $output .= "<button><a href='${redirect}'>Admin Login</a></button></section>";
    }

} else {
    $output = "
        <form class='admin-main-form-gridcontainer' action='./admin.php' method='post'>
            <section class='admin-main-form-gridcontainer-email'>
                <label for='email'>Email *</label>
                <input id='email' name='email' type='email' value='' placeholder='Email'>
            </section>
            <section class='admin-main-form-gridcontainer-password'>
                <label for='password'>Password *</label>
                <input id='password' name='password' type='password' value='' placeholder='Password'>
            </section>
            <section class='admin-main-form-gridcontainer-submit'>
                <input name='submit' type='Submit' value='Login'>
            </section>
        </form>
";
}

// Define a variable that gives the title to the page
$page_title = 'Admin';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>


</head>
<body>

<!-- Headers -->
<?php
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = "Admin";
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main class="admin-main">
    <fieldset>
        <legend>Login</legend>
        <section class="admin-main-error">
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
        <!-- Output -->
        <?= $output; ?>
    </fieldset>
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>