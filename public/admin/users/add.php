<?php

// Require initialize.php and related code
require_once('../../../private/initialize.php');

// Called redirect_user(); that redirects to the login page 
// an authorized user
redirect_admin($_SESSION['email'], $_SESSION['admin'], url_for('/admin/admin'));

/*
* Validation form for create new account
*/

// Create a boolean variable with false value
$valid_user = false;

// Create an empty array where saving the errors if they exist
$errors_output = [];

// Create a empty variables where saving form input if they are valid
$first_name = '';
$last_name = '';
$email = '';
$confirm_email = '';
$password = '';
$confirm_password = '';

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    
    /* 
    * Validate First Name input
    * First Name must be longer than 1 character
    * First Name must be shorter than 20 characters
    * First Name must containt just characters,
    * number and special characters are not allowed
    */
    if (isset($_POST['first_name'])) {
        $first_name_input = trim($_POST['first_name']);
        $first_name_input = htmlentities($first_name_input);

        if ($first_name_input !== '') {

            if (strlen($first_name_input) > 1) {

                if (strlen($first_name_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $first_name_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $first_name_input)) {
                            $first_name = $first_name_input;
                            $valid_user = true;
                        } else {
                            $errors_output['First Name'] = "can not contain special characters";
                            $valid_user = false;
                        }

                    } else {
                        $errors_output['First Name'] = "can not contain numbers";
                        $valid_user = false;
                    }
    
                } else {
                    $errors_output['First Name'] = "should be shorter than 20 characters";
                    $valid_user = false;
                }
    
            } else {
                $errors_output['First Name'] = "should be longer than 1 character";
                $valid_user = false;
            }

        } else {
            $errors_output['First Name'] = "is required";
            $valid_user = false;
        }
    }

    /* 
    * Validate Last Name input
    * Last Name must be longer than 1 character
    * Last Name must be shorter than 20 characters
    * Last Name must containt just characters,
    * number and special characters are not allowed
    */
    if (isset($_POST['last_name'])) {
        $last_name_input = trim($_POST['last_name']);
        $last_name_input = htmlentities($last_name_input);

        if ($last_name_input !== '') {

            if (strlen($last_name_input) > 1) {

                if (strlen($last_name_input) < 20) {
                    $invalid_character = '/[0-9]/';

                    if (!preg_match($invalid_character, $last_name_input)) {
                        $invalid_character = '/[@#~!£$%^&*-]/';

                        if (!preg_match($invalid_character, $last_name_input)) {
                            $last_name = $last_name_input;
                            $valid_user = true;
                        } else {
                            $errors_output['Last Name'] = "can not contain special characters";
                            $valid_user = false;
                        }

                    } else {
                        $errors_output['Last Name'] = "can not contain numbers";
                        $valid_user = false;
                    }
    
                } else {
                    $errors_output['Last Name'] = "should be shorter than 20 characters";
                    $valid_user = false;
                }
    
            } else {
                $errors_output['Last Name'] = "should be longer than 1 character";
                $valid_user = false;
            }

        } else {
            $errors_output['Last Name'] = "is required";
            $valid_user = false;
        }
    }

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
    * Validate Confirm Email input
    * Confirm Email must be equal to email input
    */
    if (isset($_POST['confirm_email'])) {
        $confirm_email_input = trim($_POST['confirm_email']);
        $confirm_email_input = htmlentities($confirm_email_input);

        if ($confirm_email_input !== '') {

            if ($confirm_email_input === $email) {
                $confirm_email = $confirm_email_input;
                $valid_user = true;
            } else {
                $errors_output['Confirm Email'] = "Email and Confirm email are not equal";
                $valid_user = false;
            }

        } else {
            $errors_output['Confirm Email'] = "is required";
            $valid_user = false;
        }
    }

    /*
    * Validate password input
    * Password must be longer at least 8 characters
    * Password must contain at least one uppercase character
    * Password must contain at least one lowercase character
    * Password must contain at least one number
    */
    if (isset($_POST['password'])) {
        $password_input = trim($_POST['password']);
        $password_input = htmlentities($password_input);

        if ($password_input !== '') {

            if (strlen($password_input) >= 8) {
                $required_character = '/[A-Z]/';

                if (preg_match($required_character, $password_input)) {
                    $required_character = '/[a-z]/';

                    if (preg_match($required_character, $password_input)) {
                        $required_character = '/[0-9]/';

                        if (preg_match($required_character, $password_input)) {
                            $password = $password_input;
                            $valid_user = true;
                        } else {
                            $errors_output['Password'] = "should contain at least one number";
                            $valid_user = false;
                        }

                    } else {
                        $errors_output['Password'] = "should contain at least one lowercase character";
                        $valid_user = false;
                    }

                } else {
                    $errors_output['Password'] = "should contain at least one uppercase character";
                    $valid_user = false;
                }

            } else {
                $errors_output['Password'] = "should be at least longer 8 characters";
                $valid_user = false;
            }

        } else {
            $errors_output['Password'] = "is required";
            $valid_user = false;
        }

    }

    /*
    * Validate Confirm Password input
    * Confirm Password must be equal to password input
    */
    if (isset($_POST['confirm_password'])) {
        $conifrm_password_input = trim($_POST['confirm_password']);
        $conifrm_password_input = htmlentities($conifrm_password_input);

        if ($conifrm_password_input !== '') {

            if ($conifrm_password_input === $password) {
                $confirm_password = $conifrm_password_input;
                $valid_user = true;
            } else {
                $errors_output['Confirm Password'] = "Password and Confirm password are not equal";
                $valid_user = false;
            }

        } else {
            $errors_output['Confirm Password'] = "is required";
            $valid_user = false;
        }
    }

}

/*
* Save the form inside a variable which name is output
* If the users creates a valid account
* or
* if the user has been logged
* output savas a btn that allows user to enter into the menu section
*/
if ($valid_user && count($errors_output) === 0) {

    if (is_new_user($db, $email)) {
        add_new_user($db, $first_name, $last_name, $email, $password);
        $redirect = url_for('/admin/users/users');
        $output = "<section class='add-main-confim'><p>New user has been added</p>";
        $output .= "<button><a href='${redirect}'>&laquo; Back to Users List</a></button></section>";
    } else {
        $redirect = url_for('/admin/users/users');
        $output = "<section class='add-main-confim'><p>There is already an user registered with this email: " . $email;
        $output .= "<mark></br>" . $email . "</mark></p>";
        $output .= "<button><a href='${redirect}'>User's Menu</a></button></section>";
    }


} else {
    $output = "
    <main>
        <form id='form' class='add-main-form-gridcontainer' action='./add' method='post'>
            <section class='add-main-form-gridcontainer-first-name'>
                <label for='first_name'>First Name *</label>
                <input id='first_name' name='first_name' type='text' value='${first_name}' placeholder='First Name'>
            </section>
            <section class='add-main-form-gridcontainer-last-name'>
                <label for='last_name'>Last Name *</label>
                <input id='last_name' name='last_name' type='text' value='${last_name}' placeholder='Last Name'>
            </section>
            <section class='add-main-form-gridcontainer-email'>
                <label for='email'>Email *</label>
                <input id='email' name='email' type='email' value='${email}' placeholder='Email'>
            </section>
            <section class='add-main-form-gridcontainer-email-confirm'>
                <label for='confirm_email'>Confirm email *</label>
                <input id='confirm_email' name='confirm_email' type='email' value='${confirm_email}' placeholder='Confirm Email'>
            </section>
            <section class='add-main-form-gridcontainer-password'>
                <label for='password'>Password *</label>
                <input id='password' name='password' type='password' value='${password}' placeholder='Password'>
                <label style='display: inline' for='show_password'>Show Password</label>
                <input style='display: inline' id='show_password' name='show_password' type='checkbox'>
            </section>
            <section class='add-main-form-gridcontainer-password-confirm'>
                <label for='confirm_password'>Confirm Password *</label>
                <input id='confirm_password' name='confirm_password' type='password' value='${confirm_password}' placeholder='Confirm Password'>
            </section>
            <section class='add-main-form-gridcontainer-submit'>
                <input name='submit' type='Submit' value='Create new account'>
            </section>
        </form>
    </main>
    ";
}

// Define a variable that gives the title to the page
$page_title = 'Add new user';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>

<!-- Include sign-up.js and related code -->
<script src="../../scripts/sign-up.js" defer></script>

</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Add new user';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<main class="add-main">
    <fieldset>
        <legend>Add new account</legend>
        <section class="add-main-error">
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
</main>

<!-- Footer -->
<?php
// Include footer.php and related code
include(INCLUDE_PATH . '/footer.php');
?>

</body>
</html>