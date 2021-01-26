<?php 

// Require initialize.php and related code
require_once('../../private/initialize.php');

/*
* Validation form for create new account
*/

// Create an empty array where saving the errors if they exist
$errors_output = [];

// Create a empty variables where saving form input if they are valid
$first_name = '';

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

                        } else {
                            $errors_output['First Name'] = "can not contain special characters";
                        }

                    } else {
                        $errors_output['First Name'] = "can not contain numbers";
                    }
    
                } else {
                    $errors_output['First Name'] = "should be shorter than 20 characters";
                }
    
            } else {
                $errors_output['First Name'] = "should be longer than 1 character";
            }

        } else {
            $errors_output['First Name'] = "is required";
        }
    }

}

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
        <input id="first_name" name="first_name" type="text" value="<?= $first_name; ?>" placeholder="First Name">
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
        <input name="submit" type="Submit" value="Create new account">
    </form>
</main>
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
</body>
</html>