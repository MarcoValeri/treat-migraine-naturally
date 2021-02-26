<?php

// Require initialize.php and related code
require_once('../../../private/initialize.php');

// Called redirect_user(); that redirects to the login page 
// an authorized user
redirect_admin($_SESSION['email'], $_SESSION['admin'], url_for('/admin/admin.php'));

// Define the $id by the url and gets the $user by the db
// thanks to find_single_user(); function
$id = $_GET['id'] ?? '1';
$user = find_single_user($db, $id);

/*
* Validation form for edit existing user
*/

// Create a boolean variable with FALSE value
$valid_user = FALSE;

// Create an empty array where saving the errors if they exist
$errors_output = [];

// Create a empty variables where saving form input if they are valid
$first_name = $user['first_name'];
$last_name = $user['last_name'];
$email = $user['email'];
$password = $user['password'];
$admin = $user['admin'];

// Check if the form has been submitted
if (isset($_POST['confirm'])) {
    
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
                            $valid_user = TRUE;
                        } else {
                            $errors_output['First Name'] = "can not contain special characters";
                            $valid_user = FALSE;
                        }

                    } else {
                        $errors_output['First Name'] = "can not contain numbers";
                        $valid_user = FALSE;
                    }
    
                } else {
                    $errors_output['First Name'] = "should be shorter than 20 characters";
                    $valid_user = FALSE;
                }
    
            } else {
                $errors_output['First Name'] = "should be longer than 1 character";
                $valid_user = FALSE;
            }

        } else {
            $errors_output['First Name'] = "is required";
            $valid_user = FALSE;
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
                            $valid_user = TRUE;
                        } else {
                            $errors_output['Last Name'] = "can not contain special characters";
                            $valid_user = FALSE;
                        }

                    } else {
                        $errors_output['Last Name'] = "can not contain numbers";
                        $valid_user = FALSE;
                    }
    
                } else {
                    $errors_output['Last Name'] = "should be shorter than 20 characters";
                    $valid_user = FALSE;
                }
    
            } else {
                $errors_output['Last Name'] = "should be longer than 1 character";
                $valid_user = FALSE;
            }

        } else {
            $errors_output['Last Name'] = "is required";
            $valid_user = FALSE;
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
                $valid_user = TRUE;
            } else {
                $errors_output['Email'] = "should be a valid email address";
                $valid_user = FALSE;
            }

        } else {
            $errors_output['Email'] = "is required";
            $valid_user = FALSE;
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
                            $valid_user = TRUE;
                        } else {
                            $errors_output['Password'] = "should contain at least one number";
                            $valid_user = FALSE;
                        }

                    } else {
                        $errors_output['Password'] = "should contain at least one lowercase character";
                        $valid_user = FALSE;
                    }

                } else {
                    $errors_output['Password'] = "should contain at least one uppercase character";
                    $valid_user = FALSE;
                }

            } else {
                $errors_output['Password'] = "should be at least longer 8 characters";
                $valid_user = FALSE;
            }

        } else {
            $errors_output['Password'] = "is required";
            $valid_user = FALSE;
        }

    }

    /*
    * Validate Admin input
    * Admin must be 0 or 1
    */
    if (isset($_POST['admin'])) {
        $admin_input = trim($_POST['admin']);
        $admin_input = htmlentities($admin_input);

        if ($admin_input !== '') {
            if ($admin_input === "0" || $admin_input === "1") {
                $admin = $admin_input;
                $valid_user = TRUE;
            } else {
                $errors_output['admin'] = "Admin should be '0' or '1'";
                $valid_user = FALSE;
            }
        } else {
            $errors_output['admin'] = "is required";
            $valid_user = FALSE;
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

    edit_user($db, $id, $first_name, $last_name, $email, $password, $admin);
    $output = "User has been updated";

} else {
    $output = "
    <form action='./edit.php?id=${id}' method='post'>    
        <td>${user['id']}</td>
        <td><input name='first_name' type='text' value='${first_name}'></td>
        <td><input name='last_name' type='text' value='${last_name}'></td>
        <td><input name='email' type='text' value='${email}'></td>
        <td><input name='password' type='text' value='${password}'></td>
        <td><input name='admin' type='text' value='${admin}'></td>
        <td><input type='submit' name='confirm' value='confirm'></td>
    </form>
    ";
}


// Define a variable that gives the title to the page
$page_title = 'Edit User';

// Include head.php and related code
include(INCLUDE_PATH . '/head.php');

?>
</head>
<body>

<!-- Headers -->
<?php 
// Give value to $header_sub_title to have a right sub title in the header menu
$header_sub_title = 'Edit User';
// Include header.php and related code
include(INCLUDE_PATH . '/header.php');
?>

<!-- Main -->
<section>
    <h2>User: <?= $user['email'] ?></h2>
    <table>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Admin</th>
            <th>Edit</th>
        </tr>
        <tr>
        <!-- Output -->
        <?= $output; ?>
        </tr>
    </table>
    <a href="<?= url_for('/admin/users/users.php'); ?>">&laquo; Back to Users List</a>
</section>

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